<?php

namespace Blibli\SellerApi\request;

class TokenRequest {
   var $api_username;
   var $api_password;
   var $mta_username;
   var $mta_password;
   var $platform_name;
   var $timeout_second;
   
   function setApiUsername($val){
      $this->api_username = $val;
   }

   function setApiPassword($val){
      $this->api_password = $val;
   }

   function setMtaUsername($val){
      $this->mta_username = $val;
   }

   function setMtaPassword($val){
      $this->mta_password = $val;
   }

   function setPlatformName($val){
      $this->platform_name = $val;
   }

   function setTimeoutSecond($val){
      $this->timeout_second = $val;
   }

   function getApiUsername() {
      return $this->api_username;
   }
   function getApiPassword() {
      return $this->api_password;
   }
   function getMtaUsername() {
      return $this->mta_username;
   }
   function getMtaPassword() {
      return $this->mta_password;
   }
   function getPlatformName() {
      return $this->platform_name;
   }
   function getTimeoutSecond() {
      return $this->timeout_second;
   }
}
?>