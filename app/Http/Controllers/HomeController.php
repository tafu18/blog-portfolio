<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // HomeController örneği
    public function index()
    {
        $posts = Post::all(); // Örnek veri alımı
        $portfolioItems = [
            // Portföy öğeleri
        ];
        return view('home', compact('posts', 'portfolioItems'));
    }

}
