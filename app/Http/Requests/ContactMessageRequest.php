<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Kullanıcı doğrulaması yapmıyorsanız true dönebilirsiniz.
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Adınızı girmeniz gerekmektedir.',
            'email.required' => 'Email adresinizi girmeniz gerekmektedir.',
            'phone.required' => 'Telefon numaranızı girmeniz gerekmektedir.',
            'message.required' => 'Mesajınızı girmeniz gerekmektedir.',
        ];
    }
}
