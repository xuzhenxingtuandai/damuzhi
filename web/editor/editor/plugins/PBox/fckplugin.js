var oPBoxItem=new FCKToolbarButton('PBox',FCKLang['InsertPBoxBtn']);
//var oPBoxItem=new FCKToolbarButton('PBox',null,FCKLang["InserPBoxBtn"],null,false,true,37);
oPBoxItem.IconPath	= FCKConfig.PluginsPath + 'PBox/icon.gif' ;
FCKToolbarItems.RegisterItem('PBox',oPBoxItem);

var FCKPBox = new Object();

FCKPBox = function(name){
	this.Name = name;
}

FCKPBox.prototype.GetState = function() {
	if (FCK.EditMode!=0) return -1;
		return 0;
}

FCKPBox.prototype.Execute = function(){
	window.parent.windowsdig('选择文件','iframe:index.php?case=file&act=updialog&fileinputid='+FCK.Name+'&maxselect=13&checkfrom=edit','900px','480px','iframe');
}

FCKCommands.RegisterCommand('PBox', new FCKPBox('PBox'));