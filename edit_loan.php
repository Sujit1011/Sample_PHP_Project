<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
// Code to be executed when 'Insert' is clicked.
	

if ($_POST['submit'] == 'Insert')
{
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['loan_number']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$loan_number = $_POST['loan_number']; 
$branch_name = $_POST['branch_name']; 
$amount = $_POST['amount']; 
}


//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('bank_details'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Create Insert query 
$query = "INSERT INTO loan (loan_number,branch_name,amount) VALUES ('$loan_number','$branch_name','$amount')";
//Execute query 
$results = mysql_query($query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['loan_number']) 
echo 'Enter the name of the loan number as it is the primary key.'; 
else{ 
$validationFlag = true;

$loan_number = $_POST['loan_number']; 
$branch_name = $_POST['branch_name']; 
$amount = $_POST['amount']; 
 
//$update = "UPDATE loan SET loan_number = '$loan_number'"; 

if($_POST['branch_name']){ 
$update = "UPDATE loan SET branch_name = '$branch_name' WHERE loan_number = '$loan_number'"; 
} 
if($_POST['amount']){ 
$update = "UPDATE loan SET amount = '$amount' WHERE loan_number = '$loan_number'"; 
} 

//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('bank_details'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysql_query($update); 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo mysql_info(); 
} 
} 
} 
// Code to be executed when 'Delete' is clicked. 
if ($_POST['submit'] == 'Delete'){ 
if(!$_POST['loan_number']) 
echo 'Enter the name of the loan number as it is the primary key.'; 
else{ 

$loan_number = $_POST['loan_number']; 
$branch_name = $_POST['branch_name']; 
$amount = $_POST['amount'];

$delete = "DELETE FROM loan WHERE loan_number = '$loan_number'"; 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('bank_details'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysql_query($delete); 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo 'Data deleted successfully'; 
} 
} 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
