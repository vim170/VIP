@extends('home.layout.index')
@section('css')
<link rel="stylesheet" href="/ho/css/afters.css">
@endsection
@section('content')
<script src="/ho/js/jquery-1.8.3.min.js"></script>
<div class="nav-bottom">
    <div class="nav-bottom-inner">
        <ul>
            <li class="select"><a href="#">服务中心</a></li>
            <li><a class="have-img" href="/home/#">反馈平台</a></li>
            <li><a href="/home/f#">我的服务</a></li>
            <li><a href="#">新手指南</a></li>
            <a class="have-img" href="#">特卖会首页>></a>
        </ul>
    </div>
</div>


<div class="vip-items">
	<div class="layout items-height">
		<div class="vip-search">
			<div class="hot-search" id="hotSearch">热门查询：<span>配送服务</span><span>唯品花</span><span>快捷支付</span><span>密码</span><span>换货</span></div>
			<div class="vip-query clearfix">
				<input type="text" class="vip-query-input" value="请输入查找的关键字" id="vipSearch"><a href="javascript:;" class="query-button" id="queryButton" mars_sead="v_search_btn">查询</a>
				<div class="my-porduct" id="myPorduct"><a href="//feedback.vip.com/feedback/myfeedback.html" target="_blank" mars_sead="v_myproduct_btn">我的问题解决进度<span href="javascript:;" style="display: none;">0</span></a></div>
			</div>
		</div>
	</div>
</div>
<div class="vip-conter" id="vipConter">
	<div class="layout">
		<div class="vip-bar" id="vipBar">
			<i></i><span id="vipBarSpan">温馨提醒： 春节期间物流公司休假，2月1日-2月10日期间签收的订单，7天无理由自助退货操作由7天延长至20天，感谢您的支持！春节期间物流公司休假
	2月1日-2月10日期间签收的订单，7天无理由自助退货操作由7天延长至20天，感谢您的支持！</span>
		</div>
		<div class="pt30">
			<div class="vip-layout-left">
				<h1 class="vip-title">我的账号</h1>
				<div class="vip-layout-main">
					<!-- 已经登录 -->
					<div class="vip-public" style="display: none;">
						<div id="alreadyLogin"></div>

						<div class="vip-telephone">
							<a href="javascript:;" id="J_openTelephone">预约电话客服</a><a href="" class="kf-ml" id="J_openChat">咨询在线客服</a>
						</div>
					</div>
					<div id="notLogin" class="not-login" style="">
						<p class="not-login-sm">尊敬的会员，你好！<br>登陆后可享受更好更贴心的服务哦~~</p>
						<a href="javascript:;" class="already-login-button" id="alreadyLoginButton">立即登录</a>
					</div>
				</div>
			</div>

			<div class="vip-layout-right">
				<h1 class="vip-title">猜你需要</h1>
				<div class="vip-layout-need">
					<div class="vip-wrapper onactive" id="vipWrapper">
	<div class="welcom-name">欢迎光临</div>
	<img src="/ho/imgs/no-login-img.png">
</div>
				</div>
			</div>
		</div>

		<!--自助服务-->
		<div class=" pt30 acss clearfix">
			<h1 class="vip-title">自助服务</h1>
			<ul class="self-service clearfix" id="selfService">
				<li>
					<a href="//order.vip.com/order/orderlist" target="_blank" mars_sead="v_orderRevisions_btn">
						<i class="gn-dd-icon0"></i>
						<p>修改/取消订单</p>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="look-logistics" mars_sead="v_lookLogistical_btn">
						<i class="gn-dd-icon1"></i>
						<p>查看物流</p>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="acs-delivery" mars_sead="v_delivery_btn">
						<i class="gn-dd-icon2"></i>
						<p>催促配送</p>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="qxps-onclick" mars_sead="v_qxps_btn">
						<i class="gn-dd-icon3"></i>
						<p>取消配送</p>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="acs-acsCash" mars_sead="v_acsCash_btn">
						<i class="gn-dd-icon4"></i>
						<p>提现查询</p>
					</a>
				</li>
				<li>
					<a href="//order.vip.com/order/orderlist" target="_blank" mars_sead="v_buffet_btn">
						<i class="gn-dd-icon5"></i>
						<p>自助退货</p>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="acs-refund" mars_sead="v_refunAd_btn">
						<i class="gn-dd-icon6"></i>
						<p>催促退款</p>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="acs-receipt" mars_sead="v_receipt_btn">
						<i class="gn-dd-icon7"></i>
						<p>补寄发票</p>
					</a>
				</li>
				<li>
					<a href="//myi.vip.com/coupons.html" target="_blank" mars_sead="v_card_btn">
						<i class="gn-dd-icon9"></i>
						<p>激活卡券</p>
					</a>
				</li>
				<li>
					<a href="https://safe.vip.com/profile/safe_center" target="_blank" mars_sead="v_profiless_btn">
						<i class="gn-dd-icon8"></i>
						<p>修改密码</p>
					</a>
				</li>

			</ul>
		</div>


		<!--热点问题-->
		<div class=" pt30 clearfix">
			<h1 class="vip-title">热点问题</h1>
			<ul class="hot-problem clearfix" id="hotProblem">
	
		<li>
			<div class="hot-questions-box">
				<span>[售后服务]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=26" target="_blank" mars_sead="v_hotProblem_0">3C类产品售后退货政策</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[售后服务]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=24" target="_blank" mars_sead="v_hotProblem_1">唯品会提供换货服务吗？</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[购物指南]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=25" target="_blank" mars_sead="v_hotProblem_2">结算不及时 购物袋被清空？</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[售后服务]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=20" target="_blank" mars_sead="v_hotProblem_3">退款说明</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[售后服务]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=19" target="_blank" mars_sead="v_hotProblem_4">退货寄件地址</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[会员中心]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=15" target="_blank" mars_sead="v_hotProblem_5">账号登录密码、支付密码找回自助操作说明</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[配送方式]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=16" target="_blank" mars_sead="v_hotProblem_6">特卖会常见问题说明</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[掌上唯品会]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=17" target="_blank" mars_sead="v_hotProblem_7">掌上唯品会常见问题说明</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[售后服务]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=23" target="_blank" mars_sead="v_hotProblem_8">商品不合适，退货细则看这里</a>
			</div>
		</li>
	
		<li>
			<div class="hot-questions-box">
				<span>[购物指南]</span>
				<a href="//help.vip.com/themelist.php?type=commonques&amp;id=28" target="_blank" mars_sead="v_hotProblem_9">唯品国际常见问题</a>
			</div>
		</li>
	
</ul>
		</div>

		<!--分类指南-->
		<div class=" pt30 clearfix">
			<h1 class="vip-title">帮助中心</h1>
			<ul class="classify-guide clearfix" id="classifyGuide">
	
		<li style="height: 349px;">
			<div class="classify-name">会员中心</div>
			<div class="classify-main">
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=139" target="_blank" mars_sead="v_hotProblem_0_0">唯品币</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=6" target="_blank" mars_sead="v_hotProblem_0_1">会员注册</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=36" target="_blank" mars_sead="v_hotProblem_0_2">密码管理</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=62" target="_blank" mars_sead="v_hotProblem_0_3">账户管理</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=63" target="_blank" mars_sead="v_hotProblem_0_4">邮件通知</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=69" target="_blank" mars_sead="v_hotProblem_0_5">会员成长体系</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=148" target="_blank" mars_sead="v_hotProblem_0_6">手机绑定功能</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=149" target="_blank" mars_sead="v_hotProblem_0_7">唯品金融</a>
					</dd>
				
			</div>
		</li>
	
		<li style="height: 349px;">
			<div class="classify-name">购物指南</div>
			<div class="classify-main">
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=67" target="_blank" mars_sead="v_hotProblem_1_0">特卖会专区</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=136" target="_blank" mars_sead="v_hotProblem_1_1">港澳台专区</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=138" target="_blank" mars_sead="v_hotProblem_1_2">唯品国际</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=68" target="_blank" mars_sead="v_hotProblem_1_3">尺码换算</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=116" target="_blank" mars_sead="v_hotProblem_1_4">发票</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=119" target="_blank" mars_sead="v_hotProblem_1_5">品牌直发</a>
					</dd>
				
			</div>
		</li>
	
		<li style="height: 349px;">
			<div class="classify-name">支付方式</div>
			<div class="classify-main">
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=111" target="_blank" mars_sead="v_hotProblem_2_0">在线支付演示</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=39" target="_blank" mars_sead="v_hotProblem_2_1">在线支付</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=155" target="_blank" mars_sead="v_hotProblem_2_2">唯品卡</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=43" target="_blank" mars_sead="v_hotProblem_2_3">优惠券</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=37" target="_blank" mars_sead="v_hotProblem_2_4">货到付款 </a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=45" target="_blank" mars_sead="v_hotProblem_2_5">唯品钱包</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=137" target="_blank" mars_sead="v_hotProblem_2_6">联名卡</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=147" target="_blank" mars_sead="v_hotProblem_2_7">优惠口令</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=154" target="_blank" mars_sead="v_hotProblem_2_8">快捷支付红包</a>
					</dd>
				
			</div>
		</li>
	
		<li style="height: 349px;">
			<div class="classify-name">配送方式</div>
			<div class="classify-main">
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=50" target="_blank" mars_sead="v_hotProblem_3_0">配送服务</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=51" target="_blank" mars_sead="v_hotProblem_3_1">商品验货与签收</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=73" target="_blank" mars_sead="v_hotProblem_3_2">收货样品</a>
					</dd>
				
			</div>
		</li>
	
		<li style="height: 349px;">
			<div class="classify-name">售后服务</div>
			<div class="classify-main">
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=74" target="_blank" mars_sead="v_hotProblem_4_0">退货政策</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=75" target="_blank" mars_sead="v_hotProblem_4_1">退货流程</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=76" target="_blank" mars_sead="v_hotProblem_4_2">退款方式和时效</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=77" target="_blank" mars_sead="v_hotProblem_4_3">维修服务</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=78" target="_blank" mars_sead="v_hotProblem_4_4">保险理赔</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=82" target="_blank" mars_sead="v_hotProblem_4_5">投诉及建议</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=146" target="_blank" mars_sead="v_hotProblem_4_6">换货服务</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=135" target="_blank" mars_sead="v_hotProblem_4_7">客服电话语音流程</a>
					</dd>
				
			</div>
		</li>
	
		<li style="height: 349px;">
			<div class="classify-name">掌上唯品会</div>
			<div class="classify-main">
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=91" target="_blank" mars_sead="v_hotProblem_5_0">掌上唯品会</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=92" target="_blank" mars_sead="v_hotProblem_5_1">iPhone版</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=93" target="_blank" mars_sead="v_hotProblem_5_2">iPad版</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=94" target="_blank" mars_sead="v_hotProblem_5_3">Android版</a>
					</dd>
				
					<dd>
						<a href="//help.vip.com/themelist.php?cid=80" target="_blank" mars_sead="v_hotProblem_5_4">唯品会wap</a>
					</dd>
				
			</div>
		</li>
	
</ul>
		</div>
	</div>
</div>

@endsection

