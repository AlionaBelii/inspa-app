<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;
use App\Models\Project;

class UserController extends Controller
{
    public function show($name)
    {
        $user = User::where("name", "=", $name)->withCount(['projects', 'reviews'])->firstOrFail();
        //возвращаем слаг категории на которую нажмем
        
        $user_id = $user->id;
        $userReviews = Review::where("user_id", "=", $user_id)->with(['worker', 'user'])->limit(4)->get();
        $userProjects = Project::where("worker_id", "=", $user_id)->with('worker', 'client')->limit(4)->get();
        $totalReviews = Review::where("user_id", "=", $user_id)->count();
        $totalProjects = Project::where("worker_id", "=", $user_id)->count();
        
        
        return view("user.show", ["user" => $user, "userReviews" => $userReviews, "userProjects" => $userProjects, "totalReviews" => $totalReviews, "totalProjects" => $totalProjects]);
        // папка в views/category/show.blade.php
    }
}
