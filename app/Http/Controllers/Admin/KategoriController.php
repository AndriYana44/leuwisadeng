<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.app', [
            'data' => $data
        ]);
    }

    function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect('admin/kategori')->with([
            'success' => 'Data berhasil ditambahkan'
        ]);
    }

    function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect('admin/kategori')->with([
            'success' => 'Data berhasil diubah',
        ]);
    }

    function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect('admin/kategori')->with([
            'success' => 'Data berhasil dihapus',
        ]);
    }
}
