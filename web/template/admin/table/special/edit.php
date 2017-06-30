<form method="post" name="form1" action="<?php if(front::$act=='edit') $id="/id/".$data[$primary_key]; else $id=''; echo modify("/act/".front::$act."/table/".$table.$id);?>" enctype="multipart/form-data" onsubmit="return checkform();">
<input type="hidden" name="onlymodify" value=""/>

<script type="text/javascript" src="{$base_url}/common/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="{$base_url}/common/js/jquery.imgareaselect.min.js"></script>
    <script type="text/javascript" src="{$base_url}/common/js/ThumbAjaxFileUpload.js"></script>
<link rel="stylesheet" href="{$base_url}/common/js/jquery/ui/ui.datepicker.css" type="text/css" media="screen" title="core css file" charset="utf-8" />
    <script language="javascript" src="{$base_url}/common/js/jquery/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/upimg/dialog.js"></script>
    <link href="{$base_url}/images/dialog.css" rel="stylesheet" type="text/css" />
    
<div id="tagstitle">
   <a id="one1" onclick="setTab('one',1,6)" class="hover">添加标题</a>
   </div>
<div class="blank5"></div>

<div id="tagscontent" class="right_box">
<table border="0" cellspacing="0" cellpadding="0" name="table1" id="table1" width="100%">

<tbody>

<tr>
<td width="19%" align="right">标题</td>
<td width="1%">&nbsp;</td>
<td width="70%">
{form::getform('title',$form,$field,$data)}
</td>
</tr>

<tr>
<td width="19%" align="right">是否生成</td>
<td width="1%">&nbsp;</td>
<td width="70%">
<div class="blank10"></div>
{form::getform('ishtml',$form,$field,$data)}
</td>
</tr>

<tr>
<td width="19%" align="right">横幅</td>
<td width="1%">&nbsp;</td>
<td width="70%">
{form::getform('banner',$form,$field,$data)}
</td>
</tr>

<tr>
<td width="19%" align="right">描述</td>
<td width="1%">&nbsp;</td>
<td width="70%">
<div class="blank10"></div>
{form::getform('description',$form,$field,$data)}
</td>
</tr>
</tbody>
</table>
    
    
</div>

<div class="blank20"></div>
<input type="submit" name="submit" value=" 提交 " class="btn_a" />
</form>