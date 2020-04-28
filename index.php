<?php
	include('client/BlibliMerchantClient.php');

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
	$token_request->setApiUsername("mta-api-toq-15126"); //your API username
	$token_request->setApiPassword("12345678"); //your API password
	$token_request->setMtaUsername("agie.external@mail.com"); //your MTA username
	$token_request->setMtaPassword("master"); //your MTA password
	$token_request->setPlatformName("My Company"); //your company name/platform name
	$token_request->setTimeoutSecond(4); //your request timeout

	//put Get Token API url here
	$url = "https://api-uata.gdn-app.com/v2/oauth/token";
	//call Get Token API
	$response = $client->getToken($url, $token_request);
	echo $response;
	echo "<hr>";

    $response = json_decode($response);

	###----------------------------------------------------###
	###-------------- REFRESH TOKEN SAMPLE ----------------###
	###----------------------------------------------------###
	$token_refresh = new TokenRefresh();
	$token_refresh->setApiUsername("mta-api-toq-15126"); //your API username
	$token_refresh->setApiPassword("12345678"); //your API passowrd
	$token_refresh->setRefreshToken($response->refresh_token); //put the refresh token here
	$token_refresh->setPlatformName("My Company"); //your company name/platform name
	$token_refresh->setTimeoutSecond(4); //your request timeout

	//put Refresh Token API url here
	$url = "https://api-uata.gdn-app.com/v2/oauth/token";
	//call Refresh Token API
	$response = $client->refreshToken($url, $token_refresh);
	echo $response;
	echo "<hr>";

    $response = json_decode($response);
	
	###----------------------------------------------------###
	###---------- BASE API CONFIGURATION SAMPLE -----------###
	###----------------------------------------------------###
	//Base API configuration, for any GET & POST request
	//set this as global function of your framework, you need to pass this object for every request
	$config = new ApiConfig(); 
	$config->setToken($response->access_token); //your API token
	$config->setSignatureKey("tes"); //your API secret key
	$config->setMtaUsername("agie.external@mail.com"); //your MTA username
	$config->setBusinessPartnerCode("TOQ-15126"); //your Business Partner Code / Merchant Code
	$config->setPlatformName("My Company"); //your company name/platform name
	$config->setTimeoutSecond(4); //your request timeout

	###----------------------------------------------------###
	###-------------- API TYPE [GET] SAMPLE ---------------###
	###----------------------------------------------------###
	$url = "https://api-uata.gdn-app.com/v2/proxy/mta/api/businesspartner/v1/order/orderDetail";

	//set your request parameter url
    //no need to send: channelId, username, storeId, requestId, businessPartnerCode and merchantCode
    //they generated automatically by client codes
	$params = array();
    $params["orderNo"] = "25100081147"; //set to filter by orderNo
    $params["orderItemNo"] = "25000246494"; //set to filter by orderItemNo

	//invoke [Get] Order List API
	$response = $client->invokeGet($url, $params, $config);
	echo $response;
	echo "<hr>";
	
	$response = json_decode($response);

	###----------------------------------------------------###
	###-------------- API TYPE [POST] SAMPLE ---------------###
	###----------------------------------------------------###
	$url = "https://api-uata.gdn-app.com/v2/proxy/seller/v1/orders/regular/" . 
        $response->value->packageId . "/fulfill";

	//Body request sample for Fulfill Regular Order API
	//NOTE! Please see codes under '/sample_request_body' as sample of body object request
	$body = array(
		"awbNo" => "123456"
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