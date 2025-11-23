<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Worker;
use App\Models\Review;

class PageController extends Controller
{
    public function home()
    {
        // наша модель Category + sql,prepare,execute,fetchassoc
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $workers = Worker::all();
        $topworkers = Worker::orderByDesc('experience_years')->limit(4)->with('category')->withCount(['projects', 'reviews'])->get();
        $topreviews = Review::inRandomOrder()->limit(4)->with('user')->with('worker')->get();

        return view("home", [
            "categories" => $categories,
            "subcategories" => $subcategories,
            'topworkers' => $topworkers,
            'topreviews' => $topreviews,
            'workers' => $workers,
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
