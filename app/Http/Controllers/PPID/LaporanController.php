<?php

namespace App\Http\Controllers\ppid;

use App\Category;
use App\Laporan;
use App\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Notifications\NotifLaporanUnit;
use App\Notifications\NotifLaporanUser;
use Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->get();
        $category = Category::all();
        // $users= User::whereHas("roles", function($q){ $q->where("name", "Unit-Kerja"); })->get();
        return view('ppid.lapor.index',compact('laporan', 'category'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function home()
    {
        $jumlah_laporan = Laporan::all()->count();
        $jml_laporan = \App\Laporan::getJumlahLaporanPerTahun();
        $jumlah_kategori = Category::all()->count();
        $laporan_selesai = Laporan::where('status_id' , '=' , '4')->count();
        $not_complete = Laporan::where('status_id' , '<','4')->count();
        return view ('ppid.home')->with([
            'jumlah_laporan' => $jumlah_laporan,
            'jml_laporan' =>$jml_laporan,
            'jumlah_kategori' => $jumlah_kategori,
            'laporan_selesai'=> $laporan_selesai,
            'not_complete'=> $not_complete,
        ]);

    }

    public function filterHome(Request $request)
    {
        $jumlah_laporan = Laporan::whereYear('created_at',$request->get('filter'))->count();
        $jumlah_kategori = Category::whereYear('created_at',$request->get('filter'))->count();
        $laporan_selesai = Laporan::whereYear('created_at',$request->get('filter'))->where('status_id' , '=' , '4')->count();
        $not_complete = Laporan::whereYear('created_at',$request->get('filter'))->where('status_id' , '<' , '4')->count();
        return view ('ppid.home_filter')->with([
            'jumlah_laporan' => $jumlah_laporan,
            'jumlah_kategori' => $jumlah_kategori,
            'laporan_selesai'=> $laporan_selesai,
            'not_complete'=> $not_complete,
        ])->withSuccess('Data Dashboard Berhasil Di Filter');   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laporan = Laporan::find($id);
        return view('ppid.lapor.details',compact('laporan'));
    }

    public function download($lampiran)
    {

        return response()->download('storage/'.$lampiran);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        $users= User::whereHas("roles", function($q){ $q->where("name", "Unit-Kerja"); })->get();
        return view('ppid.lapor.edit', [
            'title' =>'Kirim Ke Unit',
            'laporan' => $laporan,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $this->validate($request, [
            'unit_id' => 'required',
        ]);

        $laporan->update([
            'unit_id'=> $request->unit_id,
        ]);
        $users= User::where('id',$request->unit_id)->get();
        Notification::send($users, new NotifLaporanUnit($laporan));
        return redirect()->route('ppid.laporan.index')->withInfo('Data Laporan Berhasil Dikirim Ke Unit Bersangkutan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('ppid.laporan.index')
            ->with('danger', 'Data Laporan Berhasil dihapus');
    }

    //Status Updating Laporan
    public function editStatus(Laporan $laporan)
    {
        $status = Status::all();
        return view('ppid.lapor.status_edit', [
            'title' =>'Kirim Ke Unit',
            'laporan' => $laporan,
            'status' => $status,
        ]);
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $this->validate($request, [
            'status_id' => 'required',
        ]);

        $laporan->update([
            'status_id'=> $request->status_id,
        ]);

        $users= User::where('id',$laporan->user_id)->get();
        Notification::send($users, new NotifLaporanUser($laporan));
        return redirect()->route('ppid.laporan.index')->withInfo('Data Status Laporan Berhasil Diupdate');
    }
    // public function pending($id)
    // {
    //     try{
    //         Laporan::where('id',$id)->update([
    //             'status_id'=>1
    //         ]);
    //         $users= User::where('id','user_id')->get();
    //         Notification::send($users, new NotifLaporanUser($id));
    //         Session::flash('error', 'Status Laporan Berhasil Diubah Menjadi Pending');
    //     }catch (\Exception $e){
    //         Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
    //     }
    //     return redirect()->back();
    // }

    // public function proses($id)
    // {
    //     try{
    //         Laporan::where('id',$id)->update([
    //             'status_id'=>2
    //         ]);
    //         Session::flash('warning', 'Status Laporan Berhasil Diubah Menjadi Proses');
    //     }catch (\Exception $e){
    //         Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
    //     }
    //     return redirect()->back();
    // }

    // public function verifikasi($id)
    // {

    //     try{
    //         Laporan::where('id',$id)->update([
    //             'status_id'=>3
    //         ]);
    //         Session::flash('info', 'Status Laporan Berhasil Diubah Menjadi Verifikasi');
    //     }catch (\Exception $e){
    //         Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
    //     }

    //     return redirect()->back();
    // }

    // public function complete($id)
    // {
    //     try{
    //         Laporan::where('id',$id)->update([
    //             'status_id'=>4
    //         ]);
    //         Session::flash('success', 'Status Laporan Berhasil Diubah Menjadi Complete');
    //     }catch (\Exception $e){
    //         Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
    //     }
    //     return redirect()->back();
    // }


}
