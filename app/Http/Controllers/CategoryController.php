<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where("slug_en", "=", $slug)->with("subcategories")->firstOrFail();
        //возвращаем слаг категории на которую нажмем
        return view("category.show", [
            "category" => $category
        ]);
        // папка в views/category/show.blade.php
    }
}
