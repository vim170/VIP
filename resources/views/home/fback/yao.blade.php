@extends('home.layout.index')
@section('css')
<link rel="stylesheet" href="/ho/css/fback.css">
@endsection
@section('content')
<script src="/home/js/jquery-1.8.3.min.js"></script>
<div class="nav-bottom">
    <div class="nav-bottom-inner">
        <ul>
            <li class="select"><a href="#">首页</a></li>
            <li><a class="have-img" href="/home/fback/index">常见反馈</a></li>
            <li><a href="/home/fback/yao">我要反馈</a></li>
            <li><a href="/home/fback/de">我的反馈</a></li>
        </ul>
    </div>
</div>
<div class="layout mt45 clearfix">
    	<div class="left_module fleft">
        	<div class="left_module_title">
        		<h2>您提交的问题将会在 <span>24小时</span> 内得到处理，如需了解最新情况请到“我的反馈”中查看！
</h2>
                <p>问题处理后，我们会第一时间以站内信的形式告知：<a href="//myi.vip.com/messageCenter.html" target="_blank">查看收件箱</a></p>
            </div>
			    
            <ul class="feedback_form ">
                <li class="clearfix">
                    <span class="field_form">您的反馈类型是：</span>
                    <input autocomplete="off" type="radio" class="feedback_type J_feedback_type" name="feedback_type" id="feedback_type1" value="1"><label class="feedback_type_lab" for="feedback_type1">购物问题</label>
                    <input autocomplete="off" type="radio" class="feedback_type J_feedback_type" name="feedback_type" id="feedback_type2" value="2"><label class="feedback_type_lab" for="feedback_type2">与订单相关</label>
                    <input autocomplete="off" type="radio" class="feedback_type J_feedback_type" name="feedback_type" id="feedback_type3" value="3"><label class="feedback_type_lab" for="feedback_type3">账户问题/投诉建议</label>
                    <input autocomplete="off" type="radio" class="feedback_type J_feedback_type" name="feedback_type" id="feedback_type4" value="0"><label class="feedback_type_lab" for="feedback_type4">其他</label>
                    <div class="form_right">
                    	<span id="feedbackTypeTips" class="J_typeTips" style="display:none;color:red;font-size:14px;margin-left:155px;">请选择反馈类型</span>
                    </div>
                </li>
                <li class="clearfix J_orderLi" id="orderLi" style="display: none;">
                	<span class="field_form">请输入您的订单号：</span>
                    <div class="order_box">
                        <input type="text" autocomplete="off" class="txt_from J_order_id" id="order_id" name="order_id" data-verify="[13, 20]" maxlength="20" value="请输入正确的订单号">
                        <div class="order_list J_order_list hidden">
                        
                        
                        <a class="item clearfix" href="###" data-orderid="14122689261546">
                        	
                        	<!-- https://img2.vip.com/upload/merchandise/c1508/UNDERWARE-IL8-B03YN-2.jpg -->
                        		<img width="50" height="63" src="//a.vpimg2.com/upload/merchandise//265968//TONLION-614411064403314-5.jpg">
				            
				            
                                <div class="text">
                                    <p>订单号：14122689261546</p>
                                    <p>2014-12-26 21:56:54</p>
                                </div>
                            </a>
                        
                        <!-- 
                            <a class="item clearfix" href="###" data-orderid="14081159783015">
                                <img width="50" height="63" src="http://img2.vip.com/upload/merchandise/201406/2014061818010523100.jpg">
                                <div class="text">
                                    <p>订单号：14081159783015</p>
                                    <p>2014-07-12 14:20:36</p>
                                </div>
                            </a>
                            <a class="item clearfix" href="###" data-orderid="14081159783015">
                                <img width="50" height="63" src="http://img2.vip.com/upload/merchandise/201406/2014061818010523100.jpg">
                                <div class="text">
                                    <p>订单号：14081159783015</p>
                                    <p>2014-07-12 14:20:36</p>
                                </div>
                            </a>
                            <a class="item clearfix" href="###" data-orderid="14081159783015">
                                <img width="50" height="63" src="http://img2.vip.com/upload/merchandise/201406/2014061818010523100.jpg">
                                <div class="text">
                                    <p>订单号：14081159783015</p>
                                    <p>2014-07-12 14:20:36</p>
                                </div>
                            </a> -->
                            <p class="more"><a href="//order.vip.com/order/orderlist" target="_blank">查看全部订单 &gt;&gt;</a></p>
                            
                        </div>
                    </div>
					<div class="form_right"><span id="orderIdTips" class="J_orderIdTips msg_warning" style="display:none;margin-left:155px;">请输入正确的订单号</span></div>  
                </li>
                <li class="clearfix J_titleLi" id="titleLi">
                	<span class="field_form">标题：</span>
                    <input type="text" class="txt_from txt_from2 fleft J_orderTitle" id="order_title" name="order_title" data-verify="[4, 30]" autocomplete="off" maxlength="30" value="请输入4-30个字">
					<div class="form_right">
                        <span class="msg_warning J_orderTitleTips" id="orderTitleTips" style="display:none;margin-left:155px;">输入内容不符合要求，请输入4-30个字</span>
                    </div>
                </li>
                <li class="clearfix J_content">
                	<span class="field_form">内容：</span>
                    
                    <div class="textarea_box">
                        <textarea class="textarea_form J_orderContent" id="order_content" name="order_content" data-verify="[10, 1000]" maxlength="1000" autocomplete="off">亲爱的会员，希望您提出中肯的反馈，我们会认真对待每一个会员的反馈，持续改进服务以获得您的认可。涉及具体页面，请附上相关链接，非常感谢。（请输入10-1000个字）</textarea>
                        <p class="num">您还可以输入 <span>1000</span> 字</p>
                    </div>
					<div class="form_right">
						<span class="msg_warning J_orderContentTips" id="orderContentTips" style="display:none;margin-left:155px;">输入内容不符合要求，请输入10-1000个字</span>  
					</div>
                </li>
                <li class="clearfix">
                	<span class="field_form">输入电话/邮箱：</span>
                   	<div class="form_right">
                    	<input type="text" class="txt_from J_phone" name="phone" id="phone" data-verify="phone" value="手机号 或 区号-固话">
                        <p class="form_ts">（输入您的电话或邮箱方便我们及时和您沟通，唯品会承诺不会泄露该联系方式）</p>
						<span class="msg_warning J_phoneTips" id="phoneTips" style="display:none;">您输入的联系方式可能有误，请再次输入</span>                       
                    </div>
                </li>
				<li class="clearfix">
                	<span class="field_form">验证码：</span>
                    <input type="text" class="txt_from txt_from2 J_verifyCode" value="请输入正确验证码" id="verifyCode" name="verifyCode">
					<img id="iii" border="0" src="image.jsp"> <span style="line-height: 28px;"><a href="javascript:void(0);" class="J_ffa" id="ffa">看不清，换一张</a></span>
					<span id="verifyCodeTips" class="msg_warning J_verifyCodeTips" style="display:none;margin-left:155px;">请输入正确验证码</span>        
                </li>
				<li class="clearfix">
                	<span class="field_form"></span>
                    <a href="###" class="J_sb fl btn btn_red mt20">提交</a>
				</li>
            </ul>
        </div>
        
        <div class="right_module fright">
            <!--您可以选择自主操作-->
        	<div class="right_side mb20 J_right_modules" id="right_modules">
                 <div id="orderCorrelation" class="J_orderCorrelation">
                    <div class="self_help">
                        <h5>订单管理</h5>
                        <p>
                            <a href="//order.vip.com/order/orderlist#" class="self_help_2 J_fb_zz_k" data-cckey="?f=feedback_sevice_edit ordes_link" target="_blank">修改/取消订单</a>
                        </p>
                    </div>
                    <div class="self_help">
                        <h5>物流配送</h5>
                        <p>
                            <a href="//acs.vip.com/service_urge14.html?f=acs_sevice_delivery_link" class="self_help_4 J_ccpsOnclick J_fb_zz_k" data-cckey="?f=feedback_sevice_delivery_link" target="_blank" data-track="done">催促配送</a>
                        </p>
                        <p>
                            <a href="//order.vip.com/order/orderlist#" class="self_help_1" target="_blank">查看订单物流</a>
                        </p>
                    </div>
                    <div class="self_help">
                        <h5>售后服务</h5>
	                	<p>
	                        <a href="//order.vip.com/order/returnlist#" class="self_help_3 J_fb_zz_k" data-cckey="?f=feedback_sevice_return goods_link" target="_blank">申请退货</a>
	                    </p>
	                	<p>
	                        <a href="//acs.vip.com/service_urge02.html?f=acs_sevice_refund_link" class="self_help_6 J_cctkOnclick J_fb_zz_k" data-cckey="?f=feedback_sevice_refund_link" target="_blank">催促退款</a>
	                    </p>
	                    <p>
	                        <a href="//acs.vip.com/service_urge03.html?f=acs_sevice_receipt_link" class="self_help_7 J_bjfpOnclick J_fb_zz_k" data-cckey="?f=feedback_sevice_Invoice_link" target="_blank">补寄发票</a>
	                    </p>
	                </div>
                </div>
               <div id="accountFeedbacks" class="J_accountFeedbacks" style="display: none;">
	                <div class="self_help">
                        <h5>账户问题</h5>
	                	<p>
	                        <a href="https://myvpal.vip.com/pc/wallet" class="self_help_8 J_fb_zz_k" data-cckey="?f=feedback__look_wallet_link" target="_blank">查看唯品钱包</a>
	                    </p>
	                	<p>
	                        <a href="//myi.vip.com/coupons.html" class="self_help_9 J_fb_zz_k" data-cckey="?f=feedback_sevice_voucher_link" target="_blank">查看/激活代金券</a>
	                    </p>
	                	<p>
	                        <a href="//myi.vip.com/vipmoney.html" class="self_help_10 J_fb_zz_k" data-cckey="?f=feedback__refund_link" target="_blank">查看唯品币</a>
	                    </p>
	                	<p>
	                        <a href="https://safe.vip.com/profile/safe_center" class="self_help_11 J_fb_zz_k" data-cckey="?f=feedback_sevice_password_link" target="_blank">修改/找回密码</a>
	                    </p>
	                	<p>
	                        <a href="https://myvpal.vip.com/pc/withdrawApply" class="self_help_12 J_fb_zz_k" data-cckey="?f=feedback_put_wallet_link" target="_blank">钱包提现</a>
	                    </p>
	                </div>
                </div>
            </div>
            <!--以下反馈可能对您的有帮助-->
            <div class="right_modules">
            	<h2 class="right_title">
                	以下反馈可能对您有帮助
                </h2>
                <ul class="help_list">
                	<div id="help_list_li" class="J_help_list_li">
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5251039">1 一元购活动入口在哪找到</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5101724">2 生日礼券</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5101588">3 这怎么看评价</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5101458">4 货退了，款没到</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5042599">5 怎么提现</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5041502">6 码数太大能换吗？</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5041288">7 可以办分期吗</a></li>
	                	
	                		<li><a href="feedback!detailFeedback.do?ua_id=5022225">8 非常喜欢这件！</a></li>
	                	
                	</div>
                </ul>
                <p class="help_list_more"><a href="feedback!hotFeedback.do" target="_blank">更多相关反馈&gt;&gt;</a></p>
            </div>
        </div>
    </div>
    <div id="wei"></div>
@endsection