@extends('admin.layout.index')

@section('content')
	@if(count($errors)>0)
		<div class="mws-form-message error">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
<div class="mws-panel grid_8">
	<div class="mws-panel-header" >
    	<span>修改密码</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/login/changepwd/{{ $data['id'] }}" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					{{ $data['name'] }}
    				</div>
    			</div>
    		
    		
    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
    				<div class="mws-form-item">
    					<input type="password" name="pw" class="small" >
    				</div>

    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">新密码</label>
                    <div class="mws-form-item">
                        <input type="password" name="npw" class="small" >
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                    <div class="mws-form-item">
                        <input type="password" name="rnpw" class="small" >
                    </div>
                </div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="修改" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection
