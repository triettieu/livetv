#!/bin/sh
cat <<EOF
Content-type: video/mp4

EOF
exec /usr/local/etc/www/cgi-bin/scripts/rtmpdump -b 60000 -q -v -p http://justin.tv -r "rtmp://199.9.254.233/app/jtv_tkGbDHCppX9l_uIk" --jtv "3fd59c737090d0f56b60441acef92691a8e536b5:{\"swfDomains\": [\"justin.tv\", \"jtvx.com\", \"xarth.com\", \"twitchtv.com\", \"twitch.tv\", \"newjtv.com\", \"jtvnw.net\", \"wdtinc.com\", \"imapweather.com\", \"facebook.com\", \"starcrafting.com\"], \"streamName\": \"jtv_tkGbDHCppX9l_uIk\", \"expiration\": 1343881848.7934141, \"server\": \"fra01-video13-1\"}" --swfUrl "http://www-cdn.jtvnw.net/widgets/live_site_player.r2169533b94aa4cee392a366434c69cf4a0fb48b9.swf"