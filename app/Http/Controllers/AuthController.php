<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }
    public function register()
    {
        return view("auth.register");
    }
    public function registerPost(Request $req)
    {
        $data = $req->validate([
            "name" => ["required", "max:24", "min:4"],
            "fullname" => ["required", "string", "max:24"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "min:8", "confirmed"]
        ]);

        $data["password"] = Hash::make($data["password"]);

        User::create($data);

        return redirect()->route("login");
    }
       
    public function loginPost(Request $req)
    {
        $data = $req->validate([
            "email" => ["required", "email", "exists:users,email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($data))
        {
            $req->session()->regenerate();

            return redirect()->route("home");
        } 
        else 
        {
            return back()->withErrors([
                "email" => "Email/Password invalid."
            ]);

        }
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route("home");
    }
}
