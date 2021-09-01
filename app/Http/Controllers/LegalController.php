<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
