<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$recurrent_contribution_id = isset($_REQUEST["recurrent_contribution_id"]) ? $_REQUEST["recurrent_contribution_id"] : 0;

if ($recurrent_contribution_id == 0) {
	print("Error : not parameter recurrent_contribution_id in url");
	return;
}

/* 
 * we fetch the recurrent contribution with the recurrent_contribution_id in the URL
 */

if ($recurrent_contribution_id != 0) {
	/*
	 * GET to fetch the recurrent contribution
	 */
	$recurrent_contribution = request("recurrent-contributions/" . $recurrent_contribution_id, "GET");
	if (!isset($recurrent_contribution) || !isset($recurrent_contribution -> ID)) {
		print("Error");
		return;
	}
}



$body = json_encode(array("IsEnabled" => 0));

$refund = request("recurrent-contributions/$recurrent_contribution_id", "PUT", $body);

?>

</pre>
	</body>
</html>