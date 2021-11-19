<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
use SplFileInfo;
use Image;

class HalamanController extends Controller
{
    function index()
    {
        $data = Halaman::all();
        return view('admin.halaman.app', [
            'data' => $data
        ]);
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

    function edit($id)
    {
        $data = Halaman::find($id);
        $file = new SplFileInfo('file_lampiran/' . $data->lampiran);
        $fileExt = $file->getExtension();

        return view('admin.halaman.form-edit', [
            'data' => $data,
            'ext' => $fileExt
        ]);
    }

    function update(Request $request, $id)
    {
        $halaman = Halaman::find($id);
        $fileName = $halaman->lampiran;

        if(isset($request->file)) {
            if(file_exists('file_lampiran/' . $halaman->lampiran)) {
                File::delete('file_lampiran/' . $halaman->lampiran);
            }

            $base_path = 'file_lampiran';
            $file = $request->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $fileName = Hash::make($file->getClientOriginalName()) . '.' . $fileExt;
            $fileName = explode('/', $fileName);
            $fileName = implode('-', $fileName);

            $file->move($base_path, $fileName);
        }

        $halaman->judul = $request->judul;
        $halaman->konten = $request->konten;
        $halaman->lampiran = $fileName;
        $halaman->update();

        return redirect('admin/halaman')->with([
            'success' => 'Data berhasil diubah'
        ]);
    }

    function uploadKonten(Request $request)
    {
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileSize = $file->getSize();
            if($fileSize < 1500000) {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $ext = $file->getClientOriginalExtension();
                $fixFileName = $fileName . '-' . time() . '.' . $ext;
                // upload file
                $request->file('upload')->storeAs('public/uploads', $fixFileName);
                
                return response()->json([
                    'url' => asset('storage/uploads/' . $fixFileName)
                ]);
            }
        }
    }

    function getLampiran($id)
    {
        $data = Halaman::find($id);
        $file = new SplFileInfo('file_lampiran/' . $data->lampiran);
        $fileExt = $file->getExtension();

        $filePath = public_path('file_lampiran/' . $data->lampiran);
        $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        return response()->download($filePath, 'Document.' . $fileExt, $headers);
    }

    function destroy($id)
    {
        $halaman = Halaman::find($id);
        if(file_exists('file_lampiran/' . $halaman->lampiran)) {
            File::delete('file_lampiran/' . $halaman->lampiran);
        }

        $halaman->delete();
        return redirect('admin/halaman')->with([
            'success' => 'Data berhasil dihapus',
        ]);
    }
}
