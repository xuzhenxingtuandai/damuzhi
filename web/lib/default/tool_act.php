<?php

if (!defined('ROOT'))
    exit('Can\'t Access !');
class tool_act extends act {
    function init() {
    }
    function index_action() {
    }
    function verify_action() {
        echo verify::show();
    }
    function upload_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            foreach ($_FILES as $name=>$file) {
                if (!$file['name'] ||!preg_match('/\.(jpg|gif|png|bmp)$/',$file['name'])) {
                    continue;
                }
                $uploads[$name]=$upload->run($file);
                $res[$name]['name']= '';
                if(config::get('base_url') == '/'){
                	$res[$name]['name'] = '/'.$uploads[$name];
                }else{
                	$res[$name]['name'] = config::get('base_url').'/'.$uploads[$name];
                }
                if (empty($uploads[$name])) {
                    $res['error']=$name.lang('上传失败！');
                    break;
                }
                $path=$upload->save_path;
                chmod($path,0644);
                $catid=get('catid');
                $type=get('type');
                if ($type == 'thumb'&&!get('cut')) {
                    $thumb=new thumb();
                    $thumb->set($path,'file');
                    if ($catid)
                        $thumb->create($path,category::getwidthofthumb($catid),category::getheightofthumb($catid));
                    else
                        $thumb->create($path,config::get('thumb_width'),config::get('thumb_height'));
                }
                $_name=str_replace('_upload','',$name);
                $res[$name]['code']="
                if(document.form1) {
                //document.form1.$_name.value=data[key].name;
                $('#$_name').val(data[key].name);
                }
                else
                $('#$_name').val(data[key].name);
                image_preview('$_name',data[key].name);
                        ";
            }
        }
        echo json::encode($res);
    }
    function upload_thumb_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            foreach ($_FILES as $name=>$file) {
                if (!$file['name'] ||!preg_match('/\.(jpg|gif|png|bmp)$/',$file['name'])) {
                    continue;
                }
                $uploads[$name]=$upload->run($file);
                if (empty($uploads[$name])) {
                    $res['error']=$name.lang('上传失败！');
                    break;
                }
                $res[$name]['name']=$uploads[$name];
                $path=$upload->save_path;
                chmod($path,0644);
                $thumb=new thumb();
                $thumb->set($path,'file');
                $catid=get('catid');
                $type=get('type');
                if ($catid)
                    $thumb->create($path,category::getwidthofthumb($catid),category::getheightofthumb($catid));
                else
                    $thumb->create($path,config::get('thumb_width'),config::get('thumb_height'));
                $_name=str_replace('_upload','',$name);
                $res[$name]['code']="
                document.form1.$_name.value=data[key].name;
                image_preview('$_name',data[key].name);
                        ";
            }
        }
        echo json::encode($res);
    }
    function upload3_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            foreach ($_FILES as $name=>$file) {
                if (!$file['name'] ||!preg_match('/\.(jpg|gif|png|bmp)$/',$file['name'])) {
                    continue;
                }
                $uploads[$name]=$upload->run($file);
                $res[$name]['name']=front::$view->base_url.'/'.$uploads[$name];
                $path=$upload->save_path;
                chmod($path,0644);
                $thumb=new thumb();
                $thumb->set($path,'file');
                $thumb->create($path,config::get('slide_width'));
                $_name=str_replace('_upload','',$name);
                $res[$name]['code']="document.config_form.$_name.value=data[key].name;image_preview('$_name',data[key].name);";
            }
        }
        echo json::encode($res);
    }
    function upload1_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            foreach ($_FILES as $name=>$file) {
                if (!$file['name'] ||!preg_match('/\.(jpg|gif|png|bmp)$/',$file['name'])) {
                    continue;
                }
                $uploads[$name]=$upload->run($file);
                $res[$name]['name']=$uploads[$name];
                $path=$upload->save_path;
                chmod($path,0644);
                $_name=str_replace('_upload','',$name);
                $res[$name]['code']="document.form1.$_name.value=data[key].name;image_preview('$_name',data[key].name);";
            }
        }
        echo json::encode($res);
    }
    function upload2_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            foreach ($_FILES as $name=>$file) {
                if (!$file['name'] ||!preg_match('/\.(jpg|gif|png|bmp)$/',$file['name'])) {
                    continue;
                }
                $uploads[$name]=$upload->run($file);
                $res[$name]['name']=$uploads[$name];
                $path=$upload->save_path;
                chmod($path,0644);
                $_name=str_replace('_upload','',$name);
                $res[$name]['code']="document.form1.$_name.value=data[key].name;image_preview('$_name',data[key].name);";
            }
        }
        echo json::encode($res);
    }
    function upload_file_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            $upload->dir='attachment';
            $_file_type=str_replace(',','|',config::get('upload_filetype'));
            foreach ($_FILES as $name=>$file) {
                if (!$file['name'] ||!preg_match('/\.('.$_file_type.')$/',$file['name']))
                    continue;
                $uploads[$name]=$upload->run($file);
                $res[$name]['name']=$uploads[$name];
                $_name=str_replace('_upload','',$name); 
                /*
                $res[$name]['code']="
                document.form1.$_name.value=data[key].name;
                ";*/
                $res[$name]['code']="
                if(document.form1) {
                //document.form1.$_name.value=data[key].name;
                $('#$_name').val(data[key].name);
                }
                else
                $('#$_name').val(data[key].name);
                image_preview('$_name',data[key].name);
                ";
                
            }
        }
        echo json::encode($res);
    }
    function uploadfile_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            $upload->dir='attachment';
            $upload->max_size=config::get('upload_max_filesize')*1024*1024;
            $attachment=new attachment();
            $_file_type=str_replace(',','|',config::get('upload_filetype'));
            $upload->type = explode('|',$_file_type);
            foreach ($_FILES as $name=>$file) {
                $res[$name]['size']=ceil($file['size'] / 1024);
                if ($file['size'] >$upload->max_size) {
                    $res[$name]['code']="alert('附件超过上限(".ceil($upload->max_size / 1024)."K)！');";
                    break;
                }
                if (!front::checkstr(@file_get_contents($file['tmp_name']))) {
                    $res[$name]['code']=lang('上传失败！附件没有通过验证！');
                    break;
                }
                if (!$file['name'] ||!preg_match('/\.('.$_file_type.')$/',$file['name']))
                    continue;
                $uploads[$name]=$upload->run($file);
                if (!$uploads[$name]) {
                    $res[$name]['code']="alert('".'附件保存失败！'.");";
                    break;
                }
                $res[$name]['name']=$uploads[$name];
                $res[$name]['type']=$file['type'];
                $attachment->rec_insert(array('path'=>$uploads[$name],'intro'=>front::post('attachment_intro'),'adddate'=>date('Y-m-d H:i:s')));
                $res[$name]['id']=$attachment->insert_id();
                $rname=preg_replace('%(.*)[\\\\\/](.*)_\d+(\.[a-z]+)$%i','$2$3',$uploads[$name]);
                $res[$name]['code']="
                document.form1.attachment_id.value=data[key].id;
                if(!document.form1.attachment_intro.value) {
                document.form1.attachment_intro.value='$rname';
                }
                document.form1.attachment_path.value=data[key].name;
                get('attachment_path_i').innerHTML=data[key].name;
                get('file_info').innerHTML='附件已保存！大小为:'+data[key].size+'K ';
                        ";
                session::set('attachment_id',$res[$name]['id']);
            }
        }
        echo json::encode($res);
    }
    function uploadimage_action() {
        $res=array();
        $uploads=array();
        if (is_array($_FILES)) {
            $upload=new upload();
            $upload->dir='images';
            $upload->max_size=config::get('upload_max_filesize')*1024*1024;
            $attachment=new attachment();
            $_file_type=str_replace(',','|',config::get('upload_filetype'));
            foreach ($_FILES as $name=>$file) {
                $res[$name]['size']=ceil($file['size'] / 1024);
                if ($file['size'] >$upload->max_size) {
                    $res[$name]['code']="alert('附件超过上限(".ceil($upload->max_size / 1024)."K)！');";
                    break;
                }
                if (!front::checkstr(file_get_contents($file['tmp_name']))) {
                    $res[$name]['code']=lang('上传失败！附件没有通过验证！');
                    break;
                }
                if (!$file['name'] ||!preg_match('/\.('.$_file_type.')$/',$file['name']))
                    continue;
                $uploads[$name]=$upload->run($file);
                if (!$uploads[$name]) {
                    $res[$name]['code']="alert('".lang('附件保存失败！')."');";
                    break;
                }
                $res[$name]['name']=$uploads[$name];
                $res[$name]['type']=$file['type'];
                $rname=preg_replace('%(.*)[\\\\\/](.*)_\d+(\.[a-z]+)$%i','$2$3',$uploads[$name]);
                $res[$name]['code']="
                document.form1.attachment_id.value=data[key].id;
                if(!document.form1.attachment_intro.value) {
                document.form1.attachment_intro.value='$rname';
                }
                get('attachment_path').innerHTML=data[key].name;
                get('file_info').innerHTML='附件已保存！大小为:'+data[key].size+'K ';
                        ";
                if(substr(config::get('base_url'),-1,1) != '/'){
                	$ex = '/';
                }
                $str = config::get('base_url').$ex.$uploads[$name];
				echo $str;
                return;
            }
        }
        echo json::encode($res);
    }
    function cut_image_action() {
    	$len = 1;
    	if(config::get('base_url') != '/'){
    		$len = strlen(config::get('base_url'))+1;
    	}
    	if(substr($_POST['pic'],0,4) == 'http'){
    		front::$post['thumb'] = str_ireplace(config::get('site_url'),'',$_POST['pic']);
    	}else{
    		front::$post['thumb'] = substr($_POST['pic'],$len);
    	}
        $thumb=new thumb();
        $thumb->set(front::$post['thumb'],'jpg');
        $img=$thumb->create_image($thumb->im,$_POST['w'],$_POST['h'],0,0,$_POST['x1'],$_POST['y1'],$_POST['x2'] -$_POST['x1'],$_POST['y2'] -$_POST['y1']);
        $new_name=$new_name_gbk=str_replace('.','',Time::getMicrotime()).'.'.end(explode('.',$_POST['pic']));
        $save_file='upload/images/'.date('Ym').'/'.$new_name;
        @mkdir(dirname(ROOT.'/'.$save_file));
        ob_start();
        $thumb->out_image($img,null,85);
        file_put_contents(ROOT.'/'.$save_file,ob_get_contents());
        ob_end_clean();
        $image_url=config::get('base_url').'/'.$save_file;
        //$res['size']=ceil(strlen($img) / 1024);
        $res['code']="
                 //$('#cut_preview').attr('src','$image_url');
                 $('#thumb').val('$image_url');
				 alert('保存成功');
                ";
        echo json::encode($res);
    }
    function deleteattachment_action() {
        $attachment=new attachment();
        $id = intval(front::get('id'));
        $attachment->del($id);
    }
    function ding_action() {
        echo tool::text_javascript('null');
    }
}