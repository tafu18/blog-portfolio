<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aylık Namaz Takvimi</title>

    <!-- Include Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .table th,
        .table td {
            text-align: center;
        }

        .form-container {
            max-width: 600px;
            margin: 20px auto;
        }

        .loading {
            display: none;
            font-size: 1.5rem;
            color: #007bff;
            text-align: center;
            margin: 20px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('partials.header')

    <div class="container py-5">
        <h1 class="text-center mb-4">Aylık Namaz Takvimi</h1>

        <!-- Form for Region and City -->
        <div class="form-container">
            <form id="cityForm" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="region" class="form-label">Bölge (İl):</label>
                    <select class="form-select" id="region" name="region" required>
                        <option value="">Bölge Seçin</option>
                        <!-- Regions will be dynamically loaded here -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">İlçe:</label>
                    <select class="form-select" id="city" name="city" required>
                        <option value="">İlçe Seçin</option>
                        <!-- Cities will be dynamically loaded here -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Namaz Vaktini Getir</button>
            </form>
        </div>

        <!-- Loading indicator -->
        <div id="loading" class="loading">Yükleniyor...</div>

        <!-- Error message -->
        <div id="error" class="alert alert-danger d-none"></div>

        <!-- Prayer Times Table -->
        <div id="result"></div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Sayfa yüklendiğinde İstanbul'a ait namaz vakitlerini ve illeri yükle
            fetchRegions(); // Türkiye illerini yükle
            fetchPrayerTimes("İstanbul", "İstanbul"); // İstanbul için namaz vakitlerini yükle

            // Bölge (İl) seçildiğinde ilçeleri yükle
            $('#region').on('change', function() {
                const region = $(this).val();
                if (region) {
                    fetchCities(region); // İl seçildiğinde ilçeleri yükle
                }
            });

            // API'yi kullanarak Türkiye illerini çekme
            function fetchRegions() {
                $.ajax({
                    url: "https://vakit.vercel.app/api/regions?country=Turkey", // API'den Türkiye illerini al
                    type: "GET",
                    success: function(response) {
                        console.log(response); // Yanıtı konsola yazdırarak doğrulama yapıyoruz

                        // response doğrudan bir array döndüğü için, response'u direkt kullanıyoruz
                        if (Array.isArray(response)) {
                            let regionOptions = '<option value="">İl Seçin</option>';

                            // response dizisini dönerek her ili option olarak ekliyoruz
                            response.forEach(function(region) {
                                regionOptions += `<option value="${region}">${region}</option>`;
                            });

                            // region select box'ını güncelliyoruz
                            $('#region').html(regionOptions);

                            // Varsayılan olarak İstanbul'u seçip, ilçeleri yükle
                            $('#region').val('İstanbul').trigger('change');
                        } else {
                            $('#error').removeClass('d-none').html('İl verisi geçersiz veya eksik.');
                        }
                    },
                    error: function(xhr) {
                        $('#error').removeClass('d-none').html('İl verisi yüklenemedi.');
                    }
                });
            }


            // Seçilen bölgeye göre ilçeleri yükle
            function fetchCities(region) {
                // URL'i dinamik olarak region ile oluşturuyoruz
                const url = `https://vakit.vercel.app/api/cities?country=Turkey&region=${encodeURIComponent(region)}`;

                $.ajax({
                    url: url, // API'den ilçeleri al
                    type: "GET",
                    success: function(response) {
                        console.log(response); // Yanıtı konsola yazdırarak doğrulama yapıyoruz

                        // response.cities doğrudan bir array olduğu için, response'u kontrol edip işlemi yapıyoruz
                        if (Array.isArray(response)) {
                            let cityOptions = '<option value="">İlçe Seçin</option>';

                            // response dizisini döngüye sokarak her ilçeyi option olarak ekliyoruz
                            response.forEach(function(city) {
                                cityOptions += `<option value="${city}">${city}</option>`;
                            });

                            // city select box'ını güncelliyoruz
                            $('#city').html(cityOptions);
                        } else {
                            $('#error').removeClass('d-none').html('İlçe verisi geçersiz veya eksik.');
                        }
                    },
                    error: function(xhr) {
                        // Hata durumunda kullanıcıya mesaj gösteriyoruz
                        $('#error').removeClass('d-none').html('İlçe verisi yüklenemedi.');
                    }
                });
            }


            // Form submit edildiğinde seçilen il ve ilçeye göre namaz vakitlerini getir
            $('#cityForm').on('submit', function(e) {
                e.preventDefault();
                const region = $('#region').val();
                const city = $('#city').val();
                fetchPrayerTimes(region, city);
            });

            // Namaz vakitlerini API'den al
            function fetchPrayerTimes(region, city) {
                $('#result').html('');
                $('#error').html('');
                $('#loading').show();

                $.ajax({
                    url: "{{ route('prayer-times.monthly') }}", // Namaz vakitlerini getiren route
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        region: region,
                        city: city
                    },
                    success: function(response) {
                        $('#loading').hide();

                        const days = response.times;
                        let tableHtml = '<table class="table table-bordered table-striped">';
                        tableHtml += '<thead><tr><th></th>';

                        // Namaz adlarını header'a ekle
                        const prayerNames = ['Sabah', 'Güneş', 'Öğle', 'İkindi', 'Akşam', 'Yatsı'];
                        prayerNames.forEach(prayer => {
                            tableHtml += `<th>${prayer}</th>`;
                        });

                        tableHtml += '</tr></thead><tbody>';

                        // Günlere göre namaz vakitlerini tabloya ekle
                        const dayKeys = Object.keys(days);
                        dayKeys.forEach(day => {
                            tableHtml += `<tr><td>${day}</td>`; // Gün kolonu
                            prayerNames.forEach((prayer, index) => {
                                tableHtml += `<td>${days[day][index]}</td>`; // Her gün ve namaz için vakit
                            });
                            tableHtml += '</tr>';
                        });

                        tableHtml += '</tbody></table>';
                        $('#result').html(tableHtml);
                    },
                    error: function(xhr) {
                        $('#loading').hide();
                        $('#error').removeClass('d-none').html(xhr.responseJSON?.message || 'Bir hata oluştu.');
                    }
                });
            }
        });
    </script>

</body>

</html>