<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$Nationality = isset($_REQUEST["Nationality"]) ? $_REQUEST["Nationality"] : 0;
$PersonType = isset($_REQUEST["PersonType"]) ? $_REQUEST["PersonType"] : 0;

if ($user_id == 0) {
	print("Error : not parameter user_id in url");
	return;
}

/* we fetch the user with the user_id in the URL
 * else we create the user
 */

/*
 * GET to fetch the user
 */
$user = request("users/" . $user_id, "GET");
if (!isset($user) || !isset($user -> ID)) {
	print("Error");
	return;
}

/*
 * PUT request to update a user
 */
$body = json_encode(array("FirstName" => "Johnny", 
						  "LastName" => "Be Good", 
						  "Email" => "john.doe@unknow.com", 
						  "CanRegisterMeanOfPayment" => "false",
						  "Nationality" => $Nationality, 
						  "PersonType" => $PersonType));
$user = request("users/".$user -> ID, "PUT", $body);
?>

</pre>
	</body>
</html>