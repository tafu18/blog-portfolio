@extends('layouts.app')

@section('title', 'İletişim')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('assets/img/contact-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Benimle İletişime Geçin</h1>
                    <span class="subheading">Sorularınız mı var? Yanıtlarım var.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Ana İçerik-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <p>Benimle iletişime geçmek ister misiniz? Aşağıdaki formu doldurun, mesajınızı alır almaz size geri döneceğim!</p>
                <div class="my-5">
                    <!-- İletişim Formu -->
                    <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Adınızı girin..." required />
                            <label for="name">Adınız</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" placeholder="E-posta adresinizi girin..." required />
                            <label for="email">E-posta adresi</label>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Telefon numaranızı girin..." required />
                            <label for="phone">Telefon Numarası</label>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" placeholder="Mesajınızı buraya girin..." style="height: 12rem" required></textarea>
                            <label for="message">Mesaj</label>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br />
                        <!-- Gönder Butonu-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
