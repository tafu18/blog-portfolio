@extends('layouts.app')

@section('title', 'Ben Kimim?')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Ben Kimim?</h1>
                    <span class="meta">"Yazılım dünyasında her geçen gün yeni bir şeyler öğrenmek, beni daha iyi bir yazılımcı yapıyor."</span>
                    <span class="meta">Son Güncelleme: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Merhaba, ben Tayfun. Yazılım geliştirmede 3 yıllık bir tecrübem var ve her gün daha fazla şey öğrenerek bu alanda kendimi geliştirmeye devam ediyorum. PHP ve Laravel gibi teknolojilerle çalışırken, her projede yeni bir şeyler keşfetmek ve problem çözmek bana büyük bir heyecan veriyor.</p>
                <p>Hedefim, yazılım geliştirme sürecinde sadece teknik bilgimi değil, aynı zamanda takım çalışması ve iletişim becerilerimi de geliştirmektir. İleri düzeyde PHP, Laravel ve API tasarımı konularında tecrübem olsa da, her zaman daha iyisini yapabilmek için çaba sarf ediyorum. Her projede kullanıcıların ihtiyaçlarına uygun, hızlı ve etkili çözümler üretmeye odaklanıyorum.</p>
            </div>
        </div>
    </div>
</article>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Yeteneklerim</h2>
                <ul>
                    <li>PHP ve Laravel ile Web Geliştirme</li>
                    <li>RESTful API Tasarımı ve Geliştirme</li>
                    <li>Veritabanı Tasarımı ve Yönetimi</li>
                    <li>Takım Çalışması ve İletişim</li>
                    <li>Sürekli Öğrenme ve Yeniliklere Açıklık</li>
                </ul>
            </div>
        </div>
    </div>
</article>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2>Yetkinlik Alanlarım</h2>
                <p>Yazılım geliştirme sürecinde deneyim kazandığım ve uzmanlaştığım teknolojiler:</p>
                <ul>
                    <li><strong>PHP</strong> – Web uygulamaları geliştirmek için güçlü bir backend dili.</li>
                    <li><strong>Laravel</strong> – MVC yapısı ve zengin özellikleriyle popüler PHP framework'ü.</li>
                    <li><strong>RESTful API Tasarımı</strong> – Etkili ve ölçeklenebilir web servisleri geliştirme.</li>
                    <li><strong>MySQL</strong> – Veritabanı yönetim sistemleri ve ilişkisel veritabanı tasarımı.</li>
                    <li><strong>MongoDB</strong> – NoSQL veritabanları ile büyük veri çözümleri.</li>
                    <li><strong>Git</strong> – Kod sürüm yönetimi ve işbirliği için kullanılan araç.</li>
                    <li><strong>HTML, CSS ve JavaScript</strong> – Web sayfaları ve dinamik içerik geliştirmek için ön yüz teknolojileri.</li>
                    <li><strong>Vue.js</strong> – Kullanıcı dostu arayüzler geliştirmek için kullanılan JavaScript framework'ü.</li>
                    <li><strong>JWT ve OAuth</strong> – Güvenli kullanıcı doğrulama ve yetkilendirme işlemleri.</li>
                    <li><strong>Docker</strong> – Konteyner teknolojisi ile uygulama ortamlarını yönetme ve dağıtım yapma.</li>
                </ul>
            </div>
        </div>
    </div>
</article>
@endsection
