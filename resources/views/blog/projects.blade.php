@extends('layouts.app')

@section('title', 'Projelerim')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Projelerim</h1>
                    <span class="subheading">"Bilmek, Bulmak ve Olmak"</span>
                    <span id="random-quote"></span>
                    <span class="meta">Son Güncelleme: {{ now()->format('d F Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="mb-4">Bugüne Kadar Üzerinde Çalıştığım Projeler</h2>
                <p class="lead">Yazılım geliştirme yolculuğumda çeşitli sektörlerde farklı projelere emek verdim. Bu projeler, müşterilerin ihtiyaçlarına en iyi şekilde çözüm üretmek ve etkili yazılım çözümleri sunmak amacıyla gerçekleştirildi. İşte üzerinde çalıştığım bazı projeler:</p>
            </div>
        </div>
    </div>
    <hr class="my-4">

</section>

<section>
    <div class="container px-4 px-lg-5 mb-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <!-- Yeni Projeler İçin İşbirliği Yapmak İstiyorum Kartı -->
            <div class="col-xl-12 col-lg-8 col-xl-5">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-5 text-center">
                        <h3 class="card-title text-primary mb-4">Yeni Projeler İçin İşbirliği Yapmak İstiyorum</h3>
                        <p class="card-text mb-4">Yazılım geliştirme konusunda tecrübemi projelerinizde kullanmak istiyorum. Eğer projelerinizde yazılım desteğine ihtiyacınız varsa, birlikte çalışmayı çok isterim. Detaylı bilgi ve görüşme için aşağıdaki butona tıklayın.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-5 py-3">İletişime Geçin</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">

</section>

<section>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <!-- 1 - 2 başlangıç -->
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4">
                        <a href="https://kokpit.tech/tr/">
                            <img src="https://kokpit.tech/wp-content/uploads/2022/10/kokpit-logo.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://kokpit.tech/tr/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Kokpit</h4>
                            <p class="post-subtitle mb-3">Saha Yönetim Sistemi</p>
                        </a>
                        <a href="https://kokpit.tech/tr/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4">
                        <a href="https://perapassage.com/tr/">
                            <img src="https://perapassage.com/wp-content/uploads/2023/06/pera-passage-logo.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://perapassage.com/tr/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Pera Passage</h4>
                            <p class="post-subtitle mb-3">Ziyaretçi Takip & Yönetim Sistemi</p>
                        </a>
                        <a href="https://perapassage.com/tr/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <!-- 1 - 2 bitiş -->

            <!-- 3 - 4 başlangıç -->
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4">
                        <a href="https://oniki.net/tr/">
                            <img src="https://oniki.net/wp-content/uploads/2022/10/oniki-black-logo.png.webp"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://oniki.net/tr/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Oniki</h4>
                            <p class="post-subtitle mb-3">Yeni Nesil Etkinlik & Dijital Networking</p>
                        </a>
                        <a href="https://oniki.net/tr/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4">
                        <a href="https://petner.com.tr/tr/">
                            <img src="https://petner.com.tr/wp-content/uploads/2023/06/petner-logo.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://petner.com.tr/tr/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Petner</h4>
                            <p class="post-subtitle mb-3">Evcil Hayvan Platformu</p>
                        </a>
                        <a href="https://petner.com.tr/tr/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <!-- 3 - 4 bitiş -->

            <!-- 5 - 6 başlangıç -->
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4">
                        <a href="https://avfast.com.tr/">
                            <img src="https://avfast.com.tr/_nuxt/img/AvFast_logo.ee67be9.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://avfast.com.tr/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Avfast</h4>
                            <p class="post-subtitle mb-3">Avukatlar Arası Yardımlaşma ve Tevkil Platformu</p>
                        </a>
                        <a href="https://avfast.com.tr/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4" style="background-color: rgb(87, 183, 126)">
                        <a href="https://fops.com.tr/tr">
                            <img src="https://dashboard.fops.com.tr/_nuxt/img/fops_beyaz_logo.886ba78.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://fops.com.tr/tr" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Fops</h4>
                            <p class="post-subtitle mb-3">Saha Yönetim Sistemi</p>
                        </a>
                        <a href="https://fops.com.tr/tr" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <!-- 5 - 6 bitiş -->

            <!-- 7 - 8 başlangıç -->
            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4" style="background: linear-gradient(to right, #0bbc84, #00c16e) ">
                        <a href="https://ivmo.com/">
                            <img src="https://ivmo.com/wp-content/uploads/2023/04/a12-1.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://ivmo.com/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Ivmo</h4>
                            <p class="post-subtitle mb-3">Uluslararası Sanal Para İşlemleri</p>
                        </a>
                        <a href="https://ivmo.com/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-8 col-xl-5">
                <div class="row mb-4 align-items-center">
                    <!-- Sol Tarafta Görsel -->
                    <div class="col-md-4">
                        <a href="https://www.gungoren.bel.tr/">
                            <img src="https://seeklogo.com/images/G/gungoren-belediyesi-istanbul-logo-2C57426593-seeklogo.com.png"
                                alt="title"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <!-- Sağ Tarafta Başlık ve İçerik -->
                    <div class="col-md-8">
                        <a href="https://www.gungoren.bel.tr/" class="text-decoration-none text-dark">
                            <h4 class="post-title mb-2">Güngören Belediyesi</h4>
                            <p class="post-subtitle mb-3">Güngören Belediyesi Resmi Web Sitesi</p>
                        </a>
                        <a href="https://www.gungoren.bel.tr/" class="text-decoration-none text-dark">
                            <p class="post-meta text-muted">Detay</p>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4">

            <!-- 7 - 8 bitiş -->

        </div>
    </div>
</section>

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
        "Mevlana: 'Sevgi, ne doğuda ne batıda, her yerde bir olmalıdır.'"
    ];


    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        return quotes[randomIndex];
    }

    // Sayfa yüklendiğinde rastgele bir söz göster
    document.getElementById("random-quote").innerText = getRandomQuote();
</script>

@endsection