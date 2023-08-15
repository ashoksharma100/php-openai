<?php

$question = "what is the capital of india";

$ar = array(
    'prompt'=> $question,
    'model'=>'text-davinci-003',
    'temperature'=> 0.6,
    'max_tokens' => 150,
    "top_p" => 1,
    'frequency_penalty'=>1,
    'presence_penalty'=>1

);
$api_key = "YOUR_OPENAI_KEY";
$data = json_encode($ar);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.openai.com/v1/completions");
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization:Bearer '.$api_key.'';

curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);

$result = curl_exec($ch);

curl_close($ch);

print_r($result);

?>
