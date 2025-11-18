<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Category;

class WorkerController extends Controller
{
    public function show($slug)
    {
        $worker = Worker::where("slug_en", "=", $slug)->firstOrFail();
        //возвращаем слаг категории на которую нажмем
        return view("worker.show", ["worker" => $worker]);
        // папка в views/category/show.blade.php
    }
}
