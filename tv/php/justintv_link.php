#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
$id = $_GET["file"];
$link1="http://justin.tv/".$id;
$link2="http://usher.justin.tv/find/".$id.".xml?type=any";
$h=file_get_contents($link1);
$swf=str_between($h,'swfobject.embedSWF("','"');
if ($swf == "") {
$swf=str_between($h,"new SWFObject('","'");
}
///static/swf/live_site_player.swf
if (strpos($swf,"http") === false) {
$swf="http://www.justin.tv".$swf;
}
$h=file_get_contents($link2);
$token=trim(str_between($h,"<token>","</token>"));
//$token=str_replace('\\\\','',$token);
$token=str_replace('"','\\"',$token);
//$token=str_replace(' ','%20',$token);
$app=str_between($h,"<play>","</play>");
$con=str_between($h,"<connect>","</connect>");
$exec = '"'.$con."/".$app.'" --jtv "'.$token.'" --swfUrl "'.$swf.'"';
//echo $exec;
/*
$exec1="/usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -V -v -r ".$exec;
$fp = fopen('/tmp/justin.tmp', 'w');
fwrite($fp, $exec1);
fclose($fp);

print $exec;
$filename = "/tmp/justin.tmp";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
echo "<br>".$contents."<br>";
$a=exec("cat /tmp/justin.tmp",$b);
$out=$b[0];
echo $out;
*/
$out="#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -q -v -p http://justin.tv -r ".$exec;
$fp = fopen('/usr/local/etc/www/cgi-bin/scripts/tv/php/justin.cgi', 'w');
fwrite($fp, $out);
fclose($fp);
exec("chmod +x /usr/local/etc/www/cgi-bin/scripts/tv/php/justin.cgi");
sleep(1);
print $exec;
?>
