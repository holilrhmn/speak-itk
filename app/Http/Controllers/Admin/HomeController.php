<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\User;
use App\Laporan;
use Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    public function index(){

        $jumlah_user = User::all()->count();
        return view ('admin.home')->with([
            'jumlah_user' => $jumlah_user,
            // 'notifUser' => $userNotif,
        ]);
    }

}
