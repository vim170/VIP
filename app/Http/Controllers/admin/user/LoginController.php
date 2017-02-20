<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    public function getIndex(){
        return view('admin.login.index');
    }


    public function postDologin(Request $request){
        //接受信息
        $data = $request-> only('name','pw','code');
        //检测用户名必须写
        if(empty($request->input('name'))){
          return back()->with('error','用户名不能为空');
        }
         //判断密码和确认密码是否一致
        $res = DB::table('admin')->where('name','=',$data['name'])->first();
     
        //验证用户名
        if($data['name']!=$res['name']){
            return back()->with('error','用户名不存在');
        }

        //验证密码
        if (!Hash::check($data['pw'],$res['pw'])){
            return back()->with('error','密码不正确');
          
        }

        //校正验证码
         if($data['code'] != session('code')){
           return back()->with('error','验证码错误');
         }

        // 校正启用状态
         if($res['status'] == 2){
           return back()->with('error','管理员账户未启用');
         }

        // 存入session值
        session(['id'=>$res['id']]);
        session(['name'=>$res['name']]);

        return view('/admin/admin/index');
    }

    // 退出登录 清除session值
    public function getLogout(){
        session()->flush();
        return redirect('/admin/login');
    }

    //加载修改密码模板版块
    public function getChangepassword(){
        //传递ID值
        $data = DB::table('admin')->where('id',session('id'))->first();
        return view('admin.login.changepassword',['data'=>$data]);
    }

    //修改密码
    public function postChangepwd($id,Request $request){
        //修改密码 表单验证
        $data =  DB::table('admin')->where('id',$id)->first();
        $res = $request->except('_token');
        if(!Hash::check($res['pw'],$data['pw'])){
            return back()->with('error','原密码不正确');
        }
        $this->validate($request,[
            'npw'=>'required',
            'rnpw' => 'required|same:npw'          
        ],[
            'npw.required'=>'新密码不能为空',
            'rnpw.required' => '确认密码不能为空',
            'rnpw.same'=>'确认密码与原密码不同'
            ]);
        
        $res['pw'] = Hash::make($res['npw']);

        $res = DB::table('admin')->where('id',$id)->update(['pw'=>$res['pw']]);

        if($res>0){
            return redirect('/admin/user')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

}
