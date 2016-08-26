<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{

    public function notifications(){

        $notifications=\Auth::user()->notifications()->paginate(15);

        return view('user.notifications')->with('notifications',$notifications);
    }

}
