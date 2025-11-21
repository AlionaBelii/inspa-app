<?php

namespace App\Http\Controllers\API;
use App\Models\Worker;
use App\Models\Project;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $req)
    {
        $query = $req->input("q");
        // return $query; - для проверки
        
        // 1. Designers
        $workers = Worker::where('fullname_en', 'LIKE', "%{$query}%")
            ->orWhere('fullname_ru', 'LIKE', "%{$query}%")
            ->get();

        // 2. Projects
        $projects = Project::where('title_name_ru', 'LIKE', "%{$query}%")
            ->orWhere('title_name_en', 'LIKE', "%{$query}%")
            ->get(); 
            
        // 3. Categories
        $categories = Category::where('title_en', 'LIKE', "%{$query}%")
            ->orWhere('title_ru', 'LIKE', "%{$query}%")
            ->get(); 

        return response()->json([
            "workers" => $workers,
            "projects" => $projects,
            "categories" => $categories
        ]);
    }
}
