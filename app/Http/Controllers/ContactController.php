<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Http\Requests\ContactMessageRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function index()
    {
        $messages = ContactMessage::all(); // Mesajları al
        return view('admin.contact.index', compact('messages')); // Mesajları view'a gönder
    }

    public function submitForm(ContactMessageRequest $request)
    {
        // Veritabanına kaydetme
        ContactMessage::create($request->validated());

        // Başarı mesajı
        return redirect()->route('contact')->with('success', 'Mesajınız başarıyla gönderildi!');
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact.show', compact('contactMessage'));
    }
}
