<?php
class ApiConfig {
   var $token;
   var $secret_key;
   var $mta_username;
   var $business_partner_code;
   var $platform_name;
   var $timeout_second;
   
   function setToken($val){
      $this->token = $val;
   }

   function setSecretKey($val){
      $this->secret_key = $val;
   }

   function setMtaUsername($val){
      $this->mta_username = $val;
   }

   function setBusinessPartnerCode($val){
      $this->business_partner_code = $val;
   }

   function setPlatformName($val){
      $this->platform_name = $val;
   }

   function setTimeoutSecond($val){
      $this->timeout_second = $val;
   }

   function getToken() {
      return $this->token;
   }
   function getSecretKey() {
      return $this->secret_key;
   }
   function getMtaUsername() {
      return $this->mta_username;
   }
   function getBusinessPartnerCode() {
      return $this->business_partner_code;
   }
   function getPlatformName() {
      return $this->platform_name;
   }
   function getTimeoutSecond() {
      return $this->timeout_second;
   }
}
?>