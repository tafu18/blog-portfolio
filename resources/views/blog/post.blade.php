@extends('layouts.app')

@section('title', $post->title)

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/' . $post->image) }}')">
    <div class="container position-relative px-4 px-lg-5" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <p class="post-meta text-muted">{{ $post->created_at->translatedFormat('d F Y') }}</p>
                    <span id="random-quote"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{!! nl2br(string: e($post->content)) !!}</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5" style="justify-content: right !important">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <span>Yazar: <a href="https://www.linkedin.com/in/tayfuntasdemir/" target="_blank">Tayfun Taşdemir</a></span>
            </div>
        </div>
    </div>
</article>

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
