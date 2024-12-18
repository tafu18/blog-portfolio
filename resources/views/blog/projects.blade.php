@extends('layouts.app')

@section('title', 'Projelerim')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('storage/about-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>Projelerim</h1>
                    <span class="subheading">"Bilmek, Bulmak ve Olmak"</span>

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
    <hr class="my-4">
</section>


@endsection
