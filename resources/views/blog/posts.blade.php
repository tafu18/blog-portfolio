@extends('layouts.app')

@section('title', 'Gönderilerim')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/main.jpeg') }}');">
    <div class="container position-relative px-4 px-lg-5" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading text-center text-white">
                    <h1 class="display-4 text-shadow">Tayfun Taşdemir</h1>
                    <span id="random-quote"></span>
                    <span class="subheading d-block mb-4 text-shadow">Bilgisayar Mühendisi | Yazılım Geliştirici | Backend Developer</span>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-5 py-3">İletişime Geçin</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-1 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-12 col-lg-8 col-xl-auto">
            @foreach ($posts->chunk(2) as $postPair)
            <div class="row mb-4">
                @foreach ($postPair as $post)
                <div class="col-md-6 col-lg-6">
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-4 col-lg-4">
                            <a href="{{ route('posts.show.2', $post->id) }}">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    alt="{{ $post->title }}"
                                    class="img-fluid rounded">
                            </a>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <a href="{{ route('posts.show.2', $post->id) }}" class="text-decoration-none text-dark">
                                <h4 class="post-title mb-2">{{ $post->title }}</h4>
                                <p class="post-subtitle mb-3">{{ Str::limit($post->content, 100) }}</p>
                            </a>
                            <p class="post-meta text-muted">{{ $post->updated_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach

            <!-- Sayfalama Linkleri -->
            <div class="d-flex justify-content-center">
                {{ $posts->appends(request()->except(['page', 'isMobile']))->links('pagination::bootstrap-4') }}
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


    // Mobil cihazlarda 4 post göstermek için isMobile parametresi ekleyelim
    if (window.innerWidth < 768 && !window.location.search.includes('isMobile')) {
        let url = new URL(window.location.href);
        url.searchParams.set('isMobile', 'true');
        window.location.href = url.toString();
    }
</script>

@endsection