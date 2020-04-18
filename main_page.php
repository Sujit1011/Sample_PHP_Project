<html>
    <head>
    	<title>Welcome Page</title> 
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
<?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the session variable for user authentication is set, if not redirect to login page. 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//include the menu 
require('menu.php'); 
echo '
<div class="container">
<center><h1>Welcome to the Banking Enterprise</h1> 
	<div class="card">
  <h5 class="card-header h5">Customer</h5>
  <div class="card-body">
    <a href="view_customer.php" class="btn btn-primary" >View All Customer Details</a>
    <a href="customer_stat.php" class="btn btn-primary" >View Customer Information</a>
    <a href="register_customer.php" class="btn btn-primary" >Register/Update Customer</a>
  </div>
</div>

<div class="card">
  <h5 class="card-header h5">Account</h5>
  <div class="card-body">
    <a href="view_account.php" class="btn btn-primary" >View All Account Details</a>
    <a href="register_account.php" class="btn btn-primary" >Register/Update Account</a>
  </div>
</div>

<div class="card">
  <h5 class="card-header h5">Loan</h5>
  <div class="card-body">
    <a href="view_loan.php" class="btn btn-primary" >View All Loan Details</a>
    <a href="register_loan.php" class="btn btn-primary" >Register/Update Loan</a>
  </div>
</div>

<div class="card">
  <h5 class="card-header h5">Branch</h5>
  <div class="card-body">
    <a href="view_branch.php" class="btn btn-primary" >View All Branch Details</a>
    <a href="register_branch.php" class="btn btn-primary" >Register/Update Branch</a>
  </div>
</div>
</center>
</div>';
exit(); 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>

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

