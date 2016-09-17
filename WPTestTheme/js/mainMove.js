/**
 * Created by Liu(ǰ��) on 2016/08/09-2016/09/16.
 */
window.onload=function(){

    //ͷ���̶���ť
    var oStatic=document.getElementById('static');
    var isStatic=true;//��¼ͷ���̶���ť��ǰ��ʽ
    oStatic.onclick=function(){
        var oNav=document.getElementsByTagName('nav')[0];
        var pindiv=document.getElementsByClassName('header-tack')[0];
        var tackpin=pindiv.getElementsByTagName('i')[0];
        if(isStatic) {
            //ͨ����������������ʽ��.style.positionX���� Firefox������
            var tackColor=oStatic.getAttribute("class");
            tackColor =  tackColor.replace("tack-none","tack-red");
            oStatic.setAttribute("class",tackColor);

            isStatic=false;
            oNav.style.marginTop=0+'px';

            //ͨ������bootstrap��ʽ�̶�����
            var classVal = oNav.getAttribute("class");
            classVal =  classVal.concat(" navbar-fixed-top");
            oNav.setAttribute("class",classVal );
            tackpin.style.color='#ec7063';

            //��������
            startMove(pindiv,'top',7,function(){
                startMove(pindiv,'top',17);
            });
        }else{
            //ͨ����������������ʽ��.style.positionX���� Firefox������
            var tackColor=oStatic.getAttribute("class");
            tackColor =  tackColor.replace("tack-red","tack-none");
            oStatic.setAttribute("class",tackColor);

            isStatic=true;

            //ͨ������bootstrap��ʽ�̶�����
            var classVal = oNav.getAttribute("class");
            classVal = classVal.replace("navbar-fixed-top"," ");
            oNav.setAttribute("class",classVal );
            oNav.style.marginTop=-70+'px';
            tackpin.style.color='white';

            //��������
            startMove(pindiv,'top',7,function(){
                startMove(pindiv,'top',17);
            });
        }
    }
    //ͷ���̶���ť����

    //�������
    //ȥ��input/a����ʱ������
    $('input').focus(function(){
        $(this).css('outline','none');
    })
    $('a').focus(function(){
        $(this).css('outline','none');
    })

    //����ѡ�б�죬��Ч��
    $('p').focus(function(){
        $(this).css('color','red');
    })

    //�ı�����ʱ�ı����죬ȡ���������ԭɫ
    $('textarea').focusin(function(){
        $(this).css('outline','none');
        $(this).css( "border", "none" );
        $(this).css( "border", "2px solid #d9534f" );
    })
    $('textarea').focusout(function(){
        $(this).css( "border", "none" );
        $(this).css( "border", "2px solid #C1C1C1" );
    })

    //����ͷ����ת
    if(document.getElementsByClassName('avatar')) {//�е�����û�����ۣ����ж�
        var rotateImg = document.getElementsByClassName('avatar');
        for (var i = 0; i < rotateImg.length; i++) {
            rotateImg[i].onmouseover = function () {
                $(this).css('transition', '0.6s');//css3��������
                $(this).css('transform', 'rotate(360deg)');
            }
            rotateImg[i].onmouseout = function () {
                $(this).css('transition', '0.6s');
                $(this).css('transform', 'rotate(0deg)');
            }
        }
    }
    //����ͷ����ת����
    //����������

    //���������
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

    if(document.getElementById('newcon')) {//��һ��ҳ��û�������ǩ�����ж�
        var isnewSilder = true;
        var newCon = document.getElementById('newcon');
        var newHide = document.getElementById('newhide');
        var newI = newHide.getElementsByTagName('i')[0];
        slideHide(newHide, newI, isnewSilder, newCon);
    }
    //������������

    //һ���ص�����
    gotoTop();

}

function slideHide(myHide,ospan,istrue,cCon) {//�������������
    $(myHide).click(function () {
        //alert('e');
        if (istrue) {
            $(cCon).slideUp(300);

            //����awesome��ʽ
            var classC = ospan.getAttribute("class");
            classC = classC.replace("icon-angle-down", "icon-angle-up");
            ospan.setAttribute("class", classC);
            istrue = false;
        } else {
            $(cCon).slideDown(300);

            //����awesome��ʽ
            var classC = ospan.getAttribute("class");
            classC = classC.replace("icon-angle-up", "icon-angle-down");
            ospan.setAttribute("class", classC);
            istrue = true;
        }
    });
}

function gotoTop(min_height){//һ����������
    var gotoTop_html = '<div id="gotoTop">���ض���</div>';
    $("#page").append(gotoTop_html);
    $("#gotoTop").click(
        function(){
            $('html,body').animate({scrollTop:0},700);//��Ҫ���룺Ŀ�궥����700ms
        }).hover(
        function(){
            $(this).addClass("hover");},//hoverЧ��
        function(){
            $(this).removeClass("hover");
        });
    //�»�һ���߶Ⱥ���ʾ
    min_height ? min_height = min_height : min_height = 600;//�޴���ֵ��Ĭ��Ϊ600����
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
    //js�˶���ܣ��ƶ������壬�ƶ������ԣ��ƶ�����ֵ���ƶ�������Ĵ�����
    clearInterval(obj.timer);
    obj.timer=setInterval(function(){
        var cur=0;
        if(nam=='opacity'){
            cur =Math.round(parseFloat(getStyle(obj, nam))*100);
        }else {
            cur = parseInt(getStyle(obj, nam));
        }
        var speed=(iTarget-cur)/5;
        speed=speed>0?Math.ceil(speed):Math.floor(speed);//�ų���ͷ��β��������С�����������
        if(cur==iTarget){
            clearInterval(obj.timer);
            if(fnEnd)fnEnd();//���������ޣ����ж�

        }else{
            //͸�������⴦��
            if(nam=='opacity'){
                obj.style.opacity=(cur+speed)/100;
                obj.style.filter='alpha(opacity:'+(cur+speed)+')';
            }else {
                obj.style[nam] = cur + speed + 'px';
            }
        }
    },30);
}

//��ȡ����Ԫ���µĸ�������Ԫ��
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

//��ȡԪ������ֵ
function getStyle(obj,name){
    if(obj.currentStyle){
        return obj.currentStyle[name];
    }else
    {
        return getComputedStyle(obj,false)[name];
    }
}