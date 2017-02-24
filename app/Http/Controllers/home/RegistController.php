<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class RegistController extends Controller
{
    public function getIndex(){
        return view('/home/regist/index');
    }

    public function postNajax(Request $request){
        $name = $request -> input('name');
        $res = DB::table('user') -> where('name',$name) -> get();
        if($res == null){
            return '500';
        }else{
            return '600';
        }
    }
}
