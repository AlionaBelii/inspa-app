<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Livewire\ProjectRequest;
use App\Livewire\ProjectRequestControl;

Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/ourworks", [PageController::class, "ourworks"])->name("ourworks");
Route::get("/designers", [PageController::class, "designers"])->name("designers");
Route::get("/pricing", [PageController::class, "pricing"])->name("pricing");
Route::get("/about", [PageController::class, "about"])->name("about");
Route::get("/contacts", [PageController::class, "contacts"])->name("contacts");
Route::get("/blog", [PageController::class, "blog"])->name("blog");
Route::get("/start-project", [PageController::class, "startProject"])->name("start-project");
Route::get("/start-review", [ReviewController::class, "index"])->name("start-review");
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");

Route::get("/category/{slug}", [CategoryController::class, "show"])->name("show-category");
Route::get("/worker/{slug}", [WorkerController::class, "show"])->name("show-worker");
Route::get("/user/{name}", [UserController::class, "show"])->name("show-user");
Route::get("/project/{id}", [ProjectController::class, "show"])->name("show-project");
Route::get("/article/{slug}", [ArticleController::class, "show"])->name("show-article");

Route::post("/register", [AuthCOntroller::class, "registerPost"])->name("registerPost");
Route::post("/login", [AuthCOntroller::class, "loginPost"])->name("loginPost");
Route::get("/logout", [AuthCOntroller::class, "logout"])->name("logout");
Route::post("/add-review", [ReviewController::class, "reviewPost"])->name("review-post");
// последний параметр мы сами придумываем

Route::get('/project/request', ProjectRequest::class)->name('project.request.form')->middleware('auth');
Route::get('/requests/control', ProjectRequestControl::class)->name('admin.request.control')->middleware('auth', 'admin');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::post("/update-role", [AdminController::class, "updateRole"])->name("updateRole");
    Route::post("/update-category", [AdminController::class, "updateCategory"])->name("updateCategory");
    Route::post("/update-subcategory", [AdminController::class, "updateSubcategory"])->name("updateSubcategory");
    Route::post("/add-subcategory", [AdminController::class, "addSubcategory"])->name("addSubcategory");
    Route::post("/delete-subcategory", [AdminController::class, "deleteSubcategory"])->name("deleteSubcategory");
    Route::post("/add-worker", [AdminController::class, "addWorker"])->name("addWorker");
    Route::post("/add-article", [AdminController::class, "addArticle"])->name("addArticle");
    Route::post("/update-worker", [AdminController::class, "updateWorker"])->name("updateWorker");
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('workers', [AdminController::class, 'indexWorker'])->name('admin.workers.index');
    Route::get('categories', [AdminController::class, 'indexCategory'])->name('admin.categories.index');
    Route::get('requests', [AdminController::class, 'indexRequest'])->name('admin.requests.index');
    Route::get('articles', [AdminController::class, 'indexArticle'])->name('admin.articles.index');
    Route::patch('requests/{projectrequest}/status', [AdminController::class, 'updateStatus'])->name('admin.requests.update_status');
});