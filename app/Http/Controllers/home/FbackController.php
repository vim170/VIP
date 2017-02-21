<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FbackController extends Controller
{
    public function getIndex()
    {
        return view('home.fback.index');
    }

    public function getYao()
    {
        return view('home.fback.yao');
    }
    public function getDe()
    {
        return view('home.fback.de');
    }
}
