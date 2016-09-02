/**
 * Created by su on 2016/8/10.
 */
window.onload=function(){
    var oStatic=document.getElementById('static');
    var isStatic=true;

    oStatic.onclick=function(){

        var oNav=document.getElementsByTagName('nav')[0];
		var pindiv=document.getElementsByClassName('header-tack')[0];
		var tackpin=pindiv.getElementsByTagName('i')[0];
        if(isStatic) {
            //oStatic.children[0].src = './img/bg_red.png';
            oStatic.style.backgroundUrl="url('img/bg_red.png')";
            oStatic.style.backgroundRepeat='no-repeat';
            oStatic.style.backgroundPositionX=-22+'px';
            oStatic.style.backgroundPositionY=0+'px';
            isStatic=false;

            oNav.style.marginTop=0+'px';

            var classVal = oNav.getAttribute("class");
            classVal =  classVal.concat(" navbar-fixed-top");
            oNav.setAttribute("class",classVal );
			tackpin.style.color='#ec7063';
			 startMove(pindiv,'top',7,function(){
			   startMove(pindiv,'top',17);
			   });
			
        }else{
            //oStatic.children[0].src = './img/white.png';
            oStatic.style.backgroundUrl="url('img/bg_red.png')";
            oStatic.style.backgroundRepeat='no-repeat';
            oStatic.style.backgroundPositionX=0+'px';
            oStatic.style.backgroundPositionY=0+'px';
            isStatic=true;
            var classVal = oNav.getAttribute("class");
            classVal = classVal.replace("navbar-fixed-top"," ");
            oNav.setAttribute("class",classVal );
            oNav.style.marginTop=-70+'px';
			tackpin.style.color='white';
			 startMove(pindiv,'top',7,function(){
			   startMove(pindiv,'top',17);
			   });
        }
    }

	gotoTop();

	var ishotSilder=true;
    var hotCon=document.getElementById('hotcon');
    var hotHide=document.getElementById('hothide');
    var hotI=hotHide.getElementsByTagName('i')[0];
    myhidef(hotHide,hotI,ishotSilder,hotCon);

    var isranSilder=true;
    var ranCon=document.getElementById('rancon');
    var ranHide=document.getElementById('ranhide');
    var ranI=ranHide.getElementsByTagName('i')[0];
    myhidef(ranHide,ranI,isranSilder,ranCon);

    var isargSilder=true;
    var argCon=document.getElementById('argcon');
    var argHide=document.getElementById('arghide');
    var argI=argHide.getElementsByTagName('i')[0];
    myhidef(argHide,argI,isargSilder,argCon);
	
	var isnewSilder=true;
    var newCon=document.getElementById('newcon');
    var newHide=document.getElementById('newhide');
    var newI=newHide.getElementsByTagName('i')[0];
    myhidef(newHide,newI,isnewSilder,newCon);
	
}
function myhidef(myHide,ospan,istrue,ccon) {
    $(myHide).click(function () {
        //alert('e');
        if (istrue) {
            $(ccon).slideUp(300);
            var classC = ospan.getAttribute("class");
            classC = classC.replace("icon-angle-down", "icon-angle-up");
            ospan.setAttribute("class", classC);
            istrue = false;
        } else {
            $(ccon).slideDown(300);
            var classC = ospan.getAttribute("class");
            classC = classC.replace("icon-angle-up", "icon-angle-down");
            ospan.setAttribute("class", classC);
            istrue = true;

        }
    });
}

function gotoTop(min_height){
        var gotoTop_html = '<div id="gotoTop">·µ»Ø¶¥²¿</div>';
        $("#page").append(gotoTop_html);
        $("#gotoTop").click(
                function(){$('html,body').animate({scrollTop:0},700);
                }).hover(
                function(){$(this).addClass("hover");},
                function(){$(this).removeClass("hover");
                });
        min_height ? min_height = min_height : min_height = 600;
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
    clearInterval(obj.timer);
    obj.timer=setInterval(function(){
        var cur=0;
        if(nam=='opacity'){
            cur =Math.round(parseFloat(getStyle(obj, nam))*100);
        }else {
            cur = parseInt(getStyle(obj, nam));
        }
        var speed=(iTarget-cur)/5;
        speed=speed>0?Math.ceil(speed):Math.floor(speed);
        if(cur==iTarget){
            clearInterval(obj.timer);
            if(fnEnd)fnEnd();

        }else{
            if(nam=='opacity'){
                obj.style.opacity=(cur+speed)/100;
                obj.style.filter='alpha(opacity:'+(cur+speed)+')';
            }else {
                obj.style[nam] = cur + speed + 'px';
            }
        }

    },30);
}
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

function getStyle(obj,name){
    if(obj.currentStyle){
        return obj.currentStyle[name];
    }else
    {
        return getComputedStyle(obj,false)[name];
    }
}