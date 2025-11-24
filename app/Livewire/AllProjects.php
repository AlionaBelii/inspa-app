<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Worker;
use App\Models\Category;
use App\Models\Project;

class AllProjects extends Component
{
    use WithPagination;

    public $selectedCategoryId = null;

    public function updatedSelectedCategoryId()
    {
        $this->resetPage('newRequestPage');
    }

    public function filterByCategory($id = null)
    {
        $this->selectedCategoryId = $id;
    }


    public function render()
    {

        $categories = Category::orderBy('title_en', 'asc')->get();
        $query = Project::with(['worker', 'subcategory.category']);

        if ($this->selectedCategoryId)
        {
            $query->whereHas('subcategory.category', function ($q)
            {
                $q->where('id', $this->selectedCategoryId);
            });
        }


        $allProjects = $query->paginate(8, ['*'],  'newRequestPage');

        return view('livewire.all-projects', [
            'allProjects' => $allProjects,
            'categories' => $categories
        ]);
    }
}
