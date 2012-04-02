<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$request_id = isset($_REQUEST["request_id"]) ? $_REQUEST["request_id"] : 0;

if ($request_id == 0) {
	print("Error : not parameter request_id in url");
	return;
}

$body = json_encode(array("IsDocumentsTransmitted" =>  true));
$strongUserValidation = request("strongUserValidations/$request_id", "PUT", $body);

?>

</pre>
	</body>
</html>
