<?php
  
  namespace Blibli\SellerApi\request;

  class GenerateSignature{ 

    function generate($milliseconds, $reqSecret, $reqMethod, $reqBody, $reqContentType, $reqUrl){
      date_default_timezone_set("Asia/Jakarta"); 
      $milliseconds = $milliseconds / 1000;
      
      $patternDate = date("D M d H:i:s T Y", $milliseconds);

      $reqBody = str_replace("\r", "\\r", $reqBody);
      $reqBody = str_replace("\n", "\\n", $reqBody);
      $reqBody = $reqBody != "" ? md5($reqBody) : "";

      $apiKey = $reqMethod . "\n" . trim($reqBody) . "\n" . trim($reqContentType) . "\n" . $patternDate . "\n" .$reqUrl;
      
      $signature = hash_hmac('sha256', $apiKey, $reqSecret, true);
      $encodedSignature = base64_encode($signature);

      return $encodedSignature;
    }
  }

?>