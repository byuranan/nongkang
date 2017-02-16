<?php
$access_token = 'Gqae7mFgYuFurZ72d1wPGGjtZi7W72kkHYdplUFy3U+U4n+CEO5gKUQmnOT5EiGufBy8473V/QfSsw7z7c3qxSwp5RaJZwPcQmRdzMTtxnPcPdqRbozovd0+jbY9p/qShPFHOLxnVLEChriBWncGugdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
