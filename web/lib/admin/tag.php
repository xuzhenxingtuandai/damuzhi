<?php

class tag extends table {
    public  $name='b_tag';
    function url($tag,$page=1) {
    	if(config::get(list_page_php)){
    		return config::get('base_url').'tags/'.urlencode($tag).'/list_'.$page.'.html';
    	}
        return url::create('tag/show/tag/'.urlencode($tag).($page>1?'/page/'.$page:''),false);
    }
    function urls($tagstring) {
        $tags=explode(' ',$tagstring);
        $urls=array();
        foreach($tags as $tag) {
            if($tag)
                $urls[$tag]=$this->url($tag);
        }
        return $urls;
    }
    function pagination() {
        return template('system/tag_pagination.html');
    }
}