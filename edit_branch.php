<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

session_start();

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{
	require('menu.php');
	if ($_POST['submit'] == 'Insert'){
	//validation flag to check that all validations are done 
	$validationFlag = true; 
	//Check all the required fields are filled 
	if(!($_POST['branch_name']))
	{ 
		echo 'All the fields marked as * are compulsary.<br>'; 
		$validationFlag = false; 
	} 

	else
	{ 
			$branch_name = $_POST['branch_name']; 
			$branch_city = $_POST['branch_city'];
			$assets = $_POST['assets'];	 
	}


	//If all validations are correct, connect to MySQL and execute the query 
	if($validationFlag)
	{ 
		//Connect to mysql server 
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
//Create Insert query 
$query = "INSERT INTO branch (branch_name, assets, branch_city) VALUES ('$branch_name','$assets','$branch_city')"; 
//Execute query 
$results = mysql_query($query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysql_error() . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
	if($_POST['submit']=='Update')
	{
		if(!$_POST['branch_name']) 
			echo 'Enter the branch name as it is the primary key.';
		else
		{
			$validationFlag = true;
			$branch_name = $_POST['branch_name']; 
			$branch_city = $_POST['branch_city'];
			$assets = $_POST['assets'];		
			if($_POST['branch_city'])
			{ 
				$update = "UPDATE branch SET branch_city = '$branch_city' WHERE branch_name = '$branch_name'"; 
			}
			if($_POST['assets'])
			{ 
				$update = "UPDATE branch SET assets = '$assets' WHERE branch_name = '$branch_name'"; 
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
		if(!$_POST['branch_name']) 
		{
			echo 'Enter the account number as it is the primary key.';
		}
		else
		{
			$branch_name = $_POST['branch_name']; 
			$branch_city = $_POST['branch_city'];
			$assets = $_POST['assets'];			
			$delete = "DELETE FROM branch WHERE branch_name = '$branch_name'"; 
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