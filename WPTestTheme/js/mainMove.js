/**
 * Created by Liu(前端) on 2016/08/09-2016/09/16.
 */
window.onload=function(){

    //头部固定按钮
    var oStatic=document.getElementById('static');
    var isStatic=true;//记录头部固定按钮当前样式
    oStatic.onclick=function(){
        var oNav=document.getElementsByTagName('nav')[0];
        var pindiv=document.getElementsByClassName('header-tack')[0];
        var tackpin=pindiv.getElementsByTagName('i')[0];
        if(isStatic) {
            //通过更改类名更改样式，.style.positionX方法 Firefox不兼容
            var tackColor=oStatic.getAttribute("class");
            tackColor =  tackColor.replace("tack-none","tack-red");
            oStatic.setAttribute("class",tackColor);

            isStatic=false;
            oNav.style.marginTop=0+'px';

            //通过更改bootstrap样式固定顶部
            var classVal = oNav.getAttribute("class");
            classVal =  classVal.concat(" navbar-fixed-top");
            oNav.setAttribute("class",classVal );
            tackpin.style.color='#ec7063';

            //跳动动画
            startMove(pindiv,'top',7,function(){
                startMove(pindiv,'top',17);
            });
        }else{
            //通过更改类名更改样式，.style.positionX方法 Firefox不兼容
            var tackColor=oStatic.getAttribute("class");
            tackColor =  tackColor.replace("tack-red","tack-none");
            oStatic.setAttribute("class",tackColor);

            isStatic=true;

            //通过更改bootstrap样式固定顶部
            var classVal = oNav.getAttribute("class");
            classVal = classVal.replace("navbar-fixed-top"," ");
            oNav.setAttribute("class",classVal );
            oNav.style.marginTop=-70+'px';
            tackpin.style.color='white';

            //跳动动画
            startMove(pindiv,'top',7,function(){
                startMove(pindiv,'top',17);
            });
        }
    }
    //头部固定按钮结束

    //正文左侧
    //去除input/a输入时的蓝框
    $('input').focus(function(){
        $(this).css('outline','none');
    })
    $('a').focus(function(){
        $(this).css('outline','none');
    })

    //文字选中变红，无效？
    $('p').focus(function(){
        $(this).css('color','red');
    })

    //文本输入时文本框变红，取消焦点后变回原色
    $('textarea').focusin(function(){
        $(this).css('outline','none');
        $(this).css( "border", "none" );
        $(this).css( "border", "2px solid #d9534f" );
    })
    $('textarea').focusout(function(){
        $(this).css( "border", "none" );
        $(this).css( "border", "2px solid #C1C1C1" );
    })

    //评论头像旋转
    if(document.getElementsByClassName('avatar')) {//有的文章没有评论，需判断
        var rotateImg = document.getElementsByClassName('avatar');
        for (var i = 0; i < rotateImg.length; i++) {
            rotateImg[i].onmouseover = function () {
                $(this).css('transition', '0.6s');//css3动画功能
                $(this).css('transform', 'rotate(360deg)');
            }
            rotateImg[i].onmouseout = function () {
                $(this).css('transition', '0.6s');
                $(this).css('transform', 'rotate(0deg)');
            }
        }
    }
    //评论头像旋转结束
    //正文左侧结束

    //侧边栏收起
    var ishotSilder=true;
    var hotCon=document.getElementById('hotcon');
    var hotHide=document.getElementById('hothide');
    var hotI=hotHide.getElementsByTagName('i')[0];
    slideHide(hotHide,hotI,ishotSilder,hotCon);

    var isranSilder=true;
    var ranCon=document.getElementById('rancon');
    var ranHide=document.getElementById('ranhide');
    var ranI=ranHide.getElementsByTagName('i')[0];
    slideHide(ranHide,ranI,isranSilder,ranCon);

    var isargSilder=true;
    var argCon=document.getElementById('argcon');
    var argHide=document.getElementById('arghide');
    var argI=argHide.getElementsByTagName('i')[0];
    slideHide(argHide,argI,isargSilder,argCon);

    if(document.getElementById('newcon')) {//第一个页面没有这个标签，需判断
        var isnewSilder = true;
        var newCon = document.getElementById('newcon');
        var newHide = document.getElementById('newhide');
        var newI = newHide.getElementsByTagName('i')[0];
        slideHide(newHide, newI, isnewSilder, newCon);
    }
    //侧边栏收起结束

    //一键回到顶部
    gotoTop();

}

function slideHide(myHide,ospan,istrue,cCon) {//侧边栏下拉收起
    $(myHide).click(function () {
        //alert('e');
        if (istrue) {
            $(cCon).slideUp(300);

            //更改awesome样式
            var classC = ospan.getAttribute("class");
            classC = classC.replace("icon-angle-down", "icon-angle-up");
            ospan.setAttribute("class", classC);
            istrue = false;
        } else {
            $(cCon).slideDown(300);

            //更改awesome样式
            var classC = ospan.getAttribute("class");
            classC = classC.replace("icon-angle-up", "icon-angle-down");
            ospan.setAttribute("class", classC);
            istrue = true;
        }
    });
}

function gotoTop(min_height){//一键滑至顶部
    var gotoTop_html = '<div id="gotoTop">返回顶部</div>';
    $("#page").append(gotoTop_html);
    $("#gotoTop").click(
        function(){
            $('html,body').animate({scrollTop:0},700);//主要代码：目标顶部，700ms
        }).hover(
        function(){
            $(this).addClass("hover");},//hover效果
        function(){
            $(this).removeClass("hover");
        });
    //下滑一定高度后显示
    min_height ? min_height = min_height : min_height = 600;//无传入值则默认为600像素
    $(window).scroll(function(){
        var s = $(window).scrollTop();
        if( s > min_height){
            $("#gotoTop").fadeIn(100);
        }else{
            $("#gotoTop").fadeOut(200);
        };
    });
};

function startMove(obj,nam,iTarget,fnEnd){
    //js运动框架：移动的物体，移动的属性，移动的数值，移动结束后的处理函数
    clearInterval(obj.timer);
    obj.timer=setInterval(function(){
        var cur=0;
        if(nam=='opacity'){
            cur =Math.round(parseFloat(getStyle(obj, nam))*100);
        }else {
            cur = parseInt(getStyle(obj, nam));
        }
        var speed=(iTarget-cur)/5;
        speed=speed>0?Math.ceil(speed):Math.floor(speed);//排除开头结尾除不尽的小数产生的误差
        if(cur==iTarget){
            clearInterval(obj.timer);
            if(fnEnd)fnEnd();//处理函数可无，需判断

        }else{
            //透明度特殊处理
            if(nam=='opacity'){
                obj.style.opacity=(cur+speed)/100;
                obj.style.filter='alpha(opacity:'+(cur+speed)+')';
            }else {
                obj.style[nam] = cur + speed + 'px';
            }
        }
    },30);
}

//获取父级元素下的该类名的元素
function getByClass(oParent,sClass){
    var aEle=oParent.getElementsByTagName("*");
    var result=[];
    for(var i=0;i<aEle.length;i++){
        if(aEle[i].className==sClass){
            result.push(aEle[i]);
        }
    }
    return result;
}

//获取元素属性值
function getStyle(obj,name){
    if(obj.currentStyle){
        return obj.currentStyle[name];
    }else
    {
        return getComputedStyle(obj,false)[name];
    }
}