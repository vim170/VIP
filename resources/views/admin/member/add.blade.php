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
        	<span>新增用户</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/user/insert" method="post">
        	{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label" for="name">用户名</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="name" id="name" value="{{ old('name') }}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label" for="pw">密码</label>
        				<div class="mws-form-item">
        					<input type="password" class="medium" name="pw" id="pw" value="{{ old('pw') }}">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label" for="repw">确认密码</label>
        				<div class="mws-form-item">
        					<input type="password" class="medium" name="repw" id="repw" value="{{ old('pw') }}">
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