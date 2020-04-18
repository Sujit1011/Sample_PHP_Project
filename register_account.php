<?php 
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{ 
	require('menu.php'); 
} 
else
{ 
	header('location:login_form.php'); 
	exit(); 
} 
?>
<html>
	<head>
		<title>Register Account</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main1.css">

	</head>

	<body>
		<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Register/Update Account Details.</p>
                </div>

                <div class="form-content">
				<form action="edit_account.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="account_number" class="form-control" placeholder="Account Number *" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="branch_name" class="form-control" placeholder="Branch Name " value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="balance" class="form-control" placeholder="Balance " value=""/>
                            </div>
                            <div class="form-group">
                                <input type="date" name="DATE" class="form-control" placeholder="Date " value=""/>
                            </div>
                        </div>
                    </div>
					<center>
					<input type="submit" class="btn btn-primary" name="submit" value="Insert"> 
					<input type="submit" class="btn btn-primary" name="submit" value="Update">
					<input type="submit" class="btn btn-primary" name="submit" value="Delete">
					</center>
				</form>
                </div>
            </div>
	</div> 
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>	
	</body>
</html>
























