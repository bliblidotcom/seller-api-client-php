<?php
    if($request->getApiClientId() == '') throw new Exception("Input of [API Client Id] is empty!");
    if($request->getApiClientKey() == '') throw new Exception("Input of [API Client Key] is empty!");
    if($request->getApiSellerKey() == '') throw new Exception("Input of [API Seller key] is empty!");
	if($request->getBusinessPartnerCode() == '') throw new Exception("Input of [Business Partner Code] is empty!");
	if($request->getPlatformName() == '') throw new Exception("Input of [Platform Name] is empty!");
	if($request->getTimeoutSecond() == '') $request->setTimeoutSecond(15);

    $uuid = gen_uuid();

    $header = array(
        "Accept: application/json",
        "Content-type: application/json",
        "cache-control: no-cache",
        "Api-Seller-Key: " . $request->getApiSellerKey()
    );
    
    if ($request->getSignatureKey()) {
        $signature = new SignatureGenerator();
    
        $milliseconds = round(microtime(true) * 1000);
        $urlMeta = explode("/proxy", $url);
        $urlRaw = $urlMeta[1];

        if (strpos($urlRaw, "/mta") !== FALSE) {
            $urlRaw = str_replace("/mta", "/mtaapi", $urlRaw);
        }

        $signature = $signature->generate($milliseconds, $request->getSignatureKey(), "POST", json_encode($body), "application/json", $urlRaw);
        array_push($header, "Signature: " . $signature);
        array_push($header, "Signature-Time: $milliseconds");
    }

	$url .= "?storeId=10001"
		. "&businessPartnerCode=" . $request->getBusinessPartnerCode() 
		. "&merchantCode=" . $request->getBusinessPartnerCode()
        . "&storeCode=" . urlencode($request->getBusinessPartnerCode())
        . "&username=" . urlencode($request->getMtaUsername())
		. "&channelId=" . strtolower(str_replace(' ', '-', $request->getPlatformName()))
		. "&requestId=" . $uuid;
	if($params != null ) {
		foreach($params as $key => $value) {
			$url .= "&" . $key . "=" . $value;
		}
	}

	$curl = curl_init();
	curl_setopt_array($curl, array(
      CURLOPT_USERPWD => $request->getApiClientId() . ":" . $request->getApiClientKey(),
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