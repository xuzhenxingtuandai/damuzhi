<?php return array (
  3 => 
  array (
    'id' => '3',
    'name' => '右侧栏目一',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '3',
      'tagtemplate' => 'tag_category_i.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  5 => 
  array (
    'id' => '5',
    'name' => '左侧内容4条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'introduce_length' => '',
      'ordertype' => 'aid-desc',
      'istop' => '0',
      'limit' => '4',
      'tagtemplate' => 'tag_content_date.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  6 => 
  array (
    'id' => 6,
    'name' => '首页联系我们栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '5',
      'tagtemplate' => 'tag_category.html',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  7 => 
  array (
    'id' => '7',
    'name' => '左侧栏目一',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'tagtemplate' => 'tag_category_i.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  8 => 
  array (
    'id' => '8',
    'name' => '左侧图文1条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'son' => '0',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'introduce_length' => '100',
      'ordertype' => 'aid-desc',
      'istop' => '0',
      'limit' => '1',
      'thumb' => 'on',
      'tagtemplate' => 'tag_content_pic_text.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  9 => 
  array (
    'id' => 9,
    'name' => '首页全部分类',
    'tagcontent' => '{loop type() $i $t} <a title="{$t[typename]}" target="_blank" href="{$t[url]}">{$t[typename]}</a> {/loop}',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  11 => 
  array (
    'id' => 11,
    'name' => '左侧专题列表',
    'tagcontent' => '<div class="box1"> <div class="title"> <div class="lanwd">{lang(contentspecial)}</div> <div class="english">/ Special</div> </div> <div class="content"> <ul class="ul2"> <!-- {loop special::listdata() $special} --> <li><a href="{$special[url]}" title="{$special[title]}">{$special[title]}</a></li> <!-- {/loop} --> </ul> </div> </div> <div class="blank10"></div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  12 => 
  array (
    'id' => 12,
    'name' => '左侧地区列表',
    'tagcontent' => '<div class="box1"> <div class="title"> <div class="lanwd">{lang(arealist)}</div> <div class="english">/ Arealist</div> </div> <div class="content"> <ul class="ul2"> <!-- {loop area::listdata(0,50) $area} --> <a href="{$area[url]}" title="{$area[name]}">{$area[shortname]}</a> <!-- {/loop} --> </ul> </div> </div> <div class="blank10"></div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  13 => 
  array (
    'id' => '13',
    'name' => '左侧联系我们',
    'tagcontent' => '<div class="box1"> <div class="title"> <div class="lanwd">{lang(contactus)}</div> <div class="english">/ CONTACT US</div> </div> <div class="content"> <div class="p1g"> <ul class="ul2g"> <li>{lang(address)}：{get(address)}</li> <li>{lang(tel)}：{get(tel)}</li> <li>{lang(fax)}：{get(fax)}</li> <li>{lang(email)}：{get(email)}</li> </ul></div> 
<form name="listform" id="listform"  action="index.php?case=archive&act=email" method="post">
 <input type="text" name="email" class="mail" value=""> <input type="submit" value=" " name="submit" class="mailbtn" /> </form> <div class="blank10"></div> <div class="blank10"></div> </div> </div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
    ),
  ),
  14 => 
  array (
    'id' => '14',
    'name' => '左侧订单查询',
    'tagcontent' => '<div class="box1"> <div class="title2"> <div class="lanwd2">{lang(vieworders)}</div> <div class="english2">/ Order</div> </div> <div class="content"> <div class="blank10"></div> <input size="20" id="oid" class="oid" name="oid" type="text" align="absmiple"value=" {lang(orderid)}… " "if(this.value==\' {lang(orderid)}… \') {this.value=\'\'}" onblur="if(this.value==\'\') this.value=\' {lang(orderid)}… \'" /><input type="submit" id="search_btn" align="absmiple" name=\'submit\' value=" {lang(look)} " "(script removed)window.location.href=\'＜?php echo url(\'archive/orders\');?＞&oid=\'+document.getElementById(\'oid\').value;" class="oidbtn" />
<div class="blank10"></div> </div> </div> <div class="blank10"></div>',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
    ),
  ),
  15 => 
  array (
    'id' => '15',
    'name' => '网站页底关于我们等说明',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '1',
      'son' => '0',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '4',
      'introduce_length' => '',
      'ordertype' => 'aid-desc',
      'istop' => '0',
      'limit' => '6',
      'tagtemplate' => 'tag_content_foot.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  16 => 
  array (
    'id' => 16,
    'name' => '公司简介',
    'tagcontent' => '易通企业网站系统也称易通企业网站程序，是易通公司开发中国唯一可免费用于商业用途的营销型企业网站管理系统，系统前台生成html、完全符合SEO、同时有在线客服、潜在客户跟踪、便捷企业网站模板制作、搜索引擎推广等功能的企业网站系统。',
    'tagfrom' => 'define',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'catname' => '',
      'htmldir' => '',
    ),
  ),
  17 => 
  array (
    'id' => '17',
    'name' => '右侧下方左内容4条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '7',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'introduce_length' => '',
      'ordertype' => 'aid-desc',
      'istop' => '0',
      'limit' => '4',
      'tagtemplate' => 'tag_content.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  18 => 
  array (
    'id' => '18',
    'name' => '左侧内容列表10条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '6',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'introduce_length' => '',
      'ordertype' => 'aid-desc',
      'istop' => '0',
      'limit' => '10',
      'tagtemplate' => 'tag_content_down.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  19 => 
  array (
    'id' => '19',
    'name' => '左侧绿色栏目按钮',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'tagtemplate' => 'tag_category_readme.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  20 => 
  array (
    'id' => '20',
    'name' => '首页滚动图片',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '3',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '10',
      'introduce_length' => '',
      'ordertype' => 'adddate-desc',
      'istop' => '0',
      'limit' => '10',
      'thumb' => 'on',
      'tagtemplate' => 'tag_content_i_pic.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  21 => 
  array (
    'id' => 21,
    'name' => '左侧栏目二',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '6',
      'tagtemplate' => 'tag_category_i.html',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
  22 => 
  array (
    'id' => 22,
    'name' => '右侧下方左栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '7',
      'tagtemplate' => 'tag_category_i.html',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
  23 => 
  array (
    'id' => 23,
    'name' => '手机版首页第一个栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '1',
      'tagtemplate' => 'tag_category_wap_cat.html',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
  24 => 
  array (
    'id' => 24,
    'name' => '手机版首页第二个栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'tagtemplate' => 'tag_category_wap_cat.html',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
  25 => 
  array (
    'id' => '25',
    'name' => '手机版首页第二个栏目推荐内容',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '15',
      'introduce_length' => '20',
      'ordertype' => 'adddate-desc',
      'istop' => '0',
      'limit' => '1',
      'tagtemplate' => 'tag_content_wap_top_content.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  26 => 
  array (
    'id' => '26',
    'name' => '手机版首页第二个栏目内容5条',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '2',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '20',
      'introduce_length' => '',
      'ordertype' => 'adddate-desc',
      'istop' => '0',
      'limit' => '5',
      'tagtemplate' => 'tag_content_wap_content.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  27 => 
  array (
    'id' => 27,
    'name' => '手机版首页第三个栏目',
    'tagfrom' => 'category',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '3',
      'tagtemplate' => 'tag_category_wap_cat.html',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
  28 => 
  array (
    'id' => '28',
    'name' => '手机版首页第三个栏目内容图片',
    'tagfrom' => 'content',
    'tagcontent' => 'null',
    'setting' => 
    array (
      'onlymodify' => '',
      'catid' => '3',
      'son' => '1',
      'typeid' => '0',
      'spid' => '0',
      'province_id' => '0',
      'city_id' => '0',
      'section_id' => '0',
      'length' => '10',
      'introduce_length' => '',
      'ordertype' => 'adddate-desc',
      'istop' => '0',
      'limit' => '4',
      'thumb' => 'on',
      'tagtemplate' => 'tag_content_wap_content_pic.html',
      'submit' => '提交',
      'attr1' => '0',
    ),
  ),
  29 => 
  array (
    'id' => 29,
    'name' => '1123',
    'tagfrom' => 'define',
    'tagcontent' => '123123',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
  30 => 
  array (
    'id' => 30,
    'name' => '11112',
    'tagfrom' => 'define',
    'tagcontent' => '212312313',
    'setting' => 
    array (
      'onlymodify' => '',
      'submit' => '提交',
      'attr1' => '0',
      'catname' => '',
      'htmldir' => '',
      'introduce' => '',
    ),
  ),
);