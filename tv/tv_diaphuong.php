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
	<title>Truyền Hình các Tỉnh, Thành phố</title>
	<menu>main menu</menu>
<item><title>HaNoi 1 HD</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://119.18.186.116/live//hanoi11_h",10);</onClick></item>
<item><title>HaNoi 1</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m4.megafun.vn/hctv/vstv011",10);</onClick></item>
<item><title>HaNoi 2 </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m22.megafun.vn/hctv/vstv012",10);</onClick></item>
<item><title>Can Tho 1  </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://113.161.204.167/livepkgr/livestream",10);</onClick></item>
<item><title>Can Tho 2  </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://113.161.204.168/livepkgr/livestream1",10);</onClick></item>
<item><title>Đà Nẵng </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://222.255.167.149/live//livestream",10);</onClick></item>
<item><title>Phú Yên  </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://113.161.4.102/live//vtvphuyen.tv",10);</onClick></item>
<item><title>Huế </title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m31.megafun.vn/hctv//vstv024",10);</onClick></item>
<item><title>Hau Giang</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://115.78.160.29/live//thhg",10);</onClick></item>
<item><title>Khanh Hoa</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://118.69.198.109/live//video",10);</onClick></item>
<item><title>TT-Hue</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://118.69.176.149/live//trt",10);</onClick></item>
<item><title>QuangTri</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://123.25.117.9:80/live/qtv",10);</onClick></item>
<item><title>LangSon</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://123.18.206.40/live//livestream",10);</onClick></item>
<item><title>QuangNinh1</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m35.megafun.vn/hctv/vstv020",10);</onClick></item>
<item><title>LamDong</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://m22.megafun.vn/hctv/vstv022",10);</onClick></item>
<item><title>VinhPhuc</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://117.6.162.63/live//thvp",10);</onClick></item>
<item><title>BinhPhuoc1</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://113.161.180.136/live//thbp1.tv",10);</onClick></item>
<item><title>BinhPhuoc2</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://113.161.180.136/live//thbp2.tv",10);</onClick></item>
<item><title>BinhThuan</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,mms://123.30.108.114/BTVTruyenhinh",10);</onClick></item>
<item><title>BR-VungTau</title><onClick>playItemUrl("http://127.0.0.1/cgi-bin/translate?stream,,rtmp://113.163.216.24/live/livestream",10);</onClick></item>

</channel>
</rss>
