<?php

namespace Blibli\SellerApi\invoker;

use Blibli\SellerApi\request\TokenRefresh;
use Exception;

class InvokeRefreshToken
{
	/**
	 * Function for refresh token
	 *
	 * @param int $port
	 * @param string $url
	 * @param TokenRefresh $request
	 * @return void
	 */
	public static function refreshToken($port, $url, TokenRefresh $request)
	{
		if($request->getApiUsername() == '') throw new Exception("Input of [API Username] is empty!");
		if($request->getApiPassword() == '') throw new Exception("Input of [API Password] is empty!");
		if($request->getRefreshToken() == '') throw new Exception("Input of [Refresh Token] is empty!");
		if($request->getPlatformName() == '') throw new Exception("Input of [Platform Name] is empty!");
		if($request->getTimeoutSecond() == '') $request->setTimeoutSecond(15);

		$url .= "?channelId=" . strtolower(str_replace(' ', '-', $request->getPlatformName()));
		$curl = curl_init();
		$basic_auth = $request->getApiUsername() . ':' . $request->getApiPassword();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_PORT => $port,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => $request->getTimeoutSecond(),
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_USERPWD => $basic_auth,
		CURLOPT_POSTFIELDS => 'grant_type=refresh_token&refresh_token='. $request->getRefreshToken() .'&clientId='. $request->getApiUsername(),
		CURLOPT_HTTPHEADER => array(
			"accept: application/json",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded",
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			return $response;
		}
	}
}