@extends('admin.layout.index')
@section('title')
	{{ Config::get('app.title') }}
@endsection
@section('css')
	<link rel="stylesheet" href="/resources/pageinate.css">
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
    	<span>品牌列表</span>
    </div>
    <div class="mws-panel-body no-padding" >
    	<form class="mws-form" action="/admin/brand/insert" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">品牌名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" style="width: 430px;">
    				</div>
    			</div>
				<script type="text/javascript">
					
				</script>

    			<div class="mws-form-row">
    				<label class="mws-form-label">频道列表</label>
    				<div class="mws-form-item">
    					<select class="large" name="navs" style="width: 430px;">
    						<option value="0">请选择</option>
    					</select>
    				</div>
    			</div>
				
    			
    			<div class="mws-form-row" style="text-align: left;">
					<label class="mws-form-label" style="text-align: left">参加&nbsp;&nbsp;&nbsp;</label>
					<div class="mws-form-item">
	                	<ul class="mws-form-list inline">
	                    	<li>
		                    	<input id="gender_male" type="radio" name="isnew" class="required" checked> 
		                    	<label for="gender_male" style="text-align: left">特卖会</label>
	                    	</li>
	                    	<li>
	                    		<input id="gender_female" type="radio" name="isnew"> 
	                    		<label for="gender_female">预售</label>
	                    	</li>
	                    </ul>
	                    <label for="gender" class="error plain" generated="true" style="display:none"></label>
					</div>
				</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label" style="text-align">新品特卖</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="checkbox" name="isnew" value="1"> <label>是</label></li>
    					</ul>
    				</div>
    			</div>
    			<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item">
	                	<ul class="mws-form-list inline">
	                    	<li><input id="gender_male" type="radio" name="enabled" value="1" class="required" checked> <label for="gender_male">出售</label></li>
	                    	<li><input id="gender_female" type="radio" name="enabled" value="2"> <label for="gender_female">下架</label></li>
	                    </ul>
	                    <label for="gender" class="error plain" generated="true" style="display:none"></label>
					</div>
				</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">截至日期</label>
    				<div class="mws-form-item">
    				<input type="text"  id="daterange" name="countdown" value="{{ date('Y-m-d') .' 17:00' }}" /><span style="color:gray;margin-left:5px;">17:00之前</span>
    			</div>
    			<script type="text/javascript">
				    $("#daterange").datepicker({
				    	showAnim: "fadeIn",
  						showOptions: { direction: "up" }
					});
				    $('#daterange').change(function(){
				        $(this).attr('value', $('#daterange').val());
				    });
    			</script>

    			<div class="mws-form-row">
    				<!-- 加载编辑器的容器 -->
    				    <script id="container" name="content" type="text/plain">

    				    </script>
    				    <!-- 配置文件 -->
    				    <script type="text/javascript" src="/resources/ueditor/ueditor.config.js"></script>
    				    <!-- 编辑器源码文件 -->
    				    <script type="text/javascript" src="/resources/ueditor/ueditor.all.js"></script>
    				    <!-- 实例化编辑器 -->
    				    <script type="text/javascript">
    				        var ue = UE.getEditor('container');
    				    </script>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection