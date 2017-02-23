$(function(){
	//获取cookie中的商品信息
	var goods = JSON.parse($.cookie("products"));
	console.log(goods);
	for(var key in goods){
//		console.log(goods[key].num);
	//动态创建节点   num
	var oTr = $('<tr id="1"><td class="tb-product"><div class="product-datail"><img src="'+goods[key].src+'" /><h3 class="product-title"><a rel="external, noopener" href="http://www.vip.com/detail.php?bid=921954&amp;mid=135870277" title="PEINAXI女装专场 - 大红欧美时尚简约毛呢外套大衣" target="_blank" data-track="done">'+goods[key].name+'</a></h3><p class="product-size">尺码:'+goods[key].size+'</p></div></td><td class="tb-price"><span class="price-num"><span class="u-yan">￥</span><strong class="u-price">'+goods[key].price+'</strong></span><del class="market-price"><span class="u-yan">￥</span><span class="u-price2">2069</span></del></td><td class="tb-num"><div class="num-box"><span class="num-reduce"></span><em class="num-input">'+goods[key].amount+'</em><span class="num-add"></span></div></td><td class="tb-discount"><span class="discount-price"><span class="u-yen">￥</span><strong class="u-discount">'+goods[key].price*goods[key].amount+'</strong></span></td><td class="tb-del"><button class="del-trash"><span class="u-icon icon-trash-lid trash-lid"></span><span class="u-icon icon-trash-can trash-can"></span></button><div class="del-tip"><div class="del-tip-content"><p class="tip-text">删掉的商品将可能被别人抢走哦，确定要删除吗？</p><div class="tip-command"><a href="###" role="button" class="ui-btn-mini ui-btn-primary J_fake_a J_cart_tips_del_confirm" mars_sead="cart_delok_btn">删除</a><a href="###" role="button" class="ui-btn-mini ui-btn-default J_fake_a J_cart_tips_del_cancel" mars_sead="cart_delx_btn">先留着</a></div></div></div></td></tr>');
		$("tbody").append(oTr);
	}
	getTotal();
	//左右按钮的点击事件
	/*---商品数量的增减------*/
	$(".num-reduce").each(function(i){
		$(this).click(function(){
//			console.log(i)
			var val = $(".num-input").eq(i).html();
			val--;
			if(val<=1){
				val = 1;
				$(this).addClass('limited');
			}
			//当前的数量值
			$(".num-input").eq(i).html(val);
			// 将计算后的数量保存到 cookie 中对应的商品数量上
			getTotal();
			saveCookie(val,i);
			//getToTal(iPrivilege);
		});
	});
	$(".num-add").each(function(i){
		$(this).click(function(){
			var val = $(".num-input").eq(i).html();
			val++;
			if(val>1){
				$(".num-add").eq(i).removeClass('limited');
			}
			$(".num-input").eq(i).html(val);
			getTotal();
			saveCookie(val,i);
		});
	});
	/*--------删除功能-------*/
	$(".del-trash").each(function(i){
		$(this).click(function(){
			var iId = $(this).parents("tr").attr("id");
//			console.log(iId);
			//删除页面中的节点
			//获取对应索引
			var good_index = $(this).parents("tr").index();			
			$(this).parents("tr").detach();
			goods.splice(good_index,1);
//			console.log(good_index)
//			console.log(goods)
			//删除对应的cookie中的商品的数据
//			delete goods["good"+ iId];
			/*if($.cookie("products")){
					$.cookie("products",JSON.stringify("goods"),{"expires":-1,"path":"/"});		
			}*/
			//再次保存COOKIE
			$.cookie("products",JSON.stringify(goods),{"expires":200,"path":"/"});
//			删除后判，如果购物车为空（这时候存储商品的内容为空，但是这个JSON对象本身还存在），那么删除这个JSON对象
//			 if($(".cart-form").length===0){
//			 	$.cookie("goods","",{"expires":-1,"path":"/"});
//			 }
			//console.log($.cookie("goods"));
		});
	});
	$("#del").parent().click(function(){
		$(".cart-form").each(function(){
			$(this).find("input:checked").parents(".cart-form").detach();
		});
		getToTal(iPrivilege);
		if($(".cart-form").length===0){
			$.cookie("goods","",{"expires":-1,"path":"/"});
		}
	});
	
});
//封装存cookie的函数
function saveCookie(_num,i){
	var products = JSON.parse($.cookie("products"));
	/*for(var key in products){
		products[key].amount = _num;
	}*/
//	console.log(products)
	products[i].amount = _num;
	//再次存cookie
	$.cookie("products",JSON.stringify(products),{"expires":10,"path":"/"});
}
//封装计算总价的函数
function getTotal(){
	var iSelectNum = 0;
	var iPrice =0;
	var iSubtotal = 0;
	var iSelect = 0;	//已选商品数量
	var iGoodAmount = 0;	//商品金额
	var len = $("tbody tr").length;
for(var i=0;i<len;i++){
		iSelectNum =  parseInt($(".num-input").eq(i).html());
		iPrice = $(".u-price").eq(i).html();
		//当前行的价格小计
		iSubtotal = iSelectNum*iPrice;
//		console.log(iSelectNum,iPrice);
		$(".u-discount").eq(i).html(iSubtotal);
	
			//已选商数量
			//iSelect += iSelectNum;
			//商品金额
			iGoodAmount += iSubtotal;	
	}
	//$("#total-num").html(iSelect);
	$(".total-two-right strong").html(iGoodAmount);
}