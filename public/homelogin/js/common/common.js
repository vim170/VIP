//抽头尾函数
function loadHtml(url, targetId) {
	$.ajax({
		url: url,
		async: false,
		success: function(data) {
			$("#"+targetId).html(data);
		}
	})
}
//三级联动
		$(function(){
			// 存放所有省市区信息的对象
			var address = {};
					// 读取 address.json 文件中的内容 
				$.getJSON("../data/address.json", function(data){
					var reg = data.regions; // 所有地区
					// 遍历所有省份
					for (var i = 0, len = reg.length; i < len; i++) {
						var province = reg[i]; // 获取到当前遍历到的省份
						address[province.name] = {}; // 相当于 adrress["内蒙古"] = {};
						var cities = province.regions; // 获取当前省份下的所有城市
						if (!cities)
							continue;
						// 遍历当前省份下的所有城市
						for (var j = 0, l = cities.length; j < l; j++) {
							var city = cities[j]; // 当前遍历到的城市
							address[province.name][city.name] = city.regions; // 相当于 address["内蒙古"]["呼伦贝尔"] = [];
						}
					}

					// 初始化所有省份
					initProvince();
				});
			

			// 初始化省份信息
			function initProvince(){
				var html = "";
				for (var attr in address) {
					// console.log(attr);
					html += "<option value='"+ attr +"'>"+ attr +"</option>";
				}
				$(html).appendTo(":input[name='province']");

				// 初始化城市信息
				initCity();
			}

			// 初始化城市信息
			function initCity() {
				// 获取当前选择的省份名称
				var prov = $(":input[name='province']").val();

				// 根据省份找到 address 对象中该属性的值
				var cities = address[prov];
				// 判断是否有城市
				if ($.isEmptyObject(cities)){
					$(":input[name='city'],:input[name='district']").empty().hide();
					return;
				}
				var html = "";
				for (var attr in cities) {
					html += "<option value='"+ attr +"'>"+ attr +"</option>";
				}
				$(":input[name='city']").show().empty().append(html);

				initDistrict();
			}

			// 初始化区县
			function initDistrict() {
				// 获取当前选择的省份与城市名称
				var prov = $(":input[name='province']").val(),
					cit = $(":input[name='city']").val();

				// 根据省份与城市名称找到 address 对象中对应区县的属性值
				var districts = address[prov][cit];

				// 遍历所有区县
				var html = "";
				for (var i = 0, len = districts.length; i < len; i++) {
					html += "<option value='"+districts[i].name+"'>"+districts[i].name+"</option>";
				}

				$(":input[name='district']").show().empty().append(html);
			}

			// 省份选择改变
			$(":input[name='province']").on("change", initCity);
			// 城市选择改变
			$(":input[name='city']").on("change", initDistrict);
		});
//右边侧栏-top
$(function(){
	$(".count-box").mouseover(function(){
			$("#count-tip").stop().animate({right:"30px"},200);
		})
		$(".count-box").mouseout(function(){
			$("#count-tip").stop().animate({right:"-300px"},200);
		})
		//右边鼠标移动上
		$(".sidebar-nav-list li").mouseover(function(){
			$(this).find("p").eq(0).stop().animate({right:"30px"},200);
		})
		$(".sidebar-nav-list li").mouseout(function(){
			$(this).find("p").eq(0).stop().animate({right:"-300px"},200);
	})
//右边侧栏-top-end
//右边侧栏-top-bottom
	$(".vip-words").mouseover(function(){
		$(".vip-inner").stop().animate({right:"30px"},200)
		})
		$(".vip-words").mouseout(function(){
			$(".vip-inner").stop().animate({right:"-300px"},200)
	})

	//返回顶部
	$(".return-top").mouseover(function(){
		$("#return").stop().animate({right:"30px"},200)
	})
	$(".return-top").mouseout(function(){
		$("#return").stop().animate({right:"-300px"},200)
	})

	$(".return-top").click(function(){
		$("html body").scrollTop(0);
	})
})
 //返回顶部--end
//右边侧栏-top-bottom-end

//导航鼠标移上
	$(function(){
		$(".more").mouseover(function(){
			$(".nav-list-more").css({display:"block"});
		})
		$(".more").mouseout(function(){
			$(".nav-list-more").css({display:"none"});
		})
		$(".channel-item").mouseover(function(){
			$(this).find("div").eq(0).stop().animate({top:3},200)
		})
		$(".channel-item").mouseout(function(){
			$(this).find("div").eq(0).stop().animate({top:38},200)
		})
	})
//导航鼠标移上-END

//显示用户名
$(function(){
//移除登录名
//	$(".login-out").click(function(){
//	
//		JSON.parse(localStorage.removeItem('user'));
//		console.log(11)
//	})
//检测是否处于登录状态
var ret = JSON.parse(localStorage.getItem('user'));

if(ret){
	var user = ret.name;
	$("#ret").html("您好:"+user).show();
	
}
else{
	$("#ret").hide();
}
});
//侧边购物袋数字累加
//$(function(){
//	$.cookie.json = true;
//	var prod = $.cookie("products");
////	console.log(prod);
//})