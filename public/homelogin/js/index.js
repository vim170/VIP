//动态加载
$(function(){
	
	load1("../data/index/floor1.json",".floor1");
	load2("../data/index/floor2.json",".f2");
	load3("../data/index/floor3.json",".f3");
	load4("../data/index/floor4.json",".f4");
	load5("../data/index/floor5.json",".f5");
	load6("../data/index/floor6.json",".f6");
	load7("../data/index/floor7.json",".f7");
	load8("../data/index/floor8.json",".f8");
	load9("../data/index/floor9.json",".f9");
	load10("../data/index/floor10.json",".f10");
	load11("../data/index/floor11.json",".f11");
})	
	function load1(url,container){
		$.get(url,function(data){
			// console.log(data);
			for(var i in data){
					$(container).append(
					' <div class="floor1-inner">'+
						'<a href="#">'+
							'<img class="floor1-img" src="'+data[i].src1+'" alt="JUZUI时光依存 凝聚风尚">'+
						'</a>'+
						'<a href="#" class="floor1-brand">'+
							'<img src="'+data[i].src2+'" class="floor-brand-img"/>'+
							'<p class="floor1-brand-name1">'+data[i].name1+'</p>'+
							'<p class="floor1-brand-name2">'+data[i].name2+'</p>'+
							'<div class="floor1-inner-hover" >'+
								'<div class="inner-hover-list">'+
									'<a href="#" class="list-item">'+
										'<img class="inner-hover-img" src="'+data[i].src3+'"/>'+
									'<p class="floor1-price">'+data[i].price+'</p>'+
									'</a>'+
									'<a href="#" class="list-item">'+
										'<img class="inner-hover-img" src="'+data[i].src3+'"/>'+
									'<p class="floor1-price">'+data[i].price+'</p>'+
									'</a>'+
									'<a href="#" class="list-item">'+
										'<img class="inner-hover-img" src="'+data[i].src3+'"/>'+
									'<p class="floor1-price">'+data[i].price+'</p>'+
									'</a>'+
								'</div>'+
								'<a href="#" >'+
									'<img class="floor1-inner-hover-logo" src="'+data[i].src4+'"/>'+
								'</a>'+
								'<span class="love"><img src="'+data[i].src5+'"/></span>'+
								'<a href="#" class="ground">'+data[i].join+'</a>'+
							'</div>'+
						'</a>'+
					'</div>'
					)
				}
		})
	}
	function load2(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="goodList.html" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load3(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load4(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load5(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load6(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load7(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load8(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load9(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load10(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	function load11(url,container){
		$.get(url,function(data){
			for(var i in data){
				$(container).append(
					'<div class="brand-item">'+
								'<a href="#" target="_blank">'+
									'<img class="brand-img" src="'+data[i].src2+'"/>'+
									'<div class="brand-item-bottom" title="跨专场，购物满598减80，上不封顶">'+
										'<i class="item-icon">'+'</i>'+
										'<span class="item-bottom-tip">'+data[i].p1+'</span>'+
									'</div>'+
									'<div class="brand-info">'+
										'<span class="brand-discount">'+
											'<span class="salebg2">'+data[i].p2+'</span>'+data[i].p3+'</span>'+
										'<span class="brand-info-name">'+data[i].p4+'</span>'+
											'<p class="brand-time">'+
												'<i class="time-icon">'+'</i>'+
												'<span class="time-day">'+data[i].p5+'</span>'+
											'</p>'+
									'</div>'+
								'</a>'+
							'</div>'
				)
			}
		})
	}
	
//楼梯
	$(function(){
			var isClick=false;
			$("#loutiNav ul li").click(function(){
				isClick=true;
				$(this).find("span").addClass("active").parent().siblings().find("span").removeClass("active");
	//			获取当前滚动高度
				var iTop=$(".louti").eq($(this).index()).offset().top;
				$("html,body").stop().animate({scrollTop:iTop},200,function(){
					isClick=false;
					});
					 
				})
			
			$(window).scroll(function(){
				if(!isClick){
					var iScrollTop=$(this).scrollTop();
				$(".louti").each(function(){
					if(iScrollTop>=$(this).offset().top-$(this).prev().outerHeight()/2){
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
	