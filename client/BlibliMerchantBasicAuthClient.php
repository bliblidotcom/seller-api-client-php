<?php
function include_files($dir) {
	foreach (glob($dir . "/*.php") as $filename){
    	include $filename;
	}
}
include_files('request');
include('generate_signature.php');

class BlibliMerchantBasicAuthClient {

	function invokeGet($url, $params, ApiConfig $request) {
		$port = 443;
		return include("invoker/basic_auth/invoke_get.php");
	}

	function invokePost($url, $params, $body, ApiConfig $request) {
		$port = 443;
		return include("invoker/basic_auth/invoke_post.php");
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