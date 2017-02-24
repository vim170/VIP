<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SettingController extends Controller
{
    //获取网站配置页面
    public function getIndex(){

        //查询数据库  返回查询值到页面中
        $data = DB::table('setting') ->select('svalue') -> get();
        if($data == null){
            $data[0]['svalue'] = '';
            $data[1]['svalue'] = '';
            $data[2]['svalue'] = '';
            $data[3]['svalue'] = '';
            $data[4]['svalue'] = '';
            $data[5]['svalue'] = '';
        }

        return view('admin.setting.index',['data'=>$data]);
    }

    /*
    //被取消后的添加配置页面 和添加操作
    public function getAdd(){
        return view('admin.setting.add');
    }

    public function postInsert(Request $request){
        // 判断:如果有数据 则不能添加
        $date = DB::table('setting') -> first();
        if($date>0){
            return back() -> with('error','不能重复添加网站配置,只能修改网站配置');
        }

        $arr = $request -> except('_token');
        $this->validate($request, [
           'title' => 'required',
           'copy' => 'required',
           'keywords' => 'required',
           'logo' => 'required',
        ],

        [
           'title.required' => '网站标题未填写',
           'copy.required' => '网站版权未填写',
           'keywords.required' => '网站关键字未填写',
           'logo.required' => '网站Logo未选择',


        ]);

        if($request->hasFile('logo')){
            //获取后缀
            $ext = $request -> file('logo') ->getClientOriginalExtension();
            //文件名
            $fileName = time().rand(0000,9999).'.'.$ext;
            //上传操作
            $request->file('logo')->move('./upload/setting/logo', $fileName);
            $arr['logo'] = '/upload/setting/logo/'.$fileName;
        }else{
            return back();
        }

        foreach($arr as $k=>$v){
            $res = DB::table('setting') -> insert([
            'skey' => $k,
            'svalue' => $v
        ]);
        }

        if($res) {
           return redirect('/admin/setting/index') -> with('success','添加成功');
        } else {
           return back() -> with('error','添加失败');
        }

    }*/

    //修改页面
    public function postUpdate(Request $request){
    // 判断:如果没有数据 则不能修改配置
        $date = DB::table('setting') -> first();
        if($date==0){
            return back() -> with('error','没有添加网站配置,不能修改网站配置');
        }
        $arr = $request -> except('_token');
        //表单验证
        $this->validate($request, [
           'title' => 'required',
           'copy' => 'required',
           'keywords' => 'required',
           'description' => 'required',
        ],

        [
           'title.required' => '网站标题未填写',
           'copy.required' => '网站版权未填写',
           'keywords.required' => '网站关键字未填写',
           'description.required' => '网站描述未填写',
        ]);
        //文件的操作
        if($request->hasFile('logo')){
            //获取后缀
            $ext = $request -> file('logo') ->getClientOriginalExtension();
            //文件名
            $fileName = time().rand(0000,9999).'.'.$ext;
            //上传操作
            $request->file('logo')->move('./upload/setting/logo', $fileName);
            $arr['logo'] = '/upload/setting/logo/'.$fileName;
        }else{
            //如果 没有接收到文件,则查询数据库 提取原有的logo数据
            $logo = DB::table('setting') -> where('skey','logo') -> first();
            $arr['logo'] = $logo['svalue'];
        }

        //通过遍历 讲数据添加到表中
        foreach($arr as $k=>$v){
            //通过 id 位置添加
            $res = DB::table('setting') ->where('id',$date['id']) -> update([
            'skey' => $k,
            'svalue' => $v
            ]);
            //用 ++ 方式来往下添加
            $date['id']++;
        }

        //最后判断结果集, 所遇问题:当文件没有修改时 最后遍历的结果是返回文件的结果 返回结果为0 
        if($res) {
           return redirect('/admin/setting/index') -> with('success','修改成功');
        } else {
           return redirect('/admin/setting/index') -> with('success','修改成功');
        }

    }
}

