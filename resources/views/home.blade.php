<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
    .carousel-item {
        display: flex;
        justify-content: center;
    }

    .carousel-item .card {
        width: 300px;  /* Kartın genişliği */
        height: 400px; /* Kartın yüksekliği */
        margin: 10px;
        border: 2px solid #ddd;  /* Çerçeve rengi */
        border-radius: 10px;  /* Köşe yuvarlama */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  /* Hafif gölge */
    }

    .carousel-item img {
        width: 100%; /* Görselin genişliği */
        height: 200px; /* Görselin yüksekliği */
        object-fit: cover;  /* Görselin orantılı şekilde sığması */
        border-bottom: 2px solid #ddd;  /* Kart altına çizgi ekle */
    }

    .carousel-item .card-body {
        padding: 10px;
        text-align: center;
    }

    .carousel-item .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .carousel-item .card-text {
        font-size: 1rem;
        color: #555;
    }
</style>

</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Slider -->
                        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($posts as $index => $post)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="card">
                                            <img src="{{ asset('storage/' . $post->image) }}" class="d-block w-100" alt="Post Image">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Devamını Oku</a>
                                            </div>
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
                                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image" width="200">>
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

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
