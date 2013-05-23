  <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php
$tag = isset($_REQUEST["tag"])? $_REQUEST["tag"] : "DefaultTag";
$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;
$wallet_id = isset($_REQUEST["wallet_id"]) ? $_REQUEST["wallet_id"] : 0;
$amount = isset($_REQUEST["amount"]) ? $_REQUEST["amount"] : 0;
$store = isset($_REQUEST["store"]) ? $_REQUEST["store"] : "fr";

if ($amount == 0) {
	print("Error : the amount must be specified in url");
	return;
}
require_once (dirname(__FILE__) . "/lib/common.inc");

    
    
    $body = json_encode(array(
                              "Tag" => $tag,
                              "UserID" => $user_id,
                              "WalletID" => $wallet_id  ,
                              "Amount" => $amount,
                              "Store" => $store
                              
                              ));
    
    $withdrawal = request("amazonvoucher", "POST", $body);
    

?>

</pre>
</body>
</html>