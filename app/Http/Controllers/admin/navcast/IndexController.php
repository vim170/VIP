<?php

namespace App\Http\Controllers\admin\navcast;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    /**
     * 频道列表首页
     *
     */
    public function getIndex()
    {
    	$data = DB::table('navs') -> get();
        return view('admin.navcast.index',['data' => $data]);
    }
    /**
     * 添加频道
     *
     * @return   返回到频道添加页
     */
    public function getAdd()
    {
    	return view('admin.navcast.add');
    }
    /**
     * 向频道表中添加数据
     *
     * @param      使用Request对象接受客户端ＵＲＩ传值
     *
     * @return     如果成功则返回频道列表页，否则留在当前页面并提示
     */
    public function postInsert(Request $request)
    {
        // 获取频道名和启用状态
    	$data = $request -> only('navname','enable');
        // 获取创建时间
    	$data['atime'] = time();
        // 将数据插入到数据表中
    	$res = DB::table('navs') -> insert($data);
    	if($res){
    		return redirect('admin/navcast/index') -> with('success','频道添加成功'); 
    	} else {
    		return back() -> withInput() -> with('error','频道添加失败');
    	}
    }
    /**
     * 编辑页面
     */
    public function getEdit($id){
        // 查询数据库中id号传入的id的记录
    	$data = DB::table('navs') -> where('id',$id) -> first();
    	return view('admin.navcast.edit',['data' => $data]);
    }
    /**
     * 更新数据
     *
     * @param      使用Request对象接受客户端URI传值
     *
     * @return     如果更新数据成功就回到列表页，否则提示信息
     */
    public function postUpdate(Request $request)
    {
    	$data = $request -> only('navname','enable');
    	$id = $request -> input('id');
        // 更新字段id为传入id的记录
    	$res = DB::table('navs') -> where('id',$id) -> update($data);
    	if($res) {
    		return redirect('admin/navcast/index') -> with('success','修改成功');
    	} else {
    		return back() -> with('error', '修改失败');
    	}
    }
    /**
     * 删除数据
     *
     * @param     $id int  将删除记录的id值
     *
     * @return     若删除成功，返回频道列表页，否则提示信息
     */
    public function getDelete($id)
    {
        $del = DB::table('brand') -> where('navid',$id) -> first();
        if($del) {
            return back() -> with('error','该频道下有品牌，你不能进行该操作');
        } else {
            $res = DB::table('navs') -> where('id',$id) -> delete();
            if($res) {
                return redirect('admin/navcast/index') -> with('success','频道删除成功');
            } else {
                return back() -> with('error','删除失败');
            }
        }
    	
    }
}
