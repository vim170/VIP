@extends('admin.layout.index')

@section('title')
{{ Config::get('app.title') }}
@endsection
@section('css')
<link rel="stylesheet" href="/resources/swith.css">
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
        	<span>修改用户</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/user/update" method="post">
        	{{ csrf_field() }}
        	<input type="hidden" name="id" value="{{ $data[0]['id'] }}">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label" for="name">用户名</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="name" id="name" value="{{ $data[0]['name'] }}">
        				</div>
        			</div>
        			
					<div class="mws-form-row">
						<label class="mws-form-label" for="pw">密码</label>
						<div class="mws-form-item">
							<input type="password" class="medium" name="pw" id="pw" style="float: left" value="{{ old('pw') }}">
						</div>
					</div>

					<div class="mws-form-row">
						<label class="mws-form-label" for="pw">确认密码</label>
						<div class="mws-form-item">
							<input type="password" class="medium" name="repw" id="pw" style="float: left" value="{{ old('repw') }}">
						</div>
					</div>


					<div class="mws-form-row">
						<label class="mws-form-label" for="pw">启用状态</label>
						<div class="mws-form-item" >
							  <input type="radio" name="status" value="1" style="padding-right: 15px;" @if($data[0]['status'] == 1) checked @endif>启用
							  <input type="radio" name="status" value="2"  @if($data[0]['status'] == 2) checked @endif>禁用

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