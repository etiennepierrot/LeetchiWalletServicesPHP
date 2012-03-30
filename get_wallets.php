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

if ($user_id == 0) {
	print("Error : not parameter user_id in url");
	return;
}
/*
 * GET to fetch the user
 */
$user = request("users/" . $user_id, "GET");

if (!isset($user) || !isset($user -> ID)) {
	print("Error");
	return;
}

/*
 * GET to fetch a list of user’s wallets
 */

$wallets = request("users/$user->ID/wallets", "GET", $body);

if (!isset($wallets)) {
	print("Error");
	return;
}
?>

</pre>
	</body>
</html>