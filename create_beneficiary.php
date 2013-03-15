<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");


/*
 * POST request to create a beneficiary
 */	 
$body = json_encode(array("Tag" => "Custom data", 
						"BankAccountOwnerName" => "Test Name", 
						"BankAccountOwnerAddress" => "Test Address", 
						"BankAccountIBAN" => "FR30 2004 1010 1245 3072 5S03 383", 
						"BankAccountBIC" => "CRLYFRPP"));

$beneficiary = request("beneficiaries", "POST", $body);
	
if( !isset($beneficiary) || !isset($beneficiary->ID)) {
	print("Error");
	return;
}


?>

</pre>
</body>
</html>