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
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/brand/insert" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">品牌名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" style="width: 430px;" name="brandname">
    				</div>
    			</div>


    			<div class="mws-form-row">
    				<label class="mws-form-label">频道列表</label>
    				<div class="mws-form-item">
    					<select class="large" name="navid" style="width: 430px;">
	    					<option value="0">请选择</option>
	    					@foreach($navs as $k => $v)
	    						<option value="{{ $v }}">{{ $k }}</option>
	    					@endforeach
    						
    					</select>
    				</div>
    			</div>
               

    			<script type="text/javascript">
    				//下面用于图片上传预览功能
    				function setImagePreview(doc,preview) {
    				var docObj=document.getElementById(doc);
    				 
    				var imgObjPreview=document.getElementById(preview);
    				if(docObj.files &&docObj.files[0])
    				{
    				//火狐下，直接设img属性
    				imgObjPreview.style.display = 'block';
    				imgObjPreview.style.width = '270px';
    				imgObjPreview.style.height = '200px'; 
    				//imgObjPreview.src = docObj.files[0].getAsDataURL();
    				 
    				//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
    				imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
    				}
    				else
    				{
    				//IE下，使用滤镜
    				docObj.select();
    				var imgSrc = document.selection.createRange().text;
    				var localImagId = document.getElementById("localImag");
    				//必须设置初始大小
    				localImagId.style.width = "270px";
    				localImagId.style.height = "200px";
    				//图片异常的捕捉，防止用户修改后缀来伪造图片
    				try{
    				localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
    				localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
    				}
    				catch(e)
    				{
    				alert("您上传的图片格式不正确，请重新选择!");
    				return false;
    				}
    				imgObjPreview.style.display = 'none';
    				document.selection.empty();
    				}
    				return true;
    				}
    				 
    			</script>
				
			    <div class="mws-form-row">
					<label class="mws-form-label" style="text-align">品牌logo</label>
					<div class="mws-form-item clearfix">
						<img id="preview" src="" width="270" height="200" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
						<p class="mat5">
						<input type="file" name="brandlogo" id="doc" style="width:170px;" onchange="javascript:setImagePreview('doc','preview');">
						</p>
					</div>
				</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label" style="text-align">广告图片</label>
                        <div class="mws-form-item clearfix">
                            <img id="preview1" src="" width="270" height="200" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
                            <p class="mat5">
                            <input type="file" name="adslogo" id="doc1" style="width:170px;" onchange="javascript:setImagePreview('doc1','preview1');">
                            </p>
                        </div>
                    </div>
    			<div class="mws-form-row" style="text-align: left;">
					<label class="mws-form-label" style="text-align: left">参加&nbsp;&nbsp;&nbsp;</label>
					<div class="mws-form-item">
	                	<ul class="mws-form-list inline">
	                    	<li>
		                    	<input id="gender_male" type="radio" name="state" class="required" value="1" checked> 
		                    	<label for="gender_male" style="text-align: left">特卖会</label>
	                    	</li>
	                    	<li>
	                    		<input id="gender_female" type="radio" name="state" value="2"> 
	                    		<label for="gender_female">预售</label>
	                    	</li>
	                    </ul>
	                    <label for="gender" class="error plain" generated="true" style="display:none"></label>
					</div>
				</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label" style="text-align">新品特卖</label>
    				<div class="mws-form-item clearfix">
						<!--1为不参加，而未参加-->
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
    				    <script id="container" name="brandcontent" type="text/plain">

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
    			<input type="submit" value="提交" class="btn btn-danger" id="sub">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
        <!--表单验证，代写-->
      <!--   <script type="text/javascript">
          $('#sub').click(function(){
              console.log($('.large').nextAll().val());
          })
          
      </script> -->


    </div>    	
</div>
@endsection