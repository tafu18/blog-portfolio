<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.jpeg') }}" type="image/jpeg">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Genel stil ve responsive düzenlemeler */
        body {
            background-color: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        /* Navbar stil */
        .navbar {
            background-color: #4e73df;
        }

        .navbar-brand {
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #ffcc00;
        }

        /* Genel renk paleti */
        body {
            background-color: #f4f7fa;
            /* Soft arka plan rengi */
            font-family: Arial, sans-serif;
        }

        /* Sidebar stil */
        .sidebar {
            background-color: #4e73df;
            /* Modern, soft bir mavi tonu */
            color: #fff;
            width: 250px;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar h4 {
            margin-bottom: 30px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
        }

        .sidebar ul li {
            padding: 15px 20px;
            font-size: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            transition: color 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #ffcc00;
            /* Soft sarı hover efekti */
        }

        /* Ana içerik alanı */
        .main-content {
            margin-left: 250px;
            padding: 30px;
            transition: margin-left 0.3s ease;
        }

        .card {
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        /* Mobil cihazlar için düzenleme */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 210px;
            }
        }

        /* Sidebar collapsible toggler button */
        .sidebar-toggler {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #4e73df;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar-toggler {
                display: block;
            }

            .sidebar {
                width: 0;
                overflow: hidden;
                height: 100vh;
                position: fixed;
            }

            .sidebar.active {
                width: 250px;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Paneli</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                    <!-- Kullanıcı adı tıklanabilir hale geldi -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Çıkış Yap
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Kayıt Ol</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>



    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="heading">Admin Paneli</h4>
        <ul class="list-unstyled">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Genel Bakış</a></li>
            <li><a href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper"></i> Gönderiler</a></li>
            <li><a href="{{ route('admin.contact.index') }}"><i class="fas fa-envelope"></i> Mesajlar</a></li>
        </ul>
    </div>

    <!-- Sidebar Toggle Button (Mobile) -->
    <button class="sidebar-toggler" onclick="toggleSidebar()">☰</button>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        // Sidebar toggle function for mobile view
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
        }
    </script>
</body>

</html>