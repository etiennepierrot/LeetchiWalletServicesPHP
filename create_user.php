<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");


/*
 * POST request to create a user
 */	 
$body = json_encode(array(
		"FirstName" => "John", 
		"LastName"=> "Doe", 
		"Email" => "john.doe@unknow.com",
		"IP" => "127.0.0.1", 
		"CanRegisterMeanOfPayment" => "true")
		);	

$user = request("users", "POST", $body);

if( !isset($user) || !isset($user->ID)) {
	print("Error");
	return;
}


?>

</pre>
</body>
</html>