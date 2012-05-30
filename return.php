<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$contributionID = isset($_REQUEST["ContributionID"]) ? $_REQUEST["ContributionID"] : 0;
$recurrentContributionId = isset($_REQUEST["RecurrentContributionId"]) ? $_REQUEST["RecurrentContributionId"] : 0;

if( $contributionID != 0)
{
	$contribution = request("contributions/$contributionID", "GET");
	$wallet = request("wallets/$contribution->WalletID", "GET");
}

if($recurrentContributionId != 0)
{
	$recurrentcontribution = request("recurrent-contributions/$recurrentContributionId", "GET");
	$wallet = request("wallets	/$recurrentcontribution->WalletID", "GET");
}



?>
</pre>
	</body>
</html>
