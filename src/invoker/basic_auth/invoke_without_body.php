<?php

namespace Blibli\SellerApi\invoker\basic_auth;

use Blibli\SellerApi\client\BlibliSellerBasicAuthClient;
use Blibli\SellerApi\request\ApiConfig;
use Blibli\SellerApi\request\SignatureGenerator;
use Exception;

class SellerInvokeWithoutBody
{
	/**
	 * Function for InvokeWithoutBody
	 *
	 * @param int $port
	 * @param string $http_method
	 * @param string $url
	 * @param array $params
	 * @param ApiConfig $request
	 * @return void
	 */
	public static function generateGetMethod($port, $http_method, $url, $params, ApiConfig $request)
	{
		if($request->getApiClientId() == '') throw new Exception("Input of [API Client Id] is empty!");
		if($request->getApiClientKey() == '') throw new Exception("Input of [API Client Key] is empty!");
		if($request->getApiSellerKey() == '') throw new Exception("Input of [API Seller key] is empty!");
		if($request->getBusinessPartnerCode() == '') throw new Exception("Input of [Business Partner Code] is empty!");
		if($request->getPlatformName() == '') throw new Exception("Input of [Platform Name] is empty!");
		if($request->getTimeoutSecond() == '') $request->setTimeoutSecond(15);

		$uuid = BlibliSellerBasicAuthClient::gen_uuid();

		$header = array(
			"Accept: application/json",
			"Content-type: application/json",
			"cache-control: no-cache",
			"Api-Seller-Key: " . $request->getApiSellerKey()
		);

		if ($request->getSignatureKey()) {
			$signature = new SignatureGenerator();

			$milliseconds = round(microtime(true) * 1000);
			$uuid = BlibliSellerBasicAuthClient::gen_uuid();
			$urlMeta = explode("/proxy", $url);
			$urlRaw = $urlMeta[1];

			if (strpos($urlRaw, "/mta") !== FALSE) {
				$urlRaw = str_replace("/mta", "/mtaapi", $urlRaw);
			}

			$signature = $signature->generate($milliseconds, $request->getSignatureKey(), "GET", "", "", $urlRaw);
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
				$url .= "&" . $key . "=" . urlencode($value);
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
		CURLOPT_TIMEOUT => $request->getTimeoutSecond(),
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => $http_method,
		CURLOPT_HTTPHEADER => $header
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$data = json_decode(utf8_encode($response));

		if ($err) {
			return $err;
		} else {
			return $data;
		}
	}
}
?>