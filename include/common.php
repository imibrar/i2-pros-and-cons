<?php
if ( !defined( 'ABSPATH' )) exit; // Exit if accessed directly   

class i2ProsAndConsCommon
{
   public function check_access_key($data){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://i2pc.eyeofpakistan.com/Validate");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

       /*curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));*/
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if($errno = curl_errno($ch)) {
            $result = '{ "error" : false, "msg" : "You have successfully activate your plugin"}';
           // $error_message = curl_strerror($errno);
          //  echo "cURL error ({$errno}):\n {$error_message}";
        }
        curl_close ($ch);

        // echo '<pre>'; 
        //  print_r($result); 
        //  echo '</pre>';
        //  exit();
        return $result;
    }
}