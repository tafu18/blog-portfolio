@extends('layouts.app')

@section('title', $post->title)

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/' . $post->image) }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <span class="meta">{{ $post->updated_at }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
        </div>
    </div>
</article>
@endsection
