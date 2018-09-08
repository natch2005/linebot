<?php
   $accessToken = "4yHdcsdosK9rPMIroIOwHGvJrVLIAJ2i7mxCO9CjzVxI3mU+ZdYn14VAmUoAImYuhf7ZNjHAsxMHo150x7FSNbDo9VN7ZpJsWKRhH7kwG35wknf5ZF0oSWU8V3lrTWlYKVanNeO/SLZ/8m/LdGNk9wdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "รายงานผู้ป่วยนอก"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "การข้อมูลจาก server จะแจ้งที่ Line Notify นะครับ แจ้งเข้า Line กลุ่มครับ";
      pushMsg($arrayHeader,$arrayPostData);
       $strUrl = "http://1.179.171.188/linebot/chkmess.php?mes=รายงานผู้ป่วยนอก";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      $result = curl_exec($ch);
      curl_close ($ch);
   }

   if($message == "รายงานตา"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
     // $arrayPostData['messages'][0]['text'] = "ดูรายงานที่ Line Notify นะครับ";
      pushMsg($arrayHeader,$arrayPostData);
       $strUrl = "http://1.179.171.188/linebot/chkmess.php?mes=รายงานตา";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      $result = curl_exec($ch);
      curl_close ($ch);
   }

 if($message == "มีไร"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
     // $arrayPostData['messages'][0]['text'] = "ไม่มีอะไรคะพี่";
      pushMsg($arrayHeader,$arrayPostData);
   }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }

   exit;
?>
