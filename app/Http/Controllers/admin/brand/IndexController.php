<?php

namespace App\Http\Controllers\admin\brand;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
	/**
	 * 首页
	 * 
	 *
	 * @return    跳转到品牌列表
	 */
   public function getIndex()
   {
   		$data = DB::table('brand') -> get();
   		// dd($data);
   		// $data = DB::table('navs') -> where()
        return view('admin.brand.index',['data' => $data]);
   }


   public function getAdd()
   {
   	return view('admin.brand.add');
   }
   public function postInsert(Request $request)
   {


   		// 将上传的倒计时时间转成时间戳
   		$countdown = strtotime($request -> input('countdown'));
   		// 处理上传过来的数据，以备存入数据库,使用except方法，因为前台可以有些字段并不提交
   		$data = $request -> except('_token');

   		// 判断是否有文件上传
   		if($request -> hasFile('brandlogo')){
   			// 获取文件后缀名
   			$ext = $request -> file('brandlogo') -> getClientOriginalExtension();
   			// 拼接完整路径
   			$destinationPath = './upload/'.date('Ymd',time());
   			$filename = md5(time().rand(10000,99999)).'.'.$ext;
   			// 将上传的品牌logo上传至upload文件夹下
   			$request -> file('brandlogo') -> move($destinationPath,$filename);
   			// 获取上传文件的完整的路径larval框架下使用绝对路径
   			$destination = strstr($destinationPath,'/');
   			$brandlogo = $destination.'/'.$filename;
   			// 获取当前时间戳
   			$atime = time();
   			// 将当前时间放入数组
   			$data['atime'] = $atime;
   			// 如果修改品牌logo处理其路径
   			$data['brandlogo'] = $brandlogo;
   		}
   		// 将数据插入数据库
   		$res = DB::table('brand') -> insert($data);
   		if ($res) {
   			return redirect('admin/brand/index') -> with('success','添加品牌成功');
   		} else {
   			return back() -> with('error','添加品牌失败');
   		}
   		
   }
   /**
    * 删除内容，使用ajax方式
    */
   public function postDelete(Request $request)
   {
   		$id = $request -> input('id');
   		$res = DB::table('product') -> where('brandid',$id) -> first();
   		if($res) {
   			return $msg = '该品牌下有商品，您不能进行该操作';
   		} else {
   			$res1 = DB::table('brand') -> where('id',$id) -> delete();
   			if($res) {
   				return $msg = '可以删除';
   			}
   		}
   		// return $res;

   }
}
