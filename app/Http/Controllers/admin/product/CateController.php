<?php

namespace App\Http\Controllers\admin\product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CateController extends Controller
{
   /**
    *  商品分类列表
    */
   public function getIndex(Request $request)
   {
        // paginate 可以查询数据并且分页
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        // $page = DB::table('product_cate') -> where('cname','like','%'.$search.'%') -> paginate($count);
        // 确保首页子类显示以层级关系排序显示
        $data = DB::table('product_cate') -> select(DB::raw("*,concat(path, ',',id) as paths")) -> where('cname','like','%'.$search.'%') -> OrderBy('paths')-> paginate($count);
        //因为$data是一个对象，其里面的items属性为受保护属性，并不能重新赋值，构造一个新数组，
        //用于接收$data里面的数组值，再对新构造的数组进行操作
         $arr = [];
        foreach ($data as $key => $value) {
            $arr[$key] = $value;
            $l = substr_count($value['path'], ',');
            $arr[$key]['cname'] = str_repeat('|---- ', $l) . $value['cname'];
            if($value['pid'] == 0){
                $arr[$key]['pname'] = '顶级分类';
            } else {
                $arra = DB::table('product_cate') -> where('id',$value['pid']) -> first();
                $arr[$key]['pname'] = $arra['cname'];

            }
        }
        // 待解决分页
        return view('admin.cate.index',['arr' => $arr]);
   }
   /**
    * 添加分类
    *
    * @param     使用Request对象接受前台的URI传值
    *
    * @return     跳转到分类添加页面               
    */

   public function getAdd($id=0)
   {
        return view('admin.cate.add',['data' => self::getCate(),'id' => $id]);
   }

   /**
    * 插入数据
    *
    * @param      使用Request对象接受前台URI传值
    *
    * @return     若插入成功，返回至列表页，否则留在当前页并且提示消息
    */
   public function postInsert(Request $request)
   {
        // 限制同意分类下不能够重名
        $cname = $request -> input('cname');
        $pid = $request -> input('pid');
        $name = DB::table('product_cate') -> where('cname',$cname)  -> where('pid',$pid) -> first();
        if($name) {
            return back() -> with('error','同一分类下不能重名');
        }
        // 接受前台传来的参数
        $arr = $request -> only('cname','pid');
        // 获取父级id的值，使用它查询父类的path
        $pid = $request -> input('pid');
        // dd($pid);
        
        // 如果是顶级分类，则path为0，否则需要对path进行拼接，拼接原则，父级id+父级path
        if($pid == 0) {
            $arr['path'] = 0;
        } else {
            // 查询path
            $data = DB::table('product_cate') -> where('id',$pid) -> first();
            // 取出path
            $path = $data['path'];
            $arr['path'] = $path . ',' . $data['id'];
        }
        // 将数据插入到product_cate数据表中
        $res = DB::table('product_cate') -> insert($arr);
        if($res) {
            return redirect('/admin/product/cate/index') -> with('success','添加分类成功');
        } else {
            return back() -> with('error','添加分类失败');
        }
   }

   public function getDelete($id)
   {
        // 判断将要删除的分类下是否有子分类
        $res = DB::table('product_cate') -> where('pid',$id) -> first();
        if($res) {
                return back() -> with('error','该分类下有子类,不能删除');
        } else {
            $data = DB::table('product_cate') -> where('id',$id) -> delete();
            if($data) {
                return redirect('/admin/product/cate') -> with('success','删除分类成功');
            } else {
                return back() -> with('error','删除分类失败');
            }
        }
   }


   /**
    * 编辑页面
    *
    * @param     int $id   该编辑的的分类id
    *
    * @return     跳转到分类编辑页面
    */

   public function getEdit($id)
   {
        $res = DB::table('product_cate') -> where('id',$id) -> first();
        return view('admin.cate.edit',['data' => self::getCate(),'res' => $res]);
   }

   /**
    * 商品分类编辑
    */
   public function postUpdate(Request $request)
   {
        // 接受前台的传值
        $para = $request -> only('pid','cname');
        $pid = $request -> input('pid');
        $id = $request -> input('id');
        // 拼接path
        if($pid == 0) {
            $para['path'] = 0;
        } else {
            $pa = DB::table('product_cate') -> where('id',$pid) -> first();
            $para['path'] = $pa['path'] . ',' . $pa['id'];
        }
        // 判断修改的类下是否有子类
        $res = DB::table('product_cate') -> where('pid',$id) -> first();
        if($res) {
            return back() -> with('error','该分类下有子类，不能编辑');
        } else {
            $data = DB::table('product_cate') -> where('id',$id) -> update($para);
            if($data) {
                return redirect('/admin/product/cate') -> with('success','编辑分类成功');

            } else {
                return back() -> with('error','编辑分类失败');
            }
        }
        
   }

   /**
    * 分类显示格式
    * 
    * @param  int           $count   每页显示条数
    * @param  string        $search  关键字
    *
    * @return     格式化后的数据
    */
   public static function getCate()
   {
        // 确保首页子类显示以层级关系排序显示
        $data = DB::table('product_cate') -> select(DB::raw("*,concat(path, ',',id) as paths")) -> OrderBy('paths')-> get();
        foreach ($data as $key => $value) {
            $l = substr_count($value['path'], ',');
            $data[$key]['cname'] = str_repeat('|---- ', $l) . $value['cname'];
            // 列表页中显示父级分类名字
            if($value['pid'] == 0){
                $data[$key]['pname'] = '顶级分类';
            } else {
                $arr = DB::table('product_cate') -> where('id',$value['pid']) -> first();
                $data[$key]['pname'] = $arr['cname'];

            }
        }
        return $data;
   }
}
