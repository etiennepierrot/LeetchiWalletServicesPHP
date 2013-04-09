<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php
require_once (dirname(__FILE__) . "/lib/common.inc");

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$tag = isset($_REQUEST["tag"])? $_REQUEST["tag"] : "DefaultTag";

if ($user_id == 0) {
	print("Error : not parameter user_id in url");
	return;
}

$user = request("users/" . $user_id, "GET");

if (!isset($user) || !isset($user -> ID)) {
	print("Error");
	return;
}

//create payment card
$body = json_encode(array("TAG" => utf8_encode("custom data"), "OwnerID" => $user -> ID, "ReturnURL" => "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . "/return_create_card.php", "Tag" => $tag ));

$card = request("cards", "POST", $body);

if (!isset($card) || !isset($card -> ID)) {
	print("Error");
	return;
}

header("Location: " . $card -> RedirectURL);
exit();
?>
</pre>
	</body>
</html>