<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php
require_once(dirname(__FILE__) . "./lib/common.inc");

$id_card = $_GET['paymentcard_id'];
$response = request("cards/".$id_card, "DELETE");
?>
</pre>
</body>
</html>