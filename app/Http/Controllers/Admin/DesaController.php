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
            $fileName1 = $this->uploadImage($gambar_utama, $base_path);
            // insert to db
            $desa->gambar_utama = $fileName1;
        }

        // checking foto pimpinan
        if(isset($request->foto_pimpinan)) {
            $foto_pimpinan = $request->file('foto_pimpinan');
            $fileName2 = $this->uploadImage($foto_pimpinan, $base_path);

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
        $desa = Desa::find($id);
        $base_path = 'img/desa/';

        // upload gambar utama
        if(isset($request->gambar_utama)) {
            if(file_exists($base_path . $desa->gambar_utama)) {
                File::delete($base_path . $desa->gambar_utama);
            }
            $gambar_utama = $request->file('gambar_utama');
            $fileName = $this->uploadImage($gambar_utama, $base_path);
            $desa->gambar_utama = $fileName;
        }

        // set slug
        $slug = explode(' ', strtolower($request->desa));
        $slug = implode('-', $slug);

        // upload foto pimpinan
        if(isset($request->foto_pimpinan)) {
            if(file_exists($base_path . $desa->foto_pimpinan)) {
                File::delete($base_path . $desa->foto_pimpinan);
            }
            $foto_pimpinan = $request->file('foto_pimpinan');
            $fileName = $this->uploadImage($foto_pimpinan, $base_path);
            $desa->foto_pimpinan = $fileName;
        }

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
        $desa->update();

        return redirect('admin/desa')->with([
            'success' => 'Data berhasil diubah',
        ]);
    }

    private function uploadImage($file, $path)
    {
        $getFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // get extension
        $getExtFile2 = $file->getClientOriginalExtension();
        $fileName = $getFileName . '-' . time() . '.' . $getExtFile2;
        // mover to dir
        $file->move($path, $fileName);

        return $fileName;
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
