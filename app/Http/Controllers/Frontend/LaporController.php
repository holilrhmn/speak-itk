<?php

namespace App\Http\Controllers\Frontend;
use App\Laporan;
use App\Category;
use App\Status;
use App\User;
use App\Http\Controllers\Controller;
use App\Notifications\NotifLaporan;
use Notification;
use Illuminate\Http\Request;


class LaporController extends Controller
{
    public function create()
    {
        $jumlah_laporan = Laporan::all()->count();
        $laporan_selesai = Laporan::where('status_id', '=' ,'4')->count();
        $category = Category::select('id','nama_kategori')->get();
        return view('welcome',compact('category'))->with([
            'jumlah_laporan' => $jumlah_laporan,
            'laporan_selesai' => $laporan_selesai
        ]);

    }

    public function store(Request $request)
    {
        //Validasi Form Lapor
        $this->validate($request, [
            'subjek' => 'required|min:5',
            'laporan' => 'required|min:20',
            'kategori_id' => 'required',
            'pilihan' => 'required',
            'lampiran'=> 'required|mimes:pdf,jpeg,jpg,png|max:7000',
            'g-recaptcha-response' => 'required|captcha',

        ]);
        //Upload File Lapor
        $laporan = New Laporan;
        if($request->file('lampiran')){
            $lampiran=$request->file('lampiran');
            $filename=time().'.'.$lampiran->getClientOriginalExtension();
            $request->lampiran->move('storage', $filename);
            // $lampiran->move(public_path('lampiran/users'),$filename);

            $laporan->lampiran=$filename;
        }
        //Create Isi Lapor
        $laporan->subjek = $request->subjek;
        $laporan->laporan = $request->laporan;
        $laporan->user_id = auth()->id();
        $laporan->kategori_id = $request->kategori_id;
        $laporan->pilihan= $request->pilihan;
        $laporan->status_id= 1;
        $laporan->unit_id =1;
        $laporan->save();


        $users = User::role(['PPID'])->get();
        Notification::send($users, new NotifLaporan($laporan));
        return redirect()->route('homepage')->withSuccess('Laporan Berhasil Dikirim');
    }

}
