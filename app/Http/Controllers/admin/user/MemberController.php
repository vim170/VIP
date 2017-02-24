<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class MemberController extends Controller
{
    /**
     * 会员列表首页
     *
     * @param    Request对象接受URI所有参数
     *
     * @return   返回数据至前台
     */
    public function getIndex(Request $request)
    {
        // 查询用户数据分配至前台模板
        // paginate 可以查询数据并且分页
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        // if ($request -> ajax()) {
        //    return view('admin.member.index', ['data' => $data,'request' => $request -> all()])->render(); 
        // }

        $data = DB::table('user') -> where('name','like','%'.$search.'%') -> paginate($count);
        return view('admin.member.index',['data' => $data,'request' => $request -> all()]);
    }

    /**
     * 删除单条数据
     * @param      int  $id  将要删除的数据的id
     * @return     如果成功则跳转到会员首页，否则留在首页，并且提示信息
     */
    public function getDelete($id)
    {
        $res = DB::table('user') -> where('id',$id) -> delete();
        if($res) {
            return redirect('admin/member/index') -> with('success','删除会员成功');
        } else {
            return back() -> with('error','删除会员失败');
        }
    }
    /**
     * 批量删除会员
     *
     * @param     使用Request对象获取客户端的URI传值
     *
     * @return    操作成功，返回到列表页，否则带提示信息回到列表页
     */
    public function postDeleteall(Request $request)
    {

        $data = $request -> only('del');
        // 删除id在$data['del']数组内记录
        $res = DB::table('user') -> whereIn('id',$data['del']) -> delete();
        if($res) {
            return redirect('admin/member/index') -> with('success','批量删除成功');
        }else {
            return back() -> with('error','批量删除失败');
        }
    }
    /**
     * 编辑页面
     *
     * @param      int $id  需要编辑的页面
     *
     * @return    跳转至编辑页面
     */
    public function getEdit($id)
    {
        $data = DB::table('user') -> where('id',$id)-> get();
        return view('admin.member.edit',['data' => $data]);
    }
    /**
     * 修改项目
     *
     * @param      使用request对象接受前台ＵＲＩ穿的参数
     *
     * @return    若修改成功，则返回首页，否则留在当前页
     */
    public function postUpdate(Request $request)
    {
        // 如果用户不输入密码，则使用以前的密码
        $all = $request -> except('_token');

        $pw = $request -> input('pw');
        $pass = $request -> input('pass');
        $pw = empty($pw) ? $pass : $pw;
        $all['pw'] = $pw;
        unset($all['pass']);
        // dd($all);
        $res = DB::table('user') -> where('id',$request -> input('id')) -> update($all);
        if($res){
            return redirect('admin/member/index') -> with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        } 
    }

    /**
     * 自己分页测试
     *
     * @param      使用Request对象接受前台传值
     */
    public function getCount(Request $request)
    {
        // $data = DB::table('user')  -> paginate($count);
        // return response()->view('admin.member.index',['data' => $data,'request' => $request -> all()]);    
    }
}
