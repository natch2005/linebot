<?php


$access_token = '4yHdcsdosK9rPMIroIOwHGvJrVLIAJ2i7mxCO9CjzVxI3mU+ZdYn14VAmUoAImYuhf7ZNjHAsxMHo150x7FSNbDo9VN7ZpJsWKRhH7kwG35wknf5ZF0oSWU8V3lrTWlYKVanNeO/SLZ/8m/LdGNk9wdB04t89/1O/w1cDnyilFU=';

$userId = 'U2e00c5b0212826a1425f160281b9632b';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

