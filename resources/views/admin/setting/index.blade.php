@extends("admin.layout.index")

@section("content")
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
                    	<span style="float:left;"><i class="icon-table"></i>网站配置</span>
                    </div>
                    <script type="text/javascript">
                    	var btn = document.getElementsByClassName('btn-success');
                    	// btn返回的是一个数组对象，不能直接操作
                    	btn[0].onclick = function(){
                    		window.location.href = '/admin/setting/add';
                    	}
                    </script>
     <div class="mws-panel-body no-padding">


          <form action="/admin/setting/update" method="post" enctype="multipart/form-data" class="mws-form">
               {{csrf_field()}}
               
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">网站标题</label>
                         <div class="mws-form-item">
                              <input type="text" name="title" class="small" value="{{ $data[0]['svalue'] }}">
                         </div>
               </div>
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">网站版权</label>
                         <div class="mws-form-item">
                              <input type="text" name="copy" class="small" value="{{ $data[1]['svalue'] }}">
                         </div>
               		</div>
               		<div class="mws-form-row">
                         <label class="mws-form-label">网站描述</label>
                         <div class="mws-form-item">
                              <textarea name="description" id="" cols="60" rows="10" style="resize:none;">{{ $data[2]['svalue'] }}</textarea>
                         </div>
               		</div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">网站关键字</label>
                         <div class="mws-form-item">
                              <input type="text" name="keywords" class="small" value="{{ $data[3]['svalue'] }}">
                         </div>
               		</div>
               <div style="width:120px; height:100px;float:right;margin-right:200px;" id="imgPreview">
				<img src="{{$data[5]['svalue']}}" alt="" class="logoimg" @if($data[5]['svalue']=='') style="display:none;" @endif>

                    </div>
        			<div class="mws-form-row" style="width:610px;">
        				<label class="mws-form-label" for="pw">网站Logo</label>
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
     				<label class="mws-form-label">网站维护</label>
     				<div class="mws-form-item">
     					<select class="small" name="status">
                           	<option value="开启" @if($data[4]['svalue'] == "开启") selected @endif>开启</option>
     						<option value="关闭" @if($data[4]['svalue'] == "关闭") selected @endif>关闭</option>
     					</select>
     				</div>
     			</div>   
               <div class="mws-button-row">
                    <input type="submit" class="btn btn-danger" value="修改配置">
                    <input type="reset" class="btn " value="重置">
               </div>
          </form>
     </div>         
 </div>
@endsection
