<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

session_start();

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{
	require('menu.php');
	if ($_POST['submit'] == 'Insert')
	{
		$validationFlag = true;
		if(!($_POST['loan_number']))
		{ 
			echo 'All the fields marked as * are compulsary.<br>'; 
			$validationFlag = false; 
		}
		else
		{
			$loan_number = $_POST['loan_number']; 
			$branch_name = $_POST['branch_name']; 
			$amount = $_POST['amount'];
		}
		if(!$validationFlag)
		{
			$link = mysql_connect('localhost', 'root', ''); 
			//Check link to the mysql server 
			if(!$link)
			{ 
				die('Failed to connect to server: ' . mysql_error()); 
			} 
			//Select database 
			$db = mysql_select_db('bank_details'); 
			if(!$db)
			{ 
				die("Unable to select database"); 
			} 
			$query = "INSERT INTO loan (account_number, branch_name, amount) VALUES ('$account_number','$branch_name','$amount')"; 
			$results = mysql_query($query); 
			if($results == FALSE) 
				echo mysql_error() . '<br>'; 
			else 
				echo 'Data inserted successfully! '; 		
		}
		
	}
	if($_POST['submit']=='Update')
	{
		if(!$_POST['loan_number']) 
			echo 'Enter the account number as it is the primary key.';
		else
		{
			$validationFlag = true;
			$loan_number = $_POST['loan_number']; 
			$branch_name= $_POST['branch_name']; 
			$amount = $_POST['amount'];		
			if($_POST['branch_name'])
			{ 
				$update = "UPDATE loan SET branch_name = '$branch_name' WHERE loan_number = '$loan_number'"; 
			}
			if($_POST['amount'])
			{ 
				$update = "UPDATE loan SET amount = '$amount' WHERE loan_number = '$loan_number'"; 
			}
			if($validationFlag)
			{ 
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
				$results = mysql_query($update); 
				if($results == FALSE) 
					echo mysql_error() . '<br>'; 
				else 
					echo mysql_info(); 
			}
		}
		
	}
	if ($_POST['submit'] == 'Delete')
	{
		if(!$_POST['loan_number']) 
		{
			echo 'Enter the account number as it is the primary key.';
		}
		else
		{
			$loan_number = $_POST['loan_number']; 
			$branch_name = $_POST['branch_name']; 
			$amount = $_POST['amount'];
			
			$delete = "DELETE FROM loan WHERE loan_number = '$loan_number'"; 
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
			$results = mysql_query($delete);
			if($results == FALSE)
				echo mysql_error() . '<br>'; 
			else
				echo 'Data deleted successfully'; 
		}
	}
	
}
else
{
	header('location:login_form.php'); 
	exit(); 
}
?>