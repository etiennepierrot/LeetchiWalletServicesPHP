<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$payer_id = isset($_REQUEST["payer_id"]) ? $_REQUEST["payer_id"] : 0;
$beneficiary_id = isset($_REQUEST["beneficiary_id"]) ? $_REQUEST["beneficiary_id"] : 0;
$amount = isset($_REQUEST["amount"]) ? $_REQUEST["amount"] : 0;

if ($payer_id == 0) {
	print("Error : not parameter payer_id in url");
	return;
}

if ($beneficiary_id == 0) {
	print("Error : not parameter beneficiary_id in url");
	return;
}

if ($amount == 0) {
	print("Error : the amount must be specified in url");
	return;
}

/*
 *  we fetch the payer with the payer_id in the URL
 */

if ($payer_id != 0) {
	/*
	 * GET to fetch the user
	 */
	$payer = request("users/$payer_id", "GET");
	if (!isset($payer) || !isset($payer -> ID)) {
		print("Error");
		return;
	}
}

/*
 * we fetch the user with the beneficiary_id in the URL
 */

if ($beneficiary_id != 0) {
	/*
	 * GET to fetch the user
	 */
	$beneficiary = request("users/$beneficiary_id", "GET");
	if (!isset($beneficiary) || !isset($beneficiary -> ID)) {
		
		$beneficiary = request("wallets/$beneficiary_id", "GET");
		if (!isset($beneficiary) || !isset($beneficiary -> ID)) {
		print("Error");
		return;
		}
	}
	

}


$body = json_encode(array("Tag" => "Custom data", "PayerID" => $payer -> ID, "BeneficiaryID" => $beneficiary -> ID,  "Amount" => $amount));

$transfer = request("transfers", "POST", $body);
?>

</pre>
	</body>
</html>