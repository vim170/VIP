@extends('admin.layout.index')
@section('content')
 
  <script type="text/javascript" src="static/js/image.js"></script>
</head>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-magic"></i>友情添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div class="wizard-nav wizard-nav-horizontal"><ul></ul></div>
        <form class="mws-form wzd-default wizard-form wizard-form-horizontal" action="/admin/frilinks/update" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            <fieldset class="wizard-step mws-form-inline" data-wzd-id="wzd_1b93l7c9q11v71i3r1bue_0" style="display: block;">
                <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i> Member Profile</legend>
                <div id="" class="mws-form-row">
                <!-- 遍历所查询的数据 在默认值出显示值 -->
                   @foreach($edit as $k=>$v)
                   <input type="hidden" name="id" value="{{$v['id']}}">
                    <label class="mws-form-label"><font style="font-size:15px;font-weight:bold;">友情名称：</font> <span class="required">*</span></label>
                  
                    <div class="mws-form-item">
                        <input type="text" name="name" value="{{$v['name']}}" class="required large">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font style="font-size:15px;font-weight:bold;">友情URL：</font> <span class="required">*</span></label>
                    <div class="mws-form-item">
                        <input type="text" name="url" value="{{$v['url']}}"  class="required email large">
                    </div>
                </div>

                   <hr>   
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

                <div class="mws-form-row">
                    <label class="mws-form-label"><font style="font-size:15px;font-weight:bold;">描述 </font><span class="required">*</span></label>
                    <div class="mws-form-item">
                        <textarea name="title"  rows="" cols="" class="required large">{{$v['title']}}</textarea>
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label"><font style="font-size:15px;font-weight:bold;">友情开关：</font> <span class="required">*</span></label>
                    <div class="mws-form-item">
                      <input type="radio" name="status"  value="1" class="required email large" @if(!empty($v['status']) && $v['status'] == 1) checked @endif>
                        <font style="font-size:20px;font-family:华文行楷">启用</font>
                      <input type="radio" name="status" value="2"  class="required email large" @if(!empty($v['status'])  && $v['status'] == 2) checked @endif>
                        <font style="font-size:20px;font-family:华文行楷">禁止</font>
                    </div>
                </div>
                  @endforeach
            </fieldset>
        	<div class="mws-button-row">
    			<input type="submit" value="编辑" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>
</div>
@endsection