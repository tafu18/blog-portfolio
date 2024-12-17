<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // HomeController örneği
    public function index()
    {
        $lastSixPosts = Post::latest()->take(7)->get();
        $posts = Post::all(); // Örnek veri alımı
        $portfolioItems = [
            // Portföy öğeleri
        ];
        return view('home', compact('posts', 'portfolioItems', 'lastSixPosts'));
    }

    public function index2()
    {
        $lastThreePosts = Post::latest()->take(3)->get();
        $posts = Post::all(); // Örnek veri alımı
        $portfolioItems = [
            // Portföy öğeleri
        ];
        return view('blog.index', compact('posts', 'portfolioItems', 'lastThreePosts'));
    }

}
