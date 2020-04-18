

<?php 

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

if ($_POST['submit'] == 'Login'){ 
//Collect POST values 
$login = $_POST['login']; 
$password = $_POST['password']; 
if($login && $password){ 
//Connect to mysql server 
$link = mysql_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link) { 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('bank_details'); 
if(!$db) { 
die("Unable to select database"); 
} 
//Create query (if you have a Logins table the you can select login id and password from there)
//$qry='SELECT * FROM Logins WHERE login_id = "ABC" AND password = "12345"'; 
//Execute query 
//$result=mysql_query($qry); 
//Check whether the query was successful or not 
if($login == 'ABC' && $password =='12345'){ 
//$count = mysql_num_rows($result);
$count = 1; 
} 
else{ 
//Login failed 
include('a_login_form.php'); 
echo '<div style="color: white;"><center>Incorrect Username or Password !!!<center></div>'; 
exit(); 
} 
//if query was successful it should fetch 1 matching record from the table. 
if( $count == 1){ 
//Login successful set session variables and redirect to main page. 
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_ID'] = $login; 
header('location:main_page.php'); 
} 
else{ 
//Login failed 
include('a_login_form.php'); 
echo '<div style="color: white;"><center>Incorrect Username or Password !!!</center></div>'; 
exit(); 
} 
} 
else{ 
include('a_login_form.php'); 
echo '<div style="color: white;"><center>Username or Password missing!!</center></div>'; 
exit(); 
} 
} 
else{ 
header("location: a_login_form.php"); 
exit(); 
} 
?>
