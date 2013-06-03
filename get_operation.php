<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");


$operation_id = isset($_REQUEST["operation_id"]) ? $_REQUEST["operation_id"] : 0;

if ($operation_id == 0) {
	print("Error : not parameter operation_id in url");
	return;
}

	$operations = request("operations/$operation_id", "GET");

?>

</pre>
</body>
</html>