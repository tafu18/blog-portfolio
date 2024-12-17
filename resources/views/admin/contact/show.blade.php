@extends('layouts.admin')

@section('content')
<div class="container">

    <!-- Başlık -->
    <h1 class="display-4 text-center mb-4">Mesaj Detayları</h1>

    <div class="card mb-4 shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="m-0">Mesaj Bilgileri</h3>
        </div>
        <div class="card-body">
            <!-- Gönderen Bilgileri -->
            <h4 class="mb-3">Gönderen: {{ $contactMessage->name }}</h4>
            <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
            <p><strong>Telefon:</strong> {{ $contactMessage->phone }}</p>

            <!-- Mesaj İçeriği -->
            <h5 class="mt-4 mb-3">Mesaj:</h5>
            <p>{!! nl2br(e($contactMessage->message)) !!}</p> <!-- Mesajın içeriğini normal metin olarak göstermek için nl2br kullanılıyor -->

            <!-- Durum -->
            <h5 class="mt-4 mb-3">Durum:</h5>
            @if ($contactMessage->status)
                <span class="badge bg-success">Cevaplandı</span>
            @else
                <span class="badge bg-warning">Cevaplanmadı</span>
            @endif
        </div>
    </div>

    <!-- Geri Dön Butonu -->
    <div class="text-center">
        <a href="{{ route('contact.index') }}" class="btn btn-secondary btn-lg">Mesajlar Listesine Dön</a>
    </div>
</div>
@endsection
