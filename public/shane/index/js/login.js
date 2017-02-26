//登录验证
$(function(){
	var k = false;
	//判断是否手机号是否合法
	$("#J_login_name").blur(function(){
		if($(this).val().length==0){
			$(".tip-mobile2").html("手机号不能为空").slideDown();
			$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
			$(".tip-mobile1").hide();
			$(".login-mobile i").hide();
		}else if((/^1[34578]\d{9}$/.test(this.value))){
			$(".tip-mobile2").hide();
			$(this).css({"border":"1px solid #b2b2b2","background":"#fff"});
			$(".tip-mobile1").hide();
			$(".login-mobile i").show();
		}else{
			$(".tip-mobile2").hide();
			$(".tip-mobile1").html("请输入正确的手机号").slideDown();
			$(".login-mobile i").hide();
		}
	})
	//密码
	$("#J_login_pwd").blur(function(){
		if($(this).val().length==0){
		$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
		$(".tip-pwd1").hide();
		$(".tip-pwd2").html("密码不能为空").show();
		$(".login-pwd i").hide();
	}else if(!(/^(?!\D+$)(?![^a-zA-Z]+$)\S{6,20}$/.test(this.value))) {
			$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
			$(".tip-pwd2").hide();
			$(".login-pwd i").hide();
			$(".tip-pwd1").html("请输入正确密码").slideDown();
			k =false;
			return;
		}else{
			$(".tip-pwd1").hide();
			$(".tip-pwd2").hide();
			$(".login-pwd i").show();
			$(this).css({"border":"1px solid #b2b2b2","background":"#fff"});
			k = true;
		}
	})
	$("#J_login_submit").click(function(){
	var username = $("#J_login_name").val(),
		password = $("#J_login_pwd").val();
		var xhr = new XMLHttpRequest();
		xhr.open("post","login.php",true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send("username="+username+"&password="+password);
		xhr.onreadystatechange =function(){
			if(xhr.readyState === 4){
				if(xhr.status === 200){
					var data = xhr.responseText;
					data = JSON.parse(data);
					if(data.status === 0){
						$(".ui-input").css({"border":"1px solid #b2b2b2","background":"#fff"});
						console.log("成功");
						var datas={
								name: username,
								pass:password
							};
							datas = JSON.stringify(datas);  //对象中解析出字符串
							localStorage.setItem("user",datas);
							var ret = JSON.parse(localStorage.getItem('user'));
							// var ret =JSON.parse(localStorage.setItem("data"));
							// var user=JSON.parse(localStorage.getItem('user'));    //存储多个
							// if(!user){
							// 	user=[];
							// }
							// user.push(data);
							// user=JSON.stringify(user);
							// localStorage.setItem('user',user);
							// var ret = JSON.parse(localStorage.getItem('user'));
						//cookie
				
						//页面跳转
						// window.location.href = "golin.html";
						location.assign("index.html");
					}
					else {
						$(".ui-input").css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
					}
				}
			}
		}
	});
});
//点击更多下拉
$(".u-third-more").click(function(){
	$(".z-third-way-in").slideToggle();
})
