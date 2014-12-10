#!/usr/local/bin/Resource/www/cgi-bin/php
<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1/cgi-bin";
?>
<rss version="2.0">
<script>
  translate_base_url  = "http://127.0.0.1/cgi-bin/translate?";

  storagePath             = getStoragePath("tmp");
  storagePath_stream      = storagePath + "stream.dat";
  storagePath_playlist    = storagePath + "playlist.dat";

  error_info          = "";
</script>
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
</onRefresh>

<mediaDisplay name="threePartsView"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"

	headerImageWidthPC="0"
	selectMenuOnRight="no"
	autoSelectMenu="no"
	autoSelectItem="no"
	itemImageHeightPC="0"
	itemImageWidthPC="0"
	itemXPC="8"
	itemYPC="25"
	itemWidthPC="50"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="50"
	capHeightPC="64"
	itemBackgroundColor="0:0:0"
	itemPerPage="8"
  itemGap="0"
	bottomYPC="90"
	backgroundColor="0:0:0"
	showHeader="no"
	showDefaultInfo="no"
	imageFocus=""
	sliding="no"
	idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

  	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>

  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
		<image  redraw="yes" offsetXPC=60 offsetYPC=35 widthPC=30 heightPC=30>
  image/tv_radio.png
		</image>
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
					  location = getItemInfo(idx, "location");
					  annotation = getItemInfo(idx, "annotation");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "16"; else "14";
  				</script>
				</fontSize>
			  <backgroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "10:80:120"; else "-1:-1:-1";
  				</script>
			  </backgroundColor>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "140:140:140";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>

<onUserInput>
<script>
ret = "false";
userInput = currentUserInput();

if (userInput == "pagedown" || userInput == "pageup")
{
  idx = Integer(getFocusItemIndex());
  if (userInput == "pagedown")
  {
    idx -= -8;
    if(idx &gt;= itemCount)
      idx = itemCount-1;
  }
  else
  {
    idx -= 8;
    if(idx &lt; 0)
      idx = 0;
  }

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
ret;
</script>
</onUserInput>

	</mediaDisplay>

	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		</mediaDisplay>

	</item_template>

<channel>
	<title>Truyền Hình VTC</title>
	<menu>main menu</menu>

<item><title>VTC 1           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vtc11",10);</onClick></item>
<item><title>VTC 2           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vtc21_h",10);</onClick></item>
<item><title>VTC 4           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,http://203.162.235.26/lives/origin01/vtc4sd.isml/vtc4sd-1096k.m3u8",10);</onClick></item>
<item><title>VTC 7 (Today TV)</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m22.megafun.vn/hctv/vstv003",10);</onClick></item>
<item><title>VTC 9           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m31.megafun.vn/hctv/vstv010",10);</onClick></item>
<item><title>VTC 10          </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vtc101_h",10);</onClick></item>
<item><title>VTC 11 (kids TV)</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vtc111_h",10);</onClick></item>
<item><title>VTC 13 (ITV)    </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://live.kenhitv.vn/liveweb/itv_web_500k.stream",10);</onClick></item>
<item><title>VTC 14          </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://117.103.224.31/live/livestream",10);</onClick></item>
<item><title>VTC 14 HD       </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vtc14_h",10);</onClick></item>
<item><title>VOV 1           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vov1",10);</onClick></item>
<item><title>VOV 2           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vov2",10);</onClick></item>
<item><title>VOV 3           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vov3",10);</onClick></item>
<item><title>VOV 5           </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//vov5",10);</onClick></item>
<item>
<title>TV Live - RTMP US</title>
<link><?php echo $host; ?>/scripts/tv/rtmp_bat.php</link>
<media:thumbnail url="image/tv_radio.png" />
<mediaDisplay name="threePartsView"/>
</item>
</channel>
</rss>
