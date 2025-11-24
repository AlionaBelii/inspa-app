<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ArticleFavoriteBtn extends Component
{
    public $articleId;
    public $isFavorited;
    public $favoritesCount;

    

    public function mount(Article $article)
    {
        $this->articleId = $article->id;
        $this->favoritesCount = $article->favorites()->count();

        if(Auth::check())
        {
            $this->isFavorited = $article->isFavoritedBy(Auth::id());
        } else {
            $this->isFavorited = false;
        }
    }

    public function toggleFavorite()
    {
        if(!Auth::check())
        {
        }

        $userId = Auth::id();

        if ($this->isFavorited)
        {
            Favorite::where('user_id', $userId)->where('article_id', $this->articleId)->delete();
            $this->isFavorited = false;
            $this->favoritesCount--;
        } else {
            Favorite::create([
                'user_id' => $userId,
                'article_id' =>$this->articleId
            ]);
            $this->isFavorited = true;
            $this->favoritesCount++;
        }

        $this->dispatch('articleToggle');
    }

    public function render()
    {
        return view('livewire.article-favorite-btn');
    }
}
