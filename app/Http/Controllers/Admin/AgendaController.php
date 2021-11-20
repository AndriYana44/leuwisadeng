<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    function index()
    {
        return view('admin.agenda.app');
    }

    function create()
    {
        return view('admin.agenda.form-add');
    }
}
