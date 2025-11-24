<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Review;
use App\Models\Category;

class WorkerController extends Controller
{
    public function show($slug)
    {
        $worker = Worker::where("slug_en", "=", $slug)->with('category')->withCount(['projects', 'reviews'])->firstOrFail();
        //возвращаем слаг категории на которую нажмем
        
        $worker_id = $worker->id;
        $workerReviews = Review::where("worker_id", "=", $worker_id)->with(['worker', 'user'])->limit(4)->get();
        
        
        return view("worker.show", ["worker" => $worker, "workerReviews" => $workerReviews]);
        // папка в views/category/show.blade.php
    }
}
