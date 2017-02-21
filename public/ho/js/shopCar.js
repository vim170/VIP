/**
 * Created by wuzhi on 2016/9/17.
 */
$(function(){
    function ShopCar($orders) {
        this.$orders = $orders;
        this.$size = this.$orders.find(".info span b");
        this.$price = this.$orders.find(".price-one .true");
        this.$priceAll = this.$orders.find(".price-all");
        this.$numInput = this.$orders.find(".num-input");
        this.$del = this.$orders.find(".do-num .del");
        this.$add = this.$orders.find(".do-num .add");
    }

    ShopCar.prototype = {
        constructor: ShopCar.prototype.constructor,
        __proto__: ShopCar.prototype.__proto__,

        init: function(){
            this.initData();
            this.changeNum();
        },

        initData: function(){
            var that = this;
            var buyGoodsStr = $.cookie("buysGoods");
            if(buyGoodsStr){
                var buygoods = JSON.parse(buyGoodsStr);
                this.$size.text(buygoods["size"]);
                this.$price.text("￥" + buygoods["price"]);
                this.$numInput.attr("value",buygoods["num"]);
                that.$priceAll.text("￥" + parseInt(that.$numInput.val()) * parseInt(that.$price.text().substr(1,that.$price.text().length)));
            }
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
                that.$priceAll.text("￥" + parseInt(that.$numInput.val()) * parseInt(that.$price.text().substr(1,that.$price.text().length)));
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
                that.$priceAll.text("￥" + parseInt(that.$numInput.val()) * parseInt(that.$price.text().substr(1,that.$price.text().length)));
            });

            this.$numInput.on("input",function(){
                var maxNum = new GoodsData().getgoodsData("a","1")["stock"];
                var reg = /(^[1-9]\d*$)|(^$)/;
                if(!reg.test(that.$numInput.val())){
                    that.$numInput.val("1");
                }else if( that.$numInput.val() >= maxNum){
                    that.$numInput.val(maxNum + "");
                }
                that.$priceAll.text("￥" + parseInt(that.$numInput.val()) * parseInt(that.$price.text().substr(1,that.$price.text().length)));

            });

            this.$numInput.on("blur",function(){
                if(!that.$numInput.val()){
                    that.$numInput.val("1")
                }
                that.$priceAll.text("￥" + parseInt(that.$numInput.val()) * parseInt(that.$price.text().substr(1,that.$price.text().length)));
            })
        }

    };

        new ShopCar($(".orders")).init();
    });