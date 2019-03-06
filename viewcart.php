<?php
session_start();
include('config.php');
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
    	<h2 style="text-align:center; margin-top:70px;">View Cart</h2>
        <hr>
        
        <table class="table table-bordered table-responsive table-striped">
        	<tr style="background-color:#333; color:#FFF;">
            	<td>Code</td>
                <td>Image</td>
                <td>Name</td>
                <td>Price</td>
                <td>Qty</td>
                <td>Amount</td>
                <td>Action</td>
                
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
						<form action="cart.php" method="post">
                        	<input type="hidden" value="<?php echo $varName[0]; ?>" name="txtDelID" />
                         	<input type="number" value="<?php echo $varName[4]; ?>" name="txtQty" />
                            <input type="submit" name="btnUpdate" value="Update" class="btn btn-success" />
                            </form>
						
                        
                        
                        </td>
                        <td align="right"><?php echo ($varName[3] * $varName[4]); ?></td>
                         <td>
                         	<form action="cart.php" method="post">
                         	<input type="hidden" value="<?php echo $varName[0]; ?>" name="txtDelID" />
                            <input type="submit" name="btnDelete" value="Delete" class="btn btn-danger" />
                            </form>
                            
                            
                         </td>
                    </tr>
            
            <?php
				}
				echo "<tr>";
					echo "<td colspan='5' align='right'>Total</td>";
					echo "<td align='right'>".$varTotalAmount."</td>";
					echo "<td></td>";
					
				echo "</tr>";
				
				echo "<tr>";
					echo "<td><a role='button' class='btn btn-danger' href='emptycart.php'>EmptyCart</a></td>";
					
					echo "<td colspan='5'><a role='button' class='btn btn-primary' href='index.php'>Continue Shopping</a></td>";
					
					
					echo "<td><a role='button' class='btn btn-success' href='checkout.php'>CheckOut</a></td>";
					
				echo "</tr>";
				
			}
			?>
    
        </table>
        
    </div>
</div>

</body>
</html>