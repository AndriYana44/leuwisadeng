<?php

namespace App\Http\Controllers;

use App\Models\Admin\Agenda;
use App\Models\Admin\Desa;
use App\Models\Admin\Kategori;
use App\Models\Admin\Posting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(Request $request)
    {
        $data = Posting::with('kategori')->paginate(6);
        $desa = Desa::all();
        $kategori = Kategori::all();
        $key = null;

        if($request->isMethod('POST')) {
            $data = Posting::with('kategori')->whereHas('kategori', function($q) use ($request) {
                $q->where('kategori', 'like', '%' . $request->keyword . '%');
            })->paginate(6);
            $key = $request->keyword;
        }

        return view('landing.home', [
            'title' => 'Home',
            'data' => $data,
            'desa' => $desa,
            'key' => $key,
            'kategori' => $kategori,
        ]);
    }

    function getPosting($slug)
    {
        $data = Posting::where('slug', $slug)->get();

        return view('landing.posting.app', [
            'title' => 'Posting',
            'data' => $data
        ]);
    }

    function getDesa($slug)
    {
        $desa = Desa::where('slug', $slug)->get();
        return view('landing.desa.app', [
            'title' => 'Desa' . $desa->first()->desa,
            'desa' => $desa,
        ]);
    }

    function getKategoriPosting($kategori)
    {
        $data = Posting::with(['kategori'])->whereHas('kategori', function($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->get();
        return response()->json($data);
    }

    function beritaTerkini()
    {
        $agenda = Agenda::all();
        $data = Posting::with('kategori')->paginate(6);
        return view('landing.berita-terkini.app', [
            'title' => 'Berita Terkini',
            'data' => $data,
            'agenda' => $agenda
        ]);
    }

    function beritaKategori($id)
    {
        $data = Posting::with('kategori')->whereHas('kategori', function($q) use ($id) {
            $q->where('id', $id);
        })->paginate(6);

        $agenda = Agenda::all();

        return view('landing.kategori.app', [
            'title' => 'Posting Kategori',
            'data' => $data,
            'agenda' => $agenda
        ]);
    }
}
