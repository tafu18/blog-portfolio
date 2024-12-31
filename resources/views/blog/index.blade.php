@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/anasayfa.png') }}');">
    <div class="container position-relative px-4 px-lg-5" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading text-center text-white">
                    <h1 class="display-4">Tayfun Taşdemir</h1>
                    <span id="random-quote"></span>
                    <span class="subheading d-block mb-4">Bilgisayar Mühendisi | Yazılım Geliştirici | Backend Developer</span>
                    <div class="button-container">
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5 py-3">İletişime Geçin</a>
                        <a href="{{ asset('storage/cv-tr.pdf') }}" class="btn btn-outline-light btn-lg px-5 py-3" download>Özgeçmişimi İndir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="container">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-7">
            @foreach ($lastThreePosts as $post)
            <div class="post-preview mb-5">
                <div class="row mb-4 align-items-center">
                    <!-- Görsel kısmı -->
                    <div class="col-md-4 col-lg-4">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <img src="{{ asset('storage/' . $post->image) }}"
                                alt="{{ $post->title }}"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Metin kısmı -->
                    <div class="col-md-8 col-lg-8">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none text-dark">
                            <h2 class="post-title font-weight-bold mb-3">{{ $post->title }}</h2>
                            <p class="post-subtitle text-muted">{{ Str::limit($post->content, 150) }}</p>
                        </a>
                        <p class="post-meta text-muted">{{ $post->created_at->translatedFormat('d F Y') }} <span> | {{ $post->views }} kez okundu</span></p>
                    </div>
                </div>
                <hr />
            </div>
            @endforeach
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
        <div class="col-md-8 col-lg-8 text-center">
            <a href="{{ route('posts') }}" class="btn btn-primary btn-lg px-5 py-3">Daha Fazla</a>
        </div>
    </div>
</div>


<!-- Blog ve Portfolyo Linkleri -->
<div class="container mt-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5 text-center">
                    <h3 class="card-title text-primary mb-4">Gönderilerim</h3>
                    <p class="card-text mb-4">Yazılım geliştirme süreçlerim ve teknoloji dünyası ile ilgili düşüncelerimi paylaşıyorum. Blog yazılarıma göz atarak daha fazla bilgi edinin.</p>
                    <a href="{{ route('posts') }}" class="btn btn-primary btn-lg px-5 py-3">Gönderilerime Göz At</a>
                </div>
            </div>
        </div>

        <div class="col-md-5 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5 text-center">
                    <h3 class="card-title text-success mb-4">Portfolyo</h3>
                    <p class="card-text mb-4">Gerçekleştirdiğim projeler ve yazılım geliştirme alanındaki başarılarımdan örnekler. Portföyümdeki projelere göz atarak daha fazla bilgi edinin.</p>
                    <a href="{{ route('about') }}" class="btn btn-success btn-lg px-5 py-3">Portföyü Keşfedin</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Reklam / İş Talebi Alanı -->
    <div class="row gx-4 gx-lg-5 justify-content-center mt-5">
        <!-- Yeni Projeler İçin İşbirliği Yapmak İstiyorum Kartı -->
        <div class="col-md-6 col-lg-5 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5 text-center">
                    <h3 class="card-title text-primary mb-4">Yeni Projeler İçin İşbirliği Yapmak İstiyorum</h3>
                    <p class="card-text mb-4">Yazılım geliştirme konusunda tecrübemi projelerinizde kullanmak istiyorum. Eğer projelerinizde yazılım desteğine ihtiyacınız varsa, birlikte çalışmayı çok isterim. Detaylı bilgi ve görüşme için aşağıdaki butona tıklayın.</p>
                    <a href="{{ route('projects') }}" class="btn btn-primary btn-lg px-5 py-3">İletişime Geçin</a>
                </div>
            </div>
        </div>

        <!-- Yazılım Geliştirme Hizmetlerim Kartı -->
        <div class="col-md-6 col-lg-5 mb-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5 text-center">
                    <h3 class="card-title text-success mb-4">Yazılım Geliştirme Hizmetlerim</h3>
                    <p class="card-text mb-4">Web uygulamaları, API tasarımı, veritabanı yönetimi, mobil uygulama entegrasyonu gibi çeşitli yazılım çözümleri sunuyorum. İşletmenizi dijital dünyada güçlendirmek için birlikte çalışabiliriz.</p>
                    <a href="{{ route('contact') }}" class="btn btn-success btn-lg px-5 py-3">Hizmetlerimi Keşfedin</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const quotes = [
        "Mevlana: “İki günü eşit olan zarardadır.”",
        "Azi Mahmud Hüdai: “Her şey gönlünde olduğu gibi olur.”",
        "Yunus Emre: “Biri var, her zaman seninle, o da sensin.”",
        "Mevlana: “Dünle beraber gitti, ne kadar söz varsa düne ait.”",
        "Azi Mahmud Hüdai: “Birlikten kuvvet doğar, ayrılık hüsran getirir.”",
        "Yunus Emre: “Gerçekten sev, ne oldum deme, ne olacağım de.”",
        "Nesimi: 'Ben de bir insanım, her insan gibi bir acıyı hissederim.'",
        "İbn Arabi: 'Gerçek aşk, kendini unutabilmektir.'",
        "Hz. Ali: 'Düşmanını tanı, dostunu daha iyi tanı.'",
        "Mevlana: 'Her şeyin başı sevgidir.'",
        "Yunus Emre: 'Bütün mürşitlerin tarif ettiği aşk, Allah aşkıdır.'",
        "İbn Sina: 'Bilgi, insanın içindeki karanlıkları aydınlatır.'",
        "Hz. Muhammed (SAV): 'Kim bir kişiye doğru yolu gösterirse, ona bir dünya kadar sevap verilir.'",
        "Bahaeddin Nakşibend: 'Gerçek derviş, her şeyin içindedir ama hiçbir şeye bağlı değildir.'",
        "İbn Tufeyl: 'İnsanlar, hayatın anlamını sorgulamadan geçerler.'",
        "İbn Haldun: 'Toplumların yükselmesi için eğitim şarttır.'",
        "Süleyman Çelebi: 'Ey aşk, aşk olmasaydın, bu dünyada ne vardı?'",
        "İmam Gazali: 'İlim, insanın gönlünde huzur yaratır.'",
        "Mevlana: 'Bir insan bir kez sevdiğinde, her şeyin farkına varır.'",
        "Zekeriyya el-Ensari: 'İman, sabır ve tevazu ile güçlenir.'",
        "Molla Fenari: 'Gerçekte en zengin olan, gönlü zengin olandır.'",
        "İbn al-Qayyim: 'İman, sabır ve tevekkül ile korunur.'",
        "Hz. Ali: 'Kendini bilmek, her şeyin başlangıcıdır.'",
        "İbn Bâcce: 'Zihnin huzuru, kalbin huzurunu getirir.'",
        "Ahmed Yesevi: 'Sürekli düşün, sevgiye yönel, aşk her şeyin temelidir.'",
        "Abdulkadir Geylani: 'Bir insanın kalbi ne kadar temizse, dünyası o kadar güzel olur.'",
        "Şeyh Bedreddin: 'Gerçek yol, insanın kendi içindeki yolu bulmasıdır.'",
        "İbn Hazm: 'Sevgi, kalpteki bir ateştir; ama ne kadar sabırlı olursak, o kadar az yakar.'",
        "Süleyman Çelebi: 'Aşkın anlamı, her şeyin onun etrafında dönmesidir.'",
        "Ebu Hanife: 'Zihin, sabırlı olursa, kalp de onu takip eder.'",
        "Nizam-ül Mülk: 'Bir devletin en güçlü kaynağı, onun halkıdır.'",
        "Mevlana: 'Sevgi, ne doğuda ne batıda, her yerde bir olmalıdır.'",
        "İbn Rüşd: 'Aklın yolu birdir; gerçek mutluluk akıl ile elde edilir.'",
        "Al-Ghazali: 'İlim, sadece bilgi değil, aynı zamanda kalbin ıslahıdır.'",
        "İbn-i Arabi: 'Bütün kainat, içindeki Allah'ı keşfetmek için bir aynadır.'",
        "Ebu Hanife: 'İman, amel ile tamamlanır.'",
        "İbn Şükrü: 'Gerçek zenginlik, gönlün zenginliğidir.'",
        "Hikmet-i Muhammediye: 'Bir insanın değeri, onun sabrında gizlidir.'",
        "Şeyh Nureddin: 'Gönlünü her türlü kötülükten temizle, o zaman her şey güzelleşir.'",
        "İmam Malik: 'Güzel söz, güzel bir davranıştır.'",
        "İbn Qayyim: 'Sabır, en yüksek erdemdir.'",
        "Mevlana: 'Bir insan ne kadar çok severse, o kadar çok öğrenir.'",
        "İmam Şafi: 'Allah’ın emirleri, insanları yüceltir.'",
        "Süleyman Çelebi: 'Gerçek aşk, bir insanın sadece Allah’ı sevmesidir.'",
        "Ebu Talib: 'Bilginin sırrı, içinde huzur barındırır.'",
        "Abdullah bin Mesud: 'İlim, insanın başına gelen en güzel şeydir.'",
        "İbn-i Teymiyye: 'Allah'a yakın olmak, her şeyden daha değerlidir.'",
        "İbrahim Hakkı: 'Gerçek dostluk, kalpte yer eder.'",
        "İbn-i Haldun: 'Bir milletin en büyük serveti, onun eğitimli bireyleridir.'",
        "Muhammed el-Fazari: 'Zihinlerin doğru yönlendirilmesi, kalplerin doğru yönlendirilmesi ile mümkündür.'",
        "İbn-i Bâcce: 'Akıl ve aşk birbirini tamamlayan iki güçtür.'",
        "Süleyman Çelebi: 'Aşk, her şeyin içinde bir sırdır.'",
        "Şeyh Bedreddin: 'Her şeyin en güzel yönü, onun içindeki sevgidir.'",
        "Mevlana: 'Kendini bilmek, her şeyin anahtarıdır.'",
        "Yunus Emre: 'Dünya sadece bir sınav yeridir, asıl hayat ebedi olanlardadır.'",
        "Süleyman Çelebi: 'Gerçek aşk, her şeyin ondan doğmasıdır.'",
        "Bahaeddin Nakşibend: 'Gerçek mürşit, kalp yolcusudur.'",
        "İbn Sina: 'İlim, hayatın her alanında insanın en değerli yol arkadaşıdır.'",
        "Ahmet Yesevi: 'Kalp temizlenmeden gerçek bilgiye ulaşılmaz.'",
        "Şeyh Nureddin: 'Aşk, bir insanın yüreğinde başlar.'",
        "İmam Azam: 'Allah’a inanmak, insanın içindeki huzuru sağlar.'",
        "Mevlana: 'Kendini her şeyden önce tanı, sonra başkalarını anlamaya çalış.'",
        "İbn-i Arabi: 'Aşk, Allah’ın bir tecellisidir.'",
        "Süleyman Hilmi Tunahan: 'Gerçek huzur, kalpteki berraklıktan gelir.'",
        "Ebu Talib: 'Bilgi, insana güç verir.'",
        "Yunus Emre: 'Aşk her zaman, her yerde bulur kendini.'",
        "Ebu Bekir Sıddık: 'İnsan, aklı ve sabrıyla büyür.'",
        "İbn-i Teymiyye: 'Bir insan, doğru yolu bulduğunda, içindeki huzuru hisseder.'",
        "Süleyman Çelebi: 'Gerçek huzur, Allah’a yaklaşmakla elde edilir.'",
        "Mevlana: 'Her şeyin başı sevgidir.'",
        "İbn-i Hazm: 'Her şeyin bir sırrı vardır.'",
        "İbn Arabi: 'Her şey, Allah’ın yansımasıdır.'",
        "Süleyman Çelebi: 'Kalp, her türlü kirlilikten temizlenmelidir.'",
        "Zekeriyya el-Ensari: 'İman, sabırla güçlenir.'",
        "İmam Gazali: 'İlim, ruhun huzurunu sağlar.'",
        "Şeyh Bedreddin: 'Gerçek yolculuk, iç yolculuktur.'",
        "İbn Sina: 'İlim, insanın içindeki karanlıkları aydınlatır.'",
        "Süleyman Çelebi: 'Gerçek aşk, kalbin en derin yerinde başlar.'",
        "İbn Rüşd: 'İlim, insanın hayatını güzelleştirir.'",
        "Mevlana: 'Aşk, insanın kendini bulma yolculuğudur.'",
        "Yunus Emre: 'Gerçek aşk, insanın kalbindeki aydınlıktır.'",
        "Süleyman Çelebi: 'Her şeyin içinde aşkı bulmak gerekir.'",
        "İmam Malik: 'Bilgi insanı yüceltir, cehalet ise alçaltır.'",
        "İbn Qayyim: 'Sabır, kalbin en güzel meyvesidir.'",
        "Mevlana: 'Aşk, her şeyin başlangıcıdır.'",
        "İbn Haldun: 'Eğitim, bir toplumun geleceğini şekillendirir.'",
        "Şeyh Nureddin: 'Gerçek zenginlik, kalpteki huzurdur.'"
    ];


    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        return quotes[randomIndex];
    }

    // Sayfa yüklendiğinde rastgele bir söz göster
    document.getElementById("random-quote").innerText = getRandomQuote();
</script>

@endsection
