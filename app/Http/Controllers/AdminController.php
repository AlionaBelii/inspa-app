<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\ProjectRequest;
use App\Models\User;
use App\Models\Worker;
use App\Models\Project;
use App\Models\Category;
use App\Models\Article;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
    public function index()
    {
        $newRequestsCount = ProjectRequest::where('status', 'new')->count();
        $totalWorkers = Worker::count();
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $totalCategories = Category::count();
        $totalSubcategories = Subcategory::count();
        $allUsers = User::all();
        $totalArticles = Article::count();

        return view('admin.dashboard.index', compact('newRequestsCount', 'totalWorkers', 'allUsers', 'totalUsers', 'totalProjects', 'totalCategories', 'totalSubcategories', 'totalArticles'));
    }
    
    public function updateRole(Request $req, User $user)
    {
        $req->validate([
            'user_id' => ["required", "exists:users,id"],
            'role' => ["required", "in:admin,user"]
        ]);

        $user = User::findOrFail($req->user_id);
        
        $user->update([
            'role' => $req->role
        ]);

        return back()->with('success', "User's role " . $user->fullname . " was changed to " . $req->role . '!');
    }

    public function indexRequest()
    {
        $requests = ProjectRequest::with('worker')->orderBy('created_at', 'desc')->paginate(20);
        $newrequests = ProjectRequest::where('status', '=', 'new')->orderBy('created_at', 'desc')->with('user')->with('subcategory')->with('worker')->paginate(20);

        return view('admin.requests.index', compact('requests', 'newrequests'));

    }
    public function indexCategory()
    {
        $categories = Category::with('subcategories')->get();
        $subcategories = Subcategory::get();

        return view('admin.categories.index', compact('categories', 'subcategories'));
    }

    public function updateCategory(Request $req)
    {
        $req->validate([
            'category_id' => ["required", "exists:categories,id"],
            'title_en' => ["required", "string", "max:50"],
            'title_ru' => ["nullable", "string", "max:50"]
        ]);

        $category = Category::findOrFail($req->category_id);
        $oldTitleEn = $category->title_en;
        $category->update([
            "title_en" => $req->title_en,
            "title_ru" => $req->title_ru,
            "slug_en" => Str::slug($req->title_en),
            "slug_ru" => Str::slug($req->title_ru) ?? $req->title_en
        ]);

        return back()->with('category_success', "Name of category: " . $category->title_en . " was changed to: " . $oldTitleEn);
    }

    public function updateSubcategory(Request $req)
    {
        $req->validate([
            'subcategory_id' => ["required", "exists:subcategories,id"],
            'name_en' => ["required", "string", "max:50"],
            'name_ru' => ["nullable", "string", "max:50"],
            'price_min' => ["nullable", "numeric", "min:0", "decimal:0,2"],
            'price_max' => ["nullable", "numeric", "min:0", "decimal:0,2", "gt:price_min"]
        ]);

        $subcategory = Subcategory::findOrFail($req->subcategory_id);
        
        $oldNameEn = $subcategory->name_en;

        $subcategory->update([
            "name_en" => $req->name_en,
            "name_ru" => $req->name_ru,
            "price_min" => $req->price_min,
            "price_max" => $req->price_max
        ]);

        return back()->with('subcategory_success', "Name of subcategory: " . $subcategory->name_en . " was changed to: " . $oldNameEn);
    }

    public function addSubcategory(Request $req)
    {
        $validated = $req->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name_en' => ['required', 'string', 'max:50'],
            'name_ru' => ['required', 'string', 'max:50'],
            'price_min' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            'price_max' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
        ]); 
        
        $subcategory = Subcategory::create([
            'category_id' => $validated['category_id'],
            'name_en' => $validated['name_en'],
            'name_ru' => $validated['name_ru'],
            'price_min' => $validated['price_min'],
            'price_max' => $validated['price_max']
        ]);

        return back()->with('add_subcategory_success', "Subcategory " . $subcategory->name_en . " was created!");
    }

    public function deleteSubcategory(Request $req)
    {
        $validated = $req->validate([
            'subcategory_id' => ['required', 'exists:subcategories,id'],
        ]);
        $subcategory = Subcategory::findOrFail($validated['subcategory_id']);
        $deletedName = $subcategory->name_en;
        $subcategory->delete();

        return back()->with('delete_subcategory_success', "Subcategory " . $deletedName . " was deleted!");
    }


    public function indexWorker()
    {
        $workers = Worker::with('category')->get();
        $categories = Category::with('subcategories')->get();

        return view('admin.workers.index', compact('workers', 'categories'));
    }

    public function addWorker(Request $req)
    {
        $validated = $req->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'email' => ['required', 'email'],
            'fullname_en' => ['required', 'string', 'max:100'],
            'fullname_ru' => ['nullable', 'string', 'max:100'],
            'experience_years' => ['nullable', 'numeric', 'min:0'],
            'description_en' => ['nullable', 'string', 'max:1000'],
            'description_ru' => ['nullable', 'string', 'max:1000'],
            'filename' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $photoPath = null;
        
        if($req->hasFile('photo'))
        {
            $photoPath = $req->file('photo')->store('workers', 'public');
        }
        $slugSource = $validated['fullname_ru'] ?? $validated['fullname_en'];
        $slug_ru = Str::slug($slugSource, '-', 'ru');
        $originalSlug = $slug_ru;
        $count = 1;
        while (Worker::where('slug_ru', $slug_ru)->exists()) {
            $slug_ru = $originalSlug . '-' . $count++;
        }

        $worker = Worker::create([
            'category_id' => $validated['category_id'],
            'email' => $validated['email'],
            'fullname_en' => $validated['fullname_en'],
            'fullname_ru' => $validated['fullname_ru'] ?? $validated['fullname_en'],
            'experience_years' => $validated['experience_years'] ?? 0,
            'description_en' => $validated['description_en'],
            'description_ru' => $validated['description_ru'],
            'filename' => $photoPath,
            'slug_en' => $slug_ru,
            'slug_ru' => $slug_ru
        ]);
        
        return back()->with('add_designer_success', "Designer " . $worker->fullname_en . " was added!");
    }

    public function updateWorker(Request $req)
    {
        $validated = $req->validate([
            'worker_id' => ['required', 'exists:workers,id'],
            'email' => ['required', 'email'],
            'fullname_en' => ['nullable', 'string', 'max:100'],
            'fullname_ru' => ['nullable', 'string', 'max:100'],
            'experience_years' => ['nullable', 'numeric', 'min:0'],
            'description_en' => ['nullable', 'string', 'max:1000'],
            'description_ru' => ['nullable', 'string', 'max:1000'],
            'filename' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $worker = Worker::findOrFail($req->worker_id);

        $photoPath = null;
        
        if($req->hasFile('photo'))
        {
            $photoPath = $req->file('photo')->store('workers', 'public');
        }

        $slugSource = $validated['fullname_en'] ?? $validated['fullname_ru'];
        $slug_ru = Str::slug($slugSource, '-', 'ru');

        $worker->update([
            'email' => $validated['email'] ?? $worker->email,
            'fullname_en' => $validated['fullname_en'] ?? $worker->fullname_en,
            'fullname_ru' => $validated['fullname_ru'] ?? $validated['fullname_en'] ?? $worker->fullname_ru,
            'experience_years' => $validated['experience_years'] ?? $worker->experience_years,
            'description_en' => $validated['description_en'] ?? $worker->description_en,
            'description_ru' => $validated['description_ru'] ?? $worker->description_ru,
            'filename' => $photoPath ?? $worker->filename,
            'slug_en' => $slugSource ?? $worker->slug_en,
            'slug_ru' => $slug_ru ?? $worker->slug_ru
        ]);
        
        return back()->with('update_designer_success', "Designer " . $worker->fullname_en . " was updated!");
    }

    public function indexArticle()
    {
        $articles = Article::with('category')->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::with('subcategories')->get();
        
        return view('admin.articles.index', compact('articles', 'categories'));

    }

    public function addArticle(Request $req)
    {
        $validated = $req->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title_en' => ['required', 'string', 'max:255'],
            'title_ru' => ['required', 'string', 'max:255'],
            'sh_description_en' => ['nullable', 'string', 'max:255'],
            'sh_description_ru' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string', 'max:1000'],
            'description_ru' => ['nullable', 'string', 'max:1000'],
            'filename' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);

        $photoPath = null;
        
        if($req->hasFile('filename'))
        {
            $photoPath = $req->file('filename')->store('articles', 'public');
        }
        $slugSource = $validated['title_ru'] ?? $validated['title_en'];
        $slug_ru = Str::slug($slugSource, '-', 'ru');
        $originalSlug = $slug_ru;
        $count = 1;
        while (Article::where('slug_ru', $slug_ru)->exists()) {
            $slug_ru = $originalSlug . '-' . $count++;
        }

        $article = Article::create([
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
            'title_en' => $validated['title_en'],
            'title_ru' => $validated['title_ru'] ?? $validated['title_en'],
            'sh_description_ru' => $validated['sh_description_ru'],
            'sh_description_en' => $validated['sh_description_en'],
            'description_ru' => $validated['description_ru'],
            'description_en' => $validated['description_en'],
            
            'filename' => $photoPath,
            'slug_en' => $slug_ru,
            'slug_ru' => $slug_ru
        ]);
        
        return back()->with('add_article_success', "Article " . $article->title_en . " was added!");
    }

}
