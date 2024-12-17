<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        /* Genel renk paleti */
        body {
            background-color: #f4f7fa; /* Soft arka plan rengi */
        }

        /* Sidebar stil */
        .sidebar {
            background-color: #4e73df; /* Modern, soft bir mavi tonu */
            color: #fff;
            width: 250px;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            transition: all 0.3s ease;
        }

        .sidebar h4 {
            margin-bottom: 30px;
            font-size: 22px;
            font-weight: bold;
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
            color: #ffcc00; /* Soft sarı hover efekti */
        }

        /* Ana içerik alanı */
        .main-content {
            margin-left: 260px;
            padding: 30px;
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

        .heading {
            margin-left: 25px !important;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="heading">Admin Paneli</h4>
        <ul class="list-unstyled">
            <li><a href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper"></i> Gönderiler</a></li>
            <li><a href="{{ route('admin.posts.create') }}"><i class="fas fa-plus-circle"></i> Yeni Gönderi</a></li>
            <li><a href="{{ route('contact.index') }}"><i class="fas fa-envelope"></i> Mesajlar</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
