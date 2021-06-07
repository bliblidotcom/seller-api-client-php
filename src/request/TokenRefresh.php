<?php

namespace Blibli\SellerApi\request;

class TokenRefresh {
   var $api_username;
   var $api_password;
   var $refresh_token;
   var $platform_name;
   var $timeout_second;
   
   function setApiUsername($val){
      $this->api_username = $val;
   }

   function setApiPassword($val){
      $this->api_password = $val;
   }

   function setRefreshToken($val){
      $this->refresh_token = $val;
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
   function getRefreshToken() {
      return $this->refresh_token;
   }
   function getPlatformName() {
      return $this->platform_name;
   }
   function getTimeoutSecond() {
      return $this->timeout_second;
   }
}
?>