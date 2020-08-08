<?php

namespace App\Http\Controllers\PPID;

use App\Http\Controllers\Controller;
use App\Laporan;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(){
        return view('ppid.lapor.filter');
    }

    public function search(Request $request)
    {
        $laporan = Laporan::whereDate('created_at' ,$request->get('from'))->get();
        return view('ppid.lapor.informasi',compact('laporan'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function laporanComplete()
    {
        $laporan_complete = Laporan::where('status_id', '=' ,'4')->get();
        return view('ppid.lapor.complete',compact('laporan_complete'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function notComplete()
    {
        $laporan_NotComplete = Laporan::where('status_id', '<' ,'4')->get();
        return view('ppid.lapor.not_complete',compact('laporan_NotComplete'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
