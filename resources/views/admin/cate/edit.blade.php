@extends('admin.layout.index')



@section('content')


	<div class="mws-panel">
	                        <div class="mws-panel-header">
	                            <span>新增分类</span>
	                        </div>
	                        <div class="mws-panel-body no-padding">
	                            <form class="mws-form" action="/admin/product/cate/update" method="post">
	                            {{ csrf_field() }}
	                            <input type="hidden" name="id" value="{{ $res['id'] }}">
	                                <div class="mws-form-inline">
	                                  	<div class="mws-form-row">
      	                                	<label class="mws-form-label">分类名称</label>
      	                                	<div class="mws-form-item notice">
      	                                    	<input type="text" name="cname" style="width: 300px;" value="{{ $res['cname'] }}">
      	                                    </div>
      	                                    <!-- <span class="mws-form-label" style="color: red;float:left;">请填写类名称</span> -->
      	                                </div>
	                                    <div class="mws-form-row">
	                                        <label class="mws-form-label">所属分类</label>
	                                        <div class="mws-form-item">
	                                            <select name="pid" style="width: 300px;" class="caca">
	                                            	<option value="0">||--顶级分类--||</option>
	                                            	@foreach($data as $k => $v)
	                                                	<option value="{{ $v['id'] }}" @if($v['id'] == $res['pid']) selected @endif>{{ $v['cname'] }}</option>
	                                                @endforeach
	                                            </select>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="mws-button-row">
	                                    <input type="submit" value="提交" class="btn btn-danger">
	                                    <input type="reset" value="重置" class="btn ">
	                                </div>
	                                <script type="text/javascript">
	                                	$('.btn-danger').click(function(){
	                                		var cate = $("input[name='cname']")
	                                		if(cate.val() == 0) {
	                                			// 如果未填写分类名称，则在其后追加一个提示
	                                			// append是在匹配元素最后出追加元素
	                                			$(".notice").append("<label style='color:red;'>请填写分类名称</label>")
	                                			// 获取焦点
	                                			$("input[name='cname']").focus()
	                                			// 设置button按钮为disabled
	                                			// $(this).attr('disabled','true')
	                                			// 终止程序进行
	                                			return false
	                                		}
	                                			
	                                	})
	                                </script>
	                            </form>
	                        </div>
	                    </div>
@endsection