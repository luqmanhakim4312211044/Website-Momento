<?php

namespace App\Http\Controllers;

use App\Models\ProfilPendiri;

class AboutController extends Controller
{
    public function show()
    {
        $profilPendiri = ProfilPendiri::all();
        return view('about', compact('profilPendiri'));
    }
}
