<?php

namespace App\Http\Controllers\home\index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('home.index.index');
    }
    
}
