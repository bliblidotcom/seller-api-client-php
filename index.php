<?php
	include('BlibliMerchantClient.php');

	function __autoload($classname) {
		echo "string";
		echo "string";
		echo "string";
		echo "string";
	    $filename = $classname . ".php";

	    if(file_exists( $filename ))
	    {
	        include_once($filename);
	    }
	}
	//import this class to use Blibli Merchant API client
	$client = new BlibliMerchantClient();

	###----------------------------------------------------###
	###-------------- REQUEST TOKEN SAMPLE ----------------###
	###----------------------------------------------------###
	$token_request = new TokenRequest();
	$token_request->setApiUsername("mta-api-toq-15126"); //your API username
	$token_request->setApiPassword("12345678"); //your API password
	$token_request->setMtaUsername("agie.external@mail.com"); //your MTA username
	$token_request->setMtaPassword("master"); //your MTA password
	$token_request->setPlatformName("My Company"); //your company name/platform name
	$token_request->setTimeoutSecond(4); //your request timeout

	//put Get Token API url here
	$url = "http://xapiapp-01.uata.lokal:8080/v2/oauth/token";
	//call Get Token API
	$response = $client->getToken($url, $token_request); 
	echo $response;
	echo "<hr>";

	###----------------------------------------------------###
	###-------------- REFRESH TOKEN SAMPLE ----------------###
	###----------------------------------------------------###
	$token_refresh = new TokenRefresh();
	$token_refresh->setApiUsername("mta-api-toq-15126"); //your API username
	$token_refresh->setApiPassword("12345678"); //your API passowrd
	$token_refresh->setRefreshToken("c64f75bf-26ba-481b-a17a-c4ca8ee6ae08"); //put the refresh token here
	$token_refresh->setPlatformName("My Company"); //your company name/platform name
	$token_refresh->setTimeoutSecond(4); //your request timeout

	//put Refresh Token API url here
	$url = "http://xapiapp-01.uata.lokal:8080/v2/oauth/token";
	//call Refresh Token API
	$response = $client->refreshToken($url, $token_refresh);
	echo $response;
	echo "<hr>";

	###----------------------------------------------------###
	###---------- BASE API CONFIGURATION SAMPLE -----------###
	###----------------------------------------------------###
	//Base API configuration, for any GET & POST request
	//set this as global function of your framework, you need to pass this object for every request
	$config = new ApiConfig(); 
	$config->setToken("16d78459-b89a-49c6-846c-c4f503da9c9f"); //your API token
	$config->setSecretKey("secret"); //your API secret key
	$config->setMtaUsername("agie.external@mail.com"); //your MTA username
	$config->setBusinessPartnerCode("TEB-24219"); //your Business Partner Code / Merchant Code
	$config->setPlatformName("My Company"); //your company name/platform name
	$config->setTimeoutSecond(4); //your request timeout

	###----------------------------------------------------###
	###-------------- API TYPE [GET] SAMPLE ---------------###
	###----------------------------------------------------###
	$url = "http://xapiapp-01.uata.lokal:8080/v2/proxy/mta/api/businesspartner/v1/order/orderList";

	//set your request parameter url
    //no need to send: channelId, username, storeId, requestId, businessPartnerCode and merchantCode
    //they generated automatically by client codes
	$params = array( 
		"yourcustomparameter" => "value",
		"yourcustomparameter2" => "value"
	);

	//invoke [Get] Order List API
	$response = $client->invokeGet($url, $params, $config);
	echo $response;
	echo "<hr>";

	###----------------------------------------------------###
	###-------------- API TYPE [POST] SAMPLE ---------------###
	###----------------------------------------------------###
	$url = "http://xapiapp-01.uata.lokal:8080/v2/proxy/mta/api/businesspartner/v1/order/fulfillRegular";

	//Body request sample for Fulfill Regular Order API
	//NOTE! Please see codes under '/sample_request_body' as sample of body object request
	$body = array(
		"type" => 1,
		"orderNo" => "25100026490",
		"orderItemNo" => "25000179189",
		"combineShipping" => array(
			array(
				"orderNo" => "25100026490",
				"orderItemNo" => "25000179189"
			)
		),
	);

	//set your request parameter url
    //no need to send: channelId, username, storeId, requestId, businessPartnerCode and merchantCode
    //they generated automatically by client codes
    //set to empty Array if the API doesn't need parameter url
	$params = array();

	//invoke [POST] Fulfill Order Regular API 
	$response = $client->invokePost($url, $params, $body, $config);
	echo $response;

?>