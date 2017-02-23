<?php

namespace App\Http\Controllers\admin\ads;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdsController extends Controller
{
    //加载广告列表页面
    public function getIndex(Request $request){
        // paginate 可以查询数据并且分页
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $data = DB::table('ads') -> where('url','like','%'.$search.'%') -> paginate($count);
        return view('admin.ads.index',['data'=>$data,'request'=>$request->all()]);
    }

    // 加载广告添加页面
    public function getAdd(){
        return view('admin.ads.add');
    }


    //广告添加操作
    public function postInsert(Request $request){
        $data = $request->except('_token');
        //判断重要字段是否为空
        
        $this->validate($request,[
            'position' => 'required',
            'logo' => 'required',
            'url' => 'required',
            'enabled' => 'required'
        ],[
            'position.required' => '广告位置未选择',
            'logo.required' => '广告Logo未上传',
            'url.required' => '广告链接未填写',
            'enabled.required' => '广告状态未选择',
        ]);

        if($request->hasFile('logo')){
            //获取后缀
            $ext = $request -> file('logo') ->getClientOriginalExtension();
            //文件名
            $fileName = time().rand(0000,9999).'.'.$ext;
            //上传操作
            $request->file('logo')->move('./upload/ads/logo', $fileName);
            $data['logo'] = '/upload/ads/logo/'.$fileName;
        }else{
            return back();
        }
        //插入数据
        $res = DB::table('ads')->insert($data);
        if($res){
            return redirect('/admin/ads/index')->with('success','添加成功');
        }else{
            return redirect('/admin/ads/add')->with('error','添加失败');
        }
    }

    //删除广告
    public function getDelete($id){
        $res = DB::table('ads') -> where('id',$id) -> delete();
        if($res){
            return redirect('admin/ads/index') -> with('success','删除成功');
        } else {
            return back() -> withInput() -> with('error','删除失败');
        }
    }

    //广告修改页
    public function getEdit($id){
        $data = DB::table('ads')->where('id',$id)->first();
        return view('admin.ads.edit',['data'=>$data]);
   }

   //广告广告修改操作
   public function postUpdate($id,Request $request){
        $data = $request->except('_token');
        if($request->hasFile('logo')){
            //获取后缀
            $ext = $request -> file('logo') ->getClientOriginalExtension();
            //文件名
            $fileName = time().rand(0000,9999).'.'.$ext;
            //上传操作
            $request->file('logo')->move('./upload/ads/logo', $fileName);
            $data['logo'] = '/upload/ads/logo/'.$fileName;
        }else{
            //如果 没有接收到文件,则查询数据库 提取原有的logo数据
            $logo = DB::table('ads') -> where('id',$id) -> first();
            $arr['logo'] = $logo;
        }
        $res = DB::table('ads')->where('id',$id)->update($data);
        if($res>0){
             return redirect('/admin/ads/index')->with('success','修改成功');
        }else{
            return redirect('/admin/ads/index')->with('error','修改失败');
        }
    }
}
