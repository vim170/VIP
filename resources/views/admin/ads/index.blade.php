@extends('admin.layout.index')
@section('css')
<link rel="stylesheet" href="/resources/pageinate.css">
@endsection
@section('title')
	{{ Config::get('app.title') }}
@endsection

@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span style="float:left;"><i class="icon-table"></i>广告列表</span>
                    	<button type="button" class="btn btn-success" style="float:right;">新增广告</button>
                    </div>
                    <script type="text/javascript">
                    	var btn = document.getElementsByClassName('btn-success');
                    	// btn返回的是一个数组对象，不能直接操作
                    	btn[0].onclick = function(){
                    		window.location.href = '/admin/ads/add';
                    	}
                    </script>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                            <div id="DataTables_Table_1_length" class="dataTables_length">
                            <label>
                            <form action="/admin/ads/index" method="get">
                            显示 
                                <select size="1" name="count" aria-controls="DataTables_Table_1">
                                <option value="10" @if(!empty($request['count']) && $request['count'] == 10) selected @endif>10</option>
                                <option value="25" @if(!empty($request['count']) && $request['count'] == 25) selected @endif>25</option>
                                <option value="50" @if(!empty($request['count']) && $request['count'] == 50) selected @endif>50</option>
                                <option value="100" @if(!empty($request['count']) && $request['count'] == 100) selected @endif>100</option>
                            </select> 条</label>

                        </div>
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">
                                <label>搜索url: <input type="text" aria-controls="DataTables_Table_1" name="search" value="{{ $request['search'] or ''}}"></label>
                                <input type="submit" value="提交">
                        </div>
                        </form>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">广告列表编号</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 194px;">广告位置</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">广告logo</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 127px;">广告链接</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 127px;">ord</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 127px;">启用状态</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 93px;">操作</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">

                            @foreach($data as $k=>$v)
                            <tr class="odd" style="text-align: center;">
                                <td class="sorting_1">{{ $v['id'] }}</td>
                                <td class="">
                                @if($v['position']==1) 首页头部广告 @endif
                                @if($v['position']==2) 首页公告栏广告 @endif
                                @if($v['position']==3) 所有页面尾部显示 @endif
                                @if($v['position']==4) 所有页面头部显示 @endif
                                @if($v['position']==5) 焦点图位置显示 @endif
                                </td>
                                <td class="sorting_1"><img src="{{$v['logo']}}" alt="" style="width:70px;"></td>
                                <td class="sorting_1">{{ $v['url'] }}</td>
                                <td class="sorting_1">{{ $v['ord'] }}</td>
                                <td class="sorting_1">{{ $v['enabled'] }}</td>
                                <td class="sorting_1" style="text-align:center;">
                                    <a href="/admin/ads/edit/{{ $v['id'] }}" title="修改" style="color: black;padding-left: 5px;font-size: 17px;"><i class="icon-feather"></i></a>
                                    <a href="/admin/ads/delete/{{ $v['id'] }}" title="删除" style="color: black;padding-left: 20px;font-size: 17px;"><i class="icon-trash"></i></a>
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