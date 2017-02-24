@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span style="float: left;"><i class="icon-table"></i>商品分类</span>
                    	<button type="button" class="btn btn-success" style="float:right;">新增用户</button>
                    </div>
                    <script type="text/javascript">
                    	var btn = document.getElementsByClassName('btn-success');
                    	// btn返回的是一个数组对象，不能直接操作
                    	btn[0].onclick = function(){
                    		window.location.href = '/admin/product/cate/add';
                    	}
                    </script>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_0_length" class="dataTables_length"><label>
                         <form action="/admin/product/cate" method="get">
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
                        <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                                分类编号
                                </th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 194px;">
                                分类名称
                                </th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">
                                所属父级分类编号
                                </th>
                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 127px;">操作</th>
                               </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($arr as $k => $v)
	                        <tr class="odd">
	                            <td class="  sorting_1">{{ $v['id'] }}</td>
	                            <td class=" ">{{ $v['cname'] }}</td>
	                            <td class=" ">{{ $v['pname'] }}</td>
	                            <td class=" ">
	                            	<a href="/admin/product/cate/edit/{{ $v['id'] }}" style="color: black;font-size: 19px;padding-left: 20px;"><i class="icon-feather"></i></a>
	                            	<a href="/admin/product/cate/delete/{{ $v['id'] }}" style="color: black;font-size: 19px;padding-left: 20px;"><i class="icon-trash"></i></a>
	                            	<a href="/admin/product/cate/add/{{ $v['id'] }}" style="color: black;font-size: 19px;padding-left: 20px;"><i class="icon-plus"></i></a>
	                            </td>
	                        </tr>
	                        @endforeach
                                </tbody></table>

                    </div>
                </div>




@endsection


