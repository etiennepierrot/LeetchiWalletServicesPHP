<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$contribution_id = isset($_REQUEST["contribution_id"]) ? $_REQUEST["contribution_id"] : 0;
$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$execution_id = isset($_REQUEST["execution_id"]) ? $_REQUEST["execution_id"] : 0;
$tag = isset($_REQUEST["tag"])? $_REQUEST["tag"] : "DefaultTag";

if ($contribution_id == 0 && $execution_id ==0) {
	print("Error : not parameter contribution_id or execution_id in url");
	return;
}

if ($user_id == 0) {
	print("Error : not parameter user_id in url");
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

/*
 * we fetch the contribution with the contribution_id in the URL
 */

if ($contribution_id != 0) {
	/*
	 * GET to fetch the contribution
	 */
	$contribution = request("contributions/" . $contribution_id, "GET");
	if (!isset($contribution) || !isset($contribution -> ID)) {
		print("Error");
		return;
	}
}


$body = json_encode(array("Tag" => "Custom data", 
						  "ContributionID" =>  $contribution_id != 0 ? $contribution_id : $execution_id, 
						  "UserID" => $user_id, 
                          "Tag" => $tag));

$refund = request("refunds", "POST", $body);
?>

</pre>
	</body>
</html>