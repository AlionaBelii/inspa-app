<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Worker;

class PageController extends Controller
{
    public function home()
    {
        // наша модель Category + sql,prepare,execute,fetchassoc
        $categories = Category::all();
        $topworkers = Worker::orderByDesc('experience_years')->limit(5)->with('category')->withCount(['projects', 'reviews'])->get();
        return view("home", [
            "categories" => $categories,
            'topworkers' => $topworkers
        ]);
    }
    public function ourworks()
    {
        return view("ourworks");
    }
    public function designers()
    {
        return view("designers");
    }
    public function pricing()
    {
        return view("pricing");
    }
    public function about()
    {
        return view("about");
    }
    public function contacts()
    {
        return view("contacts");
    }
    public function blog()
    {
        return view("blog");
    }
}
