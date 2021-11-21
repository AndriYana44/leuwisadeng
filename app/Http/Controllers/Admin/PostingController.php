<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use App\Models\Admin\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;

class PostingController extends Controller
{
    function index()
    {
        $data = Posting::with('kategori')->get();

        return view('admin.posting.app', [
            'data' => $data
        ]);
    }
    
    function create()
    {
        $kategori = Kategori::all();
        return view('admin.posting.form-add', [
            'kategori' => $kategori,
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'konten' => 'required|string',
            'kata_kunci' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255'
        ]);

        $base_file = 'file_upload';
        $img = $request->file('image');
        $file_ext = $img->getClientOriginalExtension();
        $file_name = Hash::make($img->getClientOriginalName()) . '.' . $file_ext;
        $file_name = explode('/', $file_name);
        $file_name = implode('-', $file_name);

        $img->move($base_file, $file_name);

        $fix_date = explode('/', $request->tanggal);
        if(count($fix_date) > 1) {
            $fix_date = $fix_date[2] . '-' . $fix_date[0] . '-' . $fix_date[1];
        }

        $lowerJudul = strtolower($request->judul);
        $slug = explode(' ', $lowerJudul);
        $slug = implode('-', $slug);

        $posting = new Posting();
        $posting->judul = $request->judul;
        $posting->id_kategori = $request->kategori;
        $posting->tanggal = is_array($fix_date) ? $request->tanggal : $fix_date;
        $posting->image = $file_name;
        $posting->konten = $request->konten;
        $posting->kata_kunci = $request->kata_kunci;
        $posting->deskripsi = $request->deskripsi;
        $posting->slug = $slug;
        $posting->save();
        
        return redirect('/admin/posting')->with([
            'success' => 'Data berhasil ditambahkan'
        ]);
    }

    function edit($id) 
    {
        $data = Posting::find($id);
        $kategori = Kategori::all();

        return view('admin.posting.form-edit', [
            'data' => $data,
            'kategori' => $kategori,
        ]);
    }

    function update(Request $request, $id)
    {
        $base_file = 'file_upload';
        $img = $request->file('image');
        $data_edit = Posting::find($id);
        
        if(isset($request->image)) {
            $file_ext = $img->getClientOriginalExtension();
            $file_name = Hash::make($img->getClientOriginalName()) . '.' . $file_ext;
            $file_name = explode('/', $file_name);
            $file_name = implode('-', $file_name);
    
            $img->move($base_file, $file_name);
    
            if(file_exists($base_file . '/' . $data_edit->image)) {
                File::delete($base_file . '/' . $data_edit->image);
            }
        }

        $fix_date = explode('/', $request->tanggal);
        if(count($fix_date) > 1) {
            $fix_date = $fix_date[2] . '-' . $fix_date[0] . '-' . $fix_date[1];
        }

        $lowerJudul = strtolower($request->judul);
        $slug = explode(' ', $lowerJudul);
        $slug = implode('-', $slug);

        $data_edit->judul = $request->judul;
        $data_edit->id_kategori = $request->kategori;
        $data_edit->tanggal = is_array($fix_date) ? $request->tanggal : $fix_date;
        $data_edit->konten = $request->konten;
        $data_edit->kata_kunci = $request->kata_kunci;
        $data_edit->deskripsi = $request->deskripsi;
        $data_edit->slug = $slug;
        if(isset($file_name)) {
            $data_edit->image = $file_name;
        }
        $data_edit->update();

        return redirect('admin/posting')->with([
            'success' => 'Data berhasil diubah' 
        ]);
    }

    function destroy($id)
    {
        Posting::find($id)->delete();

        return redirect('admin/posting')->with([
            'success' => 'Data berhasil dihapus'
        ]);
    }
}
