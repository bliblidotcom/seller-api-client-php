<?php

namespace Blibli\SellerApi\request;

class ApiConfig
{
    var $token;
    var $signature_key;
    var $mta_username;

    var $api_client_id;
    var $api_client_key;
    var $api_seller_key;

    var $business_partner_code;
    var $platform_name;
    var $timeout_second;

    function setToken($val)
    {
        $this->token = $val;
    }

    function setSignatureKey($val)
    {
        $this->signature_key = $val;
    }

    function setMtaUsername($val)
    {
        $this->mta_username = $val;
    }

    function setApiClientid($api_client_id)
    {
        $this->api_client_id = $api_client_id;
    }

    public function setApiClientkey($api_client_key)
    {
        $this->api_client_key = $api_client_key;
    }

    public function setApiSellerkey($api_seller_key)
    {
        $this->api_seller_key = $api_seller_key;
    }

    function setBusinessPartnerCode($val)
    {
        $this->business_partner_code = $val;
    }

    function setPlatformName($val)
    {
        $this->platform_name = $val;
    }

    function setTimeoutSecond($val)
    {
        $this->timeout_second = $val;
    }

    function getToken()
    {
        return $this->token;
    }

    function getSignatureKey()
    {
        return $this->signature_key;
    }

    function getMtaUsername()
    {
        return $this->mta_username;
    }

    public function getApiClientid()
    {
        return $this->api_client_id;
    }

    public function getApiClientkey()
    {
        return $this->api_client_key;
    }

    public function getApiSellerkey()
    {
        return $this->api_seller_key;
    }

    function getBusinessPartnerCode()
    {
        return $this->business_partner_code;
    }

    function getPlatformName()
    {
        return $this->platform_name;
    }

    function getTimeoutSecond()
    {
        return $this->timeout_second;
    }
}

?>