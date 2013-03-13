<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$recurrent_contribution_id = isset($_REQUEST["recurrent_contribution_id"]) ? $_REQUEST["recurrent_contribution_id"] : 0;


if($recurrent_contribution_id != 0)
{
	$recurrentcontributionexec = request("recurrent-contributions/$recurrent_contribution_id/executions", "GET");	
}

?>
</pre>
	</body>
</html>
