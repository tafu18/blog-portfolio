@extends('layouts.admin')

@section('content')
    <h1>Mesajlar</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>İsim Soyisim</th>
                <th>Email</th>
                <th>Telefon Numarası</th>
                <th>Mesaj</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr id="message-{{ $message->id }}">
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ $message->message }}</td>
                    <td>
                        @if($message->status)
                            <span class="badge bg-success">Cevaplandı</span>
                        @else
                            <span class="badge bg-warning">Cevaplanmadı</span>
                        @endif
                    </td>
                    <td>
                    <a href="{{ route('admin.contact.show', $message) }}" class="btn btn-info btn-sm">Görüntüle</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
