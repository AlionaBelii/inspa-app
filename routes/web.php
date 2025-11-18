<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WorkerController;

Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/ourworks", [PageController::class, "ourworks"])->name("ourworks");
Route::get("/designers", [PageController::class, "designers"])->name("designers");
Route::get("/pricing", [PageController::class, "pricing"])->name("pricing");
Route::get("/about", [PageController::class, "about"])->name("about");
Route::get("/contacts", [PageController::class, "contacts"])->name("contacts");
Route::get("/blog", [PageController::class, "blog"])->name("blog");

Route::get("/category/{slug}", [CategoryController::class, "show"])->name("show-category");
Route::get("/worker/{slug}", [WorkerController::class, "show"])->name("show-worker");
// последний параметр мы сами придумываем
