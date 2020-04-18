
<?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?> 





<html> 
	
	<body> 	
	
		<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Customer Information.</p>
                </div>

                <div class="form-content">
				<form action="edit_customer.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <center>
                                <input type="text" name="customer_name" class="form-control" placeholder="Customer Name *" value=""/>
								</center>
                            </div>
                        
                        </div>
                
                    </div>
					<center>
					<input type="submit" class="btn btn-primary" name="submit" value="Loan Taken"> 
					<input type="submit" class="btn btn-primary" name="submit" value="Account Balance">
					<input type="submit" class="btn btn-primary" name="submit" value="Update Account by 10">
					<input type="submit" class="btn btn-primary" name="submit" value="Branch Name of the Customer">
					</center>
				</form>
                </div>
            </div>
	</div> 	
		
	</body> 
</html>
































<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Customer Information.</p>
                </div>

                <div class="form-content">
				<form action="edit_customer.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <center>
                                <input type="text" name="customer_name" class="form-control" placeholder="Customer Name *" value=""/>
								</center>
                            </div>
                        
                        </div>
                
                    </div>
					<center>
					<input type="submit" class="btn btn-primary" name="submit" value="Loan Taken"> 
					<input type="submit" class="btn btn-primary" name="submit" value="Account Balance">
					<input type="submit" class="btn btn-primary" name="submit" value="Update Account by 10">
					<input type="submit" class="btn btn-primary" name="submit" value="Branch Name of the Customer">
					</center>
				</form>
                </div>
            </div>
</div> 