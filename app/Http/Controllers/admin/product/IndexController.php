<?php

namespace App\Http\Controllers\admin\product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class IndexController extends Controller
{
   public function getIndex()
   {
        return view('admin.product.index');
   }
   public function getAdd()
   {
      // 获取分类列表
      $cate = DB::table('product_cate') -> get();
      // 获取规格数据
      $quali = DB::table('product_qualifi') -> get();
      // 获取品牌数据
      $brand = DB::table('brand') -> get();
      dd($brand);
      return view('admin.product.add',['cate' => self::getCate('product_cate','cname'),'quali' => self::getCate('product_qualifi','qname'),'brand' => $brand]);
   }
   public function postInsert(Request $request)
   {
        $data = $request -> all();
        dd($data);
        // return view();
   }



   /**
    * 分类显示格式
    * 
    * @param  int           $count   每页显示条数
    * @param  string        $search  关键字
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
}
