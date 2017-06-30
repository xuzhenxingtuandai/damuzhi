<?PHP
if ($act=='edit') {
$editorautosave=<<<eot
<span id="timemsg">{$lna[1179]}</span>&nbsp; &nbsp;<span id="timemsg2"></span>
<link rel="stylesheet" href="editor/fckeditor/editor/plugins/insertcode/insertcode.css">
 <script type='text/javascript' src='editor/fckeditor/autosaver.js'>
</script>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<a href="javascript: stopautosaver();">{$lna[1176]}</a>] | [<a href="javascript: restartautosaver();">{$lna[1175]}</a>] | [<a href="javascript: stopforever();">{$lna[1177]}</a>] | [<a href="javascript: switchtodraft();">{$lna[1173]}</a>] | [<a href="javascript: savedraft();">{$lna[1178]}</a>] | [<a href="javascript: cleardraft();">{$lna[1180]}</a>]
eot;
}
$editorjs=<<<eot
<script language="javascript" type="text/javascript" src="editor/fckeditor/fckeditor.js"></script>
<script type="text/javascript">
window.onload = function()
{
var oFCKeditor = new FCKeditor( 'content' ) ;
oFCKeditor.Height = "400";
oFCKeditor.Width = "100%" ; 
oFCKeditor.BasePath = '/editor/fckeditor/' ;//根据目录情况更改路径，根目录不变；若在blog目录改为/blog/editor/fckeditor/
oFCKeditor.ReplaceTextarea() ;
}
function fckAddText(txt)
{
var oEditor = FCKeditorAPI.GetInstance('content');
oEditor.InsertHtml(txt);
}
</script>
eot;
$editorbody=<<<eot
<textarea name="content" id="content" rows='20' cols='100' style='font-size: 10pt;'>{content}</textarea>
$editorautosave
<br>[<a href="javascript: showhidediv('FrameUpload');" title="{$lna[741]}" class="thickbox"  style="color:olive;font-weight:900">{$lna[741]}</a>]--[<a href="javascript: fckAddText('[separator]');" title="{$lna[701]}" class="thickbox" style="color:olive;font-weight:900">{$lna[701]}</a>]--[<a href="javascript: fckAddText('[newpage]');" title="{$lna[702]}" class="thickbox" style="color:olive;font-weight:900">{$lna[702]}</a>]--[<a href="http://www.newzz.fr.cr" target="_blank">About Me</a>]

<div id="FrameUpload" style="display: none;"><iframe width=90% frameborder=0 height=200 frameborder=0 src='admin.php?act=upload&useeditor={$useeditor}'></iframe></div>
eot;
