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
}
