@extends('layouts.app')

@section('content')
    <!-- Slider -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($posts as $index => $post)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/posts/' . $post->image) }}" class="d-block w-100" alt="Post Image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $post->title }}</h5>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Devamını Oku</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bloglar -->
    <section class="blog-section py-5">
        <div class="container">
            <h2>Son Blog Yazıları</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/posts/' . $post->image) }}" class="card-img-top" alt="Post Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Devamını Oku</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portföy -->
    <section class="portfolio-section py-5">
        <div class="container">
            <h2>Portföy</h2>
            <div class="row">
                @foreach ($portfolioItems as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $item['image'] }}" class="card-img-top" alt="Portfolio Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <p class="card-text">{{ $item['description'] }}</p>
                                <a href="{{ $item['url'] }}" class="btn btn-primary">Detaylar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
