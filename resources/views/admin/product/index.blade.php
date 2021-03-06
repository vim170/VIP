@extends('admin.layout.index')
@section('css')
<link rel="stylesheet" href="/resources/pageinate.css">
<meta name="_token" content="{{ csrf_token() }}"/>
@endsection
@section('title')
	{{ Config::get('app.title') }}
@endsection
@section('js')
<link rel="stylesheet" href="/resources/calendar/jquery-ui.css">
<script src="/resources/calendar/jquery-1.12.4.js"></script>
<script src="/resources/calendar/jquery-ui.js"></script>
@endsection
@section('content')
	
    <div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span style="float:left;"><i class="icon-table"></i>商品列表</span>
        <button type="button" class="btn btn-success" style="float:right;">新增商品</button>
    </div>
    <script type="text/javascript">
        var btn = document.getElementsByClassName('btn-success');
        // btn返回的是一个数组对象，不能直接操作
        btn[0].onclick = function(){
            window.location.href = '/admin/product/add';
        }
    </script>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>
       <form action="/admin/product/index" method="get">
               显示 
                   <select size="1" name="count" aria-controls="DataTables_Table_1">
                   <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif>10</option>
                   <option value="25" @if(!empty($request['count']) && $request['count'] == 25) selected @endif>25</option>
                   <option value="50" @if(!empty($request['count']) && $request['count'] == 50) selected @endif>50</option>
                   <option value="100" @if(!empty($request['count']) && $request['count'] == 100) selected @endif>100</option>
               </select> 条</label>

           </div>
           <div class="dataTables_filter" id="DataTables_Table_1_filter">
                   <label>Search: <input type="text" aria-controls="DataTables_Table_1" name="search" value="{{ $request['search'] or ''}}"></label>
                   <input type="submit" value="提交">
           </div>
           </form>
           <form action="/admin/product/deleteall" method="post">
           {{ csrf_field() }}
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row" style="text-align: center;">
					<th> </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品编号
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品名称
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品品牌
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品分类
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品描述
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品状态
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        售出/库存
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        商品单价
                    </th>
                     <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        操作
                    </th>
                </tr>
            </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all" class="bo">
        @foreach($data as $k => $v)
                <tr style="text-align: center;">
                		<td><input type="checkbox" name="del[]" value="{{ $v['id'] }}" class="delall"></td>
                        <td class="">{{ $v['id'] }}</td>
                        <td class="  sorting_1">{{ $v['name'] }}</td>
                        <td class=" ">{{ $v['brandname'] }}</td>
                        <td class=" ">{{ $v['cname'] }}</td>
                        <td class=" ">{{ $v['productdesc'] }}</td>
                        <td class=" ">@if($v['status'] == 1)上架@elseif($v['status'] == 2)下架@else @endif</td>
                        <td class=" ">{{ $v['goodssellnum'] }}/{{ $v['goodsreper'] }}</td>
                        <td class=" ">{{ $v['goodprice'] }}&nbsp;&nbsp;<span class="btn btn-primary" style="width: 15px;height:10px;padding-left:3px;color: yellow;line-height: 10px">{{ $v['discount'] }}</span></td>
                        <td class=" ">
                            <a href="/admin/product/edit/{{ $v['id'] }}" title="修改" style="color: black;padding-left: 15px;font-size: 17px;"><i class="icon-feather"></i></a>
                            <a href="javascript:;" id="{{ $v['id'] }}" title="删除" style="color: black;padding-left: 15px;font-size: 17px;" class="del"><i class="icon-trash"></i></a>
                        </td>

                </tr>

        @endforeach
        <script type="text/javascript">
            // 隔行换色
            $('tr:odd').attr('class','odd')
            $('tr:even').attr('class','even')
            // 遍历所有class为.del的元素，并且为每个元素执行一个函数
           $('.del').each(function(){
                $(this).click(function(){
                    var id = $(this).attr('id')
                    // 闭包，对于函数内部来说，父函数的变量可见
                    var tr = $(this).parent().parent()
                    $.ajax({
                        headers: {

                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                        },
                        url:'/admin/product/delete',
                        type:'post',
                        data: {id:id},
                        // 服务器返回值得类型
                        dataType: "text",
                        async:false,
                        success:function(msg){
                            // 如果能够删除
                            if(msg == 0) {
                                 // 并不能在此使用$(this)
                               tr.fadeOut(300).fadeIn(300);
                            }
                            // 如果能够删除
                            if(msg == 1) {
                                // 并不能在这里使用$(this)
                                tr.fadeOut(200)
                                tr.remove()
                            }
                            

                        },
                       
                    })
                })
                
            })
            
        </script>

        </tbody>
        </table>
        <input type="checkbox" name="delall" value="checkall" id="delall" onclick="checkall(this,'del')">
        <input type="submit" value="批量删除">
        </form>
        <div class="pageinate">
			{!! $data -> appends(['request' => $request])->render() !!}         	
        </div>
    </div>
</div>
@endsection
