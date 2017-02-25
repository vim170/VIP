@extends('admin.layout.index')
@section('css')
<meta name="_token" content="{{ csrf_token() }}"/>
<style type="text/css">
	table{
		border-spacing: 10px 10px;
		border-collapse: separate;
	}

	table tr td{
		width:350px;
		height: 40px;
		/*text-align: center;*/
	}
	table tr td label{
		font-size: 17px;
		color:black;
		text-align: center;
	}
	table tr td input {
		width: 160px;
	}
	table tr td:first-child{
		width:400px;
		/*text-align: center;*/
	}
	
</style>
<!--引入CSS-->
<link rel="stylesheet" type="text/css" href="/resources/webuploader-0.1.5/webuploader.css">
@section('js')
	<!--引入JS-->
	<script type="text/javascript" src="/resources/webuploader-0.1.5/webuploader.js"></script>
	<script type="text/javascript" src="/resources/verify.js"></script>
	
@endsection
@endsection
@section('content')
	<form action="/admin/product/update" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $data['id'] }}">
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>商品添加</span>
        </div>
        <table border="5px" style="border-color:gray;">
        	<tr>
        		<td >
        			<label for="name">商品名称</label>
        		</td>
        		<td >
        			<input type="text" id="name" value="{{ $data['name'] }}" name="name" class="name">
        		</td>
        		<script type="text/javascript">
        			$('#name').on('blur',function(){
        				if($(this).val() == ''){
        					// $(this).focus(function(){alert(1)})
        					$(this).attr('value','请输入商品名称').fadeIn()
        					$(this).text('请输入商品名称').fadeIn()

        					return false
        				} else {
        					return true
        				}	
        			})
        				
        		</script>
        		<td>
        			<label for="cname">商品分类</label>
        		</td>
        		<td>
        			<select name="cid" style="width: 160px;" id="cname">
        				<option value="0">请选择</option>
        				@foreach($cate as $k => $v)
        					<option value="{{ $v['id'] }}" @if($v['id'] == $data['cid']) selected @endif>{{ $v['cname'] }}</option>
        				@endforeach
        			</select>
        			<script type="text/javascript">
        					$('#cname').on('change',function(){
        						var cname = $(this)
        						var id = $(this).val()
        						$.ajax({
        							headers: {
        								'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        							},
        							type:"post",
        							url:"/admin/product/verify",
        							data:{'id':id},
        							async:false,
        							success:function(flag){
        								if(flag == 1) {
        									cname.parent().find('p').remove()
        									cname.parent().append("<p style='color:red; font-size:14px;'>该分类下有子类</p>")
        								}
        							}
        						})
        					})
        				
        			</script>
        		</td>
        		<td>
        			<label for="goodsmark">商品货号</label>
        		</td>
        		<td>
        			<input type="text" id="goodsmark" value="{{ $data['goodsmark'] }}" name="goodsmark">
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<label for="brandname">商品品牌</label>
        		</td>
        		<td>
        			<select name="brandid" style="width: 160px;" id="brandname">
        				<option value="0">请选择</option>
        				@foreach($brand as $k => $v)
        				<option value="{{ $v['id'] }}" @if($v['id'] == $data['brandid']) selected @endif>{{ $v['brandname'] }}</option>
        				@endforeach
        			</select>
        			<script type="text/javascript">
        				$('#brandname').on('change',function(){
        					if($(this).val() == 0){
        						$(this).parent().append('<p>请选择一个品牌</p>')
        						return false
        					} else {
        						return true
        					}
        				})
        			</script>
        		</td>
        		
        		<td>
        			<label for="goodprice">商品原价</label>
        		</td>
        		<td>
        			<input style="text-align: center;" type="text" id="goodprice" value="{{ $data['goodprice'] }}" name="goodprice">
        		</td>
        		<td>
        			<label for="discount">商品折扣</label>
        		</td>
        		<td>
        			<input style="text-align: center;" type="text" id="discount" value="{{ $data['discount'] }}" name="discount">
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<label for="disprice">折扣价</label>
        		</td>
        		<td>
        			<input type="text" id="disprice" value="{{ $data['disprice'] }}" name="disprice">
        		</td>


        		<td>
					<label for="wlmoney">物流运费</label>
				</td>
				<td>
					<input id="wlmoney" type="text" name="wlmoney" placeholder="0元为免运费" value="{{ $data['wlmoney'] }}">
				</td>
        		<td>
        			<label for="quali">商品规格</label>
        		</td>
        		<td>
        			<select name="qid" style="width: 160px;" id="quali">
        				<option value="0">请选择</option>
        				@foreach($quali as $k => $v)
        					<option value="{{ $v['id'] }}" @if($v['id'] == $data['qid']) selected @endif>{{ $v['qname'] }}</option>
        				@endforeach
        			</select>
        		</td>
        	</tr>


			<tr>
				<td >
					<label for="status">状态</label>
				</td>
				<td>
					<input style="width: 40px;height: 30px;text-align: center;" type="radio" id="status" value="1" name="status" @if($data['status'] == 1) checked @endif>上架 
					<input style="width: 40px;height: 30px;text-align: center;" type="radio" id="status" value="2" name="status" @if($data['status'] == 2) checked @endif>下架 
				</td>


				<td >
					<label for="restrictnums">限购数</label>
				</td>
				<td>
					<input style="" type="text" id="restrictnums" value="{{ $data['restrictnums'] }}" name="restrictnums"> 
				</td>
				<td>
					<label for="isspecial">参加活动</label>
				</td>
				<td>
					<input style="width: 40px;height: 30px; text-align: center;" type="checkbox" id="isspecial" value="1" name="isspecial" @if($data['isspecial'] == 1) checked @endif> 是 
				</td>
			</tr>
			<!--上传图片-->
			<tr>
				<td>
					<label for="goodsreper">商品库存</label>
				</td>
				<td colspan="2">

					<input style="text-align: center;" type="text" id="goodsreper" value="{{ $data['goodsreper'] }}" name="goodsreper">
				</td>
				<td>
					<label for="logo">商品logo</label>
				</td>
				<td colspan="2">

					<img id="preview1" src="{{ $gallery['logo'] }}" width="270" height="200" alt="516px × 653px" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
						<p class="mat5">
						<input type="file" name="logo" id="logo" style="width:170px;" onchange="javascript:setImagePreview('logo','preview1');">
						</p>
				</td>
			</tr>
			<tr>
				<td>
					<label for="productdesc">描述</label>
				</td>
				<td colspan="5">
					<textarea name="productdesc" id="productdesc" cols="80" rows="10" style="resize: none;">{{ $data['productdesc'] }}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="descr">商品详情图片</label>
				</td>
				<td>
					<img id="preview2" src="{{ $gallery['detlogo1'] }}" width="270" height="200" alt="516px × 653px" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
					<p class="mat5">
					<input type="file" name="detlogo1" id="detlogo1" style="width:170px;" onchange="javascript:setImagePreview('detlogo1','preview2');">
					</p>
				</td>
				<td>
					<img id="preview3" src="{{ $gallery['detlogo2'] }}" width="270" height="200" alt="516px × 653px" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
					<p class="mat5">
					<input type="file" name="detlogo2" id="detlogo2" style="width:170px;" onchange="javascript:setImagePreview('detlogo2','preview3');">
					</p>
				</td>
				<td>
					<img id="preview4" src="{{ $gallery['detlogo3'] }}" width="270" height="200" alt="516px × 653px" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
					<p class="mat5">
					<input type="file" name="detlogo3" id="detlogo3" style="width:170px;" onchange="javascript:setImagePreview('detlogo3','preview4');">
					</p>
				</td>
				<td>
					<img id="preview5" src="{{ $gallery['detlogo4'] }}" width="270" height="200" alt="516px × 653px" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
					<p class="mat5">
					<input type="file" name="detlogo4" id="detlogo4" style="width:170px;" onchange="javascript:setImagePreview('detlogo4','preview5');">
					</p>
				</td>
				<td>
					<img id="preview6" src="{{ $gallery['detlogo5'] }}" width="270" height="200" alt="516px × 653px" style="display: block;border:1px solid #ddd; width: 160px; height: 170px;">
					<p class="mat5">
					<input type="file" name="detlogo5" id="detlogo5" style="width:170px;" onchange="javascript:setImagePreview('detlogo5','preview6');">
					</p>
				</td>
			</tr>
        </table>
	
		
		

		<div class="mws-form-row">
			<!-- 加载编辑器的容器 -->
			    <script id="productcontent" name="productcontent" type="text/plain">
					{!! $data['productcontent'] !!}
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="/resources/ueditor/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="/resources/ueditor/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			        var ue = UE.getEditor('productcontent');
			    </script>
		</div>
    </div>
    <input type="submit" class="btn btn-success" value="提交" style=" width:50px; margin: 0 auto;background: red;">
   </form>
	


	<script type="text/javascript">
		//下面用于图片上传预览功能
		function setImagePreview(logo,preview) {
		var docObj=document.getElementById(logo);
		 
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
@endsection