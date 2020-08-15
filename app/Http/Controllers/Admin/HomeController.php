<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\User;
use App\Laporan;
use Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function index(){

        $jumlah_user = User::all()->count();
        return view ('admin.home')->with([
            'jumlah_user' => $jumlah_user,
            // 'notifUser' => $userNotif,
        ]);
    }

    public function editProfil(User $user)
    {
        $user = Auth::user();
        return view('admin.profil',compact('user'));
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

        return redirect()->route('admin.edit.profil')

                        ->with('success','User Profil Berhasil Diperbarui');
    }

}
