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

    /**
     * Show the user dinner info
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show()
    {

        $dinner = Dinner::where(['uid' => \Auth::user()->id])->first();
        if (!$dinner) {
            return redirect('/dinner/edit');
        }
        return view('dinner.show')->with('dinner', $dinner);
    }

    /**
     * Edit dinner info by auth user id
     *
     * @return $this
     */
    public function edit()
    {
        $views=[];
        $dinner = Dinner::where(['uid' => \Auth::user()->id])->first();

        if ($dinner) {

            $views['tips']=[
                'level'=>'success',
                'title'=>'Hey '.\Auth::user()->name,
                'content'=>'I help u fill this form now !'
            ];

        }
        $views['dinner']=$dinner;
        return view('dinner.edit')->with($views);
    }

    /**
     * Delete by id
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $dinner = Dinner::find($id);
        $dinner->delete();
        return redirect(url('/dinner/edit'));
    }

    /**
     * Save it
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:3',
            'begin_at' => 'required',
            'end_at' => 'required'
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

        return redirect('dinner/show');
    }


    public function search()
    {
        $search = request('search', '');
        $searchList = Dinner::search($search)->paginate(15);

        $views = [
            'item' => 'Dinner',
            'searchList' => $searchList
        ];
        return view('common.search')->with($views);
    }
}
