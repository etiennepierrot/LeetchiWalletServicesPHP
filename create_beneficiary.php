<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<pre>
<?php

require_once(dirname(__FILE__) . "/lib/common.inc");

print("TOTO");

$parameters = array("BankAccountOwnerName", "BankAccountOwnerAddress", "BankAccountIBAN", "BankAccountBIC", "Tag");


$array = array();
for ($i = 0; $i < count($parameters) ; $i++) {
    if(isset($_REQUEST[$parameters[$i]]) && $_REQUEST[$parameters[$i]] != "<nil>"){
        $array[$parameters[$i]] = $_REQUEST[$parameters[$i]];
    }
}

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