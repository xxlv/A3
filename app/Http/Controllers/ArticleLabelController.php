<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleLabelController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){

    }

    public function store(Request $request){

    }

}
