<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .MultiCarousel {
            float: left;
            overflow: hidden;
            padding: 15px;
            width: 100%;
            position: relative;
        }

        .MultiCarousel .MultiCarousel-inner {
            transition: 1s ease all;
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item {
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item>div {
            text-align: center;
            padding: 10px;
            margin: 10px;
            background: #f1f1f1;
            color: #666;
        }

        .MultiCarousel .leftLst,
        .MultiCarousel .rightLst {
            position: absolute;
            border-radius: 50%;
            top: calc(50% - 20px);
        }

        .MultiCarousel .leftLst {
            left: 0;
        }

        .MultiCarousel .rightLst {
            right: 0;
        }

        .MultiCarousel .leftLst.over,
        .MultiCarousel .rightLst.over {
            pointer-events: none;
            background: #ccc;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="container">
            <div class="row">
                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <!-- Slider -->
                                <div class="MultiCarousel" data-items="1,3,3,3" data-slide="1" id="MultiCarousel" data-interval="1000">
                                    <div class="MultiCarousel-inner">
                                        @foreach ($lastSixPosts as $post)
                                        <div class="item">
                                            <!-- Tüm öğeyi link haline getirin -->
                                            <a href="{{ route('posts.show', $post->id) }}" class="card-link">
                                                <div class="card">
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="card-image">
                                                    <div class="card-content">
                                                        <h3 class="card-title">{{ $post->title }}</h3>
                                                        <p class="card-description">{{ Str::limit($post->content, 110) }}</p>
                                                        <!-- Buton hala mevcut olabilir, ancak artık tıklama alanı genişlemiş oldu -->
                                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Devamını Oku</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="btn btn-primary leftLst">
                                        < </button>
                                            <button class="btn btn-primary rightLst"> > </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bloglar -->
                    <section class="blog-section py-5">
                        <div class="container">
                            <h2>Son Blog Yazıları</h2>
                            <div class="row">
                                @foreach ($posts as $post)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Devamını Oku</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            // Otomatik değişim için bir setInterval fonksiyonu
            var autoSlide = setInterval(function() {
                $('.rightLst').click(); // Sağ ok simgesine tıklamayı tetikliyor
            }, 3000); // 3 saniyede bir

            $('.leftLst, .rightLst').click(function() {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this);
            });

            ResCarouselSize();

            $(window).resize(function() {
                ResCarouselSize();
            });

            // Bu fonksiyon elemanların boyutlarını ayarlar
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function() {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);

                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    } else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    } else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    } else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({
                        'transform': 'translateX(0px)',
                        'width': itemWidth * itemNumbers
                    });
                    $(this).find(itemClass).each(function() {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }

            // Elemanları hareket ettiren fonksiyon
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();

                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);

                    if (translateXval <= itemWidth / 2) {
                        translateXval = itemsCondition;
                    }
                } else if (e == 1) {
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = 0;
                    }
                }

                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }
        });
    </script>
</body>

</html>
