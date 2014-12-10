#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$id = $_GET["file"];
$cookie="D://filmon.txt";
$cookie="/tmp/filmon.txt";
$l="http://www.filmon.com/ajax/getChannelInfo";
$post="channel_id=".$id."&quality=high";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded", "X-Requested-With: XMLHttpRequest"));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
$h=str_replace("\\","",$h);
//echo $h."<BR>";
$rtmp=str_between($h,'serverURL":"','"');
$y=str_between($h,'streamName":"','"');
$link="http://127.0.0.1/cgi-bin/scripts/util/translate.cgi?stream,Rtmp-options:";
$link=$link."-y ".$y." -W http://www.filmon.com/tv/modules/FilmOnTV/files/flashapp/filmon/FilmonPlayer.swf";
$link=$link." -p http://www.filmon.com,".$rtmp;
$link=str_replace(" ","%20",$link);
print $link;
?>
