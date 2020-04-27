<?php

class ApiConfig
{
    var $token;
    var $secret_key;
    var $mta_username;

    var $apiClientId;
    var $apiClientKey;
    var $apiSellerKey;

    var $business_partner_code;
    var $platform_name;
    var $timeout_second;

    function setToken($val)
    {
        $this->token = $val;
    }

    function setSecretKey($val)
    {
        $this->secret_key = $val;
    }

    function setMtaUsername($val)
    {
        $this->mta_username = $val;
    }

    function setApiClientId($apiClientId)
    {
        $this->apiClientId = $apiClientId;
    }

    public function setApiClientKey($apiClientKey)
    {
        $this->apiClientKey = $apiClientKey;
    }

    public function setApiSellerKey($apiSellerKey)
    {
        $this->apiSellerKey = $apiSellerKey;
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

    function getSecretKey()
    {
        return $this->secret_key;
    }

    function getMtaUsername()
    {
        return $this->mta_username;
    }

    public function getApiClientId()
    {
        return $this->apiClientId;
    }

    public function getApiClientKey()
    {
        return $this->apiClientKey;
    }

    public function getApiSellerKey()
    {
        return $this->apiSellerKey;
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