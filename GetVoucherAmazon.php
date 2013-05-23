  <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");
$voucher_id = isset($_REQUEST["voucher_id"]) ? $_REQUEST["voucher_id"] : 0;
if ($voucher_id == 0) {
	print("Error : the voucher id must be specified");
	return;
}

$voucheramazon = request("amazonvoucher/".$id, "GET");


?>



</pre>
</body>
</html>