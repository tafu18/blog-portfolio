@extends('layouts.app')
@section('title', 'Hediyeleşme')

@section('content')
<div class="container gift">

    <!-- Başlık Bölümü -->
    <div class="text-center mb-5">
        <h2 class="display-4 text-success">Partnerinize Hediyeleşin</h2>
        <p class="lead text-muted">Bir harf seçin ve hediyelerinizi ekleyin!</p>
    </div>

    <div class="card shadow-lg rounded-lg">
        <div class="card-header bg-success text-white text-center py-4">
            <h4 class="mb-0">Rastgele Harf Gösterimi</h4>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <p class="text-muted">Sizin için rastgele seçilen harf:</p>
                <div class="display-1 text-success">
                    {{ $randomLetter }}
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{ route('gifts.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Harf Seçimi -->
                <div class="form-group mb-4">
                    <label for="letter" class="font-weight-bold">Farklı bir harf seçmek ister misiniz?</label>
                    <select id="letter" name="letter" class="form-control form-control-lg">
                        @foreach ($alphabet as $letter)
                        <option value="{{ $letter }}"
                            @if(in_array($letter, $usedLetters)) disabled @endif
                            @if($letter==$randomLetter) selected @endif>
                            {{ $letter }}
                            @if(in_array($letter, $usedLetters)) (Kullanıldı) @endif
                        </option>
                        @endforeach
                    </select>
                </div>


                <!-- Erkek ve Kadın Hediye Bilgileri -->
                <h5 class="mt-4">Hediye Bilgileri</h5>
                <div class="row">
                    <!-- Erkek Hediye Bilgileri -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="male_gift_name">Erkeğin Hediye İsmi</label>
                            <input type="text" id="male_gift_name" name="male_gift_name" class="form-control" required placeholder="Erkeğin hediyesi için isim yazın">
                        </div>

                        <div class="form-group mb-4">
                            <label for="male_gift_image">Erkeğin Hediye Görseli</label>
                            <input type="file" id="male_gift_image" name="male_gift_image" class="form-control-file" accept="image/*" required>
                        </div>
                    </div>

                    <!-- Kadın Hediye Bilgileri -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="female_gift_name">Kadının Hediye İsmi</label>
                            <input type="text" id="female_gift_name" name="female_gift_name" class="form-control" required placeholder="Kadının hediyesi için isim yazın">
                        </div>

                        <div class="form-group mb-4">
                            <label for="female_gift_image">Kadının Hediye Görseli</label>
                            <input type="file" id="female_gift_image" name="female_gift_image" class="form-control-file" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block py-3 mt-4">Hediyeleri Gönder</button>
            </form>

        </div>
    </div>

    <!-- Eski Hediyeler Bölümü -->
    <div class="mt-5">
        <h4 class="text-center mb-4">Gönderilen Hediyeler</h4>
        @foreach($gifts->groupBy('letter') as $letter => $giftGroup)
        <div class="card mb-3">
            <div class="card-header bg-light">
                <button class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapse{{ $letter }}" aria-expanded="false" aria-controls="collapse{{ $letter }}">
                    {{ strtoupper($letter) }} Harfi
                </button>
            </div>
            <div id="collapse{{ $letter }}" class="collapse">
                <div class="card-body">
                    <div class="row">
                        @foreach ($giftGroup as $gift)
                        <div class="col-md-6 col-lg-6 mb-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $gift->image) }}" alt="Hediye Görseli" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $gift->name }}</h5>
                                    <p class="card-text">Eklenme Tarihi: {{ $gift->created_at->translatedFormat('d F Y - H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $gifts->links('pagination::bootstrap-4') }}
        </div>
    </div>

</div>
@endsection
