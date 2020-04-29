<?php
	if($request->getToken() == '') throw new Exception("Input of [API Token] is empty!");
	if($request->getSignatureKey() == '') throw new Exception("Input of [API Secret Key] is empty!");
	if($request->getMtaUsername() == '') throw new Exception("Input of [MTA Username] is empty!");
	if($request->getBusinessPartnerCode() == '') throw new Exception("Input of [Business Partner Code] is empty!");
	if($request->getPlatformName() == '') throw new Exception("Input of [Platform Name] is empty!");
	if($request->getTimeoutSecond() == '') $request->setTimeoutSecond(15);
	
	$signature = new SignatureGenerator();

	$milliseconds = round(microtime(true) * 1000);
	$uuid = gen_uuid();
    $urlMeta = explode("/proxy", $url);
    $urlRaw = $urlMeta[1];

    if (strpos($urlRaw, "/mta") !== FALSE) {
        $urlRaw = str_replace("/mta", "/mtaapi", $urlRaw);
    }

	$signature = $signature->generate($milliseconds, $request->getSignatureKey(), "POST", json_encode($body), "application/json", $urlRaw);

	$header = array(
	    "Authorization: bearer " . $request->getToken(),
	    "x-blibli-mta-authorization: BMA " . $request->getMtaUsername() . ":" . $signature,
	    "x-blibli-mta-date-milis: $milliseconds",
	    "Accept: application/json",
	    "Content-type: application/json",
	    "cache-control: no-cache",
	    "requestid: " . $uuid,
	    "sessionid: " . $uuid,
	    "username: " . $request->getMtaUsername(),
	);

	$url .= "?storeId=10001"
		. "&businessPartnerCode=" . urlencode($request->getBusinessPartnerCode()) 
		. "&merchantCode=" . urlencode($request->getBusinessPartnerCode())
        . "&storeCode=" . urlencode($request->getBusinessPartnerCode())
		. "&username=" . urlencode($request->getMtaUsername())
		. "&channelId=" . strtolower(str_replace(' ', '-', $request->getPlatformName()))
		. "&requestId=" . $uuid;
	if($params != null ) {
		foreach($params as $key => $value) {
			$url .= "&" . $key . "=" . urlencode($value);
		}
	}

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => $url,
	  CURLOPT_PORT => $port,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_POSTFIELDS => json_encode($body), 
	  CURLOPT_TIMEOUT => $request->getTimeoutSecond(),
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => $http_method,
	  CURLOPT_HTTPHEADER => $header
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		return $err;
	} else {
		return $response;
	}
?>