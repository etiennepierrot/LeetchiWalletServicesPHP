<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");

$expense_id = isset($_REQUEST["expense_id"]) ? $_REQUEST["expense_id"] : 0;

if($expense_id == 0)
{
	print("Error : not parameter expense_id in url");
	return;
}

/*
 * GET to fetch the expense
 */
 
$contribution = request("expenses/$expense_id", "GET");

?>

</pre>
</body>
</html>