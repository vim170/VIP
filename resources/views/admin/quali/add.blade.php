@extends('admin.layout.index')
@section('content')
		<div class="mws-panel">
	        <div class="mws-panel-header">
	            <span>新增分类</span>
	        </div>
	        <div class="mws-panel-body no-padding">
	            <form class="mws-form" action="/admin/product/quali/insert" method="post">
	            {{ csrf_field() }}
	                <div class="mws-form-inline">
	                  	<div class="mws-form-row">
	                        	<label class="mws-form-label">分类名称</label>
	                        	<div class="mws-form-item notice">
	                            	<input type="text" name="qname" style="width: 300px;">
	                            </div>
	                            <!-- <span class="mws-form-label" style="color: red;float:left;">请填写类名称</span> -->
	                        </div>
	                    <div class="mws-form-row">
	                        <label class="mws-form-label">所属分类</label>
	                        <div class="mws-form-item">
	                            <select name="pid" style="width: 300px;" class="caca">
	                            	<option value="0">||--顶级分类--||</option>
	                            	@foreach($data as $k => $v)
	                                	<option value="{{ $v['id'] }}" @if($v['id'] == $id) selected @endif>{{ $v['qname'] }}</option>
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
	                		var cate = $("input[name='qname']")
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