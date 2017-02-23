$(function(){
	var goods = JSON.parse($.cookie("products"));
		console.log(goods);
	for(var key in goods){
		var oTr=$('<tr><td class="tb-product"><div class="product-datail"><img src="'+goods[key].src+'"><h3 class="product-title"><a rel="external, noopener" href="http://www.vip.com/detail.php?bid=921954&amp;mid=135870277" title="PEINAXI女装专场 - 大红欧美时尚简约毛呢外套大衣" target="_blank" data-track="done">'+goods[key].name+'</a></h3></div></td><td class="tb-size">'+goods[key].size+'</td><td class="tb-price"><span class="price-num2"><span class="u-yan">￥</span><span class="u-price1">'+goods[key].price+'</span></span></td><td class="tb-quanity">'+goods[key].amount+'</td></tr>')
		$("tbody").append(oTr);
	}
	$(".u-price").html($(".u-price1").html()*$(".tb-quanity").html());
	$(".J_other_need2pay").html($(".u-price1").html()*$(".tb-quanity").html());
	$(".J_pay_amount").html(Number($(".u-price").html())+Number($(".J_goods_amount").html()));
})
