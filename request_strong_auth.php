<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="/jquery/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="/jquery/jquery.form.js"></script>
	</head>
	<body>
		<pre>
<?php

require_once (dirname(__FILE__) . "/lib/common.inc");

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : 0;

if ($user_id == 0) {
	/*
	 * POST request to create a user
	 */
	$body = json_encode(array("FirstName" => "John", "LastName" => "Doe", "Email" => "john.doe@unknow.com", "IP" => "127.0.0.1", "CanRegisterMeanOfPayment" => "true"));

	$user = request("users", "POST", $body);

} else {
	/*
	 * GET to fetch the user
	 */
	$user = request("users/" . $user_id, "GET");
}

$body = json_encode(array("UserID" => $user -> ID));

$strongUserValidation = request("strongUserValidations", "POST", $body);

if (!isset($strongUserValidation) || !isset($strongUserValidation -> ID)) {
	print("Error");
	return;
}

$url = $strongUserValidation -> UrlRequest;
?>

<form id="formPostDocument" action=<?php echo $url;?> enctype="multipart/form-data" method="POST" >
	<input type="file" name="StrongUserValidationDto.Picture"  />
	<input type="submit" name="submit" value="Envoyer" />
</form>

<a href="close_strong_auth.php?request_id=<?php echo $strongUserValidation -> ID;?>">Close request</a>



<script>

  // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'formPostDocument' and provide a simple callback function 
            $('#formPostDocument').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
</script>





</pre>
	</body>
</html>