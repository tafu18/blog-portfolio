<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {
        $lastThreePosts = Post::where('status', '=', 'published')->latest()->take(3)->get();
        $mostReadPosts = Post::where('status', '=', 'published')->orderBy('views', 'desc')->take(9)->get();
        $portfolioItems = [
            // Portföy öğeleri
        ];
        return view('blog.index', compact('mostReadPosts', 'portfolioItems', 'lastThreePosts'));
    }
}
