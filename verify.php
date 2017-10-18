<?php
$access_token = 'NAekpw2PvpewrFKX38GXYA4soepOM+wNzujSvvh3QDiiDyGEm8RnU+gytDh4CuYDLAH4G7E1I+lzANS+UB+Y4P2uEnZyJW/GW2F35hjIDGlS9KnMxlxEFD0TEGbB30xorS+GijIOadGhWbODQlz+rAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
