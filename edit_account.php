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
if(!($_POST['account_number']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$account_number = $_POST['account_number']; 
$branch_name = $_POST['branch_name']; 
$balance = $_POST['balance']; 
$DATE = $_POST['DATE']; 

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
$query = "INSERT INTO account (account_number,branch_name,balance,DATE) VALUES ('$account_number','$branch_name','$balance','$DATE')";
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
if(!$_POST['account_number']) 
echo 'Enter the name of the account number as it is the primary key.'; 
else{ 
$validationFlag = true;

$account_number = $_POST['account_number']; 
$branch_name = $_POST['branch_name']; 
$balance = $_POST['balance']; 
$DATE = $_POST['DATE'];
 
//$update = "UPDATE account SET account_number = '$account_number'"; 

if($_POST['branch_name']){ 
$update = "UPDATE account SET branch_name = '$branch_name' WHERE account_number = '$account_number'"; 
} 
if($_POST['balance']){ 
$update = "UPDATE account SET balance = '$balance' WHERE account_number = '$account_number'"; 
} 

if($_POST['DATE']){ 
$update = "UPDATE account SET DATE = '$DATE' WHERE account_number = '$account_number'"; 
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
if(!$_POST['account_number']) 
echo 'Enter the name of the account number as it is the primary key.'; 
else{ 

$account_number = $_POST['account_number']; 
$branch_name = $_POST['branch_name']; 
$balance = $_POST['balance'];
$DATE = $_POST['DATE'];

$delete = "DELETE FROM account WHERE account_number = '$account_number'"; 
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
