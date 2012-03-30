<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");

$wallet_id = isset($_REQUEST["wallet_id"]) ? $_REQUEST["wallet_id"] : 0;

if($wallet_id == 0)
{
	print("Error : not parameter wallet_id in url");
	return;
}

/*
 * GET to fetch tu operations on this wallet
 */
 
$contribution = request("wallets/$wallet_id/operations", "GET");

?>

</pre>
</body>
</html>