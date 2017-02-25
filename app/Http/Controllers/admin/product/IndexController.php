<?php

namespace App\Http\Controllers\admin\product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
   public function getIndex(Request $request)
   {

      $count = $request -> input('count',10);
      $search = $request -> input('search');
      // 在添加页面必须选择分类与品牌
      $data = DB::table('product as p')
              ->join('product_cate as c','p.cid','=','c.id')
              ->join('brand as b','p.brandid','=','b.id')
              ->select('p.*','c.cname','b.brandname')
              ->where('name','like','%'.$search.'%')
              ->paginate($count);
      return view('admin.product.index',['data' => $data,'request' => $request]);
   }
   /**
    * 添加商品
    *
    * @return     跳转到分类页面
    */
   public function getAdd()
   {
      // 获取分类列表
      $cate = DB::table('product_cate') -> get();
      // 获取规格数据
      $quali = DB::table('product_qualifi') -> get();
      // 获取品牌数据
      $brand = DB::table('brand') -> get();
      // 将数据分配过去
      return view('admin.product.add',['cate' => self::getCate('product_cate','cname'),'quali' =>self::getCate('product_qualifi','qname'),'brand' => $brand]);
   }
   /**
    * 插入数据
    *
    * @param      使用Request对象获得前台URI传值
    *
    * @return     如果插入成功返回列表页，否则则留在当前页面，并且提示信息
    */
   public function postInsert(Request $request)
   {
      // 组织product表中的数据
      $data = $request -> except('_token','logo','detlogo2','detlogo1','detlogo3','detlogo4','detlogo5');
      // 向数组中加入创建时间
      $atime = time();
      $data['atime'] = $atime;
      // 向product表中插入数据，并且返回刚插入的id
      $id = DB::table('product') -> insertGetId($data);
      if($id) {
          // 组织图片表数据product_gallery
          $gallery = [];
          // 使用刚获得的id向数据表中插入数据
          $gallery['pid'] = $id;
          $gallery['logo'] = self::moveImage('logo',$request);
          $gallery['detlogo1'] = self::moveImage('detlogo1',$request);
          $gallery['detlogo2'] = self::moveImage('detlogo2',$request);
          $gallery['detlogo3'] = self::moveImage('detlogo3',$request);
          $gallery['detlogo4'] = self::moveImage('detlogo4',$request);
          $gallery['detlogo5'] = self::moveImage('detlogo5',$request);
          $res = DB::table('product_gallery') -> insert($gallery);
          if($res) {
            return redirect('/admin/product/index') -> with('success','添加商品成功');
          } else {
            return back() -> with('error','上传图片失败,请重新上传');
          }
      } else {
        return back() -> with('error','添加商品失败');
      }
   }

   /**
    * 编辑页面
    *
    * @param      int  $id     需要编辑的页面
    *
    * @return     编辑页面
    */
   public function getEdit($id)
   {
      // 获取品牌
      $brand = DB::table('brand') -> get();
      // 使用$id 与product_cate,brand关联查询
      $data = DB::table('product') -> where('id',$id) -> first();
      $gallery = DB::table('product_gallery') -> where('pid',$id) -> first();
      return view('admin.product.edit',['cate' => self::getCate('product_cate','cname'),'quali' =>self::getCate('product_qualifi','qname'),'brand' => $brand,'data' => $data,'gallery' => $gallery]);
   }

   /**
    * 更新商品数据
    *
    * @param      Request对象获取前台URI传值
    */
   public function postUpdate(Request $request)
   {
      // 组织product表中的数据
      $data = $request -> except('_token','logo','detlogo2','detlogo1','detlogo3','detlogo4','detlogo5');
      $id = $request -> input('id');
      $res = DB::table('product') -> where('id',$id) -> update($data);
      $img = DB::table('product_gallery') -> where('pid',$id) ->first();
      if($res) {
        $gallery = [];
        // 使用刚获得的id向数据表中插入数据
        $gallery['logo'] = self::moveImage('logo',$request);
        $gallery['logo'] = empty($gallery['logo']) ? $img['logo'] : $gallery['logo'];
        $gallery['detlogo1'] = self::moveImage('detlogo1',$request);
        $gallery['detlogo1'] = empty($gallery['detlogo1']) ? $img['detlogo1'] : $gallery['detlogo1'];
        $gallery['detlogo2'] = self::moveImage('detlogo2',$request);
        $gallery['detlogo2'] = empty($gallery['detlogo2']) ? $img['detlogo2'] : $gallery['detlogo2'];
        $gallery['detlogo3'] = self::moveImage('detlogo3',$request);
        $gallery['detlogo3'] = empty($gallery['detlogo3']) ? $img['detlogo3'] : $gallery['detlogo3'];
        $gallery['detlogo4'] = self::moveImage('detlogo4',$request);
        $gallery['detlogo4'] = empty($gallery['detlogo4']) ? $img['detlogo4'] : $gallery['detlogo4'];
        $gallery['detlogo5'] = self::moveImage('detlogo5',$request);
        $gallery['detlogo5'] = empty($gallery['detlogo5']) ? $img['detlogo5'] : $gallery['detlogo5'];
        $gall = DB::table('product_gallery') -> where('pid',$id) ->update($gallery);
        if($gall) {
          return redirect('/admin/product/index') -> with('success','修改商品信息成功');
        } else {
          return back() -> with('error','上传图片失败,请重新上传');
        }
        
      } else {
        return back() -> with('error','修改商品信息失败');
      }
   }
   // /**
   //  * 上传图片的默认值，如果未上传图片则使用之前的图片，否则更新
   //  *
   //  * @param      Array   $data     数据表中字段
   //  * @param      Array   $defalut  射之前的默认值
   //  */
   // public static function setDefault($data,$defalut,$request)
   // {
   //    $gallery = [];
   //    foreach ($data as $k => $val) {
   //        $gallery[$val] = self::moveImage($val,$request);
   //        $gallery[$val] = empty($gallery[$val]) ? $defalut[$val] : $gallery[$val];

   //    }
   //    return $gallery;
   // }
   /**
    * 验证用户选择的分类
    * 
    */
   public function postVerify(Request $request)
   {
      $id = $request -> input('id');

      $res = DB::table('product_cate') -> where('pid',$id) -> first();
      if($res) {
        // 若该分类下没有子类，则返回1
        return 1;
      } else {
        // 若该分类下有子类，则返回2
        return 2;
      }
   }
   /**
    * 批量删除记录
    *
    * @param      使用Request对象来接受客户端URI传值
    */
   public function postDeleteall(Request $request)
   {
      $data = $request -> only('del');
      $res = DB::table('product') -> whereIn('id',$data['del']) -> delete();
      if($res) {
        return redirect('/admin/product/index') -> with('success','批量删除成功');
      } else {
        return back() -> with('error','批量删除失败');
      }
   }
   /**
    * 无刷新删除数据
    */
   public function postDelete(Request $request)
   {
      $id = $request -> input('id');
      $res = DB::table('product') -> where('id',$id) -> delete();
      if($res) {
        return 1;
      } else {
        return 0;
      }
   }

   /**
    * 分类显示格式
    * 
    * @param  int           $table   数据表名
    * @param  string        $name     分类名
    *
    * @return     格式化后的数据
    */
   public static function getCate($table,$name)
   {
        // 确保首页子类显示以层级关系排序显示
        $data = DB::table($table) -> select(DB::raw("*,concat(path, ',',id) as paths")) -> OrderBy('paths')-> get();
        foreach ($data as $key => $value) {
            $l = substr_count($value['path'], ',');
            $data[$key][$name] = str_repeat('|---- ', $l) . $value[$name];
            // 列表页中显示父级分类名字
            if($value['pid'] == 0){
                $data[$key]['pname'] = '顶级分类';
            } else {
                $arr = DB::table($table) -> where('id',$value['pid']) -> first();
                $data[$key]['pname'] = $arr[$name];

            }
        }
        return $data;
   }

   /**
    * 处理图片上传
    */
   public static function moveImage($logoname,Request $request)
   {
      // 判断是否有文件上传
      if($request -> hasFile($logoname)){
        // 获取文件后缀名
        $ext = $request -> file($logoname) -> getClientOriginalExtension();
        // 拼接完整路径
        $destinationPath = './upload/'.date('Ymd',time());
        $filename = md5(time().rand(10000,99999)).'.'.$ext;
        // 将上传的商品上传至upload文件夹下
        $request -> file($logoname) -> move($destinationPath,$filename);
        // 获取上传文件的完整的路径larval框架下使用绝对路径
        $destination = strstr($destinationPath,'/');
        $imgname = $destination.'/'.$filename;
        return $imgname;
      } else {
        // 如果没有文件上传则返回''
        return '';
      }
    }
}
