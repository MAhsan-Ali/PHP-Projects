<?php
session_start();
include('config.php');

if(isset($_POST["btnLogin"]))
{
	
	$var_Email = $_POST["txtUserName"];
	$var_Pass1 = md5($_POST["txtPass"]);
	
		$sqlQueryCheckUser = "select * from tbl_users where email = '$var_Email' AND pass = '$var_Pass1'";
		$result = mysqli_query($conn,$sqlQueryCheckUser);
		$CheckUserCount = mysqli_num_rows($result);
		$RecordSet = mysqli_fetch_assoc($result);
		if($CheckUserCount > 0)
		{
			$_SESSION["userName"] = $RecordSet["first_name"];
			$_SESSION["userID"] = $RecordSet["id"];
			header('Location: checkout.php');
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
<title>Untitled Document</title>
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
    	<div class="col-md-9">
        	<img src="images/1.png" class="img-responsive" />
        </div>
        <div class="col-md-3">
            <img src="images/pic1.webp" class="img-responsive" />
            <img src="images/1.png" class="img-responsive" />
            <img src="images/1.png" class="img-responsive" />
        </div>
    </div>
</div>


<div class="container">
	<div class="row">
    	<h2 style="text-align:center; margin-top:70px;">
        <?php
			if(isset($_SESSION["AddCart"]) && !empty($_SESSION["AddCart"]))
			{
				
				if(isset($_SESSION["OrderNo"]))
				{
					echo "Order # [ " .$_SESSION["OrderNo"]. " ]";
				}
				else
				{
					$_SESSION["OrderNo"] = date('Ymdhhis');
					echo "Order # [ " .$_SESSION["OrderNo"]. " ]";
				}
			}
				
			
		?>
        
        
        
        
        </h2>
        <hr>
        
        <table class="table table-bordered table-responsive table-striped">
        	<tr style="background-color:#333; color:#FFF;">
            	<td>Code</td>
                <td>Image</td>
                <td>Name</td>
                <td>Price</td>
                <td>Qty</td>
                <td>Amount</td>
               
                
            </tr>
            
            
            
            <?php
				if(isset($_SESSION["AddCart"]))
				{
				$varTotalAmount = 0;
				foreach($_SESSION["AddCart"] as $varName)
				{	
				 $varTotalAmount = ($varTotalAmount +	($varName[3] * $varName[4]));
			?>
            
                    <tr>
                        <td><?php echo $varName[0]; ?></td>
                        <td><img width="80" height="80" src="<?php echo $varName[2]; ?>" class="img-responsive"></td>
                        <td><?php echo $varName[1]; ?></td>
                        <td><?php echo $varName[3]; ?></td>
                        <td>
						
                        	<?php echo $varName[4]; ?>
                         	
                        </td>
                        <td align="right"><?php echo ($varName[3] * $varName[4]); ?></td>
                        
                    </tr>
            
            <?php
				}
				echo "<tr>";
					echo "<td colspan='5' align='right'>Total</td>";
					echo "<td align='right'>".$varTotalAmount."</td>";
					
					
				echo "</tr>";
				
				
				
			}
			?>
    
        </table>
        
        
        <?php
			if(isset($_SESSION["AddCart"]))
			{
					if(isset($_SESSION["userName"]))
					{
						$sqlQ = "select * from tbl_users where id = '".$_SESSION["userID"]."'";
						$resultUser = mysqli_query($conn,$sqlQ);
						$RecCount = mysqli_num_rows($resultUser);
						$rsRecordSet = mysqli_fetch_assoc($resultUser);
						if($RecCount > 0)
						{
							
			?>
            
            		<div class="container">
                    <form action="order.php" method="post">
                    	<div class="row">
                        	<h4>Customer Information</h4>
                        	<div class="col-lg-12">
                            	<div class="form-group">
									<label>First Name</label>
                                    <input type="text" readonly name="txtFirstName" value="<?php echo $rsRecordSet["first_name"]; ?>" class="form-control" />                                	
                                </div>
                                
                                <div class="form-group">
									<label>Last Name</label>
                                    <input type="text" readonly name="txtLastName" value="<?php echo $rsRecordSet["last_name"]; ?>" class="form-control" />                                	
                                </div>
                                
                                
                                <div class="form-group">
									<label>Email</label>
                                    <input type="text" readonly name="txtEmail" value="<?php echo $rsRecordSet["email"]; ?>" class="form-control" />                                	
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                        	<h4>Shipping Information</h4>
                        	<div class="col-lg-12">
                            	<div class="form-group">
									<label>Name</label>
                                    <input type="text"  name="txtName" value="" class="form-control" />                                	
                                </div>
                                
                                <div class="form-group">
									<label>Number #</label>
                                    <input type="text"  name="txtNumber" value="" class="form-control" />                                	<input type="hidden" value="<?php echo $rsRecordSet["email"]; ?>" name="txtEML" required class="form-control" />
                                </div>
                                
                                
                                <div class="form-group">
									<label>Address</label>
                                    <input type="text"  name="txtAddress" value="" class="form-control" />                                	
                                </div>
                            </div>
                            
                            <input type="submit" value="Order" name="btnOrder" class="btn btn-success pull-right" />
                        </div>
                        
                        
                        
                        
                        </form>
                        
                    </div>
                    
          <?php  
						}
					}
					else
					{
					?>
                    
                    
                    <div class="row">
                    	<div class="col-md-4">
                        <form action="" method="post">
                        	<h4>Login Area</h4>
                        	<div class="form-group">
                            	<label>User Name</label>
                                <input type="text" name="txtUserName" class="form-control" />
                            </div>
                            <div class="form-group">
                            	<label>Password</label>
                                <input type="password" name="txtPass" class="form-control" />
                            </div>
                            <div class="form-group">
                            	
                                <input type="submit" value="Login" name="btnLogin" class="btn btn-success pull-right" />
                            </div>
                            
                             <div class="form-group">
                            	
                                <a href="register.php">For New User Signup</a>
                            </div>
                            
                            </form>
                        </div>
                        
                        
                        <div class="col-md-8">
                       	<form action="order.php" method="post">
                        	<h4>Guest User [Shipping Address]</h4>
                        	<div class="form-group">
                            	<label>Your name</label>
                                <input type="text" name="txtName" required class="form-control" />
                            </div>
                            <div class="form-group">
                            	<label>Contact Number</label>
                                <input type="text" name="txtNumber" required class="form-control" />
                                 
                            </div>
                            
                             <div class="form-group">
                            	<label>Address</label>
                                <input type="text" name="txtAddress" required class="form-control" />
                            </div>
                            <div class="form-group">
                            	
                                <input type="submit" name="btnOrderP" required value="Order" class="btn btn-success pull-right" />
                            </div>
                            
                          </form>
                        </div>
                        
                        
                    </div>
                    	
                    
                    <?php	
						
					}
			}
		?>
        
    </div>
</div>

</body>
</html>