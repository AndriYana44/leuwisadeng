<?php

namespace App\Http\Controllers;

use App\Models\Admin\Menu;
use App\Models\Admin\MenuParent;

class Halaman extends Controller
{
    function index($type, $slug)
    {
        $pages = Menu::with(['parent', 'halaman'])->where('url', $slug)->get();
        $page = MenuParent::with('halaman')->where('url', $slug)->get();
        
        ($type == 'pages') ? $halaman = $pages : $halaman = $page;
        
        $title = $halaman->first()->name;

        return view('landing.halaman.app', [
            'title' => $title,
            'halaman' => $halaman,
        ]);
    }

    function download($slug, $file)
    {
        $data_url = Menu::where('url', $slug)->get();
        $file_ext = pathinfo('file_lampiran/' . $file, PATHINFO_EXTENSION);

        $filename = $data_url->first()->name . '.' . $file_ext;
        return $this->getDownload('file_lampiran/' . $file, $filename);
    }

    private function getDownload($public_path, $filename)
    {
        $filePath = public_path($public_path);
        $headers = [
            'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Type: application/pdf',
        ];
        $fixFileName = explode('/', $filename);
        $fixedFileName = implode('-', $fixFileName);
        return response()->download($filePath, $fixedFileName, $headers);
    }
}
