<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $newPosts = $user->newPosts()->orderBy('created_at', 'desc')->limit(5)->get();

        return view('dashboard', ['newPosts' => $newPosts]);
    }
}
