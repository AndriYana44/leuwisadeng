<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostingController extends Controller
{
    function index()
    {
        return view('admin.posting.app');
    }
    
    function create()
    {
        return view('admin.posting.form-add');
    }
}
