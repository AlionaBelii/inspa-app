<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AllArticles extends Component
{
    use WithPagination;

    public $selectedCategoryId = null;
    public $mode = 'all';

    public function updated($name, $value)
    {
        if(in_array($name, ['selectedCategoryId', 'mode']))
        {
            $this->resetPage('articlesPage');
        }
    }

    public function filterByCategory($id = null)
    {
        $this->selectedCategoryId = $id;
        $this->mode = 'all';
    }

    public function showFavorites()
    {
        if(Auth::check())
        {
            $this->mode = 'favorites';
            $this->selectedCategoryId = null;
        }
    }

    protected $listeners = ['articleToggled' => '$refresh'];

    public function render()
    {
        $categories = Category::orderBy('title_en', 'asc')->get();
        $query = Article::with(['category', 'favorites'])->orderBy('created_at', 'desc');

        if ($this->mode === 'favorites' && Auth::check()) 
        {
            $userId = Auth::id();
            $query->whereHas('favorites', function ($q) use ($userId){
                    $q->where('user_id', $userId);
            });
        }

        if ($this->mode === 'all' && $this->selectedCategoryId) 
        {
            $query->where('category_id', $this->selectedCategoryId);        
        };

        $articles = $query->paginate(8, ['*'], 'articlesPage');

        return view('livewire.all-articles', [
            'articles' => $articles,
            'categories' => $categories

        ]);
    }
}
