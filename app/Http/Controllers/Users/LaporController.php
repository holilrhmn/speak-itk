<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Laporan;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Session;

class LaporController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $lapor = Laporan::where('user_id',$userId)->paginate(5);
        return view('users.laporan.index',compact('lapor'));
    }


    public function show($id){

        $laporan = Laporan::where('user_id','=',auth()->user()->id)->findOrFail($id);
        return view('users.laporan.detail',compact('laporan'));
    }

    public function destroy(Laporan $laporan){

        $laporan->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id){

        // $rating = Laporan::where('user_id','=',auth()->user()->id)->get();
        // $rating->rating = $request->input('rating');

        // $rating->save();

        try{
            Laporan::where('id',$id)->update([
                'rating'=> $request->rating,
            ]);
            Session::flash('success', 'Penilaian Telah Berhasil Anda Kirim');
        }catch (\Exception $e){
            Session::flash('error', 'Penilaian Gagal Untuk Dikirim');
        }
        return redirect()->back();
    }

}
