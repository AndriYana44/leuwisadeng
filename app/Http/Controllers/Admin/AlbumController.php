<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    function index()
    {
        $data = Album::all();
        return view('admin.album.app', [
            'data' => $data,
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'album' => 'required|unique:tb_album|string'
        ]);

        Album::create([
            'album' => $request->album,
        ]);

        return redirect('admin/album')->with([
            'success' => 'Data berhasil ditambahkan',
        ]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'album' => 'required|unique:tb_album|string'
        ]);

        Album::find($id)->update([
            'album' => $request->album,
        ]);

        return redirect('admin/album')->with([
            'success' => 'Data berhasil diubah',
        ]);
    }

    function destroy($id)
    {
        Album::find($id)->delete();

        return redirect('admin/album')->with([
            'success' => 'Data berhasil dihapus',
        ]);
    }
}
