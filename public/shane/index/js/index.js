// 品牌特效
$(function(){
	$('.louti-inner').find('.brand-img').hover(
		function(){
			$(this).stop()
			$(this).fadeTo('slow','0.8')
		},
		function() {
			$(this).fadeTo('fast','1')
		}

	)
})


//楼梯
	$(function(){
			var isClick=false;
			$("#loutiNav ul li").click(function(){
				isClick=true;
				$(this).find("span").addClass("active").parent().siblings().find("span").removeClass("active");
				//获取当前滚动高度
				var iTop=$(".louti").eq($(this).index()).offset().top;
				$("html,body").stop().animate({scrollTop:iTop},200,function(){
					isClick=false;
					});
					 
				})
			
			$(window).scroll(function(){
				if(!isClick){
					var iScrollTop=$(this).scrollTop();
				$(".louti").each(function(){
					if(iScrollTop>=$(this).offset().top-$(this).prev().outerHeight()){
						$("#loutiNav ul li").eq($(this).index()).find("span").addClass("active").parent().siblings().find("span").removeClass("active");
						}
					})
				}
				
			})
	})

//JS淡入淡出轮播图
		var oBox=document.getElementById("banner");
		var oSlider=document.getElementsByClassName("slider")[0];
		var sliderlist=document.getElementsByClassName("slider-list");
		var oUl=document.getElementsByClassName("slider-bottom-list")[0];
		var aLi=oUl.getElementsByTagName("li");
		var oPre=document.getElementsByClassName("prev")[0];
		var oNext=document.getElementsByClassName("next")[0];
		var iNow=0;//当前图片索引
	for(var i=0;i<aLi.length;i++){
		aLi[i].index=i;
		aLi[i].onmouseover=function(){
			iNow=this.index;
			tab();
		}
	}
		autoPlay();//打开就自动播放
		oNext.onclick=function(){
			iNow++;
			if(iNow>3)
			iNow=0;
			tab();
		}
		oPre.onclick=function(){
			iNow--;
			if(iNow<0)
			iNow=3;
			tab();
		}
		oSlider.onmouseover=function(){
			clearInterval(oSlider.timer);
			oPre.style.left="0px";
			oNext.style.right="0px";
			
		}
		oSlider.onmouseout=function(){
			autoPlay();
			oPre.style.left="-65px";
			oNext.style.right="-65px";
			
		}
		function autoPlay(){
			clearInterval(oSlider.timer);
			oSlider.timer=setInterval(function(){
				iNow++;//图片变换
				if(iNow==aLi.length){
					iNow=0;
				}
				tab();
			},3000)
		}
		function tab(){//切换函数
			for(var i=0;i<aLi.length;i++){
				aLi[i].className="";
				startMove(sliderlist[i],{opacity:0});
			}
				aLi[iNow].className="active";
				startMove(sliderlist[iNow],{opacity:100});
			
		}
	
//吸顶
	$(function(){
		var fixTop=$("#box-header-nav").offset().top;
			$(window).scroll(function(){
					var scrollTop=$(this).scrollTop();
					if(scrollTop>=fixTop){
						$("#box-header-nav").css({position:"fixed",top:0});
						
					}else{
						$("#box-header-nav").css({position:"static"});
					}
				})
				
	})
	