<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LegalController extends Controller
{
    public function imprint()
    {
        return view('legal.imprint');
    }

    public function privacyPolicy()
    {
        return view('legal.privacy');
    }

    public function agb()
    {
        return view('legal.agb');
    }

    public function revocation()
    {
        return view('legal.widerruf');
    }

    public function contact()
    {
        return view('legal.contact');
    }
    public function sendMail(Request $request)
    {
        $receiver = config('services.contact.mail');

        $rules = [
            'email' => 'required|email:rfc,dns',
            'name' => 'required|string|size:1|starts_with:6',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ];

        $messages = [
            'required' => 'Dies ist ein Pflichtfeld.',
            'max' => 'Dieses Feld erlaubt nur :max Zeichen.',
            'size' => 'Bitte prüfe deine Angabe.',
            'email' => 'Deine Eingabe scheint nicht valide zu sein.',
            'starts_with' => 'Bitte prüfe deine Angabe.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('contact')->withErrors($validator)->withInput();
        } else {
            Mail::to($receiver)->send(new ContactForm($request->input('subject'),$request->input('message'),$request->input('email')));
            return view('legal.contact')->with([
                'sent' => 1,
            ]);
        }
    }
}
