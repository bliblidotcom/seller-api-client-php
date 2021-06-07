<?php

namespace Blibli\SellerApi\client;

use Blibli\SellerApi\invoker\basic_auth\SellerInvokeWithBody;
use Blibli\SellerApi\invoker\basic_auth\SellerInvokeWithoutBody;
use Blibli\SellerApi\request\ApiConfig;


class BlibliSellerBasicAuthClient {

	function invokeGet($url, $params, ApiConfig $request) {
		return SellerInvokeWithoutBody::generateGetMethod(443, "GET", $url, $params, $request);
	}

	function invokePost($url, $params, $body, ApiConfig $request) {
		return SellerInvokeWithBody::generateMethod(443, "POST", $url, $params, $body, $request);
	}

    function invokePut($url, $params, $body, ApiConfig $request) {
        return SellerInvokeWithBody::generateMethod(443, "PUT", $url, $params, $body, $request);
    }

    function invokePatch($url, $params, $body, ApiConfig $request) {
        return SellerInvokeWithBody::generateMethod(443, "PATCH", $url, $params, $body, $request);
    }

    function invokeDelete($url, $params, $body, ApiConfig $request) {
        return SellerInvokeWithBody::generateMethod(443, "DELETE", $url, $params, $body, $request);
    }

    static function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
