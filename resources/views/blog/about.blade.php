@extends('layouts.app')

@section('title', 'Ben Kimim?')

@section('content')
<header class="masthead" style="padding-bottom: 3.5rem; background-image: url('{{ asset('storage/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5 mx-auto" style="max-width: 90%; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 8px;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading text-center">
                    <h1>Ben Kimim?</h1>
                    <span class="meta">"Yazılım dünyasında her geçen gün yeni bir şeyler öğrenmek, beni daha iyi bir yazılımcı yapıyor."</span>
                    <span id="random-quote"></span>
                    <span class="meta">Son Güncelleme: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
                </div>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7 post-heading">
                <p class="meta text-center">Yazılım geliştirme alanındaki deneyimlerimi ve becerilerimi içeren özgeçmişimi aşağıdaki butona tıklayarak indirebilirsiniz.</p>
                <div class="text-center">
                    <a href="{{ asset('storage/cv-tr.pdf') }}" class="btn btn-outline-light btn-lg px-5 py-3" download>Özgeçmişimi İndir</a>
                </div>
            </div>
        </div>
    </div>
</header>

<article class="mb-4">
    <div class="container px-4 px-lg-5 mx-auto" style="max-width: 90%;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Merhaba, ben Tayfun. Yazılım geliştirmede 3 yıllık deneyimim var ve sürekli olarak kendimi geliştirmeye devam ediyorum. PHP ve Laravel gibi güçlü teknolojilerle çalışırken, her projede yeni çözümler üretmek ve karşılaştığım problemleri çözmek beni heyecanlandırıyor.</p>
                <p>Hedefim, sadece teknik bilgimi geliştirmek değil, aynı zamanda takım çalışması ve etkili iletişim becerilerimi de ilerletmek. İleri düzeyde PHP, Laravel ve API tasarımı konularında derinlemesine tecrübeye sahibim. Her projede, kullanıcı odaklı, hızlı ve ölçeklenebilir çözümler sunmayı amaçlıyorum.</p>
                <p>Yazılım geliştirme sürecinde her gün yeni bir şeyler öğrenmek ve uygulamak, bana daha iyi bir yazılımcı olma yolunda ilham veriyor.</p>
            </div>
        </div>
    </div>
</article>

<article class="mb-4">
    <div class="container px-4 px-lg-5 mx-auto" style="max-width: 90%;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="text-center">Kullandığım Teknolojiler</h2>
                <hr class="my-4">
                <ul class="d-flex justify-content-around flex-wrap list-unstyled">
                    @foreach([
                    ['link' => 'https://www.php.net/', 'icon' => 'fab fa-php', 'color' => 'text-primary', 'name' => 'PHP'],
                    ['link' => 'https://laravel.com/', 'icon' => 'fab fa-laravel', 'color' => 'text-danger', 'name' => 'Laravel'],
                    ['link' => 'https://www.restapitutorial.com/', 'icon' => 'fas fa-cogs', 'color' => 'text-warning', 'name' => 'RESTful API'],
                    ['link' => 'https://www.mysql.com/', 'icon' => 'fas fa-database', 'color' => 'text-info', 'name' => 'MySQL'],
                    ['link' => 'https://vuejs.org/', 'icon' => 'fab fa-vuejs', 'color' => 'text-success', 'name' => 'Vue.js'],
                    ['link' => 'https://git-scm.com/', 'icon' => 'fab fa-git', 'color' => 'text-dark', 'name' => 'Git'],
                    ['link' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript', 'icon' => 'fab fa-js', 'color' => 'text-warning', 'name' => 'JavaScript'],
                    ['link' => 'https://jwt.io/', 'icon' => 'fab fa-keycdn', 'color' => 'text-danger', 'name' => 'JWT'],
                    ['link' => 'https://www.docker.com/', 'icon' => 'fab fa-docker', 'color' => 'text-primary', 'name' => 'Docker'],
                    ['link' => 'https://html.com/', 'icon' => 'fab fa-html5', 'color' => 'text-danger', 'name' => 'HTML'],
                    ['link' => 'https://www.w3.org/Style/CSS/', 'icon' => 'fab fa-css3-alt', 'color' => 'text-info', 'name' => 'CSS'],
                    ['link' => 'https://www.python.org/', 'icon' => 'fab fa-python', 'color' => 'text-warning', 'name' => 'Python'],
                    ['link' => 'https://www.postman.com/', 'icon' => 'fab fa-postman', 'color' => 'text-danger', 'name' => 'Postman'],
                    ['link' => 'https://jquery.com/', 'icon' => 'fab fa-js-square', 'color' => 'text-success', 'name' => 'jQuery']
                    ] as $skill)
                    <li class="mx-3 text-center">
                        <a href="{{ $skill['link'] }}" target="_blank" class="icon-link">
                            <i class="{{ $skill['icon'] }} fa-3x {{ $skill['color'] }}"></i>
                        </a>
                        <p class="small">{{ $skill['name'] }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</article>

<article class="mb-4">
    <div class="container px-4 px-lg-5 mx-auto" style="max-width: 90%;">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="text-center">Yetkinlik Alanlarım</h2>
                <p>Yazılım geliştirme sürecinde deneyim kazandığım ve uzmanlaştığım teknolojiler:</p>
                <hr class="my-4">
                <ul>
                    <li><i class="fab fa-php"></i> <strong>PHP</strong> – Web uygulamaları geliştirmek için güçlü bir backend dili.</li>
                    <li><i class="fab fa-laravel"></i> <strong>Laravel</strong> – MVC yapısı ve zengin özellikleriyle popüler PHP framework'ü.</li>
                    <li><i class="fas fa-code"></i> <strong>RESTful API Tasarımı</strong> – Etkili ve ölçeklenebilir web servisleri geliştirme.</li>
                    <li><i class="fas fa-database"></i> <strong>SQL</strong> – Veritabanı yönetim sistemleri ve ilişkisel veritabanı tasarımı.</li>
                    <li><i class="fab fa-vuejs"></i> <strong>Vue.js</strong> – Kullanıcı dostu arayüzler geliştirmek için kullanılan JavaScript framework'ü.</li>
                    <li><i class="fab fa-git"></i> <strong>Git</strong> – Kod sürüm yönetimi ve işbirliği için kullanılan araç.</li>
                    <li><i class="fab fa-js"></i> <strong>JavaScript</strong> – Dinamik web sayfaları ve uygulamalar geliştirmek için ön yüz teknolojisi.</li>
                    <li><i class="fab fa-keycdn"></i> <strong>JWT</strong> – Güvenli kullanıcı doğrulama ve yetkilendirme işlemleri.</li>
                    <li><i class="fab fa-docker"></i> <strong>Docker</strong> – Konteyner teknolojisi ile uygulama ortamlarını yönetme ve dağıtım yapma.</li>
                    <li><i class="fab fa-html5"></i> <strong>HTML</strong> – Web sayfalarının yapısını oluşturmak için temel işaretleme dili.</li>
                    <li><i class="fab fa-css3-alt"></i> <strong>CSS</strong> – Web sayfalarını stilize etmek ve görsel tasarım yapmak için kullanılan stil dili.</li>
                </ul>
            </div>
        </div>
    </div>
</article>
<script>
    const quotes = [
        "Mevlana: 'Kendini bilmeyen, alemi bilemez.'",
        "İbn Arabi: 'Kendini bilen, Yaratan'ı bulur.'",
        "Hz. Ali: 'Kendini bilen, evrenin sırrına vakıf olur.'",
        "İbn Sina: 'Bir insan kendini tanıdığında, hayatını anlamlandırabilir.'",
        "Mevlana: 'Dünya, insanın içindeki yansımanın sadece bir örneğidir.'",
        "İbn Haldun: 'Gerçek anlayış, önce insanın kendisini tanımasıyla başlar.'",
        "Ahmed Yesevi: 'İnsanın içindeki hakikat, dış dünyada her yerde vardır.'",
        "İbn Hazm: 'Kendini tanımak, insanın en yüksek mertebesidir.'",
        "Bahaeddin Nakşibend: 'Kendini tanıyan, her şeyin gerçek yüzünü görür.'",
        "İmam Gazali: 'İlim, insanın özünü bulmasına yardımcı olur.'",
        "Yunus Emre: 'Kendi içinde bir huzur bulamayan, dışarıda da huzur bulamaz.'",
        "Şeyh Bedreddin: 'Gerçek bilgi, insanın ruhunda doğar.'",
        "İbn al-Qayyim: 'Kendini tanımak, Allah'ı tanımaktır.'",
        "Ebu Hanife: 'İnsan, içindeki ahlaki değerleri keşfettikçe, dış dünyasını da anlamaya başlar.'",
        "İbn Tufeyl: 'Gerçek bilgi, insanın ruhsal yolculuğunda ortaya çıkar.'",
        "Mevlana: 'Kendini bilmek, evrenin sırrını çözmektir.'",
        "İbn Rüşd: 'Kendini anlamayan, gerçek bilgiyi bulamaz.'",
        "İmam Şafi: 'Kendini bilmeyen, alemi nasıl bilebilir?'",
        "Süleyman Çelebi: 'Gerçek hikmet, insanın içindeki cevherle buluşur.'",
        "İbn Bâcce: 'Zihnin huzuru, kalbin huzurunun yansımasıdır.'",
        "Abdulkadir Geylani: 'Gerçek yolculuk, insanın içindeki hakikate doğru bir yolculuktur.'",
        "Zekeriyya el-Ensari: 'İman, insanın içindeki gerçekleri keşfetmesidir.'",
        "Molla Fenari: 'İçindeki güzellikleri keşfeden, dış dünyadaki güzellikleri de görebilir.'",
        "Nizam-ül Mülk: 'Kendini tanımak, insanın topluma ve dünyaya katkı yapmasının ilk adımıdır.'",
        "İbn Arabi: 'Her insan, kendisini tanıdığında dünyayı tanır.'"
    ];


    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        return quotes[randomIndex];
    }

    // Sayfa yüklendiğinde rastgele bir söz göster
    document.getElementById("random-quote").innerText = getRandomQuote();
</script>

@endsection
