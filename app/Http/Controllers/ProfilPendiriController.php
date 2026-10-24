<?php

namespace App\Http\Controllers;

use App\Models\ProfilPendiri;
use Illuminate\Http\Request;

class ProfilPendiriController extends Controller
{
    public function index()
    {
        $data = ProfilPendiri::all();
        return view('dashboard/profilpendiri/profilpendiri', compact('data'));
    }

    public function create()
    {
        return view('dashboard/profilpendiri/tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pendiri' => 'required',
            'deskripsi_pendiri' => 'required',
            'foto_pendiri' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('foto_pendiri');
        $filename = $file->hashName();
        $file->move(base_path('../storage/pendiri'), $filename);

        ProfilPendiri::create([
            'nama_pendiri' => $request->nama_pendiri,
            'deskripsi_pendiri' => $request->deskripsi_pendiri,
            'foto_pendiri' => $filename
        ]);

        return redirect('/dashboard/profilpendiri')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = ProfilPendiri::findOrFail($id);
        return view('dashboard/profilpendiri/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pendiri' => 'required',
            'deskripsi_pendiri' => 'required',
            'foto_pendiri' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = ProfilPendiri::findOrFail($id);

        if ($request->hasFile('foto_pendiri')) {

            if ($data->foto_pendiri && file_exists(base_path('../storage/pendiri/' . $data->foto_pendiri))) {
                unlink(base_path('../storage/pendiri/' . $data->foto_pendiri));
            }

            $file = $request->file('foto_pendiri');
            $filename = $file->hashName();
            $file->move(base_path('../storage/pendiri'), $filename);

            $data->foto_pendiri = $filename;
        }

        $data->nama_pendiri = $request->nama_pendiri;
        $data->deskripsi_pendiri = $request->deskripsi_pendiri;

        $data->save();

        return redirect('/dashboard/profilpendiri')->with('success', 'Data berhasil diupdate!');
    }


    public function destroy($id)
    {
        $data = ProfilPendiri::findOrFail($id);
        
        if ($data->foto_pendiri && file_exists(base_path('../storage/pendiri/' . $data->foto_pendiri))) {
                unlink(base_path('../storage/pendiri/' . $data->foto_pendiri));
            }
        
        $data->delete();
        return redirect('/dashboard/profilpendiri')->with('success', 'Data berhasil dihapus!');
    }
}
