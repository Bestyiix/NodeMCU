<?php
$access_token = 'NAekpw2PvpewrFKX38GXYA4soepOM+wNzujSvvh3QDiiDyGEm8RnU+gytDh4CuYDLAH4G7E1I+lzANS+UB+Y4P2uEnZyJW/GW2F35hjIDGlS9KnMxlxEFD0TEGbB30xorS+GijIOadGhWbODQlz+rAdB04t89/1O/w1cDnyilFU=';
// Get Chat 
$Chat = "Unknow";
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$Chat = $text;

			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
		
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			
			echo $Chat;
			echo "\n";
			echo "OK";
			curl_close($ch);

			//echo $result . "\r\n";
		}
	}
}

