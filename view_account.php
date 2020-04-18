<html>

	<head>
	<title>View Account</title>
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
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>	
	
	<div class="container">
	


<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

session_start();

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{ 
	require('menu.php');
	$link = mysql_connect('localhost', 'root', '');  
	if(!$link)
	{ 
		die('Failed to connect to server: ' . mysql_error());
	}
	$db = mysql_select_db('bank_details'); 
	if(!$db)
	{
	 	die("Unable to select database"); 
	}
	$qry = 'SELECT * FROM account';
	$result = mysql_query($qry);
	echo '<h1>The Account Details are - </h1><br><br>';
	echo '<table class="table">  
	<thead class="thead-dark">
	<tr>h 
	<th scope="col"> account_number </th> 
	<th scope="col"> branch_name </th>
	<th scope="col"> balance </th>
	<th scope="col"> date </th>
	</tr>';
	while ($row = mysql_fetch_assoc($result))
	{ 
		echo '<tbody>
		<tr> 
		<td>'.$row['account_number'].'</td>
		<td>'.$row['branch_name'].'</td>
		<td>'.$row['balance'].'</td>
		<td>'.$row['DATE'].'</td>
		</tr>
		</tbody>'; 
	}
	echo '</table>';
}
else
{ 
	header('location:login_form.php'); 
	exit(); 
}
?>

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



	
	
 


