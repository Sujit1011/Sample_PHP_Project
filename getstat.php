
 <?php 
//Start the session to see if the user is authenticated user. 
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 
if ($_POST['submit'] == 'Loan Taken') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT customer_name, borrower.loan_number, amount FROM borrower, loan WHERE borrower.loan_number = loan.loan_number AND customer_name = '$customer_name'";
//Execute query 
$result = mysql_query($query); 
echo "<center><h1>Loan Taken</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Loan Number</th> 
<th>Amount of Loan</th> 
</tr>"; 

while($row = mysql_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['customer_name'] . "</td> 
<td>" . $row['loan_number']."</td> 
<td>" . $row['amount'] . "</td> 
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 
 
 // Code to be executed when 'Account Balance' is clicked. 
if ($_POST['submit'] == 'Account Balance') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT customer_name, depositor.account_number, balance FROM depositor, account WHERE depositor.account_number = account.account_number AND customer_name =  '$customer_name'";
//Execute query 
$result = mysql_query($query); 
echo "<center><h1>Account Details</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Account Number</th> 
<th>Balance in Account</th> 
</tr>"; 

while($row = mysql_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['customer_name'] . "</td> <td>" . $row['account_number']."</td> <td>" . $row['balance'] . "</td> </tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 


if ($_POST['submit'] == 'Update Account Balance By 10%'){ 
if(!$_POST['customer_name']) 
echo 'Enter the name of the customer as it is the primary key.'; 
else{ 
$validationFlag = true;

$customer_name = $_POST['customer_name']; 
 
//$update = "UPDATE customer SET customer_name = '$customer_name'"; 

if($_POST['customer_name']){ 
$update = "UPDATE account, depositor SET balance = balance+(0.1*balance) WHERE depositor.account_number=account.account_number and customer_name = '$customer_name'"; 
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


if ($_POST['submit'] == 'Branch Name of Customer') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT customer_name, branch_name FROM depositor, account WHERE depositor.account_number = account.account_number AND customer_name =  '$customer_name'";
//Execute query 
$result = mysql_query($query); 
echo "<center><h1>Account Details</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Branch Name</th> 
</tr>"; 

while($row = mysql_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['customer_name'] . "</td> <td>" . $row['branch_name']."</td></tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 




} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
