@extends('home.layout.index')
@section('css')
<link rel="stylesheet" href="/ho/css/custser.css">
@endsection

@section('content')
<div class="nav-bottom">
            <div class="nav-bottom-inner">
                <ul>
                    <li class="select"><a href="#">首页</a></li>
                    <li><img src="/ho/imgs/hot.gif"><a class="have-img" href="#">唯品国际</a></li>
                    <li><a href="#">母婴</a></li>
                    <li><a href="#">居家</a></li>
                    <li><a href="#">男士</a></li>
                    <li><img src="/ho/imgs/hot.gif"><a class="have-img" href="#">秋季美妆节</a></li>
                    <li><a href="#">唯品金融</a></li>
                    <li><a href="#">旅行</a></li>
                    <li class="more"><a class="have-sanjiao" href="#">更多</a><div class="sanjiao"></div>
                       <div class="channel-item-group">
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-1.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">旅行</p>
                                   </div>
                               </a>
                           </div>
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-2.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">女装</p>
                                   </div>
                               </a>
                           </div>
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-3.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">鞋包</p>
                                   </div>
                               </a>
                           </div>
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-4.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">配饰</p>
                                   </div>
                               </a>
                           </div>
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-5.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">运动</p>
                                   </div>
                               </a>
                           </div>
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-6.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">汽车</p>
                                   </div>
                               </a>
                           </div>
                           <div class="channel-item">
                               <a href="#" class="channel-more-itemlink">
                                   <img src="/ho/imgs/channel-item-img-7.jpg">
                                   <div class="shadow"></div>
                                   <div class="brand-text">
                                       <p class="brand-name">爱丽奢</p>
                                   </div>
                               </a>
                           </div>
                       </div>
                    </li>
                    <li class="fenlei"><img src="/ho/imgs/search.png"><a class="have-img" href="#">分类</a></li>
                </ul>
            </div>
        </div>
<div class="main_container_bg">
    <div id="main" class="container clearfix">
      <div class="tips_index_bar" id="J_tips_bar" style="display:none">
        <i class="tips_bar_ico"></i>
        <strong id="J_tips_bar_text"></strong>
        <a href="javascript:;" rol="button" class="J_tip_bar_notice2">将处理情况通知我</a>
        <span class="tips_close J_tips_close">
          <a href="#"></a>
        </span>
      </div>
          <!-- <div class="del_item">
            <p class="del_single">订单 <span class="del_order">15032366907818 </span> 在配送途中，预计于 <span class="del_time">2015-03-28</span> 送达，最新物流信息： <span class="del_info"></span></p>
          </div>
          <div class="del_item">
            <p class="del_single">订单 <span class="del_order">15032366907818 </span> 在配送途中，最新物流信息： <span class="del_info"></span></p>
            <p>该订单原预计在 <span class="del_time">2015-03-28</span> 送达，现已出现延误，给您带来不便请见谅。如需催促配送，请 <a class="del_link" href="service_urge14.html?f=acs_sevice_delivery_link">点击此处</a></p>
          </div>
          <div class="del_item">
            <p>订单 <span class="del_order">15032366907818 </span>需要异地调拨发货（1-2天），请耐心等候。<a class="del_link" href="//order.vip.com/detail/index?ordersn=">查看订单详细</a></p>
          </div> -->
      <div style="float:left; width:767px;">
        <div class="delivery_info" style="display: none">
          <p class="del_title">订单配送提示：</p>
          <div class="cont"></div>
          <div class="del_btn"><span class="abt_btn">我知道了</span></div>
          <span class="del_close"></span>
        </div>
        <div class="container_left" id="J_container_left">
          <h3 class="b_tit">联系客服</h3>
          <p class="title">1.选择您咨询的问题类型<span class="arrow"></span></p>
          <div id="J_service_content" class="service_content_wrapper">
            <ul class="questions clearfix">
              <li>
                <p class="J_Anchor pli_title">与订单相关</p>
                <p class="pli_line">
                  <span class="J_type_btn" data-type="A01">
                    <a href="javascript:;">
                      <i class="qa_dd_ico1"></i>
                      订单配送
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="A02">
                    <a href="javascript:;">
                      <i class="qa_dd_ico2"></i>
                      退货退款
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="A03">
                    <a href="javascript:;">
                      <i class="qa_dd_ico3"></i>
                      订单操作
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="A04">
                    <a href="javascript:;">
                      <i class="qa_dd_ico4"></i>
                      补寄发票
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="A05">
                    <a href="javascript:;">
                      <i class="qa_dd_ico5"></i>
                      包裹异常
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                </p>
              </li>
              <li>
                <p class="J_Anchor pli_title">购物问题</p>
                <p class="pli_line">
                  <span class="J_type_btn" data-type="B01">
                    <a href="javascript:;">
                      <i class="qa_gw_ico1"></i>
                      支付问题
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="B02">
                    <a href="javascript:;">
                      <i class="qa_gw_ico2"></i>
                      商品咨询
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="B03">
                    <a href="javascript:;">
                      <i class="qa_gw_ico3"></i>
                      售后咨询
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="B04">
                    <a href="javascript:;">
                      <i class="qa_gw_ico4"></i>
                      配送方式
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="B05">
                    <a href="javascript:;">
                      <i class="qa_gw_ico5"></i>
                      活动咨询
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                </p>
              </li>
              <li>
                <p class="J_Anchor pli_title">账户问题/投诉</p>
                <p class="pli_line pli_line_last">
                  <span class="J_type_btn" data-type="C01">
                    <a href="javascript:;">
                      <i class="qa_ts_ico1"></i>
                      钱包提现
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="C02">
                    <a href="javascript:;">
                      <i class="qa_ts_ico2"></i>
                      账户问题
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="C03">
                    <a href="javascript:;">
                      <i class="qa_ts_ico3"></i>
                      唯品金融
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                  <span class="J_type_btn" data-type="C04">
                    <a href="javascript:;">
                      <i class="qa_ts_ico4"></i>
                      优惠券/积分
                    </a>
                  </span>
                  <span class="J_type_btn" data-type="C05">
                    <a href="javascript:;">
                      <i class="qa_ts_ico5"></i>
                      建议投诉
                    </a>
                    <span class="btn_loading"></span>
                  </span>
                </p>
              </li>
            </ul>
            
            <div class="service_content clearfix" id="J_content_wrap">
              <div class="orders J_service_list list_swich">
                <div id="J_orders_swiches" class="list_swich_order hidden">
                  <h3 class="list_order_title fwr">请选择相应的订单(最近三个月以内有效订单)</h3>
                  <div class="list_order_content list_order_index" id="J_userOrderList">
                    <div class="J_slide_y" style="margin-top: 0px;">
                      <table id="J_orders">
                        <tbody id="J_orderList_frame"></tbody>
                      </table>
                    </div>
                  </div>
                  <div class="orders_control_bar hidden" id="J_orderSwitchTri">
                    <div class="orders_control">
                      <span class="orders_control_pre" id="J_order_pre"></span>
                      <span class="orders_control_next" id="J_order_next"></span>
                    </div>
                  </div>
                </div>

                <!-- 账号信息 -->
                <div class="account_detail hidden" id="J_account_wrap">
                  <div class="accd_info">
                    <h4>个人账户信息</h4>
                    <p>会员等级：<font style="font-family:'微软雅黑'; " id="J_userClass"></font></p>
                    <p>钱包余额：<font style="font-family:'微软雅黑'; " id="J_walMoney"></font><a href="https://myvpal.vip.com/pc/wallet" class="accd_detail" target="_blank">明细&gt;&gt;</a></p>
                    <p>礼品卡余额：<font style="font-family:'微软雅黑'; " id="J_gifMoney"></font><a href="//myi.vip.com/coupons.html" class="accd_detail" target="_blank">明细&gt;&gt;</a></p>
                    <p>积分总额：<font id="J_userJf_all"></font>&nbsp;&nbsp;&nbsp;&nbsp;可用积分总额：<font id="J_userJf_avail"></font><a href="//myi.vip.com/integral.html" class="accd_detail" target="_blank">明细&gt;&gt;</a></p>
                  </div>
                  <div class="accd_ticket">
                    <p>可用代金券列表<a href="//myi.vip.com/coupons.html" class="accd_detail" target="_blank">明细&gt;&gt;</a></p>
                    <table class="accd_ticket_table" id="cardlist">
                      <tbody>
                        <tr>
                          <th>金额（元）</th>
                          <th>最小消费金额</th>
                          <th>使用截止日期</th>
                        </tr>
                        <tr class="tr2" id="nocard" style="background-color: rgb(248, 248, 248);">
                          <td align="center" colspan="3">无可用代金券</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="step_02 step_02_bg" id="J_queList_wrap"></div>

                <div class="service_loading hidden">
                  <p>
                    <img src="./views/static/release/img/acs/loading.gif" width="32" height="32">
                  </p>
                </div>
                <!-- 一3解决方案 -->
                <div class="step_03 hidden" id="J_showAnswer">
                  <p class="sep-title">3.我们给您的解决方案<span class="arrow"></span></p>
                  <div class="solution">
                    <div class="cnt">
                      <div class="cnt_icon fl"></div>
                      <div class="cnt_txt fl" id="J_answerWrap"></div>
                    </div>
                    <div class="answer">
                      <div class="answer_list">
                        <p id="J_solution_done" onclick="jjclick('A')">已解决</p>
                        <p id="J_solution_none" onclick="wjjclick('A')">未解决</p>
                      </div>
                      <div class="clearfix hidden" id="J_solution_submit_txt">
                        <input name="content" id="textareaA" value="您可以在此写下您的意见或建议">
                        <button type="button" id="J_solution_submit" onclick="textareaClick('A')"></button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="Acontact"></div>
                                
                  <div class="contact">
                    <p class="am_top">如未解决问题，请通过以下方式联系我们:</p>
                    <div class="am_link hidden" id="J_apmEntrance">
                      <a href="/service_apm.html" target="_blank" title="皇冠会员电话预约专线 无须等待，专享客服">
                        <img src="./views/static/release/img/acs/apimt_link.jpg" alt="皇冠会员电话预约专线 无须等待，专享客服">
                      </a>
                    </div>
                    <div id="Azx" class="am_box hidden">
                      <h4>咨询在线客服</h4>
                      <p>在线客服人工服务时间：每天9:00-24:00</p>
                      <div class="am_box_tool">
                        <span class="abt_btn" id="J_openChat">开启聊天窗口</span>
                        <span class="am_icon hidden" id="J_online_recoIco"></span>
                      </div>
                    </div>
                    <div id="J_400_part1" class="am_box hidden">
                      <h4>咨询电话客服</h4>
                      <p>电话客服人工服务时间：每天9:00-24:00</p>
                      <div class="am_box_tool">
                        <span class="abt_btn" id="J_check400Number">查看400热线</span>
                      </div>
                      <span class="am_icon hidden J_phone_recoIco"></span>
                    </div>
                    <div id="J_400_part2" class="am_box hidden">
                      <p class="am_top_s">400-6789-888</p>
                      <p class="am_txt_s"><a href="//help.vip.com/themelist.php?type=detail&amp;id=404" target="_blank"><span id="Bivr_message"></span></a></p>
                      <span class="am_icon hidden J_phone_recoIco"></span>
                    </div>
                    <div id="Aly" class="am_box hidden">
                      <h4>反馈建议</h4>
                      <p>9:00-21:00留言三小时内回复21:00后留言次日11:00前回复</p>
                      <div class="am_box_tool">
                        <a class="abt_btn" id="J_needFb" target="_blank" href="//feedback.vip.com/feedback/writefeedback.html">我要反馈</a>
                        <span class="am_icon hidden" id="J_fb_recoIco"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="J_service_list list_swich hidden">
                <div class="step_02 step_02_bg"><!-- 二2具体问题 -->
                  <p class="sep-title">2.选择您遇到的具体问题<span class="arrow"></span></p>
                  <ul class="step_02_list">
                    <li>
                      <a href="#">查询正常发货与配送时效？</a>
                    </li>
                    <li>
                      <a href="#">查看订单包裹到哪了？</a>
                    </li>
                    <li>
                      <a href="#">刚刚下的订单，货还没有收到，商品就降价了，应该怎么做，能退货吗？</a>
                    </li>
                    <li>
                      <a href="#">查询正常发货与配送时效？</a>
                    </li>
                  </ul>
                  <div class="cq_vipbao" id="Bvipbao_show" style="display: none;">
                    <a href="javascript:;" onclick="zaixian();" class="cq_vipbao_link" target="_blank">智能客服唯小宝</a>
                  </div>
                </div>
                <div class="service_loading hidden">
                  <p>
                    <img src="./views/static/release/img/acs/loading.gif" width="32" height="32">
                  </p>
                </div>
                <!-- 二3解决方案 -->
                <div class="step_03" id="Bstep_03" style="display: none">
                  <p class="sep-title">3.我们给您的解决方案<span class="arrow"></span></p>
                  <div class="solution">
                    <div class="cnt">
                      <div class="cnt_icon fl"></div>
                      <div class="cnt_txt fl" id="Banswer"></div>
                    </div>
                    <div class="answer">
                      <div class="answer_list">
                        <p id="J_solution_done2" onclick="jjclick('B')">已解决</p>
                        <p id="J_solution_none2" onclick="wjjclick('B')">未解决</p>
                      </div>
                      <div class="clearfix hidden" id="J_solution_submit_txt2">
                        <form class="J_submit_form">
                          <input name="content" id="textareaB" value="您可以在此写下您的意见或建议">
                          <button type="button" id="J_solution_submit" onclick="textareaClick('B')"></button>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="Bcontact"></div>
                                
                  <div class="contact and_more">
                    <p class="am_top">如未解决问题，请通过以下方式联系我们:</p>
                    <div id="Bzx" class="am_box">
                      <h4>咨询在线客服</h4>
                      <p>在线客服人工服务时间：每天9:00-24:00</p>
                      <div class="am_box_tool">
                        <a onclick="zxclick('B');zaixian(); " class="abt_btn" href="javascript:;">开启聊天窗口</a>
                        <span id="Bt1" class="am_icon" style="display: none"></span>
                      </div>
                    </div>
                    <div id="Bdh" class="am_box J_400_part1">
                      <h4>咨询电话客服</h4>
                      <p>电话客服人工服务时间：每天9:00-24:00</p>
                      <div class="am_box_tool">
                        <span class="abt_btn J_abt_btn" onclick="dhclick('B');">查看400热线</span>
                      </div>
                      <span id="Bt2" class="am_icon" style="display: none"></span>
                    </div>
                    <div class="am_box hidden J_400_part2">
                      <p class="am_top_s">400-6789-888</p>
                      <p class="am_txt_s"><a href="//help.vip.com/themelist.php?type=detail&amp;id=404" target="_blank"><span id="Bivr_message"></span></a></p>
                      <span id="Bt2" class="am_icon" style="display: none"></span>
                    </div>
                    <div id="Bly" class="am_box">
                      <h4>反馈建议</h4>
                      <p>9:00-21:00留言三小时内回复21:00后留言次日11:00前回复</p>
                      <div class="am_box_tool">
                        <a class="abt_btn" target="_blank" href="//feedback.vip.com/feedback/writefeedback.html" onclick="lyclick('B');">我要反馈</a> 
                        <span id="Bt0" class="am_icon" style="display: none"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- 三 其他问题(账户信息,投诉) -->
              <div class="list_swich hidden">
                <div class="step_02 step_02_bg"><!-- 三2具体问题 -->
                  <p class="sep-title">2.选择您遇到的具体问题<span class="arrow"></span></p>
                  <ul class="step_02_list">
                    <li>
                      <a href="#">查询正常发货与配送时效？</a>
                    </li>
                    <li>
                      <a href="#">查看订单包裹到哪了？</a>
                    </li>
                    <li>
                      <a href="#">刚刚下的订单，货还没有收到，商品就降价了，应该怎么做，能退货吗？</a>
                    </li>
                    <li>
                      <a href="#">查询正常发货与配送时效？</a>
                    </li>
                  </ul>
                  <div class="cq_vipbao" id="Cvipbao_show" style="display: none;">
                    <a href="javascript:;" onclick="zaixian();" class="cq_vipbao_link" target="_blank">智能客服唯小宝</a>
                  </div>
                </div>
                <div class="service_loading hidden">
                  <p>
                    <img src="./views/static/release/img/acs/loading.gif" width="32" height="32">
                  </p>
                </div>
                <!-- 三3解决方案 -->
                <div class="step_03" id="Cstep_03" style="display: none">
                  <p class="sep-title">3.我们给您的解决方案<span class="arrow"></span></p>
                  <div class="solution">
                    <div class="cnt">
                      <div class="cnt_icon fl"></div>
                      <div class="cnt_txt fl" id="Canswer"></div>
                    </div>
                    <div class="answer">
                      <div class="answer_list">
                        <p id="J_solution_done3" onclick="jjclick('C')">已解决</p>
                        <p id="J_solution_none3" onclick="wjjclick('C')">未解决</p>
                      </div>
                      <div class="clearfix hidden" id="J_solution_submit_txt3">
                        <input name="content" id="textareaC" value="您可以在此写下您的意见或建议">
                        <button type="button" id="J_solution_submit" onclick="textareaClick('C')"></button>
                      </div>
                    </div>
                  </div>

                  <div class="Ccontact"></div>
                                
                  <div class="contact and_more">
                    <p class="am_top">如未解决问题，请通过以下方式联系我们:</p>
                    <div id="Czx" class="am_box">
                      <h4>咨询在线客服</h4>
                      <p>在线客服人工服务时间：每天9:00-24:00</p>
                      <div class="am_box_tool">
                        <a onclick="zxclick('C');zaixian(); " class="abt_btn" href="javascript:;">开启聊天窗口</a>  
                        <span id="Ct1" class="am_icon" style="display: none"></span>                    
                      </div>
                    </div>
                    <div id="Cdh" class="am_box J_400_part1">
                      <h4>咨询电话客服</h4>
                      <p>电话客服人工服务时间：每天9:00-24:00</p>
                      <div class="am_box_tool">
                        <span class="abt_btn J_abt_btn" onclick="dhclick('C');">查看400热线</span>
                      </div>
                      <span id="Ct2" class="am_icon" style="display: none"></span>  
                    </div>
                    <div class="am_box hidden J_400_part2">
                      <p class="am_top_s">400-6789-888</p>
                      <p class="am_txt_s"><a href="//help.vip.com/themelist.php?type=detail&amp;id=404" target="_blank"><span id="Civr_message"></span></a></p>
                      <span id="Ct2" class="am_icon" style="display: none"></span>
                    </div>
                    <div id="Cly" class="am_box">
                      <h4>反馈建议</h4>
                      <p>9:00-21:00留言三小时内回复21:00后留言次日11:00前回复</p>
                      <div class="am_box_tool">
                      <a class="abt_btn" target="_blank" href="//feedback.vip.com/feedback/writefeedback.html" onclick="lyclick('C');">我要反馈</a>
                      <span id="Ct0" class="am_icon" style="display: none"></span>                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- 右边框  -->
      <div class="container_right container_right_fix" id="J_container_right" style="position: absolute; top: 461px;">
        <div class="src_ad J_right_ad">
          
          
          <ul class="src_ad_list J_right_ad_panel">
          <li class="src_ad_item"><a href="//blog.vip.com/blog.php?act=content&amp;id=3407&amp;adidx=1&amp;f=ad&amp;adp=1216&amp;adid=64064" target="_blank" title="" data-track="done"><img src="//a.vpimg4.com/upload/cmc/2015/01/27/55/f2272eced6e248f3890cdfb118740a62APPguanggao.jpg" alt="" width="221" height="131"></a></li></ul> 
          <ul class="src_ad_btn J_right_ad_trigger">
          </ul>
        </div>
        <div class="src_ad am_right hidden" id="J_apmEntrance_imme">
          <a href="/service_apm.html" target="_blank" title="电话预约—皇冠会员专享 立即使用">
            <img src="./views/static/release/img/acs/apimt_right.jpg" width="221" height="131" alt="电话预约—皇冠会员专享 无须拨打 按时回电 专享客服">
          </a>
        </div>
        <div class="src_nav">
          <h4 class="src_nav_top">自助服务</h4>
          <ul class="src_nav_list">
            <li class="src_nav_item_tit">订单管理</li>
              <li class="src_nav_item">
                <a href="//order.vip.com/order/orderlist" target="_blank" mars_sead="acs_edit orders_btn">
                  <span class="sni_item type4">修改订单</span>
                </a>
              </li>
            <li class="src_nav_item">
              <a href="//order.vip.com/order/orderlist" target="_blank">
                <span class="sni_item type4">取消订单</span>
              </a>
            </li>
            <li class="src_nav_item_tit">物流配送</li>
              <li class="src_nav_item">
                <a mars_sead="acs_sevice_view orders_btn" href="javascript:;">
                  <span class="J_ckddwl sni_item type4" mars_sead="acs_service_view orders_btn">查看订单物流</span>
              </a>
            </li>
            <li class="src_nav_item">
              <a class="J_ccps14Onclick" href="service_urge14.html?f=acs_sevice_delivery_link" target="_blank" mars_sead="acs_sevice_delivery_btn" data-track="done">
                <span class="sni_item type4">催促配送</span>
              </a>
            </li>
            <li class="src_nav_item">
              <a class="J_qxpsOnclick" href="service_qxps.html?f=acs_sevice_cancel delivery_link" target="_blank" mars_sead="" data-track="done">
                <span class="sni_item type8" target="_blank">取消配送</span>
              </a>
            </li>
            <!-- <li class="src_nav_item">
              <a class="J_changeAdClick" href="service_changeAD.html?f=acs_sevice_changeAD" target="_blank" mars_sead="">
                <span class="sni_item type8" target="_blank">修改配送地址</span>
              </a>
            </li> -->
            <li class="src_nav_item_tit">售后服务</li>
            <li class="src_nav_item">
              <a href="//order.vip.com/order/returnlist" target="_blank" mars_sead="acs_sevice_refund_btn">
                <span class="sni_item">自助退货</span>
              </a>
            </li>
            <li class="src_nav_item">
              <a class="J_cctkOnclick" href="service_urge02.html?f=acs_sevice_refund_link" target="_blank" mars_sead="acs_sevice_refund_btn" data-track="done">
                <span class="sni_item type6">催促退款</span>
              </a>
            </li>
            <li class="src_nav_item">
              <a class="J_bjfpOnclick" href="service_urge03.html?f=acs_sevice_receipt_link" target="_blank" mars_sead="acs_sevice_receipt_btn" data-track="done">
                <span class="sni_item type7">补寄发票</span>
              </a>
            </li>
                <li class="src_nav_item">
                  <a class="J_txcxOnclick" href="service_txcx.html?f=acs_sevice_cash_link" target="_blank" mars_sead="" data-track="done">
                    <span class="sni_item type9" target="_blank">提现查询</span>
                  </a>
                </li> 
                  </ul>
        </div>
        <div class="src_nav src_nav_bt J_schedule_hover">
          <a href="javascript:;" id="J_check_schedule" mars_sead="acs_view feedback_btn">查看问题解决进度 <span class="acs_view_num J_view_num hidden">5</span></a>
          <span class="acs_view_tips J_view_tips hidden"><i class="tips_bar_ico"></i><i class="acs_view_ang"></i>您当前没有需要客服处理的问题</span>
        </div>
      </div>
    </div>
  </div>
<script>
    


    $('.jqu').siblings().hover(function() {
        var i = $(this).index();
        $(this).css('background-position', 'left '+ ((-i)*32) +'px top 32px');
        
    }, function() {
        $(this).css('background-position','');
        
    });
    $('.jqu1').siblings().hover(function() {
        var i = $(this).index() + 3;
        $(this).css('background-position', 'left '+ ((-i)*32) +'px bottom 0px');
        
    }, function() {
        $(this).css('background-position','');
        
    });
    $('.jqu2').siblings().hover(function() {
        var i = $(this).index() + 5;
        $(this).css('background-position', 'left '+ ((-i)*32) +'px bottom 0px');
        
    }, function() {
        $(this).css('background-position','');
        
    });
    $('.jqu3').siblings().hover(function() {
        var i = $(this).index() + 8;
        $(this).css('background-position', 'left '+ ((-i)*32) +'px bottom 0px');
        
    }, function() {
        $(this).css('background-position','');
        
    });
    $('.jqu4').siblings().hover(function() {
        var i = $(this).index() + 10;
        $(this).css('background-position', 'left '+ ((-i)*32) +'px bottom 0px');
        
    }, function() {
        $(this).css('background-position','');
        
    });
    $('.jqu5').siblings().hover(function() {
        var i = $(this).index() + 13;
        $(this).css('background-position', 'left '+ ((-i)*32) +'px bottom 0px');
        
    }, function() {
        $(this).css('background-position','');
        
    });
</script>
@endsection