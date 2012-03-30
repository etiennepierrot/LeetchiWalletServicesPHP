<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$contributionID = isset($_REQUEST["ContributionID"]) ? $_REQUEST["ContributionID"] : 0;

$contribution = request("contributions/$contributionID", "GET");

$user = request("users/$contribution->UserID", "GET");

if ($contribution -> WalletID != 0) {
	$wallet = request("wallets/$contribution->WalletID", "GET");
}
?>
</pre>
	</body>
</html>
