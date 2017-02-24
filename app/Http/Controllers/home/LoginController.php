<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    //返回登陆页面
    public function getIndex(){
        return view('home.login.index');
    }

    //接受ajax的手机登陆验证
    public function postNajax(Request $request){
        $name = $request->input('name');
        $res = DB::table('user') -> where('name',$name) -> get();
        if($res == null){
            return '500';
        }else{
            return '600';
        }
    }

    public function postDologin(Request $request){
        $data = $request -> only('name','password');
        $res = DB::table('user') -> where(['name'=>$data['name'],'pw'=>$data['password']]) -> get();
        if($res == null){
            return back() -> with('message', '登陆失败!信息有误!');;
        }
    }
    
}
