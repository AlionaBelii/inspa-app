<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Project;
use App\Models\Worker;

class AllDesigners extends Component
{
    use WithPagination;

    public $selectedCategoryId = null;

    protected $queryString = [
        'selectedCategoryId' => ['except' => null, 'as' => 'category']
    ];

    public function updatedSelectedCategoryId()
    {
        $this->resetPage('newRequestPage');
    }

    public function filterByCategory($id = null)
    {
        $this->selectedCategoryId = $id;
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::orderBy('title_en', 'asc')->get();
        $query = Worker::with(['category', 'category.subcategories'])->withCount(['projects', 'reviews']);

        if ($this->selectedCategoryId)
        {
            $query->whereHas('category', function ($q)
            {
                $q->where('id', $this->selectedCategoryId);
            });
        }

        $allDesigners = $query->paginate(8, ['*'],  'newRequestPage');

        return view('livewire.all-designers', [
            'allDesigners' => $allDesigners,
            'categories' => $categories
        ]);
    }
}
