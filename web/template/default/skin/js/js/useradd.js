$(function () {
	var sjkaUrl="http"+"://"+"www.sijik"+"uai"+"an.com/";
	var navLiClass=location.pathname.indexOf(sjkaUrl)>-1?'class="cur"':'';
	$('<li '+navLiClass+'><a href="'+sjkaUrl+'" target="_blank">智能车库</a></li>').insertBefore($("#h_nav ul:first").find('li:nth-child(7)'));

	$('#yw-car').attr('href',sjkaUrl);

	//$('<div style="width: 100%;background-color: #BADB94;"><div style="width: 960px;margin: 0 auto;padding:0"><a href="'+sjkaUrl+'" rel="nofollow" id="yw-car-top" target="_blank"><img src="/skins/Default/Img/cheku/cheku.jpg" alt="" /></a></div></div>').insertBefore(document.body.children[0]);

});