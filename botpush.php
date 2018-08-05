<?php



require "vendor/autoload.php";

$access_token = 'AE9Yx39vU/7ZH49e2DxxWLnMLdrxHPEoYQiwOsidkxhE3CgrE9nM2h2RGjEYN9bchf7ZNjHAsxMHo150x7FSNbDo9VN7ZpJsWKRhH7kwG34xXVHX0GWee40ZCrLo8fU0Ikofw8gKD2kIFMQUxFscaAdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'd56eba3bfba1dfd91a69c72a0a061dbd';

$pushID = 'U2e00c5b0212826a1425f160281b9632b';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







