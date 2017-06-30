
var promptleft="<table border='0' cellspacing='0' cellpadding='0'><tr><td bgcolor='#d6f0fd' valign='middle' style='border: 1px solid; border-color: #b4cee5;color:#000002; line-heihgt:20px; padding:0 5px;'><img src='images/information.png' align='absmiddle'>&nbsp;"
var promptright="&nbsp;&nbsp;</td></tr></table>"
var errorleft="<table border='0' cellspacing='0' cellpadding='0'><tr><td bgcolor='#fffac8' valign='middle' style='border: 1px solid; border-color: #e5daa4;color:#000002; line-heihgt:20px; padding:0 5px;'><img src='images/cross.png' align='absmiddle'>&nbsp;"
var errorright="&nbsp;&nbsp;</td></tr></table>"
var correctleft="<img src='images/tick.png' align='absmiddle'>&nbsp;<font color='000000'>"
var correctright="</font>"
var xhr;
function in01()
{
	var objQueryStat = document.getElementById("div_name");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"2-10个字符(可以是小写字母、数字、下划线)昵称。"+promptright;
}
//用户名
function in02()
{
	var objQueryStat = document.getElementById("div_pwd");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"由a-z;A-Z;0-9的字母数字组合。"+promptright;
}
//密码
function in03()
{
	var objQueryStat = document.getElementById("div_pwd2");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请再输入一遍您上面填写的密码。"+promptright;
}
//第二次密码
function in04()
{
	var objQueryStat = document.getElementById("div_cname");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"公司名称或者个人姓名。"+promptright;
}
//公司名称
function in05()
{
	var objQueryStat = document.getElementById("div_cert");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"公司营业执照或者身份证号  身份验证的重要依据。"+promptright;
}
//证件号码
function in06()
{
	var objQueryStat = document.getElementById("div_contact");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请再输入您的真实姓名,以方便我们和您联系!"+promptright;
}
//联系人
function in07()
{
	var objQueryStat = document.getElementById("div_at");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请输入您所在的城市!"+promptright;
}
//省份/地区
function in17()
{
	var objQueryStat = document.getElementById("div_prv_cn");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请输入您所在的省份/地区!"+promptright;
}
//城市
function in08()
{
	var objQueryStat = document.getElementById("div_city");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请再输入您的真实地址,以方便我们邮件回访!"+promptright;
}
//地址
function in09()
{
	var objQueryStat = document.getElementById("div_zip");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请输入你的邮编,如：210000!"+promptright;
}
//邮编
function in10()
{
	var objQueryStat = document.getElementById("div_phone");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"可以为您电话服务，例举:021-8888999或0218888999。"+promptright;
}
//联系电话
function in11()
{
	var objQueryStat = document.getElementById("div_fax");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"例举:021-8888999或0218888999。"+promptright;
}
//传真
function in12()
{
	var objQueryStat = document.getElementById("div_cell");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请输入您的手机号，以方便我们能及时找到您。"+promptright;
}
//手机号
function in13()
{
	var objQueryStat = document.getElementById("div_email");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"方便为您到期提醒,举例：web@cndns.com。"+promptright;
}
//电子邮箱
function in14()
{
	var objQueryStat = document.getElementById("div_qq");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"请输入您的QQ号,方便为您提供qq在线支持服。例举：123456!"+promptright;
}
//QQ
function in15()
{
	var objQueryStat = document.getElementById("div_msn");
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = promptleft+"方便为您msn在线支持服务，举例：msn@hotmail.com!"+promptright;
}
//msn
function NameProcessBack()
{
	if(xhr.readyState == 4)
	{
		var Data = xhr.responseText;
		//alert("name processed SUCCEED");
		//alert(Data);
		//开始分析数据，看名字是否有?
		var info = Data.split(',');
		//alert(info[0]);
		if( info[0] == 1)
		{
			//alert("名字有效");
			var objQueryStat = document.getElementById("div_name");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = correctleft+"恭喜，这个用户名可以注册!"+correctright;
		}
		else{
			//alert("该名字已经存在");
			var objQueryStat = document.getElementById("div_name");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = errorleft+"该名字已经被注册，请重新选择一个!"+errorright;
		}
	}
	else{
		//alert(xhr.readyState);
	}
}

//email信息callback
function MailProcessBack()
{
	if(xhr.readyState == 4)
	{
		var Data = xhr.responseText;
		//alert("name processed SUCCEED");
		//alert(Data);
		//开始分析数据，看名字是否有?
		var info = Data.split(',');
		//alert(info[0]);
		if( info[0] == 1)
		{
			//alert("名字有效");
			var objQueryStat = document.getElementById("div_email");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML =  correctleft+"邮箱格式正确!"+correctright;
		}
		else{
			//alert("该名字已经存在");
			var objQueryStat = document.getElementById("div_email");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = errorleft+"该邮箱已经被注册过，请重新选择一个!"+errorright;
		}
	}
}

function CreateXHR()
{
	//早期的IE版本是Msxm12.XMLHTTP
	//IE5+是Microsoft.XMLHTTP
	//非IE，支持的是XMLHttpRequest
	try{
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	catch(e){
		try{
			//alert("IE5--");
			xhr = new ActiveXObject("Msxm12.XMLHTTP");
		}
		catch(E){
			xhr = false;
		}
	}

	if(!xhr && typeof XMLHttpRequest != 'undefined')
	{
		//alert("none IE");
		xhr =new XMLHttpRequest();
	}
	else{
		//alert("IE5++");
	}

	return xhr;
}

function IsValidString(temp)
{
	validStr=new String("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_");
	for(i=0;i<temp.length;i++)
	{
		if(validStr.indexOf(temp.charAt(i))==-1)
		{
			return false;
		}
	}
	return true;
}

function ProcessLogName(name)
{

	//本地的规则检测
	if (name.length>16 |name.length<4)
	{
		//alert("登录名称长度需要在4-16之间");
		var objQueryStat = document.getElementById("div_name");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"登录名称长度需要在4-16之间!"+errorright;

	}
	else{
		if(IsValidString(name))
		{
			//alert(name)	;
			xhr = CreateXHR();
			xhr.onreadystatechange=NameProcessBack;
			var url = "rpc_svr.asp?";
			xhr.open("GET",url+"name="+name);
			xhr.send(null);
		}
		else{
			//不是有数字字母和下划线组成
			var objQueryStat = document.getElementById("div_name");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = errorleft+"登录名称只能包含数字，字母，下划线"+errorright;
		}
	}
}


//email规则
function Test_email(strEmail) {
	var myReg = /^[-a-z0-9\._]+@([-a-z0-9\-]+\.)+[a-z0-9]{2,3}$/i;
	if(myReg.test(strEmail)) return true;
	return false;
}


//检测mail
function ProcessMail(mail)
{
	//本地规则检测
	if(Test_email(mail))
	{
		xhr = CreateXHR();
		xhr.onreadystatechange=MailProcessBack;
		var url = "rpc_svr.asp?";
		xhr.open("GET",url+"mail="+mail);
		xhr.send(null);
	}
	else{
		var objQueryStat = document.getElementById("div_email");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"请填写正确的email！"+errorright;
	}

}

function ProcessName(name)
{
	if(name.length>0)
	{
		//通过检测
		var objQueryStat = document.getElementById("div_cname");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML =  correctleft+"通过检测"+correctright;
	}
	else{
		var objQueryStat = document.getElementById("div_cname");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"此项必填！"+errorright;
	}
}
function Processcrd(name)
{
	if(name.length>0)
	{
		//通过检测
		var objQueryStat = document.getElementById("div_cert");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML =  correctleft+"通过检测"+correctright;
	}
	else{
		var objQueryStat = document.getElementById("div_cert");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"此项必填！"+errorright;
	}
}
function ProcessLogPwd(pwd)
{
	if(pwd.length>16|pwd.length<6)
	{
		var objQueryStat = document.getElementById("div_pwd");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"登录密码长度需要在6-16之间!"+errorright;
	}
	else{
		if(!IsValidString(pwd))
		{
			//不是有数字字母和下划线组成
			var objQueryStat = document.getElementById("div_pwd");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = errorleft+"登录密码只能包含数字，字母，下划线"+errorright;
		}
		else{
			//密码合法
			var objQueryStat = document.getElementById("div_pwd");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML =  correctleft+"恭喜，输入合法!"+correctright;
		}
	}
}

function ProcessLogPwd2(pwd2)
{
	if( pwd2 != document.getElementById("u_pss").value )
	{
		var objQueryStat = document.getElementById("div_pwd2");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"两次密码输入不一致"+errorright;
	}
	else{
		if(pwd2.length>0)
		{
			var objQueryStat = document.getElementById("div_pwd2");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML =  correctleft+"通过检测"+correctright;
		}
		else{
			var objQueryStat = document.getElementById("div_pwd2");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = errorleft+"密码不能为空"+errorright;

		}
	}
}

//邮编
function ProcessZip(zip)
{
	if(zip.length!=6)
	{
		var objQueryStat = document.getElementById("div_zip");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"请输入6位邮编!"+errorright;
	}
	else{
		//检测是不是都是数字
		if(zip>=0 && zip<1000000)
		{
			var objQueryStat = document.getElementById("div_zip");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML =  correctleft+"输入合法!"+correctright;
		}
		else{
			var objQueryStat = document.getElementById("div_zip");
			objQueryStat.style.display = "block";
			objQueryStat.innerHTML = errorleft+"输入错误!"+errorright;
		}

	}
}

function ProcessContact(cont)
{
	if(cont.length>0)
	{
		//通过检测
		var objQueryStat = document.getElementById("div_contact");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML =  correctleft+"通过检测"+correctright;
	}
	else{
		var objQueryStat = document.getElementById("div_contact");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"此项必填！"+errorright;
	}
}


function ProcessPrvcn(cont)
{
	if(cont.length>0)
	{
		//通过检测
		var objQueryStat = document.getElementById("div_prv_cn");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML =  correctleft+"通过检测"+correctright;
	}
	else{
		var objQueryStat = document.getElementById("div_prv_cn");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"此项必填！"+errorright;
	}
}


function ProcessCity(city)
{
	if(city.length>0)
	{
		//通过检测
		var objQueryStat = document.getElementById("div_city");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = correctleft+"通过检测"+correctright;
	}
	else{
		var objQueryStat = document.getElementById("div_city");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"此项必填！"+correctright;
	}
}

function ProcessPhone(phone)
{
	//要符合电话号码规范
	var myReg = /^[0-9]{1,4}(-){0,1}[0-9]{1,13}$/;
	if(!myReg.test(phone)||phone.length<7)
	{
		var objQueryStat = document.getElementById("div_phone");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = errorleft+"格式为:021-8888999或0218888999"+errorright;
	}
	else{
		var objQueryStat = document.getElementById("div_phone");
		objQueryStat.style.display = "block";
		objQueryStat.innerHTML = correctleft+"通过检测"+correctright;
	}

}

function Noprocess(div_value)
{
	var objQueryStat = document.getElementById(div_value);
	objQueryStat.style.display = "block";
	objQueryStat.innerHTML = correctleft+"通过检测";
}

