@extends('admin.layout.index')
@extends('admin.layout.index')
@section('title')
{{ Config::get('app.title') }}
@endsection
@section('css')
<link rel="stylesheet" href="/resources/pageinate.css">
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
            <span>会员资料</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/navcast/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $data['id'] }}">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label" for="navname">频道名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="navname" id="navname" value="{{ $data['navname'] }}">
                        </div>
                    </div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label" for="enable">启用状态</label>
                        <div class="mws-form-item" >
                              <input type="radio" name="enable" value="1"  style="padding-right: 15px;" @if ($data['enable'] == 1) checked @endif>启用
                              <input type="radio" name="enable" value="2" @if ($data['enable'] == 2) checked @endif >禁用

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
    <script type="text/javascript">
        
    </script>
@endsection