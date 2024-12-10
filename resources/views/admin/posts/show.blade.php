@extends('layouts.admin')

@section('content')
    <h1>{{ $post->title }}</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h3>Gönderi Detayları</h3>
        </div>
        <div class="card-body">
            <p><strong>Durum:</strong> {{ $post->status }}</p>
            <p><strong>İçerik:</strong> {!! nl2br(e($post->content)) !!}</p>

            <!-- Görsel -->
            @if ($post->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="200">
                </div>
            @endif
        </div>
    </div>

    <!-- Geri Dön Butonu -->
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Geri Dön</a>
@endsection
