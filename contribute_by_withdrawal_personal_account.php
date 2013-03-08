<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    </head>
    <body>
        <pre>

<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$wallet_id = isset($_REQUEST["wallet_id"]) ? $_REQUEST["wallet_id"] : 0;
$amount = isset($_REQUEST["amount"])? $_REQUEST["amount"] : 1000;

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

print("id du wallet => ".$wallet_id);

if($wallet_id == 0){
    /*
     * POST request to create a contribution-by-withdrawal on a personal account
     */
    print("POST request to create a contribution-by-withdrawal on a personal account");
    $body = json_encode(array("UserID" => $user -> ID, "AmountDeclared" => $amount));
} else {
    /*
     * POST request to create a contribution-by-withdrawal on a wallet
     */
    print("POST request to create a contribution-by-withdrawal on a wallet");
    $body = json_encode(array("UserID" => $user -> ID, "WalletID" => $wallet_id, "AmountDeclared" => $amount));    
}


$contribution = request("contributions-by-withdrawal", "POST", $body);


/*
 *	GET
 */
if (!isset($contribution) || !isset($contribution -> ID)) {
	print("Error");
	return;
}

$contribution_get = request("contributions-by-withdrawal/".$contribution -> ID, "GET");

?>

        </pre>
    </body>
</html>