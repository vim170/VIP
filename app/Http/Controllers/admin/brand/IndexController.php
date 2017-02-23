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
   public function getIndex(Request $request)
   {
   		// paginate 可以查询数据并且分页
   		$count = $request -> input('count',10);
   		$search = $request -> input('search','');
   		// 以频道表为主表，请默认为每个品牌选择一个频道，去除空的数据(品牌下可能没有品牌，去除这些数据)
   		$data = DB::table('navs')
   		            ->leftJoin('brand', 'navs.id', '=', 'brand.navid')
   		            ->whereNotNull('brand.id')
   		            ->where('brandname','like','%'.$search.'%')
   		            ->get();
        return view('admin.brand.index',['data' => $data,'request' => $request -> all()]);
   }


   public function getAdd()
   {
   		// 下拉菜单显示所有频道
	   	$navs = DB::table('navs') -> lists('id','navname');
	   	return view('admin.brand.add',['navs' => $navs]);
   }
   /**
    * 向数据表中插入数据
    *
    * @param      使用Request对象接受客户端URI传入的参数
    * @return     如果插入成功则返回列表页，否则留在当前页并提示信息
    */
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
   			// 如果修改品牌logo处理其路径
   			$data['brandlogo'] = $brandlogo;
   		}
   		// 获取当前时间戳
   		$atime = time();
   		// 将当前时间放入数组
   		$data['atime'] = $atime;
   		$data['countdown'] = $countdown;
   		// 将数据插入数据库
   		$res = DB::table('brand') -> insert($data);
   		if ($res) {
   			return redirect('admin/brand/index') -> with('success','添加品牌成功');
   		} else {
   			return back() -> with('error','添加品牌失败');
   		}
   		
   }
   /**
    * 编辑页面
    *
    * @param      int  $id    需要编辑的品牌id号
    *
    * @return    返回编辑页面
    */
   public function getEdit($id)
   {
   		
   		$data = DB::table('navs')
            ->leftJoin('brand', 'navs.id', '=', 'brand.navid')
            ->where('brand.id',$id)
            ->first();
        $navs = DB::table('navs') -> lists('navname','id');
   		return view('admin/brand/edit',['data'=> $data,'navs' => $navs]);
   }
   /**
    * 更新数据表中的数据
    */
   public function postUpdate(Request $request)
   {
   		// 将上传的倒计时时间转成时间戳
   		$countdown = strtotime($request -> input('countdown'));
   		// 处理上传过来的数据，以备存入数据库,使用except方法，因为前台可以有些字段并不提交
   		$data = $request -> except('_token');
   		// 接受需要修改的id
   		$id = $request -> input('id');

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
   			// 如果修改品牌logo处理其路径
   			$data['brandlogo'] = $brandlogo;
   		}

   		$data['countdown'] = $countdown;
   		// 将数据插入数据库
   		$res = DB::table('brand') -> where('id',$id) -> update($data);
   		if ($res) {
   			return redirect('admin/brand/index') -> with('success','修改品牌成功');
   		} else {
   			return back() -> with('error','修改品牌失败');
   		}
   		
   }
   /**
    * 删除内容，使用ajax方式
    */
   public function postDelete(Request $request)
   {
   		$id = $request -> input('id');
   		// 先查询该品牌下是否有相关商品，如果有则提示不能删除，如果没有就删除
   		$del = DB::table('product') -> where('brandid',$id) -> first();
   		if($del) {
   			return 0;
   		} else {
   			$res = DB::table('brand') -> where('id',$id) -> delete();
   			if($res) {
   				return $msg = 1;
   			}
   		}
   }
}
