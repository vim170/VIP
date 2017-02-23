<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="icon" href="http://s16.mogucdn.com/new1/v1/bmisc/3ce382db3c8aaca5d07bd36711e77134/171169993508.ico" type="image/x-icon" />
		<meta name="_token" content="{{ csrf_token() }}"/>
		<link rel="stylesheet" href="/homelogin/css/regist.css" />
		<script src="/resources/js/libs/jquery-1.8.3.min.js"></script>
</head>

	<body class="regSingle">
		<div class="layout">
			<div class="header">
				<a href="http://www.vip.com?ff=125|2|1|14" class="logo sprite" id="for-cascade-login-link" data-track="done"></a>
				<div class="bannerHeader sprite"></div>
				<div id="J_ADADSBAZW9" class="u-ad-header"></div>
			</div>
			<div class="content J_ADADS9757C_bg clear" style="background-image:url(/homelogin/img/login/login.jpg)">
			<!--	表单验证部分-->
				<div class="regForm">
					<div class="regHeaderTip">
						<span class="f1">欢迎注册</span>
						<span class="fr f2">已注册<a href="/home/login/index" class="red hvLine" id="J_normal_loginlink">直接登录</a></span>
					</div>
					<!--表单-->
					<div id="reg-form-wrapper">
						<form id="reg_mobile_form" class="register-form" action="/home/regist/add" method="post">
							<!--手机注册-->
							{{ csrf_field() }}
							<div class="control-group clearfix reg-moblie">
								<input type="text" id="mobile" class="reg-input" placeholder="请输入手机号"/>
								<i></i>
							</div>
							<div class="tip-warn1">请输入11位手机号</div>
							<div class="tip-warn2">手机号不能为空</div>
							<div class="tip-warn3">用户名已存在</div>
							<!--密码验证-->
							<div class="control-group clearfix reg-pwd">
								<input type="password" id="pwd" class="reg-input" placeholder="密码由6-20位字母，数字和符号组成"/>
								<em id="tu1"></em><em id="tu2"></em><em id="tu3"></em>
								<i></i>
							</div>
							<!--密码再次验证-->
							<div class="control-group clearfix reg-pwd2">
								<input type="password"  id="pwd2" class="reg-input" placeholder="请再次输入上面的密码"/>
								<i></i>
							</div>
							<!--短信提示-->
							<div class="control-group clearfix">
								<input type="text"  id="msg" class="reg-input reg-msg" placeholder="短信验证码"/>
								<a href="javascript:;" role="button" id="J_mobile_verifycode_btn" class="ui-btn-medium btn-verify-code ui-btn-disable" mars_sead="125|2|1|7">获取验证码</a>
							</div>
							<!--注册-->
							<div class="tip-warn4">请填写信息</div>
							<div class="control-group clearfix">
								<a href="javascript:;" role="button" id="J_mobile_reg_button" class="ui-btn-large ui-btn-primary ui-btn-loading reg-form-btn form-submit" mars_sead="125|2|1|9">
						          <span class="ui-btn-loading-before">立即注册</span>
						            <span class="ui-btn-loading-after">
						            	<i class="ii-loading-gray-16x16"></i>
						            	<span class="ui-btn-txt">处理中...</span>
					            	</span>
		        				</a>
							</div>
							<!--条款-->
							<div class="control-group clearfix">
						    	<div class="ui-form-item-group">
						    		<i></i>
						    		<div class="ui-tooltips ui-tooltips-warning validator-tooltips-warning ui-tooltips-bottom-left-arrow">
						    			<div class="ui-tooltips-arrow"><i class="arrow arrow-out">◆</i><i class="arrow">◆</i>
						    			</div>
						    			<div class="ui-tooltips-content">
						    				<p class="ui-tooltips-msg validator-msg">
						    					<i class="vipFont if-sigh"></i>
						    				</p>
						    			</div>
						    		</div>
							        <span class="ui-checkbox mr0">
							            <input type="checkbox" id="J_mobile_agree" name="agree" class="ui-checkbox-normal" checked="checked" value="1" mars_sead="125|2|1|11"><label for="J_mobile_agree" class="ui-checkbox-simulation"></label>
							        </span>
							        <label for="J_mobile_agree" class="ui-label f-12">我已阅读并接受<a href="http://support.vip.com/clause/?ff=125|2|1|12" class="red" target="_blank" id="J_mobile_provision" data-track="done">唯品会服务条款</a>。</label>
						        </div>
		   					</div>
						</form>
					</div>
					<!--表单end-->
				</div>
			<!--	表单验证部分  end-->
			</div>
			<div class="footer">
				<div class="copyright">Copyright 2008-2016 vip.com，All Rights Reserved ICP证：粤 B2-20080329</div>
			</div>
		</div>
		<script>
		$("#mobile").focus(function(){
			$(".tip-warn4").slideUp();
			$(".tip-warn3").hide();
		})
		$("#mobile").blur(function(){
			if($("#mobile").val().length ==0){
				$(".tip-warn1").html("手机号不能为空").show().css("top","-20px");
				$(".tip-warn2").hide();
				$(".reg-moblie i").hide();
				$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
				k1 = false;
			}
			else if((/^1[34578]\d{9}$/.test(this.value))){
				/*$(this).css({"border":"1px solid  #b2b2b2","background":"#fff"});
				$(".reg-moblie i").show();
				$(".tip-warn1,.tip-warn2").hide();*/
				//手机号码正则 验证成功后 发送AJAX 查看数据库有无此号码
				var name = $("#mobile").val();
				$.ajax({
		            type:'POST',
		            url:'/home/regist/najax',
		            data:{name:name},
		            async:true,
		            dataType:'json',
		            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
		             //返回值
		            success:function(str){
		                if (str == 600) {
		                    $(".tip-warn2").html("手机号已存在").show().css("top","-30px");
							$(".tip-warn1").hide();
							$(".reg-moblie i").hide();
				k1 = false;
							k1 = false;
		                }else{
		                	$("#mobile").css({"border":"1px solid #fca1a5","background":"#fff"});
							$(".reg-moblie i").show();
							$(".tip-warn1,.tip-warn2").hide();
							k1 = true;
		                }
		            }
		        });

			}else {
				$(".tip-warn2").html("请输入11位手机号").show().css("top","-30px");
				$(".tip-warn1").hide();
				$(".reg-moblie i").hide();
				k1 = false;
			}
		})

		
	</script>
	</body>
</html>