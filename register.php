<?php
session_start();
include('config.php');


if(isset($_SESSION["userName"]))
{
	header('Location: index.php');
}




if(isset($_POST["btnSubmit"]))
{
	$var_FirstName = $_POST["txtFN"];
	$var_LastName = $_POST["txtLastName"];
	$var_Email = $_POST["txtEmail"];
	$var_Pass1 = $_POST["txtPass1"];
	$var_Pass2 = $_POST["txtPass2"];
	
	if($var_Pass1 != $var_Pass2)
	{
		$ErrorMessage = "Password Not Match";
	}
	else
	{
		$sqlQueryCheckUser = "select * from tbl_users where email = '$var_Email'";
		$result = mysqli_query($conn,$sqlQueryCheckUser);
		$CheckUserCount = mysqli_num_rows($result);
		if($CheckUserCount > 0)
		{
			$ErrorMessage = "User Match";
		}
		else
		{
			$pass_encypt = md5($var_Pass1);
			
			$sqlQueryInsert = "insert into tbl_users (first_name,last_name,email,pass) values ('$var_FirstName','$var_LastName','$var_Email','$pass_encypt')";
			$resultInsert = mysqli_query($conn,$sqlQueryInsert);
			if($resultInsert)
			{
				$ErrorMessage = "Saved";
			}
			else
			{
				$ErrorMessage = "Error";
			}
		}
		
	}
	
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Shopping Cart</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<?php
	include('nav.php'); 
?>


<div class="container">
       <div class="row">
       		<div class="col-md-12" style="width:50%;">
            	
                
                <?php
					if(isset($ErrorMessage) && $ErrorMessage == "Password Not Match")
					{
				?>	
                 <div class="alert alert-danger">
  					<strong>Error!</strong> Password does not matched.
				</div>
                <?php	
					}
				?>
                
                <?php
					if(isset($ErrorMessage) && $ErrorMessage == "User Match")
					{
				?>	
                 <div class="alert alert-danger">
  					<strong>Error!</strong> <?php echo $var_Email ?> User already registered
				</div>
                <?php	
					}
				?>
                
                
                 <?php
					if(isset($ErrorMessage) && $ErrorMessage == "Saved")
					{
				?>	
                 <div class="alert alert-success">
  					<strong>Succsess!</strong> Your Account Successfully Registered.
				</div>
                <?php	
					}
				?>
                
                
                 <?php
					if(isset($ErrorMessage) && $ErrorMessage == "Eroor")
					{
				?>	
                 <div class="alert alert-danger">
  					<strong>Error!</strong> Please Try again.
				</div>
                <?php	
					}
				?>
                
                
               
                
                <form action="" method="post">
                <div style="width:100%; margin:auto;">
                		<div class="form-group">
                	<label>First Name</label>
                    <input type="text" required class="form-control" name="txtFN" />
                </div>
                
                <div class="form-group">
                	<label>Last Name</label>
                    <input type="text" required class="form-control" name="txtLastName" />
                </div>
                
                
                <div class="form-group">
                	<label>Email / User</label>
                    <input type="email" required class="form-control" name="txtEmail" />
                </div>
                
                
              	<div class="form-group">
                	<label>Password</label>
                    <input type="password" required class="form-control" name="txtPass1" />
                </div>
                
                
                <div class="form-group">
                	<label>Re-type Password</label>
                    <input type="password" required class="form-control" name="txtPass2" />
                </div>
                
                
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="btnSubmit" />
                </div>
                </div>
                
                </form>
            </div>
       </div>
</div>

</body>
</html>