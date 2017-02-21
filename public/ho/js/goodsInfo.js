/**
 * Created by johnny on 2016/9/17.
 */
$(function(){
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

    function Zoom($goodsContent) {
        this.$goodsContent = $goodsContent;
        this.$contentLeft = this.$goodsContent.find(".content-left");
        this.$imgs = this.$goodsContent.find(".img-list li img");
        this.$imgBox = this.$goodsContent.find(".img-box");
        this.$zoomImg = this.$imgBox.find("img");
        this.$glass = this.$imgBox.find(".glass");
    }

    Zoom.prototype = {
        constructor: Zoom.prototype.constructor,
        __proto__: Zoom.prototype.__proto__,

        init: function () {
            this.clickImgs();
            this.moveZoomImg();
        },

        clickImgs: function () {
            var that = this;
            this.$imgs.on("click",function(){
                that.$zoomImg.attr({
                    "src": "../imgs/shoose-middle-img" + that.$imgs.index($(this)) + ".jpg",
                    "data-index": "" + that.$imgs.index($(this))
                });
            });
        },

        moveZoomImg: function(){
            var that = this;
            this.$imgBox.hover(function(e){
                that.$zoomImg.attr("src","../imgs/shoose-big-img" + that.$zoomImg.attr("data-index") + ".jpg");
                that.setZoomImgPosition(e);


            },function(){
                that.$zoomImg.attr("src","../imgs/shoose-middle-img" + that.$zoomImg.attr("data-index") + ".jpg");
                that.$zoomImg.css({
                    "width": "100%",
                    "height": "100%",
                    "left": 0,
                    "top": 0
                });
            });
            this.$imgBox.mousemove(function(e){
                that.setZoomImgPosition(e);
            });

        },

        setZoomImgPosition: function(e){
            var x = e.pageX - this.$imgBox.offset().left;
            var y = e.pageY - this.$imgBox.offset().top;
            this.$zoomImg.css({
                "width": "200%",
                "height": "200%",
                "left": -x,
                "top": -y
            });

        }

    };

    new Zoom($(".goods-content")).init();

    //添加商品
    function AddToShopCar($goodsContent){
        this.$goodsContent = $goodsContent;
        this.$sizes = this.$goodsContent.find(".size-box span");
        this.$numInput = this.$goodsContent.find(".num-input");
        this.$del = this.$goodsContent.find(".do-num .del");
        this.$add = this.$goodsContent.find(".do-num .add");
        this.$shopButton = this.$goodsContent.find(".shop-button");
        this.$shopPocket = $(".header-middle .shopp-pocket");
        this.$goodsNum = this.$shopPocket.find(".goods-num");
        this.$shopPocketInfo = this.$shopPocket.find(".shopp-pocket-info");
        this.goodsInfo = {};
    }

    AddToShopCar.prototype = {
        constructor: AddToShopCar.prototype.constructor,
        __proto__: AddToShopCar.prototype.__proto__,
        
        init: function () {
            this.selectSize();
            this.changeNum();
            this.clickShopButton();
        },

        selectSize: function(){
            var that = this;
            this.$sizes.click(function(){
                that.$sizes.css("border-color","#999");
                $(this).css("border-color","#f10180");
                that.goodsInfo["size"] = $(this).text();
            });
        },

        changeNum: function(){
            var that = this;
            this.$del.click(function(){
                var num = parseInt(that.$numInput.val());
                if(num <= 1){
                    that.$numInput.val("1");
                }else{
                    num--;
                    that.$numInput.val(num + "");

                }
            });

            this.$add.click(function(){
                var num = parseInt(that.$numInput.val());
                var maxNum = new GoodsData().getgoodsData("a","1")["stock"];
                if(num >= maxNum){
                    that.$numInput.val("" + maxNum);
                }else{
                    num++;
                    that.$numInput.val(num + "");

                }
            });

            this.$numInput.on("input",function(){
                var maxNum = new GoodsData().getgoodsData("a","1")["stock"];
                var reg = /(^[1-9]\d*$)|(^$)/;
                if(!reg.test(that.$numInput.val())){
                    that.$numInput.val("1");
                }else if( that.$numInput.val() >= maxNum){
                    that.$numInput.val(maxNum + "");
                }

            });

            this.$numInput.on("blur",function(){
                if(!that.$numInput.val()){
                    that.$numInput.val("1")
                }
            })
        },

        clickShopButton: function(){
            var that = this;
            this.$shopButton.click(function () {
                if(that.goodsInfo["size"]){
                    that.goodsInfo["num"] = that.$numInput.val();
                    that.goodsInfo["price"] = new GoodsData().getgoodsData("a","1")["price"];
                    $.cookie("buysGoods",JSON.stringify(that.goodsInfo),{expires:365,path: "/"});
                    that.$goodsNum.text("1");
                    that.$shopPocketInfo.remove();
                    that.$shopPocket.click(function(){
                        location.href = "shopCar.html";
                    });
                }
            });
        }



    };

    new AddToShopCar($(".goods-content")).init();
});