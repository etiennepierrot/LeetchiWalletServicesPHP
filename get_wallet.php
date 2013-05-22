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

$wallet_id = isset($_REQUEST["wallet_id"]) ? $_REQUEST["wallet_id"] : 0;

if ($wallet_id == 0) {
	print("Error : not parameter wallet_id in url");
	return;
}


/*
 * GET to fetch the wallet
 */

$wallet = request("wallets/$wallet_id", "GET");

if (!isset($wallet)) {
	print("Error");
	return;
}
?>

</pre>
	</body>
</html>