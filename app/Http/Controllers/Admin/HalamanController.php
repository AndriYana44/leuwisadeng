<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HalamanController extends Controller
{
    function index()
    {
        return view('admin.halaman.app');
    }

    function create()
    {
        return view('admin.halaman.form-add');
    }

    function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'file' => 'required',
        ]);

        $base_path = 'file_lampiran';
        $file = $request->file('file');
        $fileExt = $file->getClientOriginalExtension();
        $fileName = Hash::make($file->getClientOriginalName()) . '.' . $fileExt;
        $fileName = explode('/', $fileName);
        $fileName = implode('-', $fileName);

        $moveFile = $file->move($base_path, $fileName);
        if($moveFile) {
            $halaman = new Halaman();
            $halaman->judul = $request->judul;
            $halaman->konten = $request->konten;
            $halaman->lampiran = $fileName;
            $halaman->save();
        }

        return redirect('admin/halaman')->with([
            'success' => 'Data berhasil disimpan',
        ]);
    }
}
