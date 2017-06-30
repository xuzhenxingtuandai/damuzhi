<script charset="utf-8" src="/js/jquery-1.4.4.min.js"></script>
<link rel="stylesheet" href="/js/bulkupload/themes/default/default.css" />
<link rel="stylesheet" href="/js/bulkupload/plugins/code/prettify.css" />
<script charset="utf-8" src="/js/bulkupload/kindeditor.js"></script>
<script charset="utf-8" src="/js/bulkupload/lang/zh_CN.js"></script>
<script charset="utf-8" src="/js/bulkupload/plugins/code/prettify.js"></script>
<style>
   #Imgurl li{padding:10px 10px ;
        border:1px solid #5C5C5C;
        margin-right:5px;
    float: left;}
</style>
<script>

    KindEditor.ready(function (K) {
        var editor = K.editor({
            cssPath: '/js/bulkupload/plugins/code/prettify.css',
            uploadJson: '/js/bulkupload/php/upload_json.php',
            fileManagerJson: '/js/bulkupload/php/file_manager_json.php',
            urlType: "domain",
            allowFileManager: true
        });
        $('#MultiUpImage').click(function () {

            $.ajax({
                type: "POST",
                url: '/index.php?case=table&act=upload&table=archive&admin_dir=admin&site=default',
                data: 'type=clear',
                dataType: 'json',
                async:false,
                success: function (data) {
                   if(data==-200) {
                       if (editor.dialogs.length <= 0) {
                           editor.loadPlugin('multiimage', function () {
                               editor.plugin.multiImageDialog({
                                   clickFn: function (urlList) {
                                       var str='<ul>';
                                       for (var i = 0; i < urlList.length; i++) {
                                           str += "<li><img src='" + urlList[i].url + "' width='200px' height='200px'/></li>";
                                       }
                                       str+="</ul>";
                                       $("#Imgurl").html(str);
                                       editor.hideDialog();
                                   }
                               });
                           });
                       }
                   }
                    else{
                       alert("上传错误!");
                   }
                }
            });
        });
    });

    $(document).ready(function(){
        $('#submit').click(function () {
            if($("#catid").val()!=0) {

                $.ajax({
                    type: "POST",
                    url: '/index.php?case=table&act=upload&table=archive&admin_dir=admin&site=default',
                    data: 'type=upload&catid=' + $("#catid").val() + '&typeid=' + $("#typeid").val() + '&template=' + $("#template").val() + '',
                    dataType: 'json',
                    async: false,
                    success: function (data) {
                        if (data == -200) {
                            alert("批量上传成功！");
                            $.ajax({
                                type: "POST",
                                url: '/index.php?case=table&act=upload&table=archive&admin_dir=admin&site=default',
                                data: 'type=clear',
                                dataType: 'json',
                                async: false,
                                success: function (data) {
                                    if(data==-200){
                                        $("#Imgurl").html("");
                                    }
                                }
                            });
                        }
                        else  if (data == -302){
                            alert("未找到上传的文件!");
                        }
                        else{
                            alert("上传失败!");
                        }
                    }
                });

            }
            else {
                alert("必须选择分类！");
            }
        });

    });

</script>
<div class="blank20"></div>

<div id="tagscontent" class="right_box">

    <form action="<?php if(front::$act=='edit') $id="/id/".$data[$primary_key]; else $id=''; echo modify("/act/".front::$act."/table/".$table.$id);?>" method="post" enctype="multipart/form-data" name="form1"  onsubmit="return checkform();">
        <input type="hidden" name="onlymodify" value=""/>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table1">
            <tbody>
            <tr>
                <td width="19%" align="right">栏目</td>
                <td width="1%">&nbsp;</td>
                <td width="70%">
                    {form::getform('catid',$form,$field,$data)}
                    <span class="hotspot" onmouseover="tooltip.show('选择内容所在栏目，如果栏目有子级栏目，请选择子级栏目！');" onmouseout="tooltip.hide();"><img src="{$skin_path}/images/remind.gif" alt="" width="14" height="20"  style="margin-left:10px; margin-right:5px;"></span>
                </td>
            </tr>
            <tr>
                <td width="19%" align="right">分类</td>
                <td width="1%">&nbsp;</td>
                <td width="70%">{form::getform('typeid',$form,$field,$data)}
                    <span class="hotspot" onmouseover="tooltip.show('选择内容所在分类，如果分类有子级分类，请选择子级分类！');" onmouseout="tooltip.hide();"><img src="{$skin_path}/images/remind.gif" alt="" width="14" height="20"  style="margin-left:10px; margin-right:5px;"></span>
                </td>
            </tr>
            <tr>
                <td width="19%" align="right">内容页模板</td>
                <td width="1%">&nbsp;</td>
                <td width="70%">
                    {form::getform('template',$form,$field,$data)}
			<span class="hotspot" onmouseover="tooltip.show('选择内容模板样式，可区别栏目设置的其他内容样式，以便拥有独立的外观！<br />默认为继承栏目模板设置！');" onmouseout="tooltip.hide();">
			<img src="{$skin_path}/images/remind.gif" alt="" width="14" height="20"  style="margin-left:10px; margin-right:5px;">
			</span>
                </td>
            </tr>
            <tr>
                <td align="right">批量上传</td> <td width="1%">&nbsp;</td> <td width="70%"><input type="button" name="fileimg" id="MultiUpImage" value="选择" style="padding:0 7px"/><input type="button" name="fileimg" id="submit" value="上传" style="padding:0 7px"/> </td>
            </tr>
            <tr>
                <td colspan="3">
                   <div id="Imgurl">

                   </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="blank20"></div>

    </form>
</div>