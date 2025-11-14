<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        // Aquí se puede enviar un email de notificación
        // Mail::to(config('mail.from.address'))->send(new ContactNotification($contact));

        return redirect()->route('pages.contact')
            ->with('success', 'Mensaje enviado exitosamente. Te contactaremos pronto.');
    }
}

