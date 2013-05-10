<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

/*
 * we fetch the user with the user_id in the URL
 * else we create the user
 */

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$tag = isset($_REQUEST["tag"])? $_REQUEST["tag"] : "DefaultTag";

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
 * POST request to create a wallet
 */
$body = json_encode(array("Owners" => array($user -> ID), "Tag" => $tag));
$wallet = request("wallets", "POST", $body);

if (!isset($wallet) || !isset($wallet -> ID)) {
	print("Error");
	return;
}
?>

</pre>
	</body>
</html>