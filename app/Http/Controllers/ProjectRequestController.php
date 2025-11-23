<?php

namespace App\Http\Controllers;
use App\Models\ProjectRequest;
use App\Models\Worker;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectRequestController extends Controller
{

    public function index()
    {
        if(!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to submit a project request.');
        }

        $workers = Worker::with('category')->get();
        $subcategories = Subcategories::all();

        return view('projects.project_request', compact('workers', 'subcategories'));
    }

    public function projectPost(Request $req)
    {

        if(!Auth::check())
        {
            return redirect()->route('login')->with('error', 'You need to login to submit a project request.');
        }

        $validatedData = $req->validate([
            'worker_id' => ["required", "exists:workers,id"],
            'fullname' => ["required", "string", "max:50"],
            'company_name' => ["nullable", "string", "max:255"],
            'email' => ["required", "email", "max:255"],
            'phonenumber' => ["nullable", "string", "max:255"],
            'project_type' => ["required", "exists:subcategories,id"],
            'project_description' => ["required", "string"],
            'prefered_deadline' => ["nullable", "string"],
            'reference_file' => ["nullable", "file", "mimes:zip,pdf,jpg,png", "max:10240"]
        ]);

        $filePath = null;

        if($req->hasFile('reference_file')) {
            $file = $req->file('reference_file');
            $filePath = $file->store('requests', 'public');
            $validatedData['reference_file'] = $filePath;
        }

        $reqData = array_merge($validatedData, [
            'user_id' => Auth::id(),
            'worker_id' => $validatedData['worker_id'],
            'subcategory_id' => $validatedData['project_type'],
            'status' => 'new'
        ]);

        unset($reqData['project_type']);

        $reqData = ProjectRequest::create($reqData);

        $worker = Worker::findOrFail($validatedData['worker_id']);

        try
        {
            Mail::to($worker->email)->send(new YourMailClass($reqData));
        } catch (\Exception $e) {
            \Log::error("Failed to send email to worker: " . $e->getMessage());
        }

        return redirect()->back()->with('success', 'The request is send to designer ' . $worker->fullname_en . '!');        
    }
}
