@extends('layouts.app')

@section('title', 'Namaz Vakitleri')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Namaz Vakitlerini Al</h1>

    <!-- Form -->
    <form id="prayerTimeForm" method="POST" action="{{ route('prayer-times.get') }}">
        @csrf
        <div class="mb-3">
            <label for="country" class="form-label">Ülke:</label>
            <input type="text" class="form-control" id="country" name="country" value="Turkey" required>
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">İl:</label>
            <input type="text" class="form-control" id="region" name="region" value="İstanbul" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">İlçe:</label>
            <input type="text" class="form-control" id="city" name="city" value="İstanbul" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tarih:</label>
            <input type="text" class="form-control" id="date" name="date" value="2025-01-03" required>
        </div>

        <div class="mb-3">
            <label for="days" class="form-label">Gün Sayısı:</label>
            <input type="number" class="form-control" id="days" name="days" value="1" min="1" max="1000">
        </div>

        <button type="submit" class="btn btn-primary">Vakitleri Al</button>
    </form>

    <!-- Loading and Result Display -->
    <div id="loading" style="display: none;" class="mt-4 text-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Yükleniyor...</span>
        </div>
    </div>

    <div id="result" class="mt-4"></div>
    <div id="error" style="color: red;" class="text-center"></div>
</div>

<!-- jQuery ve jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- jQuery UI CSS (datepicker için) -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(document).ready(function() {
        // Takvim (datepicker) özelliğini ekle
        $('#date').datepicker({
            dateFormat: 'yy-mm-dd', // Format YYYY-MM-DD olacak şekilde
            maxDate: new Date() // Bugünden sonra tarih seçilemez
        });

        $('#prayerTimeForm').on('submit', function(e) {
            e.preventDefault();

            // Önceki sonuçları ya da hataları temizle
            $('#result').html('');
            $('#error').html('');
            $('#loading').show();

            // Form verilerini al
            const formData = $(this).serialize();

            // AJAX isteği gönder
            $.ajax({
                url: "{{ route('prayer-times.get') }}", // web.php'ye tanımlanan route
                type: "POST",
                data: formData,
                success: function(response) {
                    $('#loading').hide();

                    // Namaz vakitlerini göster
                    let timesHtml = `<h2 class="text-center mb-4">Namaz Vakitleri:</h2>`;
                    timesHtml += '<div class="row justify-content-center">';
                    for (const [date, times] of Object.entries(response.times)) {
                        timesHtml += `
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>${date} Namaz Vakitleri</strong>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Sabah:</strong> ${times[0]}</li>
                                        <li class="list-group-item"><strong>Öğle:</strong> ${times[2]}</li>
                                        <li class="list-group-item"><strong>İkindi:</strong> ${times[3]}</li>
                                        <li class="list-group-item"><strong>Akşam:</strong> ${times[4]}</li>
                                        <li class="list-group-item"><strong>Yatsı:</strong> ${times[5]}</li>
                                    </ul>
                                </div>
                            </div>`;
                    }
                    timesHtml += '</div>';
                    $('#result').html(timesHtml);
                },
                error: function(xhr) {
                    $('#loading').hide();
                    $('#error').html(xhr.responseJSON?.message || 'Bir hata oluştu.');
                }
            });
        });
    });
</script>

@endsection