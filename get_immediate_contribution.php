<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    </head>
    <body>
        <pre>

<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$immediate_contribution_id = isset($_REQUEST["immediate_contribution_id"]) ? $_REQUEST["immediate_contribution_id"] : 0;

if ($immediate_contribution_id == 0) {
	print("Error : not parameter immediate_contribution_id in url");
	return;
}

$user = request("immediate-contributions/".$immediate_contribution_id, "GET");

?>

        </pre>
    </body>
</html>