@extends('admin.layout.index')

@section('title')
{{ Config::get('app.title') }}
@endsection
@section('content')
	{{-- {{ session('error') }} --}}
	@if (count($errors) > 0)
    <div class="mws-form-message error">
    	错误提示
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>新增广告</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/ads/insert" method="post" enctype="multipart/form-data">
        	{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label" for="name">广告位置</label>
        				<div class="mws-form-item">
        					<select class="small" name="position">
                                <option value="">--请选择--</option>
                                <option value="1">首页头部广告</option>
                                <option value="2">首页公告栏广告</option>
                                <option value="3">所有页面尾部显示</option>
                                <option value="4">所有页面头部显示</option>
                                <option value="5">焦点图位置显示</option>
                            </select>
        				</div>
        			</div>
                    <div style="width:120px; height:100px;float:right;margin-right:200px;" id="imgPreview">
                    </div>
        			<div class="mws-form-row" style="width:610px;">
        				<label class="mws-form-label" for="pw">广告Logo</label>
        				<div class="mws-form-item">
        					<input type="file" class="small" name="logo" onchange="PreviewImage(this)">
        				</div>
        			</div>

                    <script type="text/javascript">
                        function PreviewImage(imgFile) {
                            var filextension = imgFile.value.substring(imgFile.value.lastIndexOf("."), imgFile.value.length);
                            filextension = filextension.toLowerCase();
                            if ((filextension != '.jpg') && (filextension != '.gif')  && (filextension != '.jpeg') && (filextension != '.png') && (filextension != '.bmp')) {
                                alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
                                imgFile.focus();
                            }
                            else {
                                var path;
                                if (document.all)//IE
                                {
                                    imgFile.select();
                                    path = document.selection.createRange().text;
                      
                                    document.getElementById("imgPreview").innerHTML = "";
                                    document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果
                                }
                                else//FF
                                {
                                    path = window.URL.createObjectURL(imgFile.files[0]);
                                    document.getElementById("imgPreview").innerHTML = "<img id='img1' width='120px' height='100px' src='" + path + "'/>";
                                    // document.getElementById("img1").src = path;
                                }
                            }
                        }
                    </script>


        			<div class="mws-form-row" style="width:760px;">
        				<label class="mws-form-label" for="repw">广告链接</label>
        				<div class="mws-form-item">
        					<input type="text" class="medium" name="url" value="">
        				</div>
        			</div>
                    <div class="mws-form-row" style="width:760px;">
                        <label class="mws-form-label" for="repw">ord</label>
                        <div class="mws-form-item">
                            <input type="text" class="medium" name="ord" value="1">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">广告状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" name="enabled" value="1" checked> <label>启用</label></li>
                                <li><input type="radio" name="enabled" value="2"> <label>禁用</label></li>
                            </ul>
                        </div>
                    </div>
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="添加" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection