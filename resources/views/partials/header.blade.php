<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">Tayfun Taşdemir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('home') }}">Ana Sayfa</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">Ben Kimim?</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('projects') }}">Projelerim</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('posts') }}">Gönderiler</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('contact') }}">İletişim</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" id="datetime" href="{{ route('home') }}"></a></li>
            </ul>
        </div>
    </div>
    <!-- Right: Date and Time -->
    <div class="text-right text-white text-font" id="datetime" style="font-size: 1rem; font-weight: 500; padding-left: 10rem; padding-right:5rem"></div>
    </div>
</nav>

<script>
    function updateDateTime() {
        const now = new Date();
        now.setHours(now.getHours());

        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        };

        const dateTimeString = now.toLocaleString('tr-TR', options);
        document.getElementById('datetime').textContent = dateTimeString;
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>
