@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Post</h1>
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="200">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Post</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
