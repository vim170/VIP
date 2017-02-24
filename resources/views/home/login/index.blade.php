<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<title></title>
		 <link rel="icon" href="http://s16.mogucdn.com/new1/v1/bmisc/3ce382db3c8aaca5d07bd36711e77134/171169993508.ico" type="image/x-icon" />
		 <meta name="_token" content="{{ csrf_token() }}"/>
		<link rel="stylesheet" href="/homelogin/css/login.css" />
		<script src="/resources/js/libs/jquery-1.8.3.min.js"></script>
	
	</head>
	
	<body>
		<div class="g-wrap">
			<div class="g-header">
				<a href="http://www.vip.com" class="u-logo"></a>
				<span class="u-promise"></span>
				<div class="u-ad-header J-ads" data-adsid="ADSBAZW9" data-tpl="#J-ADSBAZW9-tpl"></div>
			</div>
			<div class="g-content J-ads" data-adsid="ADSJ867S" data-bg="true" style="background-image:url(/homelogin/img/login/login.jpg)">
				<div class="m-single-function" id="J_single_function">
					<div class="u-form-top-tip" id="J_head_tip">欢迎回来！请登录</div>
					<form action="/home/login/dologin" method="post" class="">
					{{ csrf_field() }}
					<div id="J_single_login" class="m-login-panel clearfix">
						<!--手机号登录-->
						<p class="tip-mobile1"></p>
						<div class="u-form-item login-mobile">
							<input id="J_login_name" type="text" class="ui-input" name="name" placeholder="手机号">
							<i></i>
						</div>
						<p class="u-form-tip tip-mobile2"></p>
						<!--手机号登录end-->
						<!--密码验证-->
						<p class="tip-pwd1"></p>
						<div class="u-form-item login-pwd">
							<input id="J_login_pwd" type="password" class="ui-input" name="password" maxlength="20" placeholder="密码">
							<i></i>
						</div>
						<p class="u-form-tip tip-pwd2"></p>
						<!--密码验证end-->
						<!--<div class="u-form-item f-hidden J_verify_code">
							<input id="J_login_code" type="text" class="ui-input u-captcha" name="captcha" maxlength="4" placeholder="验证码" autocomplete="off">
							<span id="J_verify_img_wrap" class="u-code-img"></span>
							<a href="javascript:;" role="button" id="J_change_code" class="u-change-code">换一张</a>
						</div>-->
						<!--<p class="u-form-tip f-hidden J_verify_code"></p>-->
						@if(Session::has('message'))
						<div class="alert alert-info" style="font-size:20px;color:#fca1a5;"> {{Session::get('message')}} 
						</div> 
						@endif
						<div class="u-form-submit">
							<button type="submit" class="ui-btn-large ui-btn-primary ui-btn-loading u-submit-function" id="J_login_submit">

                            <span class="ui-btn-loading-before">登录</span>
                            <span class="ui-btn-loading-after"><i class="ii-loading-gray-16x16"></i><span class="ui-btn-txt">处理中...</span></span>
                        </button>
						</div>

						

						<div class="m-other-function">
							<span class="f-left"><span class="ui-checkbox"><input type="checkbox" id="J_remember_username" name="remUser" class="ui-checkbox-normal" checked=""><label for="J_remember_username" class="ui-checkbox-simulation"></label></span><label for="J_remember_username" class="u-checkbox-label">记住用户名</label></span>
							<span class="u-cannot-login">
                            <a href="https://safe.vip.com/login/findPW/page" class="forget" target="_blank">忘记密码?</a>
                            |
                            <a href="/home/regist/index" class="reg">免费注册</a>
                        </span>
						</div>
					</div>
					<div class="m-phone-panel" id="J_phone_main">
						<div class="u-form-item">
							<input id="J_login_phone" type="text" class="ui-input" name="loginPhone" placeholder="输入手机号" mars_sead="125|2|9|3">
						</div>
						<p class="u-form-tip"></p>
						</form>
						<div class="m-other-function">
							<span class="f-left"><span class="ui-checkbox"><input type="checkbox" id="J_remember_phone" name="remUser" class="ui-checkbox-normal" checked=""><label for="J_remember_phone" class="ui-checkbox-simulation"></label></span><label for="J_remember_phone" class="u-checkbox-label">记住用户名</label></span>
							<span class="u-cannot-login">
                            <a href="https://safe.vip.com/login/findPW/page" class="forget" target="_blank">忘记密码?</a>
                            |
                            <a href="/register" class="reg">免费注册</a>
                        </span>
						</div>
					</div>

					<div class="m-third-login">
						<p class="title">合作网站账号登录：</p>
						<p class="clearfix">

							<a href="//passport.vip.com/login/weibo" target="_blank" title="新浪微博" class="u-third-sina" mars_sead="passport_bottom_weibo_button"></a>
							<a href="//passport.vip.com/login/qq" target="_blank" title="QQ" class="u-third-qq" mars_sead="passport_bottom_qq_button"></a>
							<a href="//passport.vip.com/login/alipay" target="_blank" title="支付宝" class="u-third-alipay" mars_sead="passport_bottom_alipay_button"></a>
							<a href="//passport.vip.com/login/weixin" target="_blank" title="微信" class="u-third-wechat" mars_sead="passport_bottom_weixin_button"></a>
							<a href="javascript:void(0);" role="button" class="u-third-more z-open" mars_sead="passport_bottom_more_button" id="J_more_third_control">更多
								<i class="arrow"></i>
							</a>
						</p>
						<!--更多-->
						<div class="m-more-third-way z-third-way-in" id="J_more_third_wrap">
							<a href="//passport.vip.com/login/netease" target="_blank" title="网  易" mars_sead="passport_bottom_netease_button">网 易</a>|
							<a href="//passport.vip.com/login/renren" target="_blank" title=" 人人网 " mars_sead="passport_bottom_renren_button"> 人人网 </a>|
							<a href="//passport.vip.com/login/ccb" target="_blank" title="建行登录" mars_sead="passport_bottom_ccb_button">建行登录</a>|
							<a href="//passport.vip.com/login/tenpay" target="_blank" title="财付通" mars_sead="passport_bottom_tenpay_button">财付通</a>
							<a href="//passport.vip.com/login/kaixin001" target="_blank" title="开心网" mars_sead="passport_bottom_happy_button">开心网</a>|
							<a href="//passport.vip.com/login/mobile139" target="_blank" title="中国移动" mars_sead="passport_bottom_139_button">中国移动</a>|
							<a href="//passport.vip.com/login/bestpay" target="_blank" title="翼支付" mars_sead="bottom_yizhifu_button">翼支付</a>
						</div>
						<!--更多end-->
					</div>
				</div>
			</div>
			<div class="g-footer">
				<p class="u-copyright">Copyright 2008-2016 vip.com，All Rights Reserved ICP证：粤 B2-20080329</p>
			</div>
		</div>
		<script>
		//手机号的验证
			$("#J_login_name").blur(function(){
				//手机号不能为空
				if($(this).val().length==0){
					$(".tip-mobile2").html("手机号不能为空").slideDown();
					$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
					$(".tip-mobile1").hide();
					$(".login-mobile i").hide();
					k1 = false;
				}else if((/^1[34578]\d{9}$/.test(this.value))){
					//手机号码正则 验证成功后 发送AJAX 查看数据库有无此号码
					var name = $("#J_login_name").val();
					$.ajax({
			            type:'POST',
			            url:'/home/login/najax',
			            data:{name:name},
			            async:true,
			            dataType:'json',
			             headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
			             //返回值
			            success:function(str){
			                if (str == 500) {
			                    $(".tip-mobile2").hide();
			                    $("#J_login_name").css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
								$(".tip-mobile1").html("手机号没有注册").slideDown();
								$(".login-mobile i").hide();
								k1 = false;
			                }else{
			                	$(".tip-mobile2").hide();
								$("#J_login_name").css({"border":"1px solid #b2b2b2","background":"#fff"});
								$(".tip-mobile1").hide();
								$(".login-mobile i").show();
								k1 = true;
			                }
			            }
			        });
				}else{
					$(".tip-mobile2").hide();
					$(".tip-mobile1").html("请输入正确的手机号").slideDown();
					$(".login-mobile i").hide();
					k1 = false;
				}
			})

			// 密码
			$("#J_login_pwd").blur(function(){
				if($(this).val().length==0){
					$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
					$(".tip-pwd1").hide();
					$(".tip-pwd2").html("密码不能为空").show();
					$(".login-pwd i").hide();
					k2 = false
				}else if(!(/^(?!\D+$)(?![^a-zA-Z]+$)\S{6,20}$/.test(this.value))) {
					$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
					$(".tip-pwd2").hide();
					$(".login-pwd i").hide();
					$(".tip-pwd1").html("密码格式不正确").slideDown();
					k2 = false;
				}else{
					$(".tip-pwd1").hide();
					$(".tip-pwd2").hide();
					$(".login-pwd i").show();
					$(this).css({"border":"1px solid #b2b2b2","background":"#fff"});
					k2 = true;
				}
			})

			//提交事件

			$("#J_login_submit").click(function(){
				if(k1 && k2){
					a=1;
				}else{
					return false;
				}
			})

		</script>
	</body>
</html>