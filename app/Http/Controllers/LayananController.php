<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::all();
        return view('dashboard/layanan/layanan', compact('data'));
    }

    public function show()
    {
        $data = Layanan::all();
        return view('services', compact('data'));
    }

    public function create()
    {
        return view('dashboard/layanan/tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'foto_layanan' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ],
        [],
        [
            'deskripsi' => 'deskripsi layanan',
        ]);

        $file = $request->file('foto_layanan');
        $filename = $file->hashName();
        $file->move(base_path('../storage/layanan'), $filename);

        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'foto_layanan' => $filename
        ]);

        return redirect('/dashboard/layanan')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = Layanan::findOrFail($id);
        return view('dashboard/layanan/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'foto_layanan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],
        [],
        [
            'deskripsi' => 'deskripsi layanan',
        ]);

        $data = Layanan::findOrFail($id);

        if ($request->hasFile('foto_layanan')) {

            if ($data->foto_layanan && file_exists(base_path('../storage/layanan/' . $data->foto_layanan))) {
                unlink(base_path('../storage/layanan/' . $data->foto_layanan));
            }

            $file = $request->file('foto_layanan');
            $filename = $file->hashName();
            $file->move(base_path('../storage/layanan'), $filename);

            $data->foto_layanan = $filename;
        }

        $data->nama_layanan = $request->nama_layanan;
        $data->deskripsi = $request->deskripsi;

        $data->save();

        return redirect('/dashboard/layanan')->with('success', 'Data berhasil diupdate!');
    }


    public function destroy($id)
    {
        $data = Layanan::findOrFail($id);
        
        if ($data->foto_layanan && file_exists(base_path('../storage/layanan/' . $data->foto_layanan))) {
                unlink(base_path('../storage/layanan/' . $data->foto_layanan));
            }
        
        $data->delete();
        return redirect('/dashboard/layanan')->with('success', 'Data berhasil dihapus!');
    }
}
