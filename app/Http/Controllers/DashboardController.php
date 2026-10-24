<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\ProfilPendiri;
use App\Models\ShowcaseVideo;
use App\Models\MediaSosial;
use App\Models\KontakPerusahaan;
use App\Models\PesanGuest;

class DashboardController extends Controller
{
    public function show()
    {
        $layanan = Layanan::all();
        $profilPendiri = ProfilPendiri::all();
        $showcaseVideo = ShowcaseVideo::all();
        $mediaSosial = MediaSosial::all();
        $kontak = KontakPerusahaan::all();
        $pesanGuest = PesanGuest::all();

        return view('dashboard/dashboard', compact('layanan', 'profilPendiri', 'showcaseVideo', 'mediaSosial', 'kontak', 'pesanGuest'));
    }
}
