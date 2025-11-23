<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProjectRequest as ProjectRequestModel;
use App\Models\Worker;
use App\Models\Subcategory;
use Livewire\WithPagination;


class ProjectRequestControl extends Component
{
    use WithPagination;

    public $statuses = ['new', 'in_progress', 'completed', 'rejected', 'approved'];

    public function updateStatus(int $requestedId, string $status)
    {   
        if (!in_array($status, $this->statuses)) {
            session()->flash('error', 'Not such status.');
            return;
        }

        try
        {
            $request = ProjectRequestModel::findOrFail($requestedId);
            $request->update([
                'status' => $status
            ]);

            $this->resetPage('newRequestPage');

            session()->flash('success', 'Status '. $request->id . ' is changed to' . ucfirst($status));

        } catch (\Exception $e) 
        {
            session()->flash('error', 'Error: '. $e->getMessage());
        }
    }


    public function render()
    {           
        $totalRequests = ProjectRequestModel::count();

        $newRequestsCollection = ProjectRequestModel::with(['worker', 'subcategory', 'user'])->where('status', 'new')->latest()->paginate(4, ['*'], 'newRequestPage');

        $newRequestsCount = ProjectRequestModel::where('status', 'new')->count();

        $viewData['totalRequests'] = $totalRequests;
        $viewData['newrequests'] = $newRequestsCollection;
        $viewData['newrequests_count'] = $newRequestsCollection->total();
        $viewData['newRequestsCount'] = $newRequestsCount;


        return view('livewire.project-request-control', ($viewData));
    }
}
