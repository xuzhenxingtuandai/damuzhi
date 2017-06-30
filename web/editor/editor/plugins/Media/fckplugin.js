/*
 * For FCKeditor 2.3
 * 
 * File Name: fckplugin.js
 * 	Add a toolbar button to insert media.
 * 
 * File Authors:
 * 		Madpolice (madpolice_dong@163.com) 20060726
 */


// Register the related commands.
FCKCommands.RegisterCommand( 'Media'		, new FCKDialogCommand( FCKLang['DlgMediaTitle']	, FCKLang['DlgMediaTitle']		, FCKConfig.PluginsPath + 'Media/media.html'	, 450, 350 ) ) ;

// Create the "Media" toolbar button.
var oFindItem		= new FCKToolbarButton( 'Media', FCKLang['MediaInsertMedia'] ) ;
oFindItem.IconPath	= FCKConfig.PluginsPath + 'Media/media.gif' ;

FCKToolbarItems.RegisterItem( 'Media', oFindItem ) ;			// 'Media' is the name used in the Toolbar config.
