<?php

namespace App\Http\Controllers;

use App\Models\MediaSosial;
use Illuminate\Http\Request;

class MediaSosialController extends Controller
{
    public function index()
    {
        $data = MediaSosial::all();
        return view('dashboard/mediasosial/mediasosial', compact('data'));
    }

    public function create()
    {
        return view('dashboard/mediasosial/tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_media' => 'required',
            'url_media' => 'required|url:http,https',
            'logo_platform' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('logo_platform');
        $filename = $file->hashName();
        $file->move(base_path('../storage/mediasosial'), $filename);

        MediaSosial::create([
            'nama_media' => $request->nama_media,
            'url_media' => $request->url_media,
            'logo_platform' => $filename
        ]);

        return redirect('/dashboard/mediasosial')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = MediaSosial::findOrFail($id);
        return view('dashboard/mediasosial/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_media' => 'required',
            'url_media' => 'required|url:http,https',
            'logo_platform' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = MediaSosial::findOrFail($id);

        if ($request->hasFile('logo_platform')) {

            if ($data->logo_platform && file_exists(base_path('../storage/mediasosial/' . $data->logo_platform))) {
                unlink(base_path('../storage/mediasosial/' . $data->logo_platform));
            }

            $file = $request->file('logo_platform');
            $filename = $file->hashName();
            $file->move(base_path('../storage/mediasosial'), $filename);

            $data->logo_platform = $filename;
        }

        $data->nama_media = $request->nama_media;
        $data->url_media = $request->url_media;

        $data->save();

        return redirect('/dashboard/mediasosial')->with('success', 'Data berhasil diupdate!');
    }


    public function destroy($id)
    {
        $data = MediaSosial::findOrFail($id);
        
        if ($data->logo_platform && file_exists(base_path('../storage/mediasosial/' . $data->logo_platform))) {
                unlink(base_path('../storage/mediasosial/' . $data->logo_platform));
            }
        
        $data->delete();
        return redirect('/dashboard/mediasosial')->with('success', 'Data berhasil dihapus!');
    }
}
