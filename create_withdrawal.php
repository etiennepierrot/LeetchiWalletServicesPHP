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
$clientFeeAmount  = isset($_REQUEST["ClientFeeAmount "]) ? $_REQUEST["ClientFeeAmount "] : 0;

if ($user_id == 0) {
	print("Error : not parameter user_id in url");
	return;
}

if ($amount == 0) {
	print("Error : the amount must be specified in url");
	return;
}

/* we fetch the user with the user_id in the URL
 * else we create the user
 */

if ($user_id != 0) {
	/*
	 * GET to fetch the user
	 */
	$user = request("users/" . $user_id, "GET");
	if (!isset($user) || !isset($user -> ID)) {
		print("Error");
		return;
	}
}

/* we fetch the wallet with the wallet_id in the URL
 * else we create the wallet
 */

if ($wallet_id != 0) {
	/*
	 * GET to fetch the wallet
	 */
	$wallet = request("wallets/" . $wallet_id, "GET");
	if (!isset($wallet) || !isset($wallet -> ID)) {
		print("Error");
		return;
	}
}

$wallet_id = $wallet -> ID != 0 ? $wallet -> ID : $user -> ID;

$body = json_encode(array("Tag" => "Custom data", "UserID" => $user -> ID, "WalletID" => $wallet -> ID != 0 ? $wallet -> ID : $user -> ID, "Amount" => $amount, "ClientFeeAmount" => $clientFeeAmount,  "BankAccountOwnerName" => "Test Name", "BankAccountOwnerAddress" => "Test Address", "BankAccountIBAN" => "FR30 2004 1010 1245 3072 5S03 383", "BankAccountBIC" => "CRLYFRPP"));

$withdrawal = request("withdrawals", "POST", $body);
?>

</pre>
	</body>
</html>