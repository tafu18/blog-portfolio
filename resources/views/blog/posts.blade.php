@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/posts/main.webp') }}');">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Tayfun Taşdemir</h1>
                    <span class="subheading">Bilgisayar Mühendisi</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach ($posts as $post)
            <div class="row mb-4 align-items-center">
                <!-- Sol Tarafta Görsel -->
                <div class="col-md-4">
                    <a href="{{ route('posts.show.2', $post->id) }}">
                        <img src="{{asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            class="img-fluid rounded">
                    </a>
                </div>
                <!-- Sağ Tarafta Başlık ve İçerik -->
                <div class="col-md-8">
                    <a href="{{ route('posts.show.2', $post->id) }}" class="text-decoration-none text-dark">
                        <h4 class="post-title mb-2">{{ $post->title }}</h4>
                        <p class="post-subtitle mb-3">{{ Str::limit($post->content, 100) }}</p>
                    </a>
                    <p class="post-meta text-muted">{{ $post->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>
            <hr class="my-4">
            @endforeach

            <!-- Sayfalama Linkleri -->
            <div class="d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
