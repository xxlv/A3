<?php

namespace App\Http\Controllers;

use App\Dinner;
use Illuminate\Http\Request;

class DinnerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $dinner = Dinner::where(['uid' => \Auth::user()->id])->first();
        return view('dinner.index')->with('dinner', $dinner);
    }


    public function edit()
    {
        $dinner = Dinner::where(['uid' => \Auth::user()->id])->first();
        return view('dinner.edit')->with('dinner', $dinner);
    }

    public function delete($id)
    {
        $dinner = Dinner::find($id);
        $dinner->delete();
        return back();
    }

    public function addDinnerStore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:3'
        ]);

        $input = request()->all();

        if (isset($input['id']) && $input['id']) {
            $dinner = Dinner::find($input['id']);
        } else {
            $dinner = new Dinner;
        }
        $dinner->uid = \Auth::user()->id;

        $dinner->email = $input['email'];
        $dinner->name = $input['name'];
        $dinner->end_at = $input['end_at'];
        $dinner->begin_at = $input['begin_at'];
        $dinner->auto_report = $input['auto_report'];
        $dinner->dinner_time = $input['dinner_time'];
        $dinner->save();

        return redirect('dinner');
    }
}
