<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Laporan;
use App\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;


class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->get();
        $category = Category::all();


        return view('admin.lapor.index',compact('laporan', 'category'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('admin.lapor.details',compact('laporan'));
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
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

        return redirect()->route('admin.laporan.index')
            ->with('danger', 'Data Laporan Berhasil dihapus');
    }

    //Status Updating
    public function pending($id)
    {
        try{
            Laporan::where('id',$id)->update([
                'status_id'=>1
            ]);
            Session::flash('error', 'Status Laporan Berhasil Diubah Menjadi Pending');
        }catch (\Exception $e){
            Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
        }
        return redirect()->back();
    }

    public function proses($id)
    {
        try{
            Laporan::where('id',$id)->update([
                'status_id'=>4
            ]);
            Session::flash('warning', 'Status Laporan Berhasil Diubah Menjadi Proses');
        }catch (\Exception $e){
            Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
        }
        return redirect()->back();
    }

    public function verifikasi($id)
    {
        try{
            Laporan::where('id',$id)->update([
                'status_id'=>2
            ]);
            Session::flash('info', 'Status Laporan Berhasil Diubah Menjadi Verifikasi');
        }catch (\Exception $e){
            Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
        }
        return redirect()->back();
    }

    public function complete($id)
    {
        try{
            Laporan::where('id',$id)->update([
                'status_id'=>3
            ]);
            Session::flash('success', 'Status Laporan Berhasil Diubah Menjadi Complete');
        }catch (\Exception $e){
            Session::flash('error', 'Status Laporan Gagal Untuk Diubah');
        }
        return redirect()->back();
    }
}
