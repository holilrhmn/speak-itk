<?php

namespace App\Http\Controllers\UnitKerja;

use App\Category;
use App\Laporan;
use App\Status;
use App\Http\Controllers\Controller;
use App\Notifications\NotifTinjau;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Arr;

use App\User;


class LaporanController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $lapor = Laporan::where('unit_id',$userId)->get();
        $category = Category::all();
        return view('Unit-Kerja.lapor.index',compact('lapor', 'category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function home()
    {
        $userId = Auth::user()->id;
        $jumlah_laporan = Laporan::where('unit_id',$userId)->count();
        return view ('Unit-Kerja.home')->with([
            'jumlah_laporan' => $jumlah_laporan,
        ]);

    }

    public function ditinjau(Request $request, $id)
    {
        $id = (int) $id;

        $lapor = Laporan::where('id', $id)
                                ->pluck('id')->toArray();
        $lapor_id= Arr::get($lapor, '0', 0);
        // Set is_thumbnail = 0 for all image of hotel_id
        Laporan::where('id', $lapor_id)
                            ->update(['ditinjau' => 0]);

        $laporan = Laporan::where('id', $id)->update(['ditinjau' => 1]);

        $users = User::role(['PPID'])->get();
        Notification::send($users, new NotifTinjau($laporan));

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        return view('Unit-Kerja.lapor.details',compact('laporan'));
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
    public function editProfil(User $user)
    {
        $user = Auth::user();
        return view('Unit-Kerja.profil',compact('user'));
    }

    
    public function updateProfil(Request $request, $id){

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'password' => 'same:confirm-password',

        ]);



        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = array_except($input,array('password'));

        }



        $user = User::find($id);

        $user->update($input);

        return redirect()->route('unit.edit.profil')

                        ->with('success','User Profil Berhasil Diperbarui');
    }


}
