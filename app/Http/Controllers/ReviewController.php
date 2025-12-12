<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    
    public function index()
    {
        if(!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to submit a review request.');
        }

        $workers = Worker::with('category')->get();

        return view('start-review', compact('workers'));
    }

    public function reviewPost(Request $req)
    {

        if(!Auth::check())
        {
            return redirect()->route('login')->with('error', 'You need to login to submit a project request.');
        }

        $validatedData = $req->validate([
            'worker_id' => ["required", "exists:workers,id"],
            'fullname' => ["required", "string", "max:50"],
            'comment' => ["required", "string", "max:200"]
        ]);

        $worker = Worker::findOrFail($validatedData['worker_id']);

        $reqData = array_merge($validatedData, [
            'user_id' => Auth::id()
        ]);

        $reqData = Review::create($reqData);

        return redirect()->back()->with('success', 'The review is send to designer ' . $worker->fullname_en . '!');        
    }
}
