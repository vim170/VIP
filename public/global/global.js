/*
* @Author: shanezhiu
* @Date:   2017-02-20 16:04:27
* @Last Modified by:   shanezhiu
* @Last Modified time: 2017-02-20 19:41:18
*/

/**
 *在使用之前请引入jquery(> 1.8.3)
 * 仿唯品会全局js函数
 */

'use strict';
//全选函数
 function checkall(_this, inputname) {
    var checkname = $(_this).attr("name");
    
    if ($(_this).is(":checked")) {
        $("input[name='"+inputname+"[]']").add("input[name='"+checkname+"']").attr("checked","checked");
    }
    else {
        $("input[name='"+inputname+"[]']").add("input[name='"+checkname+"']").removeAttr("checked");
    }
} 