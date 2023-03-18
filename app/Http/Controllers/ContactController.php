<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendMail(Request $request)
    {
        $validatedData = $request->validate([
            'tel' => 'required',
            'email' => 'email',
            'name' => 'required|max:255',
            'coach' => 'max:255',
        ]);

        Mail::to('peskovatzkov.vs@gmail.com')
            ->send(new ContactMail($validatedData));

        return true;
    }
}
