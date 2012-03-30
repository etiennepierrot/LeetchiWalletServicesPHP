<?php

require_once(dirname(__FILE__) . "/config.inc");

/*
 * sign HTTP request
 */
function createAuthSignature($httpMethod, $urlPath, $requestBody = "")
{
	global $privateKeyFile, $privateKeyPassword;
	$data = "$httpMethod|$urlPath|";
	
	if ($httpMethod != "GET" && $httpMethod != "DELETE")
		$data .= "$requestBody|";

	$privateKey = openssl_pkey_get_private("file://$privateKeyFile", $privateKeyPassword);
	echo $privateKey;
	$signedData = null;
	openssl_sign($data, $signedData, $privateKey, OPENSSL_ALGO_SHA1);
	$signature = base64_encode($signedData);
	return $signature;
}

function formatAmount($amount)
{
	return number_format($amount / 100.0, 2, ".", "");
}

function parseAmount($amount)
{
	return (int)round(floatval($amount) * 100);
}

function getLeetchiBaseURL()
{
	global $leetchiBaseURL;
	return trim($leetchiBaseURL, '/');
}


function buildRequestUrlPath($resourcePath)
{
	global $partnerID;
	$resourcePath = trim($resourcePath, '/');
	return "/v1/partner/$partnerID/$resourcePath" . "?ts=1324395087" /*. time()*/;	
}

 
function request($resourcePath, $method, $body = null) {
	print("$method /$resourcePath\n");
	
	$requestUrlPath = buildRequestUrlPath($resourcePath);
	$sign = createAuthSignature($method, $requestUrlPath, $body);
	print("Signature : $sign\n");
	$leetchiBaseURL = getLeetchiBaseURL();
	$url = $leetchiBaseURL . $requestUrlPath;
	print("request: $url\n");
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	if($method == "POST") {
		
		curl_setopt($ch, CURLOPT_POST, true);
	}
	
	if($method == "PUT") {
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	}
	
	if($method == "DELETE") {
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	}
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Leetchi-Signature: $sign", "Content-Type: application/json"));
	if($body != null) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$data = curl_exec($ch);
	if (curl_errno($ch)) {
		print('cURL error: ' . curl_error($ch));
	} else {
		$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		print("HTTP response code: $statusCode\n");
	}
	curl_close($ch);
	if ($data != false) {
		print("response data:\n");
		$result = json_decode($data);
		print_r($result);
		if ($result != null) {
			return $result;
		}
		print($data);
	}
	return false;
}

function requestwithsign($resourcePath, $method, $body = null, $signature) {
	print("$method /$resourcePath\n");
	
	$requestUrlPath = buildRequestUrlPath($resourcePath);
	$sign = $signature;
	print("Signature : $sign\n");
	$leetchiBaseURL = getLeetchiBaseURL();
	$url = $leetchiBaseURL . $requestUrlPath;
	print("request: $url\n");
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	if($method == "POST") {
		
		curl_setopt($ch, CURLOPT_POST, true);
	}
	
	if($method == "DELETE") {
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	}
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Leetchi-Signature: $sign", "Content-Type: application/json"));
	if($body != null) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$data = curl_exec($ch);
	if (curl_errno($ch)) {
		print('cURL error: ' . curl_error($ch));
	} else {
		$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		print("HTTP response code: $statusCode\n");
	}
	curl_close($ch);
	if ($data != false) {
		print("response data:\n");
		$result = json_decode($data);
		print_r($result);
		if ($result != null) {
			return $result;
		}
		print($data);
	}
	return false;
}

function requestwhitoutprint($resourcePath, $method, $body = null) {

	$requestUrlPath = buildRequestUrlPath($resourcePath);
	$sign = createAuthSignature($method, $requestUrlPath, $body);
	$leetchiBaseURL = getLeetchiBaseURL();
	$url = $leetchiBaseURL . $requestUrlPath;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if($method == "POST") {
		
		curl_setopt($ch, CURLOPT_POST, true);
	}
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Leetchi-Signature: $sign", "Content-Type: application/json"));
	if($body != null) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$data = curl_exec($ch);
	if (curl_errno($ch)) {
	
	} else {
		$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		
	}
	curl_close($ch);
	if ($data != false) {

		$result = json_decode($data);

		if ($result != null) {
			return $result;
		}
		
	}
	return false;
}
function getContribution($contributionID)
{
	$requestUrlPath = buildRequestUrlPath("contributions/$contributionID");
	$signature = createAuthSignature("GET", $requestUrlPath);
	$statusCode = null;

	$ch = curl_init(getLeetchiBaseURL() . $requestUrlPath);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Leetchi-Signature: $signature"));
	//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$data = curl_exec($ch);
	if (curl_errno($ch))
		exit('cURL error: ' . curl_error($ch));	
	else 
		$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
	curl_close($ch);

	$isSuccess = ($statusCode == "200");
	if (!$isSuccess)
	{
		print("HTTP response code: $statusCode\n");
		print("response data:\n");
		print($data);
		return null;
	}
	return json_decode($data);
}
