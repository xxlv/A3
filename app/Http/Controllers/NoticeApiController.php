<?php

namespace App\Http\Controllers;

use App\Notifications\DinnerNotice;
use App\User;
use App\Http\Requests;

class NoticeApiController extends Controller
{

    public function notify()
    {
        $id = request('id', 0);
        if ($id) {
            $user = User::find($id);
            $user->notify(new DinnerNotice($user));
        }
        return;
    }

    public function markAsRead(User $user){

        $user->notifications->map(function($n){

            $n->markAsRead();
        });
        return back();
    }
}
