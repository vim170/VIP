@extends('admin.layout.index')

@section('content')
@section('css')
<link rel="stylesheet" href="/resources/pageinate.css">
@endsection

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span style="float:left;"><i class="icon-table"></i>友情链接列表</span>
        <button type="button" class="btn btn-success" style="float:right;">新增友情链接</button>
    </div>
    <script type="text/javascript">
        var btn = document.getElementsByClassName('btn-success');
        // btn返回的是一个数组对象，不能直接操作
        btn[0].onclick = function(){
            window.location.href = '/admin/frilinks/add';
        }
    </script>
    <div class="mws-panel-body no-padding">
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
    <div id="DataTables_Table_1_length" class="dataTables_length">
   <form action="/admin/frilinks/index" method="get">
        <label>显示
            <select size="1" name="count" aria-controls="DataTables_Table_1">
                <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif >10</option>
                <option value="25" @if(!empty($request['count']) && $request['count'] ==25) selected @endif>25</option>
                <option value="50" @if(!empty($request['count']) && $request['count'] == 50) selected @endif >50</option>
                <option value="100" @if(!empty($request['count']) && $request['count'] == 100) selected @endif>100</option>
            </select> 条
        </label>
        </div>
        <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>关键字: 
        <input type="text" value="{{$request['search'] or ''}}" name="search" aria-controls="DataTables_Table_1"><input type="submit" value="搜索">
    </form>
    </label></div>
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 156px;">ID</th>
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 156px;">友情名称</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 212px;">友情URL</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">友情Logo</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">友情描述</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">状态</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">操作</th>
                </tr>

            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($data as $k=>$v)
            <tr class="odd">
                <td class=" sorting_1" style="width:50px;">{{ $v['id'] }}</td>
                <td class=" sorting_1">{{ $v['name'] }}</td>
                <td class=" ">{{ $v['url'] }}</td>
                <td class=" "><img src="{{$v['logo']}}" alt="" style="width:70px;"></td>
                <td class=" ">{{ $v['title'] }}</td>
                <td class=" ">@if($v['status'] == 1) 启用 @elseif($v['status'] ==2) 禁用 @else @endif </td>
                <td class=" ">
                    <a href="/admin/frilinks/delete/{{$v['id']}}" style="color:black;font-size:18px" title="删除" onclick="return confirm('您确定要删除吗? 亲')"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <a href="/admin/frilinks/edit/{{$v['id']}}" style="color:black;font-size:18px" title="编辑"><i class="icon-pencil"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="pageinate">
        {!! $data -> appends($request)->render() !!}
        </div>
        <script type="text/javascript">
            var pagination = document.getElementsByClassName('pagination');
            // alert(pagination);
        </script>
       </div>
    </div>
</div>
@endsection