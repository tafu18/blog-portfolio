@extends('layouts.admin')

@section('content')
<h1>Mesajlar</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sıra No</th>
            <th>İsim Soyisim</th>
            <th>Email</th>
            <th>Telefon Numarası</th>
            <th>Mesaj</th>
            <th>Durum</th>
            <th>İşlem</th>
            <th>Gönderilme Tarihi</th>
            <th>Güncelleme Tarihi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messages as $index => $message)
        <tr id="message-{{ $message->id }}">
            <td>{{ $index + 1  }}</td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->message }}</td>
            <td>
                @if($message->status)
                <form action="{{ route('admin.contact.toggleStatus', $message) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm bg-success">
                        <span class="badge bg-success">Cevaplandı</span>
                    </button>
                </form>
                @else
                <form action="{{ route('admin.contact.toggleStatus', $message) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm bg-warning">
                        <span class="badge bg-warning">Cevaplanmadı</span>
                    </button>
                </form>
                @endif
            </td>

            <td>
                <a href="{{ route('admin.contact.show', $message) }}" class="btn btn-info btn-sm">Görüntüle</a>
            </td>
            <td>{{ $message->created_at->translatedFormat('d F Y H:i') }}</td>
            <td>{{ $message->updated_at->translatedFormat('d F Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $messages->links('pagination::bootstrap-4') }}
</div>
@endsection
