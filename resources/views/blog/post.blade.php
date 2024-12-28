@extends('layouts.app')

@section('title', $post->title)

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/' . $post->image) }}')">
    <div class="container position-relative px-4 px-lg-5" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <p class="post-meta text-muted">
                        {{ $post->created_at->translatedFormat('d F Y') }}
                        | <span>{{ $post->views }} kez okundu </span> | <span><a href="https://www.linkedin.com/in/tayfuntasdemir/" target="_blank" class="text-muted" style="text-decoration:none">Tayfun Taşdemir</a></span>
                    </p>
                    <span id="random-quote"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5">
        <!-- Post Content -->
        <div class="col-md-8">
            <article class="mb-4">
                @if($post->status !== 'published')
                    <h2>Bu gönderi henüz yayınlanmadı.</h2>
                    <p>Bu gönderi şu anda yayında değil. Lütfen daha sonra tekrar deneyin.</p>
                @else
                    <!-- Post content goes here -->
                    <p>{{ $post->content }}</p>
                @endif
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

<script>
    const quotes = [
        "Mevlana: 'Çalışmadan, üretmeden, kazanç sağlanmaz.'",
        "İbn Haldun: 'Bir toplumun kalkınması, o toplumun bireylerinin çalışkanlığına bağlıdır.'",
        "Hz. Ali: 'Hak, her zaman güçlüdür; güçlü olan ise hakka sahip çıkanlardır.'",
        "Yunus Emre: 'İşinize sevgi katın, üretiminiz anlam kazanır.'",
        "İbn Sina: 'İyi işler, toplumun refahını sağlar.'",
        "İbn Arabi: 'Toplum, birbirine destek olan bireylerden oluşur.'",
        "Süleyman Çelebi: 'İnsan, yalnızca kendini değil, toplumu da düşünerek hareket etmelidir.'",
        "Mevlana: 'Herkesin emeği değerlidir, her işin hakkı vardır.'",
        "İmam Şafi: 'Toplumun temeli, adalet ve karşılıklı desteğe dayanır.'",
        "Abdulkadir Geylani: 'Bir insanın üretimi, sadece kendi değil, tüm toplumun yararına olmalıdır.'",
        "İbn Bâcce: 'Çalışmanın amacı, insanın kendi gelişimine katkıda bulunmaktır.'",
        "İmam Gazali: 'Gerçek başarı, toplumun kalkınmasına katkı sağlamaktır.'",
        "Nizam-ül Mülk: 'Her birey, toplumun gelişmesi için üzerine düşen sorumluluğu yerine getirmelidir.'",
        "Bahaeddin Nakşibend: 'Toplumun güçlü olması, bireylerin ahlaki değerlerine ve üretkenliğine bağlıdır.'",
        "İbn Tufeyl: 'İyi bir toplum, bireylerinin birbirine destek olduğu bir yapıdır.'",
        "Şeyh Bedreddin: 'Çalışma, insanın toplumla olan ilişkisini güçlendirir.'",
        "Molla Fenari: 'Hak, her insanın doğasında vardır ve ona sahip çıkmak, toplumsal huzuru sağlar.'",
        "Zekeriyya el-Ensari: 'Herkesin katkı sunduğu bir toplum, adaletin hüküm sürdüğü bir toplumdur.'",
        "İbn Hazm: 'Toplum, adalet ve eşitlik üzerine kurulmalıdır.'",
        "Yunus Emre: 'Birlikte çalışmak, gücü birleştirmek demektir.'",
        "İbn Rüşd: 'Toplumda herkesin hakkı eşittir, ancak bunun sağlanması için çaba gereklidir.'",
        "Ebu Hanife: 'Gerçek liderlik, başkalarına yardım etmek ve onların haklarını korumaktan geçer.'",
        "Mevlana: 'Çalışmak, insanın toplumla olan bağlarını kuvvetlendirir.'",
        "İbn al-Qayyim: 'Hak, yalnızca adaletle korunur, adalet ise her bireyin hakkına saygı göstermekle mümkündür.'",
        "İbn Arabi: 'İyi bir toplum, bireylerin haklarına saygı duyduğu bir toplumdur.'"
    ];

    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        return quotes[randomIndex];
    }

    // Sayfa yüklendiğinde rastgele bir söz göster
    document.getElementById("random-quote").innerText = getRandomQuote();
</script>
@endsection
