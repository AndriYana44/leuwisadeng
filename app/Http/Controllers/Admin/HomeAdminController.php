<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    function index()
    {
        for($i=0; $i<24; $i++) {
            // Visitors::where('date', date('Y-m-d'))
            $data = DB::table('tb_visitors')
                ->select(DB::raw('sum(visitor) as visitor'))
                ->where('hour', "<", ($i < 10) ? "0" . $i . ":59:59" : $i . ":59:59")
                ->where('hour', ">", ($i < 10) ? "0" . $i . ":00:00" : $i . ":00:00")
                ->get();

            $visitors[$i] = $data->first()->visitor; 
        }

        $os_dist = DB::table('tb_visitors')
            ->select(DB::raw('distinct(operating_sistem)'))
            ->where('date', date('Y-m-d'))->get();
        
        foreach($os_dist as $item) {
            $os[$item->operating_sistem] = DB::table('tb_visitors')
            ->select(DB::raw("sum(visitor) as jml"))
            ->where('operating_sistem', $item->operating_sistem)
            ->where('date', date('Y-m-d'))->get();
        }

        return view('admin.dashboard', [
            'visitors' => $visitors,
            'os_dist' => $os_dist,
            'os' => $os
        ]);
    }
}
