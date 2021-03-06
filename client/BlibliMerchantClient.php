<?php
function include_files($dir) {
	foreach (glob($dir . "/*.php") as $filename){
    	include $filename;
	}
}
include_files('request');
include('generate_signature.php');

class BlibliMerchantClient {

	function getToken($url, TokenRequest $request) {
		$port = 443;
		return include("invoker/get_token.php");
	}

	function refreshToken($url, TokenRefresh $request) {
		$port = 443;
		return include("invoker/refresh_token.php");
	}

	function invokeGet($url, $params, ApiConfig $request) {
		$port = 443;
		$http_method = "GET";
		return include("invoker/invoke_without_body.php");
	}

	function invokePost($url, $params, $body, ApiConfig $request) {
		$port = 443;
		$http_method = "POST";
		return include("invoker/invoke_with_body.php");
	}

	function invokePut($url, $params, $body, ApiConfig $request) {
		$port = 443;
		$http_method = "PUT";
		return include("invoker/invoke_with_body.php");
	}

	function invokePatch($url, $params, $body, ApiConfig $request) {
		$port = 443;
		$http_method = "PATCH";
		return include("invoker/invoke_with_body.php");
	}

	function invokeDelete($url, $params, $body, ApiConfig $request) {
		$port = 443;
		$http_method = "DELETE";
		return include("invoker/invoke_without_body.php");
	}

}

function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        mt_rand( 0, 0x0fff ) | 0x4000,
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

?>