/**
 * Created by johnny on 2016/9/13.
 */
$(function () {
    function CheckForm($regForm) {
        this.$regForm = $regForm;
        this.$infos = this.$regForm.find(".info");
        this.$totals = this.$regForm.find(".total");
        this.$okNos = this.$regForm.find(".ok-no");
        this.$signing = this.$regForm.find(".signing");
        this.$pswStrong = this.$regForm.find(".psw-strong");
        this.$strongs = this.$pswStrong.find(".strong");
        this.$strongTxt = this.$pswStrong.find(".strong-txt");
        this.$getCheckNumber = this.$regForm.find(".get-check-number");
        this.$signing = this.$regForm.find(".signing");
        this.$agree = this.$regForm.find(".check-box");
        this.okObj = {
            "phoneNumber": false,
            "psw": false,
            "pswAgain": false,
            "checkNumber": false,
            "agree": true
        };
    }

    CheckForm.prototype = {
        constructor: CheckForm.prototype.constructor,
        __proto__: CheckForm.prototype.__proto__,

        //初始化
        init: function (){
            this.checkPhoneNumber();
            this.checkPsw();
            this.checkPswAgain();
            this.checkCheckNumber();
            this.getCheckNumber();
            this.clickSigning();
            this.isAgree();
        },

        //检测手机号
        checkPhoneNumber: function (){
            var that = this;
            var reg = /^1(3|4|5|7|8)\d{9}$/;
            var $phoneInfo = this.$infos.eq(0);
            var fn =  function(){
                        if(!reg.test($phoneInfo.val())){
                            that.$getCheckNumber.css({
                                "cursor": "not-allowed",
                                "background-color": "#d0d0d0",
                                "color": "#999",
                                "border-color": "#d0d0d0"
                            });
                            that.okObj["phoneNumber"] = false;
                        }
                        return reg.test($phoneInfo.val());
                     };
            this.focusBlur($phoneInfo,"手机号不能为空","请输入正确的手机号","请输入你的11位手机号码",0,fn);

        },

        //检测密码
        //密码强度规则为：不正确-弱；正确-中；正确且大于等于11位：强
        checkPsw: function (){
            var that = this;
            var reg1 = /^.{6,20}$/;
            var reg2 = /(^\d*$)|(^[a-zA-Z]*$)|(^[\W_]*$)/;
            var $pswInfo = this.$infos.eq(1);
            var fn = function(){
                            if(reg1.test($pswInfo.val()) && !reg2.test($pswInfo.val())){
                                that.okObj["psw"] = true;
                            }else {
                                that.okObj["psw"] = false;
                            }
                            return reg1.test($pswInfo.val()) && !reg2.test($pswInfo.val());
                        };
            this.focusBlur($pswInfo,"密码不能为空","请输入6到20位数字、字母和符号两种以上组合","密码由6到20位字母，数字和符号至少两种以上字符组合，区分大小写",1,fn);
            $pswInfo.on("input",function(){
                that.$strongs.css("background-color","#a3a3a3").eq(0).css("background-color","red");
                that.$strongTxt.text("弱").css("color","red");
                if($(this).val() > 20){
                    $(this).val($(this).val().substr(0,20));
                }
                if(fn() && $(this).val().length > 10){
                    that.$strongs.css("background-color","#00c500");
                    that.$strongTxt.text("强").css("color","#00c500");
                }else if(fn()){
                    that.$strongs.eq(2).prevAll().css("background-color","#ffa200");
                    that.$strongTxt.text("中").css("color","#ffa200");
                }else if($(this).val()){
                    that.$pswStrong.show();
                }
            });
        },

        checkPswAgain: function(){
            var that = this;
            var $pswAgainIfo = this.$infos.eq(2);
            var fn = function(){
                if(that.$infos.eq(1).val() && $pswAgainIfo.val() === that.$infos.eq(1).val()){
                    that.okObj["pswAgain"] = true;
                }else{
                    that.okObj["pswAgain"] = false;
                }
                return that.$infos.eq(1).val() && $pswAgainIfo.val() === that.$infos.eq(1).val();
            };
            this.focusBlur($pswAgainIfo,"请输入确认密码","两次输入的密码不一致，请重试","",2,fn)
        },

        //获取验证码
        getCheckNumber: function(){
            var that = this;
            this.$getCheckNumber.on("click",function () {
                if($(this).css("cursor") === "pointer"){
                    alert("你的手机验证码是" + (that.checkNumber = (Math.random()+ "").substr(2,6)));
                }
            })
        },
        //验证验证码
        checkCheckNumber: function(){
            var that = this;
            var $checkNumberInfo = this.$infos.eq(3);
            var fn = function(){
                if($checkNumberInfo.val() === that.checkNumber){
                    that.okObj["checkNumber"] = true;
                }else {
                    that.okObj["checkNumber"] = false;
                }
                return  $checkNumberInfo.val() === that.checkNumber;
            };
            this.focusBlur($checkNumberInfo,"请输入6位数字手机验证码","验证码不正确","",3,fn)
        },

        isAgree:function(){
            var that = this;
            this.$agree.on("click",function(){
                if(that.okObj["agree"]){
                    $(this).css("background-position-x","-45px");
                    that.okObj["agree"] = false;
                }else {
                    $(this).css("background-position-x","-24px");
                    that.okObj["agree"] = true;
                }
            })
        },
        //点击注册
        clickSigning: function(){
            var that = this;
            this.$signing.on("click",function () {
                var j = null;
                var n = 0;
                for(j in that.okObj){
                    if(!that.okObj[j]){
                        that.$totals.eq(n).show();
                        return;
                    }
                    n++;
                }
                var signingUser = {
                    "userName": that.$infos.eq(0).val(),
                    "psw": that.$infos.eq(1).val()
                };
                var user = {
                    "userName": that.$infos.eq(0).val(),
                    "psw": that.$infos.eq(1).val(),
                    "isRemember": "true"
                };
                $.cookie("signingUser",JSON.stringify(signingUser),{expires:365,path: "/"});
                $.cookie("user",JSON.stringify(user),{expires:7,path: "/"});
                window.history.back();
            });

        },
        //失去焦点与获得焦点
        focusBlur: function (mum,txt1,txt2,txt3,n,fn){
            var that = this;

            mum.on("focus",function(){
                that.$okNos.eq(n).hide();
                if( that.$totals.eq(n).text()){
                    that.$totals.eq(n).show();
                }

            });

            mum.on("blur",function(){
                var bool = true;
                var $this = this;
                if(mum[0] == that.$infos.eq(0)[0] && fn()){
                    var i = null;
                    $.getJSON("../js/data.json",function (json) {
                        for(i in json["signNumber"]){
                            if(mum.val() == json["signNumber"][i]){
                                bool = false;
                                txt2 = "该手机号码已注册，请直接登录";
                            }
                        }
                        if(!bool){
                            that.okObj["phoneNumber"] = false;
                        }else{
                            that.$getCheckNumber.css({
                                "cursor": "pointer",
                                "background-color": "#fcedf2",
                                "color": "#e00078",
                                "border-color": "#ffbee0"
                            });
                            that.okObj["phoneNumber"] = true;
                        }
                        doIt();

                    })
                }else {
                    doIt();
                }
               function doIt(){
                    that.$totals.eq(n).hide();
                    if(fn() && bool){
                        that.$okNos.eq(n).show();
                        $($this).css({
                            "border-color": "#b2b2b2",
                            "background-color": "#fff"
                        });
                        if( that.$totals.eq(n).text()){
                            that.$totals.eq(n).css({
                                "background-color": "#e7f9ff",
                                "border-color": "#a7f9ff"
                            }).text(txt3);
                        }

                    }else{
                        $($this).css({
                            "border-color": "#fcala5",
                            "background-color": "#ffe6e7"
                        });

                        that.$totals.eq(n).css({
                            "background-color": "#fff6f7",
                            "border-color": "#ffe6e7"
                        });
                        if(!$($this).val()){
                            that.$totals.eq(n).text(txt1);
                        } else {
                            that.$totals.eq(n).text(txt2);
                        }
                    }
                }
            });
        }
    };

    new CheckForm($(".regForm")).init();



});