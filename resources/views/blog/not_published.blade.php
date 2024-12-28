@extends('layouts.app')

@section('title', 'Yazı Yayınlanmamış')

@section('content')
<header class="masthead" style="background-color: #333; color: white;">
    <div class="container position-relative px-4 px-lg-5" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1> Bu gönderi henüz yayınlanmadı.</h1>
                    <p class="post-meta text-muted">
                        ---
                        | <span>Henüz yayınlanmamış</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-8">
            <article class="mb-4">
                <h2>Bu gönderi henüz yayınlanmadı.</h2>
                <p>Bu gönderi şu anda yayında değil. Lütfen daha sonra tekrar deneyin.</p>
            </article>
        </div>
        <!-- Most Read Posts -->
        <div class="col-md-4">
            <aside class="most-read-posts" style="background-color: #ffffff; padding: 20px; border-radius: 12px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);">
                <h4 class="text-center" style="font-weight: bold; margin-bottom: 20px;">En Çok Okunanlar</h4>
                <ul class="list-unstyled">
                    @foreach($mostReadPosts as $mostReadPost)
                    <li class="mb-4">
                        <a href="{{ route('posts.show', $mostReadPost->id) }}" style="text-decoration: none; color: #212529;">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <img src="{{ asset('storage/' . $mostReadPost->image) }}" alt="{{ $mostReadPost->title }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;">
                                <div>
                                    <h6 style="margin: 0; font-size: 1rem; font-weight: 600;">{{ $mostReadPost->title }}</h6>
                                    <small class="text-muted" style="font-size: 0.875rem;">{{ $mostReadPost->views }} kez okundu</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="notPublishedModal" tabindex="-1" aria-labelledby="notPublishedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notPublishedModalLabel">Yazı Yayınlanmamış</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bu yazı henüz yayınlanmamıştır. Yazıyı görmek için lütfen tekrar daha sonra deneyin.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Sayfa yüklendiğinde modal'ı göster
    window.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('notPublishedModal'));
        myModal.show();
    });
</script>
@endsection
