<?php
session_start();
include('config.php');

if(isset($_SESSION["userName"]))
{
	header('Location: index.php');
}





if(isset($_POST["btnLogin"]))
{
	
	$var_Email = $_POST["txtEmail"];
	$var_Pass1 = md5($_POST["txtPass1"]);
	
		$sqlQueryCheckUser = "select * from tbl_users where email = '$var_Email' AND pass = '$var_Pass1'";
		$result = mysqli_query($conn,$sqlQueryCheckUser);
		$CheckUserCount = mysqli_num_rows($result);
		$RecordSet = mysqli_fetch_assoc($result);
		if($CheckUserCount > 0)
		{
			$_SESSION["userName"] = $RecordSet["first_name"];
			$_SESSION["userID"] = $RecordSet["id"];
			header('Location: index.php');
		}
		else
		{
			$errorMessage = "invalid";
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
            	
                <h3>Login</h3>
                <?php
					if(isset($errorMessage) && $errorMessage == "invalid")
					{
				?>	
                 <div class="alert alert-danger">
  					<strong>Error!</strong> invalid user / password.
				</div>
                <?php	
					}
				?>
                
                
                <form action="" method="post">
                
                <div class="form-group">
                	<label>Email / User</label>
                    <input type="email" required class="form-control" name="txtEmail" />
                </div>
                
                
              	<div class="form-group">
                	<label>Password</label>
                    <input type="password" required class="form-control" name="txtPass1" />
                </div>
                
                
 
                
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-success" name="btnLogin" />
                </div>
                </div>
                
                </form>
            </div>
       </div>
</div>

</body>
</html>