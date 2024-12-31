@extends('layouts.admin')

@section('content')
<style>
    canvas {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="container mt-4">
    <h1>Admin Dashboard</h1>

    <div class="row mt-5">
        <!-- Post Statistics Chart -->
        <div class="col-md-6">
            <canvas id="postChart" style="max-width: 400px; max-height: 300px;"></canvas>
        </div>
        <div class="col-md-6 mt-5">
            <canvas id="viewsChart" style="max-width: 800px; max-height: 400px;"></canvas>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <canvas id="messageChart" style="max-width: 400px; max-height: 300px;"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="dailyMessageChart" style="max-width: 800px; max-height: 400px;"></canvas>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Post Statistics
        const postChartCtx = document.getElementById('postChart').getContext('2d');
        new Chart(postChartCtx, {
            type: 'doughnut',
            data: {
                labels: ['Yayınlanan', 'Taslak'],
                datasets: [{
                    label: 'Gönderiler',
                    data: [{{ $postStatistics['publishedPosts'] }}, {{ $postStatistics['draftPosts'] }}],
                    backgroundColor: ['#4CAF50', '#FFC107'],
                }]
            },
        });

        // Message Statistics
        const messageChartCtx = document.getElementById('messageChart').getContext('2d');
        new Chart(messageChartCtx, {
            type: 'bar',
            data: {
                labels: ['Cevaplandı', 'Cevaplanmadı'],
                datasets: [{
                    label: 'Mesajlar',
                    data: [{{ $contactStatistics['resolvedMessages'] }}, {{ $contactStatistics['unresolvedMessages'] }}],
                    backgroundColor: ['#2196F3', '#FF5722'],
                }]
            },
        });

        // Views Statistics
        const viewsChartCtx = document.getElementById('viewsChart').getContext('2d');
        const labels = {!! json_encode($postViews->pluck('title')->toArray()) !!};
        const shortenedLabels = labels.map(label =>
            label.length > 15 ? label.substring(0, 15) + '...' : label
        );
        new Chart(viewsChartCtx, {
            type: 'bar',
            data: {
                labels: shortenedLabels,
                datasets: [{
                    label: 'Görüntüleme Sayısı',
                    data: {!! json_encode($postViews->pluck('views')->toArray()) !!},
                    backgroundColor: '#42A5F5',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    },
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    },
                }
            }
        });

        // Günlük mesajlar grafiği
        const dailyMessageCtx = document.getElementById('dailyMessageChart').getContext('2d');
        new Chart(dailyMessageCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dailyMessageLabels) !!},
                datasets: [{
                    label: 'Günlük Mesajlar',
                    data: {!! json_encode(array_values($dailyMessages)) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        enabled: true
                    },
                },
                scales: {
                    x: {
                        beginAtZero: false,
                        title: {
                            display: true,
                            text: 'Günler'
                        },
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Mesaj Sayısı'
                        },
                    }
                }
            }
        });
    });
</script>
@endsection
