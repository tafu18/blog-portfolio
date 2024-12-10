<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h4>Admin Paneli</h4>
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.posts.index') }}" class="text-white">Gönderiler</a></li>
                <li><a href="{{ route('admin.posts.create') }}" class="text-white">Yeni Gönderi</a></li>
                <li><a href="{{ route('admin.posts.edit', 1) }}" class="text-white">Düzenle</a></li>
                <li><a href="{{ route('admin.posts.show', 1) }}" class="text-white">Göster</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
