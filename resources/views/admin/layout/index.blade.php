
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/resources/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/custom-plugins/picklist/picklist.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/plugins/select2/select2.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/plugins/ibutton/jquery.ibutton.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/plugins/cleditor/jquery.cleditor.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/resources/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/resources/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/css/icons/icol32.css" media="screen">



<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/resources/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/resources/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/jui/jquery-ui.custom.css" media="screen">


<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/resources/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/resources/css/themer.css" media="screen">
<script type="text/javascript" src="/ho/js/jquery-1.8.3.min.js"></script>
<!-- Include Required Prerequisites -->
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
Include Date Range Picker
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> -->
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!--start 自己添加-->
@section('js')

@show

<!--end 自己添加-->
@section('css')
@show
<title>
	@section('title')
	@show
</title>
@section('datepicker')
@show
</head>

<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/resources/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/resources/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{ session('name') }}
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="/admin/login/changepassword">修改密码</a></li>
                        <li><a href="/admin/login/logout">退出后台</a></li>
                        Hello, John Doe
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                	<!-- 商品管理列表-->
                    <li class="active">
                        <a href="#"><i class="icon-folder-closed"></i>商品管理</a>
                        <ul>
                            <li><a href="form_layouts.html">商品列表</a></li>
                            <li><a href="form_elements.html">商品分类</a></li>
                            <li><a href="">商品咨询</a></li>
                        	<li><a href="">待回复评论</a></li>
                        	<li><a href="">已回复评论</a></li>
                        </ul>
                    </li>
					<!-- 商品管理 end -->
                    <li class="active">
                        <a href="#"><i class="icon-database"></i>交易管理</a>
                        <ul>
                            <li><a href="form_layouts.html">订单管理</a></li>
                            <li><a href="form_elements.html">支付方式</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-delicious"></i>品牌管理</a>
                        <ul>
                            <li><a href="form_layouts.html">品牌列表</a></li>
                        </ul>
                    </li>
					
                    <li class="active">
					    <a href="#"><i class="icon-lemon"></i>频道管理</a>
					    <ul>
					        <li><a href="form_layouts.html">频道列表</a></li>
					    </ul>
					</li>

                    <li class="active">
					    <a href="#"><i class="icon-gift"></i>活动管理</a>
					    <ul>
					        <li><a href="form_layouts.html">活动列表</a></li>
					    </ul>
					</li>

                    <li class="active">
                        <a href="#"><i class="icon-gauge"></i>反馈管理</a>
                        <ul>
                            <li><a href="form_layouts.html">反馈列表</a></li>
                            <li><a href="form_layouts.html">待处理反馈</a></li>
                            <li><a href="form_layouts.html">已解决反馈</a></li>
                            
                        </ul>
                    </li>


					<li class="active">
					    <a href="#"><i class="icon-official"></i>客服服务</a>
					    <ul>
					        <li><a href="form_layouts.html">帮助中心</a></li>
                            <li><a href="form_layouts.html">问题分类</a></li>
					    </ul>
					</li>


					<li class="active">
					    <a href="#"><i class="icon-users"></i>用户管理</a>
					    <ul>
					        <li><a href="/admin/member">会员列表</a></li>
                            <li><a href="/admin/user">管理员列表</a></li>
					    </ul>
					</li>


					<li class="active">
					    <a href="#"><i class="icon-cog"></i>控制面板</a>
					    <ul>
					        <li><a href="form_layouts.html">基本信息</a></li>
                            <li><a href="/admin/ads">广告列表</a></li>
                            <li><a href="form_layouts.html">友情链接</a></li>

					    </ul>
					</li>
                   
                </ul>
                <script type="text/javascript">
                	// 存在bug 暂不启用
                	// // 选中mws元素
                	// var mws = document.getElementById('mws-navigation');
                	// // 选中mws下所有类名为active的li元素
                	// var li = mws.getElementsByClassName('active');
                	// for (var i = li.length - 1; i >= 0; i--) {
                	// 	// 选中li元素下为ul的元素，
                	// 	var ul = li[i].getElementsByTagName('ul');
                	// 	ul[0].style.display = 'none';
                	// 	ul[0].onclick = function(){
                	// 		this.style.display = 'block';

                	// 	}
                	// };
                </script>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        		
        		
        	<!-- Inner Container Start -->
           	<div class="container">
           		@if(session('success'))
	           		<div class="mws-form-message success">
	                	{{ session('success') }}
	                </div>
				@endif
				@if(session('error'))
	                <div class="mws-form-message warning">
						{{ session('error') }}
	                </div>
                @endif
           		@section('content')
           		@show
           	</div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/resources/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/resources/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/resources/js/libs/jquery.placeholder.min.js"></script>
    <script src="/resources/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/resources/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/resources/jui/jquery-ui.custom.min.js"></script>
    <script src="/resources/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/resources/jui/js/globalize/globalize.js"></script>
    <script src="/resources/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/resources/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/resources/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/resources/plugins/select2/select2.min.js"></script>
    <script src="/resources/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/resources/plugins/validate/jquery.validate-min.js"></script>
    <script src="/resources/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/resources/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/resources/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/resources/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/resources/plugins/cleditor/jquery.cleditor.icon.min.js"></script>
    <script src="/ho/js/jquery-1.8.3.min.js"></script>
    
    <!-- Core Script -->
    <script src="/resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="/resources/js/core/mws.js"></script>

    

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/resources/js/demo/demo.formelements.js"></script>
    <!--全局js函数-->
    <script type="text/javascript" src="/global/global.js"></script>
   
</body>
</html>
