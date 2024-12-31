<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Http\Requests\ContactMessageRequest;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormMailToSender;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact.index', compact('messages'));
    }


    public function submitForm(ContactMessageRequest $request)
    {
        ContactMessage::create($request->validated());

        Mail::to($request->email)->send(new ContactFormMailToSender($request->name, $request->email, $request->message));
        Mail::to('info@tayfuntasdemir.com.tr')->send(new ContactFormMail($request->name, $request->email, $request->message));

        return redirect()->route('contact')->with('success', 'Mesajınız başarıyla gönderildi!');
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact.show', compact('contactMessage'));
    }

    public function toggleStatus(ContactMessage $contactMessage)
    {
        $contactMessage->status = !$contactMessage->status;
        $contactMessage->save();

        return redirect()->route('admin.contact.index')->with('success', 'Mesaj durumu başarıyla güncellendi.');
    }
}
