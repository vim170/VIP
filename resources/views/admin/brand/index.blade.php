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
<script type="text/javascript" src="/resources/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    
</script>
@endsection
@section('content')
	
    <div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span style="float:left;"><i class="icon-table"></i> Data Table with Numbered Pagination</span>
        <button type="button" class="btn btn-success" style="float:right;">新增用户</button>
    </div>
    <script type="text/javascript">
        var btn = document.getElementsByClassName('btn-success');
        // btn返回的是一个数组对象，不能直接操作
        btn[0].onclick = function(){
            window.location.href = '/admin/brand/add';
        }
    </script>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <div id="DataTables_Table_1_length" class="dataTables_length">
        <label>Show 
            <select size="1" name="DataTables_Table_1_length" aria-controls="DataTables_Table_1">
                <option value="10" selected="selected">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            entries
        </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>Search: 
                <input type="text" aria-controls="DataTables_Table_1">
                </label>
            </div>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row" style="text-align: center;">
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        品牌编号
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        品牌名称
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        所属频道
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        品牌logo
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        倒计时
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        参加预售会
                    </th>
                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        新品活动
                    </th>
                     <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        启用状态
                    </th>
                     <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">
                        操作
                    </th>
                </tr>
            </thead>
            <img src="" alt="">
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($data as $k => $v)
                <tr class="even" style="text-align: center;">
                        <td class="">{{ $data[$k]['id'] }}</td>
                        <td class="  sorting_1">{{ $data[$k]['brandname'] }}</td>
                        <td class=" ">{{ $data[0]['brandname'] }} 1.0</td>
                        <td class=" "><img src="{{ $data[$k]['brandlogo'] }}" alt="{{ $data[0]['brandname'] }}" style="width: 200px;height: 60px;" /></td>
                        <td class=" ">{{ $data[$k]['countdown'] }}</td>
                        <td class=" ">{{ $data[$k]['state'] }}</td>
                        <td class=" ">{{ $data[$k]['isnew'] }}</td>
                        <td class=" ">{{ $data[$k]['enabled'] }}</td>
                        <td class=" ">
                            <a href="admin/brand/edit" title="修改" style="color: black;padding-left: 15px;font-size: 17px;"><i class="icon-feather"></i></a>
                            <a href="javascript:;" id="{{ $data[$k]['id'] }}" title="删除" style="color: black;padding-left: 15px;font-size: 17px;" class="del"><i class="icon-trash"></i></a>
                        </td>
                </tr>
        @endforeach
        <script type="text/javascript">
           $('.del').each(function(){
                $(this).click(function(){
                    var id = $(this).attr('id')
                    $.ajax({
                        headers: {

                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                        },
                        url:'/admin/brand/delete',
                        type:'post',
                        data: {id:id},
                        dataType: "text",
                        success:function(msg){
                            alert(msg);
                        }

                    })
                })
                
            })
        </script>
        </tbody></table><div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a><a tabindex="0" class="paginate_button">3</a><a tabindex="0" class="paginate_button">4</a><a tabindex="0" class="paginate_button">5</a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">Next</a><a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">Last</a></div></div>
    </div>
</div>
@endsection
