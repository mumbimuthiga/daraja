<?php 

$consumer_key='9Ga7mAhyey2z7fA8knAwH0ZJaNTmviTc';
$consumer_secret='cx3IN7lqg5dE5Znl';
$credentials=base64_encode($consumer_key.":".$consumer_secret);
$url="https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,array("Authorization:Basic" .$credentials));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$curl_response=curl_exec($curl);
$access_token=json_decode($curl_response);
print_r(access_token);
return $access_token->access_token;


?>
