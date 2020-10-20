<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'mostCommented' => Post::mostCommented()->take(5)->get(),
            'mostActive' => User::withMostPosts()->take(5)->get(),
        ]);
    }
    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function contact()
    {
        return view('contact');
    }

    public function secret(){
        return view('secret');
    }
}
