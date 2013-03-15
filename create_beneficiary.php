<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");

print("TOTO");

$parameters = array("BankAccountOwnerName", "BankAccountOwnerAddress", "iban", "bic");

print($parameters);

/*
 * POST request to create a beneficiary
 */	 

// Create params
$array = array("Tag" => "Custom data");
for ($i = 0; $i < $count; $i++) {
    if(!asset($_REQUEST[$parameters[$i]]))
        $array[$parameters[$i]] = $_REQUEST[$parameters[$i]]
}

print($array);

// Convert format
$body = json_encode($array);

// execute request
$beneficiary = request("beneficiaries", "POST", $body);
	
if( !isset($beneficiary) || !isset($beneficiary->ID)) {
	print("Error");
	return;
}


?>

</pre>
</body>
</html>