<?php

namespace App\Http\Controllers;

use App\Models\ShowcaseVideo;
use Illuminate\Http\Request;

class ShowcaseVideoController extends Controller
{
    public function index()
    {
        $data = ShowcaseVideo::all();
        return view('dashboard/video/video', compact('data'));
    }

    public function show()
    {
        $data = ShowcaseVideo::all();
        return view('showcase', compact('data'));
    }

    public function create()
    {
        return view('dashboard/video/tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_showcase' => 'required|mimes:mp4,avi,mov|max:102400'
        ]);

        $file = $request->file('video_showcase');
        $filename = $file->hashName();
        $file->move(base_path('../storage/video'), $filename);

        ShowcaseVideo::create([
            'video_showcase' => $filename
        ]);

        return redirect('/dashboard/video')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $data = ShowcaseVideo::findOrFail($id);
        return view('dashboard/video/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video_showcase' => 'nullable|mimes:mp4,avi,mov|max:20480'
        ]);

        $data = ShowcaseVideo::findOrFail($id);
        if ($request->hasFile('video_showcase')) {
            if ($data->video_showcase && file_exists(base_path('../storage/video/' . $data->video_showcase))) {
                unlink(base_path('../storage/video/' . $data->video_showcase));
            }

            $file = $request->file('video_showcase');
            $filename = $file->hashName();
            $file->move(base_path('../storage/video'), $filename);

            $data->video_showcase = $filename;
        }

        $data->save();

        return redirect('/dashboard/video')->with('success', 'Data berhasil diupdate!');
    }


    public function destroy($id)
    {
        $data = ShowcaseVideo::findOrFail($id);
        
        if ($data->video_showcase && file_exists(base_path('../storage/video/' . $data->video_showcase))) {
                unlink(base_path('../storage/video/' . $data->video_showcase));
            }
        
        $data->delete();
        return redirect('/dashboard/video')->with('success', 'Data berhasil dihapus!');
    }
}
