@extends('home.layout.index')
@section('css')
<link rel="stylesheet" href="/ho/css/fback.css">
@endsection
@section('content')
<script src="/home/js/jquery-1.8.3.min.js"></script>
<div class="nav-bottom">
    <div class="nav-bottom-inner">
        <ul>
            <li class="select"><a href="#">首页</a></li>
            <li><a class="have-img" href="/home/fback/index">常见反馈</a></li>
            <li><a href="/home/fback/yao">我要反馈</a></li>
            <li><a href="/home/fback/de">我的反馈</a></li>
        </ul>
    </div>
</div>
<div class="layout clearfix">		
		
		<div class="not_my_feedback">
			<p style="font-size: 14px;">您还没有提交反馈内容。</p>
			您可以<a href="feedback!toFeedback.do" style="text-decoration:underline;">写一条反馈</a>，也可以查看<a href="feedback!hotFeedback.do" style="text-decoration:underline;">常见反馈</a>。
		</div>			
		
	
    </div>
<div class="layout clearfix">       
        
        
        <div class="my_feedback_top">
            <div class="grp clearfix">
                <div class="avatar"><img width="90" height="90" id="user_head" src="/home/imgs/avatar.jpg"></div>
                <p class="title">我的反馈</p>
            </div>
        </div>
        <div class="center_module">
            <div class="my_feedback">
            
                 <!-- 反馈类别 （用于我的反馈区分类别） -->
                    <!--我的问题-->
                    <div class="my_feedback_ques clearfix">
                        <div class="my_fb_from my_fb_from3">
                            <a class="my_fb_from_type">反馈平台</a>
                            <p>2017-02-17</p>
                            <p> 22:14:29</p>
                        </div>
                        <div class="dispose_box">
                            <i class="ang"></i>
                            <div class="my_fb_ques">
                                <h2>
                                    
                                    我就是想看看这个页面
                                </h2>
                                <p class="text">这条反馈请忽略，学生实验使用，打扰了</p>
                                <p class="dat">
                                    <!-- <span>会员：186****27</span> -->
                                    <!-- <span>反馈时间：2017-02-17 22:14:29</span> -->
                                    
                            </p></div>
                    
                            <!--客服回答-->                  
                            
                            
                            
                        </div>
                    </div>
                
                                    
                 
            </div>    
        </div>
        
    </div>
<div id="wei"></div>
@endsection