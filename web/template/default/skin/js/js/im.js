document.write("<style type='text/css'>"
    + ".ImTable *{padding:0px;margin:0px}"
    + ".ImTable{border-collapse:collapse;border:none;background:url(http://www.stkj999.com/UserControls/im/kefu/bg.gif)}"
    + ".ImTable h2{font-size:14px;font-weight:bold;margin-top:5px}"
    + ".ImHeader{height:40px;background:url(http://www.stkj999.com/UserControls/im/kefu/im_01.gif)}"
    + ".ImRow{background:#ffffff;margin:0 2px;height:22px;padding-bottom:6px}"
    + "a.im,a:hover.im{display:block;width:106px;height:22px;background:url(http://www.stkj999.com/UserControls/im/kefu/im_qbg.gif); margin:0 auto;text-decoration:none;font-size:12px;color:#095996}"
    + ".ImFooter{height:30px;background:url(http://www.stkj999.com/UserControls/im/kefu/im_04.gif)}"
    + ".offline_close{display:block;position:absolute;top:2px;right:10px; width: 30px;padding: 2px 0;height:15px;float: right;cursor:pointer;}"
    + ".offline_more{display:block;position:absolute;bottom:3px;right:0; width:115px;padding: 2px 0;height:15px;float: right;cursor:pointer;}"
    + "</style>");
var __oran_top_offset = -260;
function __oran_kf_get(elmId) { return document.getElementById(elmId); }
function writeIm(textS, siteNm, topOffset) {
	var cDate=new Date();
	var currentWeekDay=cDate.getDay();
	var wstr="";
	if (currentWeekDay==0) { //周日
		wstr=offlineContact(textS, siteNm, topOffset);
	}else {
		var currentHour=cDate.getHours();
		var __h=18;// 分界时间点
		if (currentWeekDay==6) { __h=17; }  //周六
		if (currentHour<__h) {
			wstr=onlineContact(textS, siteNm, topOffset);
		}else {
			wstr=offlineContact(textS, siteNm, topOffset);
		}
	}
    document.write(wstr);
}

function onlineContact(textS, siteNm, topOffset) {

	textS="在线咨询||1438802038$客服许小姐$客服许小姐|906317868$客服汪小姐$客服汪小姐";
    __oran_top_offset = topOffset - 50;
    var textCrumbs = textS.split(',');
    if (textCrumbs.length == 0) return;
    if (!siteNm) siteNm = "Oran";

    var rowStr = "<div style='position:" + getOs() + ";right:0px;width:121px;top:" + __oran_top_offset + "px;z-index:10;' id='divOranIm'><div id='kefubtn' style='text-align:right;cursor:pointer;display:none' ><img alt='打开客服菜单' src='http://www.stkj999.com/UserControls/im/kefu/kf-1.gif' onclick='__oran_kf_setKf(1,true)'></div><div id='bodd'><div class='ImHeader' onclick='__oran_kf_setKf(0)' style='cursor:pointer' title='隐藏客服菜单'></div><table class='ImTable' border='0' cellspacing='0' cellpadding='0' width='121'><tr><td align='center' valign='middle' height='140'><img src='http://www.stkj999.com/UserControls/im/kefu/im_icon.gif'></td></tr>";
    var online = [0];
    var imName = "qq";
    var altText;
    var imgPath;
    var classIm;
    var thisIm;
    var idCrumbs;
    for (var i = 0; i < textCrumbs.length; ++i) {
        if (textCrumbs[i].indexOf('||') == -1) {
            continue;
        }
        classIm = textCrumbs[i].split('||');
        // alert(classIm[0]);
        if (classIm[0]) {
           // rowStr += "<tr><td align='center' valign='middle' height='30'><h2>" + classIm[0] + "</h2><img src='/UserControls/im/kefu/title.gif'></td></tr>";
        }
        //        if (classIm[1].indexOf('|') == -1) {
        //            continue;
        //        }
        idCrumbs = classIm[1].split('|');

        for (var j = 0; j < idCrumbs.length; ++j) {

            thisim = idCrumbs[j].split('$');
            rowStr += "<tr><td><div  class='ImRow'><a title='" + thisim[2] + "' target='_blank' class='im' href='";
            if (idCrumbs[j].indexOf('@') != -1) {
                rowStr += "msnim:chat?contact=";
                imName = "msn";
            } else if (idCrumbs[j].indexOf('?call') != -1) {
                rowStr += "skype:";
                imName = "skype";
            } else if (idCrumbs[j].indexOf('?ww') != -1) {
                rowStr += "http://amos.im.alisoft.com/msg.aw?v=2&site=cntaobao&s=1&charset=utf-8&uid=";
                imName = "ww";
                rowStr += thisim[0].replace("?ww", "");
            }
            else {
                rowStr += "http://wpa.qq.com/msgrd?v=3&site=" + siteNm + "&menu=yes&uin=";
                imName = "qq";
            }

            rowStr += thisim[0];
            switch (imName) {
                case "msn": altText = "MSN"; imgPath = "/UserControls/im/kefu/im_msn_online.gif"; break;
                case "qq": altText = "QQ"; imgPath = "http://wpa.qq.com/pa?p=2:" + thisim[0] + ":45"; break;
                case "skype": altText = "Skype"; imgPath = "/UserControls/im/kefu/skype.gif"; break;
                case "ww": altText = "Wangwang"; imgPath = "/UserControls/im/kefu/wangwang.gif"; break;
            }
            rowStr += "'><img src='" + imgPath + "' alt='" + altText + "' style='border:none' align='absmiddle' border='0' /> " + thisim[1] + "</a></div></td></tr>";
        }
    }
    rowStr += "</table><div class='ImFooter' onclick='__oran_kf_setKf(0,true)' style='cursor:pointer' title='隐藏客服菜单'></div><div style='width:121px;'><img src='http://www.stkj999.com/UserControls/im/kefu/weixin.gif'></div></div></div>";
	return rowStr;

	
}

function offlineContact(textS, siteNm, topOffset) {
	__oran_top_offset = topOffset - 50;
    return "<div id='divOranIm' style='position:" + getOs() + ";right:0px;width:121px;height: 266px;top:"+__oran_top_offset+"px;z-index:1000;' ><div id='kefubtn' style='text-align:right;cursor:pointer;display:none' ><img alt='打开客服菜单' src='http://www.stkj999.com/UserControls/im/kefu/kf-1.gif' onclick='__oran_kf_setKf(1,true)'></div><div id='bodd' style='width:121px;height: 266px;position:absolute;top:0;background:url(http://www.stkj999.com/UserControls/IM/kefu/offline.jpg) no-repeat;'><a class='offline_close' href='javascript:;' onclick='__oran_kf_setKf(0)' title='隐藏客服菜单'></a> <a class='offline_more' href='/single/offlinecontact.aspx'></a></div></div>";
}

function __oran_kf_setKf(valtype, writeCookie) {
    if (valtype == 0) {
        __oran_kf_get("bodd").style.display = "none";
        __oran_kf_get("kefubtn").style.display = "";
        if (writeCookie)
            __oran_kf_setCookie("kefutype", 0);
    } else {
        __oran_kf_get("bodd").style.display = "";
        __oran_kf_get("kefubtn").style.display = "none";
        if (writeCookie)
            __oran_kf_setCookie("kefutype", 1);
    }
}
function __oran_kf_getPosition() {
    var top = document.documentElement.scrollTop;
    var left = document.documentElement.scrollLeft;
    var height = document.documentElement.clientHeight;
    var width = document.documentElement.clientWidth;
    return { top: top, left: left, height: height, width: width };
}
function __oran_kf_setPostion(objID) {
    var obj = __oran_kf_get(objID);
	if(navigator.userAgent.indexOf('Chrome')==-1){
		window.onscroll = function () {
			var Position = __oran_kf_getPosition();
			obj.style.top = (Position.top) + __oran_top_offset + "px";
			obj.style.right = 0;
		};
	}
    var show = true;
    var cookeVal = __oran_kf_getCookie("kefutype");
    if (cookeVal == null || cookeVal == "0") show = false;
    show = true;// 始终显示 
	if (__oran_kf_get("bodd")) {
		__oran_kf_setKf(show ? 1 : 0, true);
	}
}
function __oran_kf_setCookie(name, value) {
    var Days = 1;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 10000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
}
function __oran_kf_getCookie(name) {
    var arr;
    var rgx = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(rgx)) return unescape(arr[2]);
    else return null;
}

function getOs() {
    var OsObject = "";

    if (navigator.userAgent.indexOf("MSIE") > 0) {
        return "absolute";
    }
    if (isFirefox = navigator.userAgent.indexOf("Firefox") > 0) {
        return "absolute";
    }
    if (isSafari = navigator.userAgent.indexOf("Safari") > 0) {
        return "fixed";
    }

    if (isCamino = navigator.userAgent.indexOf("Camino") > 0) {

        return "fixed";
    }
    if (isMozilla = navigator.userAgent.indexOf("Gecko/") > 0) {
        return "absolute";
    }
}  

/*
if (location.href.toLowerCase().indexOf('statement.aspx')<0) {
	document.write('<div id="statement"><p><a class="a1" href="/single/statement.aspx" target="_blank">网站声明</a><a class="a2" href="javascript:;" onclick="this.parentNode.parentNode.style.display=\'none\'">X</a></p><div>&nbsp;&nbsp;&nbsp;&nbsp;近日发现网上有冒充我胜特加固的公司，为避免广大客户上当受骗，现我司郑重发布声明，请<a href="/single/statement.aspx" target="_blank">点击此处</a>查看我公司下设机构、联系、网站等信息。</div></div>');
}

if (navigator.userAgent.indexOf("MSIE 6.0")>0) {
	$("#statement").css({"position":"absolute","bottom":""});
	StatementFloat();
}
var stmTimer=null;
function StatementFloat() {
	$("#statement").css("top",$(document).scrollTop()+document.documentElement.clientHeight-$("#statement").height()-90+"px");
	stmTimer=setTimeout("StatementFloat()",20);
}
*/