@extends('layouts.app')

@section('title', 'İletişim')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('assets/img/contact-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Benimle İletişime Geçin</h1>
                    <span class="subheading">Sorularınız varsa yardımcı olabilirim.</span>
                    <span id="random-quote"></span>
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

<!-- İletişim Bilgileri ve Harita-->
<section id="contact-info" class="mb-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-4">
                <h3>İletişim Bilgilerim</h3>
                <ul class="list-unstyled">
                    <li><strong>Adres:</strong> Esenler, İstanbul, Türkiye</li>
                    <li><strong>Telefon:</strong> <a href="tel:+905385972318">+90 538 597 23 18</a></li>
                    <li><strong>E-posta:</strong> <a href="mailto:tayfuntasdemir3@gmail.com">tayfuntasdemir3@gmail.com</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Harita</h3>
                <!-- Google Maps Embed -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48132.83121738314!2d28.82598199987802!3d41.06239193058806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caafe253f39f9b%3A0x349572fb9a436310!2sEsenler%2F%C4%B0stanbul!5e0!3m2!1str!2str!4v1734849766662!5m2!1str!2str" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
<script>
    const quotes = [
        "Mevlana: 'Konuşmadan önce, doğru, güzel ve gerekli olup olmadığını sor.'",
        "İbn Haldun: 'İyi bir iletişim, insanların kalplerini birbirine yaklaştırır.'",
        "Yunus Emre: 'Söz, gönlün aynasıdır; ne düşünüyorsan, onu söylersin.'",
        "İmam Şafi: 'İletişim, kalpten kalbe giden bir yolculuktur.'",
        "Hz. Ali: 'Konuşmanın en güzel şekli, karşındakini anlamaktır.'",
        "Bahaeddin Nakşibend: 'Gerçek anlam, sözlerin ötesinde bulunur.'",
        "İbn Sina: 'Sözlerin doğru ve öz olması, insanların kalplerine ulaşmasının en etkili yoludur.'",
        "İmam Gazali: 'İyi bir iletişim, insanların birbirini anlamasına olanak tanır.'",
        "Mevlana: 'Kelimeler, sevgi ile birleştiğinde en etkili silah haline gelir.'",
        "Süleyman Çelebi: 'Söz, insanın iç dünyasının yansımasıdır.'",
        "İbn Arabi: 'Gerçek iletişim, ruhların birbirine geçmesidir.'",
        "İbn Tufeyl: 'Sözlerin gücü, anlamını ve amacını doğru iletmektedir.'",
        "Şeyh Bedreddin: 'İyi bir iletişim, kalp ve zihin arasındaki bir köprüdür.'",
        "Hz. Muhammed (SAV): 'Sözleriniz, kalplerinizi birleştirir.'",
        "İbn Qayyim: 'Söz, bir insanın ruhunu şekillendirir.'",
        "İmam Malik: 'Düşünmeden konuşan kişi, kalbini kirletmiş olur.'",
        "Ebu Hanife: 'Güzel söz, insanın ahlakını gösterir.'",
        "İbn Hazm: 'Bir insanı anlayabilmek, onun kalbine dokunabilmektir.'",
        "Mevlana: 'Her kelime, bir yürekten diğerine geçer.'",
        "İmam Şafi: 'Bir kelime, gönülleri fethedebilir, bir diğer ise kalpleri kırabilir.'",
        "Bahaeddin Nakşibend: 'İletişim, kelimelerle değil, niyetle gerçekleşir.'",
        "Yunus Emre: 'Sözdeki doğruluk, kalpten gelir.'",
        "İbn Rüşd: 'Gerçek iletişim, sadece kula değil, ruha hitap eder.'",
        "İmam Gazali: 'İyi bir söz, kalpteki sevgiyi çoğaltır.'",
        "Ebu Bekir Sıddık: 'Söyleyeceğin her şeyin ölçüsünü doğru koy.'",
        "İbn Arabi: 'Gerçek sevgi, sözlerin dışında, davranışlarda da kendini gösterir.'"
    ];


    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        return quotes[randomIndex];
    }

    // Sayfa yüklendiğinde rastgele bir söz göster
    document.getElementById("random-quote").innerText = getRandomQuote();
</script>
@endsection