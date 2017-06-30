var currentpicname;
var realpath="attachment/";

function generateUpload (attachid, filename) {
	filename=filename.replace(/\*/g, '.');
	filename=realpath+filename;
	fckInsert(attachid,filename);
}

function fckInsert(attachid,filename){
	var oEditor = parent.FCKeditorAPI.GetInstance('content')
	var extindex = filename.lastIndexOf(".");
	if (extindex!=-1) {
	var realext=filename.substring(extindex+1).toLowerCase();
		 switch(realext){
		  case 'gif':
			oEditor.InsertHtml('<img src="'+attachid+'" alt=""/>');
			break;
		  case 'jpg':
			oEditor.InsertHtml('<img src="'+attachid+'" alt=""/>');
			break;
		  case 'png':
			oEditor.InsertHtml('<img src="'+attachid+'" alt=""/>');
			break;
		  case 'bmp':
			oEditor.InsertHtml('<img src="'+attachid+'" alt=""/>');
			break;
		  case 'jpeg':
			oEditor.InsertHtml('<img src="'+attachid+'" alt=""/>');
			break;
		  case 'mp3':
			oEditor.InsertHtml('<object classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95"  id="MediaPlayer" width="450" height="70"><param name=""howStatusBar" value="-1"><param name="AutoStart" value="False"><param name="Filename" value="'+attachid+'"></object>');
			break;
		  case 'wma':
			oEditor.InsertHtml('<object classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95"  id="MediaPlayer" width="450" height="70"><param name=""howStatusBar" value="-1"><param name="AutoStart" value="False"><param name="Filename" value="'+attachid+'"></object>');
			break;
		  case 'rm':
			oEditor.InsertHtml('<object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="400" height="300"><param name="SRC" value="'+attachid+'" /><param name="CONTROLS" VALUE="ImageWindow" /><param name="CONSOLE" value="one" /><param name="AUTOSTART" value="true" /><embed src="'+attachid+'" nojava="true" controls="ImageWindow" console="one" width="400" height="300"></object><br/><object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="400" height="32" /><param name="CONTROLS" value="StatusBar" /><param name="AUTOSTART" value="true" /><param name="CONSOLE" value="one" /><embed src="'+attachid+'" nojava="true" controls="StatusBar" console="one" width="400" height="24" /></object><br/><object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="400" height="32" /><param name="CONTROLS" value="ControlPanel" /><param name="AUTOSTART" value="true" /><param name="CONSOLE" value="one" /><embed src="'+attachid+'" nojava="true" controls="ControlPanel" console="one" width="400" height="24" autostart="true" loop="false" /></object>');
			break;
		  case 'rmvb':
			oEditor.InsertHtml('<object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="400" height="300"><param name="SRC" value="'+attachid+'" /><param name="CONTROLS" VALUE="ImageWindow" /><param name="CONSOLE" value="one" /><param name="AUTOSTART" value="true" /><embed src="'+attachid+'" nojava="true" controls="ImageWindow" console="one" width="400" height="300"></object><br/><object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="400" height="32" /><param name="CONTROLS" value="StatusBar" /><param name="AUTOSTART" value="true" /><param name="CONSOLE" value="one" /><embed src="'+attachid+'" nojava="true" controls="StatusBar" console="one" width="400" height="24" /></object><br/><object classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="400" height="32" /><param name="CONTROLS" value="ControlPanel" /><param name="AUTOSTART" value="true" /><param name="CONSOLE" value="one" /><embed src="'+attachid+'" nojava="true" controls="ControlPanel" console="one" width="400" height="24" autostart="true" loop="false" /></object>');
			break;
		  case 'ra':
			oEditor.InsertHtml('<object classid="clsid:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA" id="RAOCX" width="450" height="60"><param name="_ExtentX" value="6694"><param name="_ExtentY" value="1588"><param name="AUTOSTART" value="true"><param name="SHUFFLE" value="0"><param name="PREFETCH" value="0"><param name="NOLABELS" value="0"><param name="SRC" value="'+attachid+'"><param name="CONTROLS" value="StatusBar,ControlPanel"><param name="LOOP" value="0"><param name="NUMLOOP" value="0"><param name="CENTER" value="0"><param name="MAINTAINASPECT" value="0"><param name="BACKGROUNDCOLOR" value="#000000"><embed src="'+attachid+'" width="450" autostart="true" height="60"></embed></object>');
			break;
		  case 'asf':
			oEditor.InsertHtml('<object classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,902" type="application/x-oleobject" standby="Loading..." width="400" height="300"><param name="FileName" VALUE="'+attachid+'" /><param name="ShowStatusBar" value="-1" /><param name="AutoStart" value="true" /><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" src="'+attachid+'" autostart="true" width="400" height="300" /></object>');
			break;
		  case 'avi':
			oEditor.InsertHtml('<object classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,902" type="application/x-oleobject" standby="Loading..." width="400" height="300"><param name="FileName" VALUE="'+attachid+'" /><param name="ShowStatusBar" value="-1" /><param name="AutoStart" value="true" /><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" src="'+attachid+'" autostart="true" width="400" height="300" /></object>');
			break;
		  case 'wmv':
			oEditor.InsertHtml('<object classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,902" type="application/x-oleobject" standby="Loading..." width="400" height="300"><param name="FileName" VALUE="'+attachid+'" /><param name="ShowStatusBar" value="-1" /><param name="AutoStart" value="true" /><embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" src="'+attachid+'" autostart="true" width="400" height="300" /></object>');
			break;
		  case 'swf':
			oEditor.InsertHtml('<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="400" height="300"><param name="movie" value="'+attachid+'" /><param name="quality" value="high" /><param name="AllowScriptAccess" value="never" /><embed src="'+attachid+'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="300" /></object>');
			break;
		  default :
			oEditor.InsertHtml('[sfile]'+attachid+'[/sfile]');
		}
	}
}

