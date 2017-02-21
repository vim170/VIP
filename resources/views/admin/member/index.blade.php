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
                    	<span style="float:left;"><i class="icon-table"></i>会员列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                            <div id="DataTables_Table_1_length" class="dataTables_length">
                            <label>
                            <form action="/admin/member/index" method="get">
                            显示 
                                <select size="1" name="count" aria-controls="DataTables_Table_1" id="foo">
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
                        <form action="/admin/member/deleteall" method="post">
                        {{ csrf_field() }}
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th></th>
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">用户id</th>
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 146px;">用户名</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 194px;">常用邮箱</th>
                                     <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 194px;">联系电话</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">注册日期</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">上次登录</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 93px;">操作</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        
                        @foreach($data as $k => $v)
                            <tr class="odd" style="text-align: center;">
                                <td><input type="checkbox" name="del[]" value="{{ $v['id'] }}" class="del"></td>
                                <td class="sorting_1">{{ $v['id'] }}</td>
                                <td class="">{{ $v['name'] }}</td>
                                <td class="sorting_1">{{ $v['email'] }}</td>
                                <td class="">{{ $v['phone'] }}</td>
                                <td class="sorting_1">{{ date('Y-m-d H:i:s',$v['atime']) }}</td>
                                <td class="">{{ date('Y-m-d H:i',$v['ltime']) }}</td>
                                <td class="sorting_1">
                                    <a href="/admin/member/edit/{{ $v['id'] }}" title="修改" style="color: black;padding-left: 15px;font-size: 17px;"><i class="icon-feather"></i></a>
                                    <a href="/admin/member/delete/{{ $v['id'] }}" title="删除" style="color: black;padding-left: 15px;font-size: 17px;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                        </table>
                        <input type="checkbox" name="delall" value="checkall" id="delall" onclick="checkall(this,'del')">
                        <input type="submit" value="批量删除">
                        <script type="text/javascript">
                           // checked属性比较特殊，使用hasAttribute和getAttribute函数并不能够获得
                            // // 当点击全选按钮时，全部选中，当再次点击全选按钮时，取消选中,以全选按钮的checked属性作为判断值
                            // var delall = document.getElementById('delall')
                            // var del = document.getElementsByClassName('del')
                            // delall.onclick = function(){
                            //     delall.setAttribute('checked',false);
                            //     console.log(delall.hasAttribute('checked'));
                            //     if(!delall.getAttribute('checked')){
                            //        for(var i = 0;i < del.length;i++){
                            //             del[i].setAttribute('checked', true)
                            //        }
                            //     }else{
                            //         for(var i = 0;i < del.length;i++){
                            //             del[i].setAttribute('checked',false);
                            //         }
                            //     }
                            // }

                            // if ($(_this).is(":checked")) {
                            //     $("input[name='"+inputname+"[]']").add("input[name='"+checkname+"']").attr("checked","checked");
                            // }
                            // else {
                            //     $("input[name='"+inputname+"[]']").add("input[name='"+checkname+"']").removeAttr("checked");
                            // }
                        </script>
                        <div class="pageinate">

                            {!! $data -> appends($request)->render() !!}

                        </div>
                        </form>
                        <script type="text/javascript">
                        // $(document).ready(function(){
                        //     $("select#foo").change(function(){
                        //         var v = $( "select#foo option:checked" ).val()
                        //         $.ajax({
                        //            type: "GET",
                        //            url: "/admin/member/count",
                        //            data: {'count':v},
                        //            dataType: 'json',
                        //            success: function($data){


                        //            }
                        //         });
                        //     })

                        // })
                            
                        </script>
                        </div>
                    </div>
                </div>


@endsection