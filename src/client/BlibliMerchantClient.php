<?php

namespace Blibli\SellerApi\client;

use Blibli\SellerApi\request\ApiConfig;
use Blibli\SellerApi\request\TokenRequest;
use Blibli\SellerApi\request\TokenRefresh;
use Blibli\SellerApi\invoker\MerchantInvokeWithBody;
use Blibli\SellerApi\invoker\MerchantInvokeWithoutBody;
use Blibli\SellerApi\invoker\InvokeGetToken;
use Blibli\SellerApi\invoker\InvokeRefreshToken;

class BlibliMerchantClient {

	function getToken($url, TokenRequest $request) {
		return InvokeGetToken::getToken(443, $url, $request);
	}

	function refreshToken($url, TokenRefresh $request) {
		return InvokeRefreshToken::refreshToken(443, $url, $request);
	}

	function invokeGet($url, $params, ApiConfig $request) {
		return MerchantInvokeWithoutBody::generateGetMethod(443, "GET", $url, $params, $request);
	}

	function invokePost($url, $params, $body, ApiConfig $request) {
		return MerchantInvokeWithBody::generateMethod(443, "POST", $url, $params, $body, $request);
	}

	function invokePut($url, $params, $body, ApiConfig $request) {
		return MerchantInvokeWithBody::generateMethod(443, "PUT", $url, $params, $body, $request);
	}

	function invokePatch($url, $params, $body, ApiConfig $request) {
		return MerchantInvokeWithBody::generateMethod(443, "PATCH", $url, $params, $body, $request);
	}

	function invokeDelete($url, $params, $body, ApiConfig $request) {
		return MerchantInvokeWithBody::generateMethod(443, "DELETE", $url, $params, $body, $request);
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