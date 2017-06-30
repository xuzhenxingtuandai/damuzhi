/*
 * 把HighLighter做为FCKeditor的语法显示插件
 * Author : Garfeild < garfield0601@gmail.com >
 * since  : 2007-10-19
 */

// Register the related commands.
//FCKCommands.RegisterCommand( 'HighLighter', new FCKDialogCommand("HighLighter",FCKLang.DlgHighLighterTitle,FCKConfig.Plugins.Items['HighLighter'].Path + 'fck_HighLighter.html', 540, 540 ) ) ;
FCKCommands.RegisterCommand( 'HighLighter', new FCKDialogCommand("HighLighter",FCKLang['CodeDlgTitle'],FCKConfig.PluginsPath + 'HighLighter/fck_HighLighter.html', 540, 500 ) ) ;

// Create the "HighLighter" toolbar button.
var oHighLighterItem		= new FCKToolbarButton( 'HighLighter', FCKLang['CodeBtn'] ) ;
oHighLighterItem.IconPath	= FCKConfig.PluginsPath + 'HighLighter/HighLighter.gif' ;

FCKToolbarItems.RegisterItem( 'HighLighter', oHighLighterItem );// 'HighLighter' is the name used in the Toolbar config.

var FCKHighLighter = new Object();
var CSS_PATH 	  = FCKConfig.PluginsPath + "HighLighter/dp.SyntaxHighLighter/Styles/";
var pool = {"firstCss" : true };

FCKHighLighter.Add = function( value ){
	var oDiv  = FCK.CreateElement("div");
 	oDiv._FCKHighLighter = "hlDiv" + Math.random()  ; 
	oDiv.className="dp-HighLighter";
	oDiv.innerHTML = value;
	if(pool.firstCss) {
		pool.firstCss = false;
		oDiv.innerHTML += "";
	}
	//  alert(oDiv.innerHTML);
}
FCKHighLighter.OnDoubleClick = function( div ){
//	if(div._FCKHighLighter = "hlDiv") FCKCommands.GetCommand( 'HighLighter' ).Execute() ;
	if(div.className == "dp-HighLighter" && div.tagName=="DIV") FCKCommands.GetCommand( 'HighLighter' ).Execute() ;
}
FCK.RegisterDoubleClickHandler( FCKHighLighter.OnDoubleClick, 'DIV' ) ;
