<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");


$transfer_id = isset($_REQUEST["transfer_id"]) ? $_REQUEST["transfer_id"] : 0;

if ($transfer_id == 0) {
	print("Error : not parameter transfer_id in url");
	return;
}

	$operations = request("transfers/$transfer_id", "GET");

?>

</pre>
</body>
</html>
s