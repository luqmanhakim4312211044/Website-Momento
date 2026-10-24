<?php

namespace App\Http\Controllers;

use App\Models\PesanGuest;
use Illuminate\Http\Request;

class PesanGuestController extends Controller
{
    public function index()
    {
        $data = PesanGuest::all();
        return view('dashboard/pesan/pesan', compact('data'));
    }

    public function store(Request $request)
    {
        // Honeypot: kolom "website" disembunyikan dari manusia. Bot biasanya mengisinya.
        // Bot dibalas seolah-olah berhasil, tapi pesannya tidak disimpan.
        if ($request->filled('website')) {
            return redirect('/contact')->with('success', 'Successfully sent your message!');
        }

        $data = $request->validate([
            'nama_pengirim' => 'required|string|max:100',
            'email_pengirim' => 'required|email|max:255',
            'isi_pesan' => 'required|string|max:2000'
        ],
        [],
        [
            'nama_pengirim' => 'name',
            'email_pengirim' => 'email',
            'isi_pesan' => 'message',
        ]);

        PesanGuest::create($data);
        return redirect('/contact')->with('success', 'Successfully sent your message!');
    }

    public function destroy($id)
    {
        PesanGuest::destroy($id);
        return redirect('/dashboard/pesan')->with('success', 'Data berhasil dihapus!');
    }
}
