<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$wallet_id = isset($_REQUEST["wallet_id"]) ? $_REQUEST["wallet_id"] : 0;
$amount = isset($_REQUEST["amount"]) ? $_REQUEST["amount"] : 0;
$datets =  isset($_REQUEST["datets"]) ? $_REQUEST["datets"] : 0;
$FrequencyCode =  isset($_REQUEST["FrequencyCode"]) ? $_REQUEST["FrequencyCode"] : 0;
$NumberOfExecutions =  isset($_REQUEST["NumberOfExecutions"]) ? $_REQUEST["NumberOfExecutions"] : 0;
$clientFeeAmount = isset($_REQUEST["clientFeeAmount"]) ? $_REQUEST["clientFeeAmount"] : 0;
$tag = isset($_REQUEST["tag"])? $_REQUEST["tag"] : "DefaultTag";
/* we fetch the user with the user_id in the URL
 * else we create the user
 */

if ($user_id == 0) {
	/*
	 * POST request to create a user
	 */
	$body = json_encode(array("FirstName" => "John", "LastName" => "Doe", "Email" => "john.doe@unknow.com", "IP" => "127.0.0.1", "CanRegisterMeanOfPayment" => "true"));

	$user = request("users", "POST", $body);

} else {
	/*
	 * GET to fetch the user
	 */
	$user = request("users/" . $user_id, "GET");
}

if (!isset($user) || !isset($user -> ID)) {
	print("Error");
	return;
}


/*
 * POST request to create a contribution on a wallet
 */
$body = json_encode(array("UserID" => $user -> ID, 
            "Tag" => $tag, 
            "WalletID" => $wallet_id, "Amount" => $amount, "StartDate" => $datets, "FrequencyCode" => $FrequencyCode, "NumberOfExecutions" => $NumberOfExecutions,  "ClientFeeAmount" => $clientFeeAmount, "ReturnURL" => "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/return.php"));

$contribution = request("recurrent-contributions", "POST", $body);

/*
 * Redirect to url of payment
 */

if ($contribution != null) {
	header("Location: " . $contribution -> PaymentURL);
	exit();
}
?>

</pre>
	</body>
</html>