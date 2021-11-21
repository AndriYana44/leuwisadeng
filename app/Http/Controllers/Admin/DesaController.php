<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Desa;
use Illuminate\Http\Request;
use File;

class DesaController extends Controller
{
    function index()
    {
        $data = Desa::all();
        return view('admin.desa.app', [
            'data' => $data,
        ]);
    }

    function create()
    {
        return view('admin.desa.form-add');
    }

    function store(Request $request) 
    {
        $request->validate(['desa' => 'required|string']);
        // path for image/file
        $base_path = 'img/desa/';

        $desa = new Desa();
        // checking gambar utama
        if(isset($request->gambar_utama)) {
            $gambar_utama = $request->file('gambar_utama');
            // get name
            $getNameFile1 = pathinfo($gambar_utama->getClientOriginalName(), PATHINFO_FILENAME);
            // get extension
            $getExtFile1 = $gambar_utama->getClientOriginalExtension();
            $fileName1 = $getNameFile1 . '-' . time() . '.' . $getExtFile1;
            // mover to dir
            $gambar_utama->move($base_path, $fileName1);

            $desa->gambar_utama = $fileName1;
        }

        // checking foto pimpinan
        if(isset($request->foto_pimpinan)) {
            $foto_pimpinan = $request->file('foto_pimpinan');
            // get name
            $getNameFile2 = pathinfo($foto_pimpinan->getClientOriginalName(), PATHINFO_FILENAME);
            // get extension
            $getExtFile2 = $foto_pimpinan->getClientOriginalExtension();
            $fileName2 = $getNameFile2 . '-' . time() . '.' . $getExtFile2;
            // mover to dir
            $foto_pimpinan->move($base_path, $fileName2);

            $desa->foto_pimpinan = $fileName2;
        }

        $slug = explode(' ', strtolower($request->desa));
        $slug = implode('-', $slug);

        $desa->desa = $request->desa;
        $desa->slug = $slug;
        $desa->nama_pimpinan = $request->pimpinan;
        $desa->alamat = $request->alamat;
        $desa->email = $request->email;
        $desa->profil = $request->profil;
        $desa->struktur = $request->struktur;
        $desa->rencana = $request->rencana;
        $desa->demografi = $request->demografi;
        $desa->kegiatan = $request->kegiatan;
        $desa->save();

        return redirect('admin/desa')->with([
            'success' => 'Data berhasil ditambahkan',
        ]);
    }

    function edit($id)
    {
        $data = Desa::find($id);
        return view('admin.desa.form-edit', [
            'data' => $data,
        ]);
    }

    function update(Request $request, $id)
    {

    }

    function destroy($id)
    {
        $desa = Desa::find($id);
        if(file_exists('img/desa/'.$desa->foto_pimpinan)) {
            File::delete('img/desa/'.$desa->foto_pimpinan);
        }
        if(file_exists('img/desa/'.$desa->gambar_utama)) {
            File::delete('img/desa/'.$desa->gambar_utama);
        }

        $desa->delete();

        return redirect('admin/desa')->with([
            'success' => 'Data berhasil dihapus',
        ]);
    }
}
