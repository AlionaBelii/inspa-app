<?php

namespace App\Livewire;
use App\Mail\ProjectRequestMail;
use Livewire\Component;
use App\Models\Worker;
use App\Models\Subcategory;
use App\Models\ProjectRequest as ProjectRequestModel;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class ProjectRequest extends Component
{   
    use WithFileUploads;

    public $fullname;
    public $company_name;
    public $email;
    public $phonenumber;
    public $project_type;
    public $worker_id;
    public $project_description;
    public $prefered_deadline;
    public $reference_file;
    public $successMessage = '';

    protected $rules = [
        'fullname' => ["required", "string", "max:50"],
        'company_name' => ["nullable", "string", "max:255"],
        'email' => ["required", "email", "max:255"],
        'phonenumber' => ["nullable", "string", "max:255"],
        'project_type' => ["required", "exists:subcategories,id"],
        'worker_id' => ["required", "exists:workers,id"],
        'project_description' => ["required", "string"],
        'prefered_deadline' => ["nullable", "string"],
        'reference_file' => ["nullable", "file", "mimes:zip,pdf,jpg,png", "max:10240"]
    ];

    public function mount()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $this->fullname = $user->fullname;
            $this->email = $user->email;
        }
    }

    public function submitRequest()
    {
        if(!Auth::check())
        {
            return $this->redirect('/login', true);
        }

        $validatedData = $this->validate();

        $filePath = null;

        if ($this->reference_file)
        {
            $filePath = $this->reference_file->store('requests', 'public');
        }

        $requestData = [
            'user_id' => Auth::id(),
            'worker_id' => $validatedData['worker_id'],
            'subcategory_id' => $validatedData['project_type'],
            'fullname' => $validatedData['fullname'],
            'company_name' => $validatedData['company_name'],
            'email' => $validatedData['email'],
            'phonenumber' => $validatedData['phonenumber'],
            'project_description' => $validatedData['project_description'],
            'prefered_deadline' => $validatedData['prefered_deadline'],
            'reference_file' => $filePath,
            'status' => 'new'
        ];

        ProjectRequestModel::create($requestData);

        $worker = Worker::findOrFail($validatedData['worker_id']);

        $this->reset([
            'fullname', 'company_name', 'email', 'phonenumber', 'project_type', 'worker_id', 'project_description', 'prefered_deadline', 'reference_file'
        ]);

        $this->mount();

        $this->successMessage = "The request is send to designer " . $worker->fullname_en . "!";

        try
        {
            Mail::to($worker->email)->send(new ProjectRequestMail($reqData));
        } catch (\Exception $e) {
            \Log::error("Failed to send email to worker: " . $e->getMessage());
        }
    }


    
    public $statuses = ['new', 'in_progress', 'completed', 'rejected', 'approved'];

    public function updateStatus(int $requestedId, string $status)
    {        
        try
        {
            $request = ProjectRequest::findOrFail($requestedId);
            $request->update([
                'status' => $status
            ]);

            session()->flash('success', 'Status '. $request->if . ' is changed to' . ucfirst($status));
        } catch (\Exception $e) 
        {
            session()->flash('error', 'Error: '. $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.project-request', [
            'workers' => Worker::with('category')->get(),
            'subcategories' => Subcategory::all(),
            'requests' => ProjectRequestModel::with(['worker', 'subcategory'])->get()
        ]);
    }
}
