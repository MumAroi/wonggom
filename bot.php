<?php

$access_token = 'bkyBuvWlx6OrzhNLnjS57Xb0uZqckIlyZBL1IA8+1+09Pcvp9XecL4/TbuRpMY4u0j10OI/m4FO5I1zz8veVpVUU9iTj9dVCDTOHmEjPb3zDKpX2VOGVs6080trN2cUHAwSfS6m8yvXpUiA3kAYtPAdB04t89/1O/w1cDnyilFU=';

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
			// Get replyToken
			$replyToken = $event['replyToken'];

            // Build message to reply back
            // $messages = [
            // 'type' => 'text',
            // 'text' => $text
            // ];
            $rand = rand(0,30);
            if ($event['message']['text'] == "วงนอก"){
                $text = "ตามหาวงนอกเหรอตะเอง";
            }else if ($event['message']['text'] == "วงใน"){
                $text = "วงนอกก็มา";   
            }else if ($event['message']['text'] == "เบิ้ม"){
                $text = "เบิ้มจะออกแล้วหรา";   
            }else if ($event['message']['text'] == "ออด"){
                $text = "คนที่หื่นๆอะหรา";   
            }else if ($event['message']['text'] == "ออดหล่อ"){
                $text = "ตรงไหน!!";   
            }else if ($event['message']['text'] == "นัทตี้"){
                $text = "จิ๊กขนมมาฝากบ้าง";   
            }else if ($event['message']['text'] == "จอม"){
                $text = "ใครอะ ไม่เห็นรู้จัก";
            }else if ($event['message']['text'] == "แอ้"  || $event['message']['text'] == "aae" || $event['message']['text'] == "อ้อแอ้"|| $event['message']['text'] == "Aae"){
                $text = "ใครอ่ะไม่เห็นจะ สวยเลย";
            }else if ($rand == 1){
                $text = "จิงเดะ!!";
            }else if ($rand == 2){
                $text = "ว้าววว!!";
            }else if ($rand == 3){
                $text = "ไม่จิงอะ";
            }else if ($rand == 4){
                $text = "ฮะ";
            }else if ($rand == 5){
                $text = "ตะมุตะมิ";
            }else if ($rand == 6){
                $text = "สาสสส!!";
            }else if ($rand == 7){
                $text = "แย่จัง";
            }else if ($rand == 8){
                $text = "แม่นแหล่วว";
            }else if ($rand == 9){
                $text = "ช่ะมะๆ";
            }else if ($rand == 10){
                $text = "เมพมาก";
            }else if ($rand == 11){
                $text = "กะดะ";
            }else if ($rand == 12){
                $text = "ตลกตายหล่ะ";
            }else{
                exit;
            }
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
            curl_close($ch);

            echo $result . "\r\n";
		}
	}
}
echo "OK";

// echo "I am a bot naja";
?>