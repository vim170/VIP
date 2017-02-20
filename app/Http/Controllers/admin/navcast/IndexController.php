<?php

namespace App\Http\Controllers\admin\navcast;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('admin.navcast.index');
    }
}
