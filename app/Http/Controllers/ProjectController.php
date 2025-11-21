<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show($id)
    {
        $project = Project::where("id", "=", $id)->firstOrFail();
        //возвращаем слаг категории на которую нажмем
        return view("project.show", ["project" => $project]);
        // папка в views/category/show.blade.php
    }
}
