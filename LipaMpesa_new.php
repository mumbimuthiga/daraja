<?php

   
    $timestamp=date('Y-m-d H:m:s');
    //passkey
    $passKey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
   
    $businessShortCOde =174379;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

    //return $mpesaPassword;

    

   
   
       $consumer_key="2sh2YA1fTzQwrZJthIrwLMoiOi3nhhal";
       $consumer_secret="CKaCnw224K4Lc56w";
       $credentials = base64_encode($consumer_key.":".$consumer_secret);
       $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       $access_token=json_decode($curl_response);
       curl_close($curl);
       
       $token=$access_token->access_token;
   



       $amount=1;

      
       


       $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
       $time_stamp=date('Y-m-d H:m:s');
       $curl_post_data = [
            'BusinessShortCode' =>174379,
            'Password' => mpesaPassword,
            'Timestamp' =>$time_stamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => "254723782739",
            'PartyB' => 174379,
            'PhoneNumber' => "254723782739",
            'CallBackURL' => 'https://f681-197-248-16-79.eu.ngrok.io/callback_url',
            'AccountReference' => "Simon's Tech School Payment",
            'TransactionDesc' => "lipa Na M-PESA"
        ];


       $data_string = json_encode($curl_post_data);


       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token));
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
       $curl_response = curl_exec($curl);
      
       echo $curl_response;