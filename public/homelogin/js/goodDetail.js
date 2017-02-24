//放大镜
$(function(){
	 var zoomWidth=$(".zoom").width();
	 var zoomHeight=$(".zoom").height();
	 var boxWidth=$(".big-box").width();
	 var boxHeight=$(".big-box").height();
	 var largeWidth=$(".large-box").width();
	 var largeHeight=$(".large-box").height();
//	 鼠标事件
	 $(".big-box").hover(function(){
	 	$(".large-box").show();
	 	$(".zoom").show();
	},function(){
		$(".large-box").hide();
		$(".zoom").hide();
	}).on("mousemove",function(e){
		var x=e.pageX;
		var y=e.pageY;
		$(".zoom").offset({
			top:y-zoomHeight/2,
			left:x-zoomWidth/2
		})
		//获取镜头相对其父元素的坐标
			var cor=$(".zoom").position();
			var _top=cor.top;
			var _left=cor.left;
			//临界值
			if(_top<0){
				_top=0;
			}else if(_top>boxHeight-zoomHeight){
				_top=boxHeight-zoomHeight;
			}
			if(_left<0){
				_left=0;
			}else if(_left>boxWidth-zoomWidth){
				_left=boxWidth-zoomWidth;
			}
			$(".zoom").css({
				top:_top,
				left:_left
			})
			$(".large-box img").css({
				top:-2*_top,
				left:-2*_left
			})
	})
	//放大镜选项卡
	$.each($(".small-box-list img"),function(index,ele){
		$(this).on("click",function(){
			$(".small-box-list li").removeClass();
			$(this).parents("li").addClass("active");
			$(".big-box img").attr("src","../img/goodDetail/small-box-list"+(index+1)+".jpg");
			$(".large-box img").attr("src","../img/goodDetail/small-box-list"+(index+1)+".jpg");
		})
	})
})
//倒计时
function GetRTime(){
       var EndTime= new Date('2016/11/20 10:00:00'); //截止时间
       var NowTime = new Date();
       var t =EndTime.getTime()-NowTime.getTime();
       var d=Math.floor(t/1000/60/60/24);
       var h=Math.floor(t/1000/60/60%24);
       var m=Math.floor(t/1000/60%60);
       var s=Math.floor(t/1000%60);
	   document.getElementById("day").innerHTML = d + "天";
       document.getElementById("hour").innerHTML = h + "时";
       document.getElementById("min").innerHTML = m + "分";
       document.getElementById("sec").innerHTML = s + "秒";
   }
   setInterval(GetRTime,500);
//倒计时--end
//点击尺码助手打开
$(".size-helper-trigger").mouseover(function(){
	$(".size-helper-notice").css("display","block");
	
})
$(".size-helper-trigger").click(function(){
	$(".ui-dialog").css("display","block");
	
})
//点击关闭按钮关闭
$(".button-size-helper-notice-close").click(function(){
	$(".size-helper-notice").css("display","none");
})
//点击尺码助手详情close按钮
$(".ui-dialog-close").click(function(){
	$(".ui-dialog").css("display","none");
})
//吸顶
	$(function(){
		var fixTop=$(".datailTop").offset().top;
			$(window).scroll(function(){
					var scrollTop=$(this).scrollTop();
					if(scrollTop>=fixTop){
						$(".datailTop").css({position:"fixed",top:0});
						
					}else{
						$(".datailTop").css({position:"static"});
					}
				})
				
	})

//楼梯效果
var isClick=false;
		$(".datailTop ul li").click(function(){
			isClick=true;
			$(this).find("a").addClass("curr").parent().siblings().find("a").removeClass("curr");
//			获取当前滚动高度
			var iTop=$(".louti").eq($(this).index()).offset().top;
			$("html,body").stop().animate({scrollTop:iTop},500,function(){
				 isClick=false;
			})
			
		})
		
		$(window).scroll(function(){
			if(!isClick){
				var iScrollTop=$(this).scrollTop();
			$(".louti").each(function(){
				if(iScrollTop>=$(this).offset().top-$(this).prev().outerHeight()/2){
					$(".datailTop ul li").eq($(this).index()).find("a").addClass("curr").parent().siblings().find("a").removeClass("curr");
				}
			})
		}
			
	})
//轮播图
$(function(){
	 var recos=$(".reco-listbox-inner");
	 var len=recos.length;
	 var recoWidth=recos.eq(0).outerWidth();
	 var index=2;//即将显示图片索引
	 var timer=null;
	 var first=recos.eq(0).clone(true);
	 var last=recos.eq(len-1).clone(true);
	 //改变后的长度
	 len+=2;
	 $(".dt-reco-listbox").append(first);
	 $(".dt-reco-listbox").prepend(last);
	 $(".dt-reco-listbox").width(len*recoWidth);

	 //前后翻页的点击
	 $(".J_reco_perv").click(function(){
	 	if($(".dt-reco-listbox").is(":animated"))
	 	return;
	 	index-=2;
	 	move();
	 })
	 $(".J_reco_next").click(function(){
	 	//防止连续点击的时候出现空白
	 	if($(".dt-reco-listbox").is(":animated"))
	 	return;
	 	move();
	 })
	 //上面页数123
	 $(".page-num a").on("click",function(){
	 	index=$(this).index()+1;
	 	move();
	});


	 //鼠标移动事件
	 $(".dt-reco-middle-box").hover(function(){
	 	clearInterval(timer);
	 },function(){
	 	timer=setInterval(move,5000);
	 }).trigger("mouseleave");//触发事件的执行
//				 timer=setInterval(move,500);
	//初始设置显示
	$(".dt-reco-listbox").css("left",-recoWidth);
 	function move(){
	 	var iLeft=-1*index*recoWidth;
	 	//计算小圆点索引
	 	var curr=index>len-2 ? 0: index-1;
	 	$(".page-num a").eq(curr).addClass("color").siblings().removeClass("color");
	 	index++;
//				 	if(index>=len){
//				 		index=0;
//				 	}
	 	 $(".dt-reco-listbox").animate({left:iLeft},function(){
	 	 	if(index===len){
	 	 		$(".dt-reco-listbox").css("left",-recoWidth);
		 	 	index=2;
		 	}else if(index===1){
		 		$(".dt-reco-listbox").css("left",-1*(len-2)*recoWidth);
		 		index=len-1;
		 	}
		});
	}
})
//选项卡
$("#aboutUs-logo li").mouseover(function(){
	$(".logo-list-inner .au-main").eq($(this).index()).css({display:"block"}).siblings().css({display:"none"})
})
//选择颜色类别
var smallSrc="";
var _this=null;
$(".color-list-item").click(function(){
	_this=$(this);
	$(this).children("a").css("border","1px solid #f43499").parents(".color-list-item").siblings().children("a").css("border","1px solid #ccc");
	$(this).children().children("span.i-select").parents(".color-list-item").siblings().children().children("span.i-select")
	$(this).children().children("span.i-select").css({display:"block"}).parents(".color-list-item").siblings().children().children("span.i-select").css("display","none");
		smallSrc = $(this).find(".f1").attr("src");console.log(_this)
})
//选择尺码大小
var currSize = null;
$(".size-list-item").click(function(){
	currSize = $(this).find(".size-list-item-name").html();
	$(this).css("border","1px solid #f43499").siblings().css("border","1px solid #ccc");
	$(this).children("span.i-select").parents(".size-list-item").siblings().children("span.i-select")
	$(this).children("span.i-select").css({display:"block"}).parents(".size-list-item").siblings().children("span.i-select").css("display","none");
})
//加减数量
//加
var am =1;
$(".num-add").click(function(){
	am++;
	if(am>10)
	return;
	$(".num-input").html(am);
	//console.log(amount);
})
//减
$(".num-reduce").click(function(){
	if(am<=1){
		return;
	}
	am--;
	$(".num-input").html(am);
	//console.log(amount);
})

//购物车
var cart_num = 0;
$("#cartAdd-sumbit").click(function(){
	//飞入购物车
	var imgOffset=_this.offset();
	 var flyer = $("<img class='u-flyer' src="+_this.find('img').attr('src')+">"); 
	 var end=$(".i-shop-cart").offset();
	 flyer.appendTo(_this).css({
	 	position:"fixed",
	 	right:imgOffset.left,
	 	top:imgOffset.top
	 }).animate({
	 	right:-50,
	 	top:600
	 },function(){
	 	flyer.remove()
	 });
	 
	cart_num++;
//获取数据
console.log(cart_num)
	var _name=$(".title-left-text").html();
	//console.log(_name);
	var _price=$(".price-num").html();
	//console.log(_price);
	var _size=currSize;
	//console.log(_size);
	var _color=$(".f1").html();
	//console.log(_color);
	var _num=$(".num-input").html();
	console.log(_num);
	var _id = $(".goods-detail").attr("id");
	//console.log(_id);
	var _src = smallSrc;
	var _amount = am;
//	console.log(_src);
	//创建对象
	var product={
		id: _id,
		name:_name,
		price:_price,
		size:_size,
		color:_color,
		src: _src,
		num: _num,
		amount:_amount,
		cart_num:cart_num
	};
	//将当前选购的商品信息保存到cookie中
	//$.cookie("products",JSON.stringify(product),{"expires":10,"path":"/"});
	$.cookie.json=true;//插件配置
	var products = $.cookie("products");
	if(!products)
		products = [];
//判断是否存在已选商品信息，若有，则修改数量
	var index=exists(_size,products);
	if(index!==-1){//存在，修改数量
		products[index].amount+= am;
	}else{
		products.push(product);
		
	}
	//保存到cookie中
	$.cookie("products", products, {expires:7, path:"/"});
	console.log($.cookie("products"));
});
function exists(_size, products){
	
	var idx = -1; // 保存的是在数组中对应 id 元素存在时的下标
	// 遍历 products 数组
	// 每一个元素都会调用回调函数
	// 回调函数中第一个参数为遍历元素的索引
	// 第二个参数为遍历到的元素
	// return false 相当于循环中的 break，表示退出循环
	$.each(products, function(index, element){
		if (element.size == _size) {
			idx = index;
			return ;
		}
	});
	return idx;
}
