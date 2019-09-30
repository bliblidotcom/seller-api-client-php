<?php
	include('BlibliMerchantClient.php');

	function __autoload($classname) {
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
	$token_request->setApiUsername("mta-api-moe-60601"); //your API username
	$token_request->setApiPassword("Twi!@#123blibli"); //your API password
	$token_request->setMtaUsername("info@tansah.com"); //your MTA username
	$token_request->setMtaPassword("Twi!@#123blibli"); //your MTA password
	$token_request->setPlatformName("Modular economy"); //your company name/platform name
	$token_request->setTimeoutSecond(4); //your request timeout

	//put Get Token API url here
	$url = "https://api-perf.gdn-app.com/v2/oauth/token";
	//call Get Token API
	$response = $client->getToken($url, $token_request); 
	$token = json_decode($response);
	echo $response;
	echo "<hr>";

	###----------------------------------------------------###
	###-------------- REFRESH TOKEN SAMPLE ----------------###
	###----------------------------------------------------###
	$token_refresh = new TokenRefresh();
	$token_refresh->setApiUsername("mta-api-teb-24219"); //your API username
	$token_refresh->setApiPassword("12345678"); //your API passowrd
	$token_refresh->setRefreshToken("4a63952f-484a-41b4-a0ec-f5c5e2a150d4"); //put the refresh token here
	$token_refresh->setPlatformName("My Company"); //your company name/platform name
	$token_refresh->setTimeoutSecond(4); //your request timeout

	//put Refresh Token API url here
	$url = "https://api-perf.gdn-app.com/v2/oauth/token";
	//call Refresh Token API
	$responseRefreshToken = $client->refreshToken($url, $token_refresh);
	echo $responseRefreshToken;
	echo "<hr>";

	###----------------------------------------------------###
	###---------- BASE API CONFIGURATION SAMPLE -----------###
	###----------------------------------------------------###
	//Base API configuration, for any GET & POST request
	//set this as global function of your framework, you need to pass this object for every request
	$config = new ApiConfig(); 
	$config->setToken($token->access_token); //your API token
	$config->setSecretKey("modular-economy"); //your API secret key
	$config->setMtaUsername("info@tansah.com"); //your MTA username
	$config->setBusinessPartnerCode("MOE-60601"); //your Business Partner Code / Merchant Code
	$config->setPlatformName("My Company"); //your company name/platform name
	$config->setTimeoutSecond(4); //your request timeout

	###----------------------------------------------------###
	###-------------- API TYPE [GET] SAMPLE ---------------###
	###----------------------------------------------------###
	$url = "https://api-perf.gdn-app.com/v2/proxy/mta/api/businesspartner/v1/order/orderList";

	//set your request parameter url
    //no need to send: channelId, username, storeId, requestId, businessPartnerCode and merchantCode
    //they generated automatically by client codes
	$params = array( 
		"yourcustomparameter" => "value",
		"yourcustomparameter2" => "value",
		"filterStartDate" => "2019-01-12 00:00:00"
	);

	//invoke [Get] Order List API
	$response = $client->invokeGet($url, $params, $config);
	echo $response;
	echo "<hr>";

	###----------------------------------------------------###
	###-------------- API TYPE [POST] SAMPLE ---------------###
	###----------------------------------------------------###
	$url = "https://api-perf.gdn-app.com/v2/proxy/mta/api/businesspartner/v1/order/fulfillRegular";

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

	echo "INVOKE POST";
	//invoke [POST] Fulfill Order Regular API 
	$response = $client->invokePost($url, $params, $body, $config);
	echo $response;

?>