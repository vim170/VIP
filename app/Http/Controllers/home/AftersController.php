<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class aftersController extends Controller
{
    public function getIndex()
    {
        return view('home.afters.index');
    }
    // public function getUpdate(){
    //     return view('home.afters.update');
    // }
    public function getDingdan()
    {
    	return view('home.afters.dingdan');
    }
}
