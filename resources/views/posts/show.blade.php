@extends('layouts.admin')

@section('content')
<div class="container">

    <!-- Başlık -->
    <h1 class="display-4 text-center mb-4">{{ $post->title }}</h1>

    <div class="card mb-4 shadow-lg">
        <div class="card-header text-white" style="background-color: #4e73df;">
            <h3 class="m-0">Gönderi Detayları</h3>
        </div>
        <div class="card-body">
            <!-- Görsel Üstte, Küçük Boyutlu -->
            @if ($post->image)
            <div class="mb-3 text-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid rounded shadow-sm" style="max-width: 500px;">
            </div>
            @endif
            <h1 class="display-8 text-center mb-4">{{ $post->title }}</h1>
            <p> {!! nl2br(e($post->content)) !!}</p> <!-- Normal metin olarak '#' işlenir -->
        </div>
    </div>

    <!-- Geri Dön Butonu -->
    <div class="text-center">
        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">Geri Dön</a>
    </div>
</div>
@endsection
