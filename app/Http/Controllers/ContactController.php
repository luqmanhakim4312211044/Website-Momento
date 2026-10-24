<?php

namespace App\Http\Controllers;

use App\Models\KontakPerusahaan;
use App\Models\MediaSosial;

class ContactController extends Controller
{
    public function show()
    {
        $kontak = KontakPerusahaan::all();
        $mediaSosial = MediaSosial::all();
        return view('contact', compact('kontak', 'mediaSosial'));
    }
}
