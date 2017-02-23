<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminController extends Controller
{
    /**
     * 首页
     *
     * @param     接受请求获得请求参数
     */
    public function getIndex(Request $request)
    {
        // paginate 可以查询数据并且分页
        $count = $request -> input('count',10);
        $search = $request -> input('search','');

        $data = DB::table('admin') -> where('name','like','%'.$search.'%') -> paginate($count);
        return view('admin.user.index',['data' => $data,'request' => $request -> all()]);
    }
    /**
     * 增加用户
     *
     * @return  跳转到增加页面
     */
    public function getAdd()
    {
        return view('admin.user.add'); 
    }
    /**
     * 添加用户
     *
     * @param      使用Request对象获取所有参数
     *
     * @return     成功跳转至首页，失败使用flash返回之前添加页面
     */
    public function postInsert(Request $request)
    {
        // 验证用户名是否存在
        // if(!$request -> has('name')) {
        //     return back() -> withInput() -> with('error','用户名不存在');
        // }
        // 自动表单验证
        $this->validate($request, [
           'name' => 'required|max:255',
           'pw' => 'required',
           'repw' => 'required|same:pw',
        ],

        [
           'name.required' => '用户名不存在',
           'pw.required' => '密码不存在',
           'repw.required' => '确认密码不存在',
           'repw.same' => '确认密码不一致',


        ]);
        // 数据处理
        $arr = $request -> only(['name','pw']);
        // 密码处理
        $arr['pw'] = Hash::make($request->input('pw'));
        $arr['atime'] = time();


        $res = DB::table('admin') -> insert($arr);
        if($res) {
           return redirect('/admin/user/index') -> with('success','添加成功');
        } else {
           return back() -> with('error','添加失败');
        }

    }
    /**
     * 编辑用户
     *
     * @param      int  $id     编辑的用户的id
     *
     * @return     返回至编辑页面
     */

    public function getEdit($id){
        $data = DB::table('admin') -> where('id',$id) -> get();
        return view('admin.user.edit',['data' => $data]);
    }
    /**
     * 更新管理员信息
     *
     * @param      使用Request对象接受客户端的参数
     * @return     成功则返回至列表页，否则则返回至之前的页面
     */
    public function postUpdate(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'pw' => 'required',
        'repw' => 'required|same:pw',
        ],

        [
        'name.required' => '用户名不存在',
        'pw.required' => '密码不存在',
        'repw.required' => '确认密码不存在',
        'repw.same' => '确认密码不一致',


        ]);
        $id = $request -> input('id');

        $arr = $request -> only(['id','name','pw','status']);

        $arr['pw'] = Hash::make($request->input('pw'));

        $res = DB::table('admin') -> where('id',$id) -> update($arr);
        if($res) {
            return redirect('/admin/user/index') -> with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }

    }
    /**
     * 删除管理员
     *
     * @param      int $id  要删除的管理员用户id
     *
     * @return     如果成功则返回到管理员列表页，否则返回至之前的页面
     */
    public function getDelete($id)
    {
        $res = DB::table('admin') -> where('id',$id) -> delete();
        if($res){
            return redirect('admin/user/index') -> with('success','删除成功');
        }else{
            return back() -> withInput() -> with('error','删除失败');
            return redirect('admin/admin/index') -> with('success','删除成功');
        
    }
}
}
