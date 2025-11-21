<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;

Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/ourworks", [PageController::class, "ourworks"])->name("ourworks");
Route::get("/designers", [PageController::class, "designers"])->name("designers");
Route::get("/pricing", [PageController::class, "pricing"])->name("pricing");
Route::get("/about", [PageController::class, "about"])->name("about");
Route::get("/contacts", [PageController::class, "contacts"])->name("contacts");
Route::get("/blog", [PageController::class, "blog"])->name("blog");
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");

Route::get("/category/{slug}", [CategoryController::class, "show"])->name("show-category");
Route::get("/worker/{slug}", [WorkerController::class, "show"])->name("show-worker");
Route::get("/project/{id}", [ProjectController::class, "show"])->name("show-project");

Route::post("/register", [AuthCOntroller::class, "registerPost"])->name("registerPost");
Route::post("/login", [AuthCOntroller::class, "loginPost"])->name("loginPost");
Route::get("/logout", [AuthCOntroller::class, "logout"])->name("logout");
// последний параметр мы сами придумываем
