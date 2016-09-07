/**
 * Created by 李庆芳 on 2016/9/7.
 */

$(function(){
    var initNum = 10;//初始化从第几篇开始点击加载
    var moreNum = 5; //每点击一次加载多少篇
    $(".test-more").click(function(){
        $.post( //使用Ajax 的 post方法
            "/wordpress/wp-content/themes/test3/index.php",//php文件路径
            { numb:initNum}, //传递参数：从第几篇开始
            function(response,status,xhr){ //回调函数，返回数据
                $(".content-box").html( $(".content-box").html() + response);
            });
        initNum +=moreNum; //num 累加
    });
});