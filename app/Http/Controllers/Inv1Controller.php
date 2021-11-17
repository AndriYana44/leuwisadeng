<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class Inv1Controller extends Controller
{
    function penggunaanIT()
    {
        return view('landing.inv#1.penggunaan-it', [
            'title' => 'Penggunaan IT Madurasa'
        ]);
    }

    function getDocPenggunaanIT()
    {
        $filename = 'Penggunaan IT Madurasa.docx';
        return $this->getDownload('document/Penggunaan IT Madurasa.docx', $filename);
    }

    private function getDownload($public_path, $filename)
    {
        $filePath = public_path($public_path);
        $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        return response()->download($filePath, $filename, $headers);
    }
}
