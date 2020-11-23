<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $mostcomment = Cache::remember('mostCommented', now()->addSeconds(10), function(){
            return Post::mostCommented()->take(5)->get();
        });
        $mostactive = Cache::remember('mostActive', now()->addSeconds(10), function(){
            return User::withMostPosts()->take(5)->get();
        });
        return view('home', [
            'mostCommented' => $mostcomment,
            'mostActive' => $mostactive,
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
