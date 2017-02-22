<?php

namespace App\Http\Controllers\admin\brand;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
   public function getIndex()
   {
        return view('admin.brand.index');
   }


   public function getAdd()
   {
   	return view('admin.brand.add');
   }
   public function postInsert(Request $request)
   {
   		// var_dump($_FILES('upload'));
   		// dd($request -> file('upload'));
   		// print_r($_FILES('upload'));
   		var_dump($request -> all());
   		$time = strtotime($_POST['countdown']);
   		var_dump($time);
   }
}
