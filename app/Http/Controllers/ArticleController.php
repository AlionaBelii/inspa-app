<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function show($slug_en)
    {
        $article = Article::where("slug_en", "=", $slug_en)->firstOrFail();

        $category_id = $article->category_id;

        $morearticles = Article::where("category_id", "=", $category_id)->inRandomOrder()->where('id', '!=', $article->id)->limit(4)->get();
        

        return view("article.show", ["article" => $article, "morearticles" => $morearticles]);
    }
}
