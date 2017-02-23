$(function(){
	var k = false;
	$("#mobile").focus(function(){
		$(".tip-warn4").slideUp();
		$(".tip-warn3").hide();
	})
	//用户名
	$("#mobile").blur(function(){
		if($("#mobile").val().length ==0){
			$(".tip-warn1").html("手机号不能为空").show().css("top","-20px");
			$(".tip-warn2").hide();
			$(".reg-moblie i").hide();
			$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
		}
		else if((/^1[34578]\d{9}$/.test(this.value))){
			$(this).css({"border":"1px solid  #b2b2b2","background":"#fff"});
			$(".reg-moblie i").show();
			$(".tip-warn1,.tip-warn2").hide();
		}else {
			$(".tip-warn2").html("请输入11位手机号").show().css("top","-30px");
			$(".tip-warn1").hide();
			$(".reg-moblie i").hide();
		}
		var xhr = new XMLHttpRequest();
			xhr.open("GET","check_username.php?username="+this.value, true);
			xhr.send();
			xhr.onreadystatechange = function(){
				if(xhr.readyState===4){
					if(xhr.status === 200){
						var txt = xhr.responseText;
						var json = JSON.parse(txt);
						if(json.status===0){
							$(".reg-moblie i").hide();
							$(".tip-warn3").show();
						}
						else{
							$(".tip-warn3").hide();
							k = true;
						}
					}
				}
			}
});
//密码
	$("#pwd").blur(function(){
	if($(this).val().length==0){
		$(".tip-warn1").html("密码不能为空").show().css("top","35px");
		$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
		$(".reg-pwd i").hide();
		$(".tip-warn2").hide();
	}else if(!(/^(?!\D+$)(?![^a-zA-Z]+$)\S{6,20}$/.test(this.value))) {
			$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
			$(".tip-warn2").html("请输入正确的密码").show().css("top","30px");
			$(".tip-warn1").hide();
			$(".reg-pwd i").hide();
			k =false;
			return;
	}else{
			$(".tip-warn2").hide();
			$(".tip-warn1").hide();
			$(".reg-pwd i").show();
			$(this).css({"border":"1px solid  #b2b2b2","background":"#fff"});
			k = true;
		}
	});
	
	$("#pwd2").blur(function(){
		if(($("#pwd2").val()!=$("#pwd").val()) || ($("#pwd2").val().length==0)){
			$(".tip-warn1").html("两次输入密码不同").css("top","95px").show();
			$(this).css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
			$(".reg-pwd2 i").hide();
			k = false;			
	}else{
			$(".reg-pwd2 i").show();
			$(".tip-warn1").hide();
			$(this).css({"border":"1px solid  #b2b2b2","background":"#fff"});
		}
	})
	$(".ui-btn-loading-before").click(function(){
		$(".tip-warn3").hide();
		$(".tip-warn1").hide();
		if($("#J_mobile_agree").prop("checked")===true){
			$(".ui-form-item-group i").hide();
			k = true;
		}else{
			$(".ui-form-item-group i").show();
			return;
		}
		if(($("#pwd2").val()!=$("#pwd").val()) || ($("#pwd2").val().length==0)){
			k = false;			
		}
		if(!k){
			return;
		}else{
			$(".tip-warn1").hide();
			var uname = $("#mobile").val(),
				upwd = $("#pwd").val();
			//ajax像服务器提交用户注册信息   post提交
			var xhr = new XMLHttpRequest();
			xhr.open("POST","register_do.php",true);
			//post 提交添加下面这句
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr.send("username="+uname+"&password="+upwd);
			//处理相应
			xhr.onreadystatechange = function(){
				if(xhr.readyState===4){
					if(xhr.status ===200){
						var txt = xhr.responseText;
						console.log(txt);
						var json = JSON.parse(txt);
						if(json.status === 0){
							alert("成功")
							location.assign("login.html");
						}
						else{
							$(".reg-input").css({"border":"1px solid #fca1a5","background":"#ffe6e7"});
						}
					}
				}
			}
//	}
		};
	});
});
