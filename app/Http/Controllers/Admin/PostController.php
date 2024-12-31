<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function indexForUser()
    {
        $perPage = request()->has('perPage') ? request()->input('perPage') : 8;

        if (request()->wantsJson() || request()->input('isMobile')) {
            $perPage = 4;
        }

        $posts = Post::where('status', '=', 'published')->orderBy('created_at', 'desc')->paginate($perPage);
        return view('blog.posts', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function showForClient(Post $post)
    {
        $mostReadPosts = Post::where('status', '=', 'published')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        if ($post->status != 'published') {
            return view('blog.not_published', compact('post', 'mostReadPosts'));
        }

        if ($post->status == 'published') {
            $post->increment('views');
        }

        return view('blog.post', compact('post', 'mostReadPosts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'medium_link' => 'nullable',
            'image' => 'nullable|image',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = str::slug($validated['title']);
        $validated['image'] = $request->file('image')
            ? $request->file('image')->store('posts', 'public')
            : null;

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'medium_link' => 'nullable',
            'image' => 'nullable|image',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
