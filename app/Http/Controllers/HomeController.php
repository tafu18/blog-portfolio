<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {
        $lastThreePosts = Post::latest()->take(3)->get();
        $posts = Post::all();
        $portfolioItems = [
            // Portföy öğeleri
        ];
        return view('blog.index', compact('posts', 'portfolioItems', 'lastThreePosts'));
    }

}
