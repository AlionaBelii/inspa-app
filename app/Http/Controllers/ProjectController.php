<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectController extends Controller
{   
    public function show($id)
    {
        $project = Project::where("id", "=", $id)->firstOrFail();

        $subcategory_id = $project->subcategory_id;

        $moreprojects = Project::where("subcategory_id", "=", $subcategory_id)->inRandomOrder()->where('id', '!=', $project->id)->limit(4)->get();
        
        
        // $projectCollection = Project::with(['worker', 'subcategory', 'category'])->latest()->paginate(4, ['*'], 'newRequestPage');
        //возвращаем слаг категории на которую нажмем
        return view("project.show", ["project" => $project, "moreprojects" => $moreprojects]);
        // папка в views/category/show.blade.php
    }
}
