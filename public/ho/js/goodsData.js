/**
 * Created by wuzhi on 2016/9/17.
 */
function GoodsData(){
    var data = {
       "a": {
           "1":{
               "price": "475",
               "stock": "230"
           },
           "2":{
               "price": "399",
               "stock": "189"
           }
       },
        "b": {
            "1":{
                "price": "475",
                "stock": "230"
            },
            "2":{
                "price": "399",
                "stock": "189"
            }
        }

    };
    return {
        "getgoodsData": function(storeId,goodsId){
            return data[storeId][goodsId];
        }
    }
}