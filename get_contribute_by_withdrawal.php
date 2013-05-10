<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    </head>
    <body>
        <pre>

<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$contribution_id = isset($_REQUEST["contribution_id"]) ? $_REQUEST["contribution_id"] : 0;

if ($contribution_id == 0) {
	print("Error : not parameter contribution_id in url");
	return;
}

$user = request("contributions-by-withdrawal/".$contribution_id, "GET");

?>

        </pre>
    </body>
</html>