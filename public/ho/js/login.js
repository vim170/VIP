/**
 * Created by wuzhi on 2016/9/16.
 */
$(function(){
    function LogingForm($loginForm) {
        this.$loginForm = $loginForm;
        this.$userName = this.$loginForm.find(".userName");
        this.$psw = this.$loginForm.find(".psw");
        this.$userNameErro = this.$loginForm.find(".userName-erro");
        this.$pswErro = this.$loginForm.find(".psw-erro");
        this.$remember = this.$loginForm.find(".check-box");
        this.$loging = this.$loginForm.find(".loging");
        this.$logingErro = this.$loginForm.find(".loging-erro");
        this.isRemember = true;
    }

    LogingForm.prototype = {
        constructor: LogingForm.prototype.constructor,
        __proto__: LogingForm.prototype.__proto__,


        init: function(){
            this.checkUserName();
            this.checkPsw();
            this.remember();
            this.clickLoging();
        },
        checkUserName: function(){
            var that = this;
            var reg = /^1(3|4|5|7|8)\d{9}$/;
            this.$userName.on("blur",function(){
                if(!$(this).val()){
                    that.$userNameErro.text("请输入登录名");
                }else if(!reg.test($(this).val())){
                    that.$userNameErro.text("登录名有误");
                }else{
                    that.$userNameErro.text("");
                }

            });
        },

        checkPsw: function(){
            var that = this;
            this.$psw.on("blur",function(){
                if(!$(this).val()){
                    that.$pswErro.text("请输入密码");
                }else{
                    that.$pswErro.text("");
                }
            })
        },

        remember:function(){
            var that = this;
            this.$remember.on("click",function(){
                if(that.isRemember){
                    $(this).css("background-position-x","-45px");
                    that.isRemember = false;
                }else {
                    $(this).css("background-position-x","-24px");
                    that.isRemember = true;
                }
            })
        },
       clickLoging: function(){
           var that = this;
               this.$loging.on("click",function(){
                   if($.cookie("signingUser")){
                       var signingUser = JSON.parse( $.cookie("signingUser"));
                       if(signingUser["userName"] == that.$userName.val() && signingUser["psw"] == that.$psw.val()){
                           var user = {
                               "userName": that.$userName.val(),
                               "psw": that.$psw.val()
                           };
                           if(that.isRemember){
                               user["isRemember"] = "true";
                               $.cookie("user",JSON.stringify(user),{expires:7,path: "/"});
                           }else{
                               user["isRemember"] = "false";
                               $.cookie("user",JSON.stringify(user),{expires:7,path: "/"});
                           }
                           location.href = "homePage.html";
                       }else{
                           that.$logingErro.text("你的账号或密码不正确");
                       }
                   } else{
                       that.$logingErro.text("你的账号或密码不正确");
                   }

               });



       }
    };

    new LogingForm($(".login-form")).init();



    });