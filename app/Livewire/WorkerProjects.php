<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Worker;
use App\Models\User;
use App\Models\Category;
use App\Models\Project;

class WorkerProjects extends Component
{   
    use WithPagination;
    
    public $workerId;

    public function mount($workerId)
    {
        $this->workerId = $workerId;
    }
    public function render()
    {   
        
        $projects = Project::where('worker_id', $this->workerId)->orderBy('created_at','desc')->paginate(4, ['*'],  'newRequestPage');

        return view('livewire.worker-projects', [
            'projects' => $projects,
        ]);
    }
}
