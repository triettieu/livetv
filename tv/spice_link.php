#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
$link = $_GET["file"];
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$cookie="D://spice.txt";
$cookie="/tmp/spice.txt";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
  $h = curl_exec($ch);
  curl_close($ch);
//jsAppData=new Array("rtmp://core1.spicetv.ro:1935/redirect","mp4:spicetv/ro/Antena3.sdp","a9f811508037fa8566272aad0b890a51de1174301fd7210420092d838a6aab66");
$h=str_between($h,"jsAppData=new Array(",")");
$h=str_replace('"',"",$h);
$t1=explode(",",$h);
$str=$t1[1];
$app="live?".$t1[2];
$rtmp="rtmp://109.163.236.119:1935/live";
//
$l="Rtmp-options:";
$l=$l." -a ".$app." -W http://www.spicetv.ro/assets/player/player.swf";
$l=$l." -p http://www.spicetv.ro ";
$l=$l."-y ".$str;
$l=$l.",".$rtmp;
$l=str_replace(" ","%20",$l);
$movie=$l;
print $movie;
?>
