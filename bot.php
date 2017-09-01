<?php

$access_token = 'NSJj5BSwk1pXZN5If+uNNsesX1zjIFxl1GFh5+cTq/ttm9NpiU5NNgEloz0KaXGqUEshW0rTjNaxSIL38osfPlGxLD+llkwc4wBiJ8+uVlvBnwWvqfxJPk2jJXTEiSj6J1frY/mBTUG/ro0qo2kevwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

// echo "I am a bot naja";
?>