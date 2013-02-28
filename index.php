<?php require_once (dirname(__FILE__) . "/lib/common.inc");?>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
$(document).ready(function(){
				
	$('.enter').click(function(){

		$(this).next('.content').slideToggle('fast');

	});
});
		</script>
		<style type="text/css">
		<!--
			.enter {
				background-color:#5882FA;
				}
			.content {
				background-color:#CECEF6;
				margin-bottom:10px;
				padding:5px;
				padding-left:20px;
				}
		-->
		</style>
		
	</head>
	<body>
        <p>Environment : <?php echo $leetchiBaseURL;?></p>
		<div>
			params with * can be create if they are missing
		</div>
		<br>
		<div>
			4970100000000170
		</div>
		<div class="enter">/user</div>
		<div class="content">
			<!-- Create User -->
			<form name="input" action="create_user.php" method="get">
				<input type="submit" value="Create user" />
			</form> 		
			<!-- Update User -->
			<form name="input" action="update_user.php" method="put">
				user_id: <input type="text" size="12" maxlength="150" name="user_id"/>
				Nationality : <input type="text" size="12" maxlength="150" name="Nationality" value="French"/>
				PersonType : <input type="text" size="20" maxlength="150" name="PersonType" value="NATURAL_PERSON"/>
				<input type="submit" value="update user" />
			</form> 
			<!-- Get User -->
			<form name="input" action="get_user.php" method="get">
				user_id: <input type="text" size="12" maxlength="150" name="user_id"/>
				<input type="submit" value="get user" />
			</form> 
		</div>
		<!-- Create User & start a payment-->
		<form name="input" action="contribute_personal_account.php" method="get">
			user_id*: <input type="text" size="12" maxlength="150" name="user_id"/>
			amount : <input type="text" size="12" maxlength="150" name="amount" value="1000"/>
			<input type="submit" value="contribute personal account" />
		</form> 
		<!-- Create wallet --> 
		<form name=input action="create_wallet.php" method="get">
			user_id*: <input type="text" size="12" maxlength="150" name="user_id"/>
			<input type="submit" value="create wallet" />
		</form>
		<!-- Contribu on a wallet-->
		<form name="input" action="contribute_wallet.php" method="get">
			user_id* : <input type="text" size="12" maxlength="50" name="user_id">
			wallet_id* : <input type="text" size="12" maxlength="50" name="wallet_id">
			Method : 
			<select name="methodType">
				<option value="cb_visa_mastercard">cb_visa_mastercard</option>
				<option value="elv">elv</option>
				<option value="amex">amex</option>
			</select>
		
			<input type="submit" value="contribute wallet" />
		</form> 
		<div class="enter">/card</div>
		<div class="content">
			<!-- Create Card -->
			<form name="input" action="create_payment_card.php" method="get">
				user_id : <input type="text" size="12" maxlength="50" name="user_id">
				<input type="submit" value="create payment card" />
			</form> 
			<!-- Delete Card -->
			<form name="input" action="delete_card.php" method="get">
				paymentcard_id : <input type="text" size="12" maxlength="50" name="paymentcard_id">
				<input type="submit" value="delete card" />
			</form> 
			<!-- get_payment_card -->
			<form name="input" action="get_payment_card.php" method="get">
				user_id : <input type="text" size="12" maxlength="50" name="user_id">
				<input type="submit" value="get payment card" />
			</form> 
		</div>
		<!-- create Pending refund -->
		<form name="input" action="create_pending_refund.php" method="get">
			user_id : <input type="text" size="12" maxlength="50" name="user_id">
			contribution_id : <input type="text" size="12" maxlength="50" name="contribution_id">
			<input type="submit" value="Create pending refund" />
		</form> 
		<!-- create withdrawal -->
		<form name="input" action="create_withdrawal.php" method="get">
			user_id* : <input type="text" size="12" maxlength="50" name="user_id">
			wallet_id* : <input type="text" size="12" maxlength="50" name="wallet_id">
			amount : <input type="text" size="12" maxlength="50" name="amount" value="1000">
			<input type="submit" value="Create withdrawal" />
		</form> 	
        <!-- get request strongAuthentication -->
		<form name="input" action="get_request_strong_auth.php" method="get">
			user_id* : <input type="text" size="12" maxlength="50" name="user_id">
			<input type="submit" value="get strongAuthentication" />
		</form> 		
		<!-- get operations of user -->
		<form name="input" action="get_operations_user.php" method="get">
			user_id* : <input type="text" size="12" maxlength="50" name="user_id">
			<input type="submit" value="get operations of user" />
		</form> 		
		<!-- get operations on personal account  -->
		<form name="input" action="get_operations_user_personal.php" method="get">
			user_id* : <input type="text" size="12" maxlength="50" name="user_id">
			<input type="submit" value="get operations on personal account" />
		</form> 
		<!-- get operations on wallet  -->
		<form name="input" action="get_operations_wallet.php" method="get">
			wallet_id* : <input type="text" size="12" maxlength="50" name="wallet_id">
			<input type="submit" value="get operations on wallet" />
		</form> 
		
		<!-- create transfer -->
		<form name="input" action="create_transfer.php" method="get">
			payer_id : <input type="text" size="12" maxlength="50" name="payer_id">
			beneficiary_id : <input type="text" size="12" maxlength="50" name="beneficiary_id">
			wallet_beneficiary_id : <input type="text" size="12" maxlength="50" name="wallet_beneficiary_id">
			amount : <input type="text" size="12" maxlength="50" name="amount" value="1000">
			<input type="submit" value="create transfer" />
		</form> 

		<!-- create transfer to personal account -->
		<form name="input" action="create_transfer_to_personal_account.php" method="get">
			payer_id : <input type="text" size="12" maxlength="50" name="payer_id">
			beneficiary_id : <input type="text" size="12" maxlength="50" name="beneficiary_id">
			amount : <input type="text" size="12" maxlength="50" name="amount" value="1000">
			<input type="submit" value="create transfer to personal account" />
		</form>		
		
		<!-- get transfer -->
		<form name="input" action="get_transfer.php" method="get">
			transfer_id* : <input type="text" size="12" maxlength="50" name="transfer_id">
			<input type="submit" value="get transfer" />
		</form> 				
		
	</body>	
	</body>
</html>