#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$link = $_GET["file"];
$link = urldecode($link);
$html = file_get_contents($link);
$t1=explode("http://www.sport.ro/video/get-video",$html);
$t2=explode("&",$t1[1]);
$l1="http://www.sport.ro/video/get-video".$t2[0];
$html = file_get_contents($l1);
$link = str_between($html, 'url":"', '"');
$link = str_replace("\\","",$link);
print $link;
?>
