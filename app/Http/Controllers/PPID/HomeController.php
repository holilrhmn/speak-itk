<?php

namespace App\Http\Controllers\PPID;

use App\Http\Controllers\Controller;
use App\Laporan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function grafik(){

        $jml_laporan = \App\Laporan::getJumlahLaporanPerTahun();

        return view('ppid.home', compact('jml_laporan'));
    }

}
