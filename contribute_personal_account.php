<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    </head>
    <body>
        <pre>

<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$amount = isset($_REQUEST["amount"])? $_REQUEST["amount"] : 500000;

/*
 * we fetch the user with the user_id in the URL
 * else we create the user
 */

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
 * POST request to create a contribution on a personal account
 */
print_r  ($_SERVER["REQUEST_URI"] . "\n");

print_r (str_replace( "\\", "", dirname($_SERVER["REQUEST_URI"])) . "\n");

$body = json_encode(array("UserID" => $user -> ID, "WalletID" => $user -> ID, "Amount" => $amount, "ClientFeeAmount" => "0", "RegisterMeanOfPayment" => true, "ReturnURL" => "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . str_replace( "\\", "", dirname($_SERVER["REQUEST_URI"])) . "/return.php"));

$contribution = request("contributions", "POST", $body);

/*
 * Redirect to url of payment
 */

if ($contribution != null) {
	header("Location: " . $contribution -> PaymentURL);
	exit();
}
?>

        </pre>
    </body>
</html>