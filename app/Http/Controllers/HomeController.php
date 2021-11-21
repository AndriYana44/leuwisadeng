<?php

namespace App\Http\Controllers;

use App\Models\Admin\Desa;
use App\Models\Admin\Posting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $data = Posting::all();
        $desa = Desa::all();

        return view('landing.home', [
            'title' => 'Home',
            'data' => $data,
            'desa' => $desa,
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
}
