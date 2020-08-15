<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function editProfil(User $user)
    {
        $user = Auth::user();
        return view('users.profil',compact('user'));
    }

    
    public function updateProfil(Request $request, $id){

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
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

        return redirect()->route('edit.profil')

                        ->with('success','User Profil Berhasil Diperbarui');
    }

}
