<?php

namespace App\Http\Controllers;

use App\Models\KontakPerusahaan;
use Illuminate\Http\Request;

class KontakPerusahaanController extends Controller
{
    public function index()
    {
        $data = KontakPerusahaan::all();
        return view('dashboard/kontak/kontak', compact('data'));
    }

    public function create()
    {
        return view('dashboard/kontak/tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kontak' => 'required',
            'isi_kontak' => 'required',
            'logo_kontak' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('logo_kontak');
        $filename = $file->hashName();
        $file->move(base_path('../storage/kontak'), $filename);

        KontakPerusahaan::create([
            'jenis_kontak' => $request->jenis_kontak,
            'isi_kontak' => $request->isi_kontak,
            'logo_kontak' => $filename
        ]);

        return redirect('/dashboard/kontak')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = KontakPerusahaan::findOrFail($id);
        return view('dashboard/kontak/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kontak' => 'required',
            'isi_kontak' => 'required',
            'logo_kontak' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = KontakPerusahaan::findOrFail($id);

        if ($request->hasFile('logo_kontak')) {

            if ($data->logo_kontak && file_exists(base_path('../storage/kontak/' . $data->logo_kontak))) {
                unlink(base_path('../storage/kontak/' . $data->logo_kontak));
            }

            $file = $request->file('logo_kontak');
            $filename = $file->hashName();
            $file->move(base_path('../storage/kontak'), $filename);

            $data->logo_kontak = $filename;
        }

        $data->jenis_kontak = $request->jenis_kontak;
        $data->isi_kontak = $request->isi_kontak;

        $data->save();

        return redirect('/dashboard/kontak')->with('success', 'Data berhasil diupdate!');
    }


    public function destroy($id)
    {
        $data = KontakPerusahaan::findOrFail($id);
        
        if ($data->logo_kontak && file_exists(base_path('../storage/kontak/' . $data->logo_kontak))) {
                unlink(base_path('../storage/kontak/' . $data->logo_kontak));
            }
        
        $data->delete();
        return redirect('/dashboard/kontak')->with('success', 'Data berhasil dihapus!');
    }
}
