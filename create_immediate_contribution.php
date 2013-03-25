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
$paymentCard_id = isset($_REQUEST["paymentCard_id"]) ? $_REQUEST["paymentCard_id"] : 0;
$clientFeeAmount = isset($_REQUEST["clientFeeAmount"]) ? $_REQUEST["clientFeeAmount"] : 0;
$amount = isset($_REQUEST["amount"]) ? $_REQUEST["amount"] : 0;


$body = json_encode(array("UserID" => $user_id, "WalletID" => $wallet_id, "Amount" => $amount, "ClientFeeAmount" => $clientFeeAmount, "PaymentCardID" => $paymentCard_id));

$contribution = request("immediate-contributions", "POST", $body);

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