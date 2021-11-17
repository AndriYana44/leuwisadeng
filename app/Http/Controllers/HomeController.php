<?php

namespace App\Http\Controllers;

use App\Models\Admin\Posting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $data = Posting::all();

        return view('landing.home', [
            'title' => 'Home',
            'data' => $data,
        ]);
    }
}
