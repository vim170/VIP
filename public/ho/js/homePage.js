/**
 * Created by johnny on 2016/9/8.
 */
$(function () {
    //更多下的shadow动画
    $(".header .nav-bottom .more .channel-item").hover(function(){
        $(this).find(".shadow").stop(true).animate({
            "height": "96px",
            "opcity": "0.7"

        }).end().find(".brand-text").stop(true).animate({
            "height": "96px"

        }).find(".brand-name").stop(true).animate({
            "line-height": "96px"
        })
    },function(){
        $(this).find(".shadow").stop(true).animate({
            "height": "48px",
            "opcity": "0.2"

        }).end().find(".brand-text").stop(true).animate({
            "height": "48px"

        }).find(".brand-name").stop(true).animate({
            "line-height": "48px"
        })
    });

    //检验用户是否已注册或登录；
    (function isShowUser(){
        var user = $.cookie("user");
        if(user){
            var userName = JSON.parse(user)["userName"];
            $(".header .top-nav-tool .register .register-txt").text("退出").attr("href","#");
            $(".header .top-nav-tool .please-login").find(".me").text(userName)
                .end().find(".please-txt").text(userName);
            if(user["isRemember"] == "false"){
                $.cookie("user","",{path:"/"});
            }
        }
    })();
    $(".header .top-nav-tool .register").click(function(){
        $.cookie("user","",{path:"/"});
        location.href = "homePage.html";

    });
    //轮播插件
    function SlideShow($bannerContainer) {
        this.$bannerContainer = $bannerContainer;
        this.$banner = this.$bannerContainer.find(".banner");
        this.$imgBox = this.$banner.find(".img-box");
        this.$imgs = this.$imgBox.find("img");
        this.$arrowLeft = this.$imgBox.find(".arrow-left");
        this.$arrowRight = this.$imgBox.find(".arrow-right");
        this.$items = this.$banner.find(".item-box .item");
        this.$boldLine = this.$banner.find(".item-box .bold-line");
        this.imgWidth = this.$imgBox.width();
        this.boldLineWidth = this.$boldLine.width();
        this.boldLineLeft = parseInt(this.$boldLine.css("left"));
        this.index = 0;
        this.last = 0;
        this.timer = null;
    }
    SlideShow.prototype = {
        constructor: SlideShow.prototype.constructor,
        __proto__: SlideShow.prototype.__proto__,
        //
        init: function(){
            this.$imgs.css({
                "width": "0",
                "z-index": "2"
            });
            this.$imgs.eq(0).css({
                "width": this.imgWidth,
                "z-index": "1"
            });

            this.startAuto();
            this.stopAuto();
            this.startAgain();
            this.click();
            this.itemHover();
        },
        startAuto:function(){
            var that = this;
            this.timer = setInterval(function(){
                that.rightMove();
            },3000);
        },
        stopAuto:function(){
            var that = this;
            this.$bannerContainer.on("mouseenter",function(){
                clearInterval(that.timer);
            });
        },
        startAgain:function(){
            var that = this;
            this.$bannerContainer.on("mouseleave",function(){
                that.startAuto();
            });
        },
        rightMove:function(){
            this.last = this.index;
            this.index++;
            this.index %= this.$imgs.length;
            this.move("right");
        },
        leftMove:function(){
            this.last = this.index;
            this.index--;
           this.index = this.index < 0?this.$imgs.length-1:this.index;
            this.move("left");
        },
        click: function(){
            var that = this;
            this.$arrowLeft.on("click",function(){
                that.leftMove();
            });
            this.$arrowRight.on("click",function(){
                that.rightMove();
            })
        },
        itemHover:function(){
            var that = this;
            this.$items.hover(function(){
                that.last = that.index;
                that.index = that.$items.index(this);
                that.move();
            })
        },
        move: function(direction){
            if(direction === "right"){
                var nowZIndex = 1;
                var lastZIndex = 2;
            }else{
                var nowZIndex = 2;
                var lastZIndex = 1;
            }

            this.$imgs.eq(this.index).css({
                "z-index":lastZIndex
            }).stop(true).animate({
                "width": this.imgWidth
            },2000,function(){
               $(this).css({
                   "z-index": nowZIndex
               });
            });

            this.$imgs.eq(this.last).css({
                "z-index":nowZIndex
            }).stop(true).animate({
                "width": 0
            },2000,function(){
                $(this).css({
                    "z-index": lastZIndex
                });
            });

            this.$boldLine.stop(true).animate({
                "left": this.boldLineLeft + this.index * this.boldLineWidth
            },2000);
        }


    };

    var slideShow1 = new SlideShow($(".banner-contanier"));
    slideShow1.init();

});