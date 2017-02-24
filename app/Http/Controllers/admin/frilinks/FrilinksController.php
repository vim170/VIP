<?php

namespace App\Http\Controllers\admin\frilinks;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class FrilinksController extends Controller
{
    public function getIndex(Request $request){
        //index页面提交过来的form表单要接收的条数和关键
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
       // var_dump($search);
      $data =   DB::table('frilinks')->where('name','like','%'.$search.'%')->paginate($count);
       return view('admin.Frilinks.index',['data'=>$data,'request' =>$request->all()]);
    }
   
    // 删除
    public function getDelete($id)
    {
        $res2 = DB::table('frilinks') -> where('id',$id) -> delete();
        if($res2){
            return redirect('admin/frilinks/index') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
    }

    public function getAdd()
    {//加载友情链接添加页面
        return view('admin.frilinks.add');
    }

    public function postInsert(Request $request)
    {
        $arr = $request ->only(['title','url','logo','name','status']);
        // 自动验证表单
         $this -> validate($request,[
            'name' => 'required',
            'logo' => 'required',
            'url' => 'required',
            'title' => 'required',
            
            ],[
            'name.required' => '友情名不存在',
            'logo.required' => '友情logo不存在哦',
            'url.required' => '友情url不存在',
            'title.required' => '您还没有对友情链接进行描述呢',
            
            ]);

         if($request->hasFile('logo')){
            //获取后缀
            $ext = $request -> file('logo') ->getClientOriginalExtension();
            //文件名
            $fileName = time().rand(0000,9999).'.'.$ext;
            //上传操作
            $request->file('logo')->move('./upload/frilinks/logo', $fileName);
            $arr['logo'] = '/upload/frilinks/logo/'.$fileName;
        }else{
            return back();
        }

        $res = DB::table('frilinks') ->insert($arr);
         if($res){
            return redirect('/admin/frilinks/index')->with('success','添加成功');
        }else{
            return back()->with('error',"添加失败");
        }
    }

    public function getEdit($id)
    {   
        
        $edit = DB::table('frilinks')-> where('id',$id)->get();
        return view('admin.frilinks.edit',['edit'=>$edit]);
   }

    public function postUpdate(Request $request)
    {
          
    // 去除编辑表单提交过来的——token值 只留数据表的字段
    $insert = $request -> except(['_token']);
    if($request->hasFile('logo')){
        //获取后缀
        $ext = $request -> file('logo') ->getClientOriginalExtension();
        //文件名
        $fileName = time().rand(0000,9999).'.'.$ext;
        //上传操作
        $request->file('logo')->move('./upload/frilinks/logo', $fileName);
        $insert['logo'] = '/upload/frilinks/logo/'.$fileName;
    }else{
        //如果 没有接收到文件,则查询数据库 提取原有的logo数据
            $logo = DB::table('frilinks') -> where('id',$insert['id']) -> first();
            $arr['logo'] = $logo;
    }
    $res3 = DB::table('frilinks') ->where('id',$insert['id']) -> update($insert);
    if($res3){
        return redirect('admin/frilinks/index') -> with('success','修改成功');
    }else{
        return back() -> with('error','修改失败，找找原因吧');
    }
   }
}
