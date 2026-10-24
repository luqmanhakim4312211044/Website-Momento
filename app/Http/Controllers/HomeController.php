<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\ShowcaseVideo;

class HomeController extends Controller
{
    public function show()
    {
        $layanan = Layanan::paginate(3, ['*'], 'layanan_page');
        $portofolioVideo = ShowcaseVideo::paginate(2);
        return view('home', compact('layanan', 'portofolioVideo'));
    }
}
