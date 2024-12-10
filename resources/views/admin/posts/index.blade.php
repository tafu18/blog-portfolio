@extends('layouts.admin')

@section('content')
    <h1>Gönderi Listesi</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Yeni Gönderi Oluştur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Başlık</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->status }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info btn-sm">Görüntüle</a>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning btn-sm">Düzenle</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
