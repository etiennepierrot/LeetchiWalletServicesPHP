<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$recurrentContributionId = isset($_REQUEST["RecurrentContributionId"]) ? $_REQUEST["RecurrentContributionId"] : 0;


if($recurrentContributionId != 0)
{
	$recurrentcontribution = request("recurrent-contributions/$recurrentContributionId", "GET");
	$recurrentcontributionexec = request("recurrent-contributions/$recurrentContributionId/executions", "GET");
	
}

?>
</pre>
	</body>
</html>
