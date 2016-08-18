<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Person;

class PersonController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $req)
    {

        //do post
        if ($req->isMethod('post')) {
            $data = $req->only([
                'real_name',
                'email',
                'sex'
            ]);


            if (Person::create($data)) {
                return redirect()->back();
            } else {
                return redirect()->back()->withInput()->withErrors('create failed');
            }
        }

        return view('person');

    }

}
