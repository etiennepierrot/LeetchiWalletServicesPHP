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

$request_id = isset($_REQUEST["request_id"]) ? $_REQUEST["request_id"] : 0;

if ($request_id == 0) {
	
	echo "Error : no request_id in parameter";
	return;

} else {
	/*
	 * GET to fetch the user
	 */
	$request = request("strongUserValidations/" . $request_id, "GET");
}


if (!isset($request) || !isset($request -> ID)) {
	print("Error");
	return;
}

$url = $request -> UrlRequest;
?>

<form id="formPostDocument" action=<?php echo $url;?> enctype="multipart/form-data" method="POST" >
	<input type="file" name="StrongUserValidationDto.Picture"  />
	<input type="submit" name="submit" value="Envoyer" />
</form>

<a href="close_strong_auth.php?request_id=<?php echo $request -> ID;?>">Close request</a>



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