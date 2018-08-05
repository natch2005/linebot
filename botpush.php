<?php



require "vendor/autoload.php";

$access_token = '4yHdcsdosK9rPMIroIOwHGvJrVLIAJ2i7mxCO9CjzVxI3mU+ZdYn14VAmUoAImYuhf7ZNjHAsxMHo150x7FSNbDo9VN7ZpJsWKRhH7kwG35wknf5ZF0oSWU8V3lrTWlYKVanNeO/SLZ/8m/LdGNk9wdB04t89/1O/w1cDnyilFU=';

$channelSecret = '9fe414c1c526fb4290788fdf240cdfaf';

$pushID = '1598517038';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







