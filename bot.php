<?php
$access_token = 'Gqae7mFgYuFurZ72d1wPGGjtZi7W72kkHYdplUFy3U+U4n+CEO5gKUQmnOT5EiGufBy8473V/QfSsw7z7c3qxSwp5RaJZwPcQmRdzMTtxnPcPdqRbozovd0+jbY9p/qShPFHOLxnVLEChriBWncGugdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if($events['events'][0]['message']['text'] == "สวัสดี"){
  $post = array();
  $post['replyToken'] = $events['events'][0]['replyToken'];
  $post['messages'][0]['type'] = "text";
  $post['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$events['events'][0]['source']['userId'];
}else if($events['events'][0]['message']['text'] == "ชื่ออะไร"){
  $post = array();
  $post['replyToken'] = $events['events'][0]['replyToken'];
  $post['messages'][0]['type'] = "text";
  $post['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($events['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $post = array();
  $post['replyToken'] = $events['events'][0]['replyToken'];
  $post['messages'][0]['type'] = "text";
  $post['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else{
  $post = array();
  $post['replyToken'] = $events['events'][0]['replyToken'];
  $post['messages'][0]['type'] = "text";
  $post['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
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
			curl_close($ch);

			echo $result . "\r\n";
				
			
		
	

echo "OK";
