<?php

namespace App\Http\Controllers\admin\navcast;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
    public function getIndex()
    {
    	$data = DB::table('navs') -> get();
        return view('admin.navcast.index',['data' => $data]);
    }
    public function getAdd()
    {
    	return view('admin.navcast.add');
    }
    public function postInsert(Request $request)
    {
    	$data = $request -> only('navname','enable');
    	$data['atime'] = time();
    	$res = DB::table('navs') -> insert($data);
    	if($res){
    		return redirect('admin/navcast/index') -> with('success','频道添加成功'); 
    	} else {
    		return back() -> withInput() -> with('error','频道添加失败');
    	}
    }
    public function getEdit($id){
    	$data = DB::table('navs') -> where('id',$id) -> first();
    	return view('admin.navcast.edit',['data' => $data]);
    }
    public function postUpdate(Request $request)
    {
    	$data = $request -> only('navname','enable');
    	$id = $request -> input('id');
    	$res = DB::table('navs') -> where('id',$id) -> update($data);
    	if($res) {
    		return redirect('admin/navcast/index') -> with('success','修改成功');
    	} else {
    		return back() -> with('error', '修改失败');
    	}
    }
    public function getDelete($id)
    {
    	$res = DB::table('navs') -> where('id',$id) -> delete();
    	if($res) {
    		return redirect('admin/navcast/index') -> with('success','频道删除成功');
    	} else {
    		return back() -> with('error','删除失败');
    	}
    }
}
