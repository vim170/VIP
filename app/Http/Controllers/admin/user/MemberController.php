<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MemberController extends Controller
{
    public function getIndex()
    {
        return view('admin.member.index');
    }
}
