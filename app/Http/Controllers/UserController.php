<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function profile()
    {
        return view('user.profile');
    }

    public function storeProfile(Request $request)
    {
        $user = User::find(Auth::id());

        if(request()->file('avatar')){
            $fileId = request()->file('avatar')->store('public/avatars');
            $user->avatar = $fileId;
        }
        $user->name =request('name');
        $user->save();

        $request->session()->flash('tips',['status'=>'info','msg'=>'Your profile was updated successfully!']);

        return back();
    }


    public function notifications()
    {

        $notifications = \Auth::user()->notifications()->paginate(15);

        return view('user.notifications')->with('notifications', $notifications);
    }

}
