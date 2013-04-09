<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");

$contribution_id = isset($_REQUEST["contribution_id"]) ? $_REQUEST["contribution_id"] : 0;

if($contribution_id == 0)
{
	print("Error : not parameter contribution_id in url");
	return;
}

/*
 * GET to fetch the expense
 */
 
$contribution = request("contributions/$contribution_id", "GET");

?>

</pre>
</body>
</html>