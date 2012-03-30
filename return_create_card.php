<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php
require_once(dirname(__FILE__) . "/common.inc");

$id_card = $_GET['PaymentCardID'];

$card = request("cards/".$id_card, "GET");

?>
</pre>
</body>
</html>