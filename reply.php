<?php
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('NAekpw2PvpewrFKX38GXYA4soepOM+wNzujSvvh3QDiiDyGEm8RnU+gytDh4CuYDLAH4G7E1I+lzANS+UB+Y4P2uEnZyJW/GW2F35hjIDGlS9KnMxlxEFD0TEGbB30xorS+GijIOadGhWbODQlz+rAdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'a1abc01371702e465e2362f9d551366a']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage("Hello", $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();