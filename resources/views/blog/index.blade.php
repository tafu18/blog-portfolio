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
            @foreach ($lastThreePosts as $post)
                <div class="post-preview">
                    <a href="{{ route('posts.show.2', $post->id) }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ Str::limit($post->content, 110) }}</h3>
                    </a>
                    <p class="post-meta">{{ $post->updated_at }}</p>
                </div>
                <hr class="my-4" />
            @endforeach
        </div>
    </div>
</div>
@endsection
