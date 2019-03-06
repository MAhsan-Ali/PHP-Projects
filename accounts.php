<?php
session_start();
include('config.php');
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Online Shop</title>
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

<div class="container" style="border:1px solid #666; margin-top:100px;">
	<div class="row">
    	<div class="col-lg-2">
        
        	<div class="panel panel-default">
                <div class="panel-heading">Order History</div>
                
                <?php
					$varCustomerID = $_SESSION["userID"];
					$sqlOrders = "SELECT count(*), order_no FROM tbl_order where customer_id = '$varCustomerID' group by order_no ";
					$resultOder = mysqli_query($conn,$sqlOrders);
					while($rsRec = mysqli_fetch_assoc($resultOder))
					{
						
				?>
                	<a href="accounts.php?order_id=<?php echo $rsRec["order_no"]; ?>">
                	<div class="panel-body"><?php echo $rsRec["order_no"]; ?></div>
               		</a>
                
                <?php } ?>
  			</div>

        </div>
        
        <div class="col-lg-10">
        
        		<?php
				if(isset($_SESSION["userID"]) && !empty($_SESSION["userID"]) && isset($_GET["order_id"]) && !empty($_GET["order_id"]))
					{
					
						$varOrderIDShip = $_GET["order_id"];
						$sqlShip = "SELECT * from tbl_order_shipping where order_no = '$varOrderIDShip'"; 
						$rslOrdrShip = mysqli_query($conn,$sqlShip);
						$cntOrder = mysqli_num_rows($rslOrdrShip);
						$ShipRec = mysqli_fetch_assoc($rslOrdrShip);
						if($cntOrder > 0)
						{
							?>
                            <table class="table table-hover table-bordered table-responsive">
                                
                                <tr>
                                   <td style="background-color:#666; font-weight:bold;">Order Date: </td>
                                   <td><?php echo $ShipRec["dt"]; ?></td>
                                </tr>
                                
                                 <tr>
                                   <td style="background-color:#666; font-weight:bold;">Ship Name</td>
                                   <td><?php echo $ShipRec["c_name"]; ?></td>
                                </tr>
                                
                                 <tr>
                                   <td style="background-color:#666; font-weight:bold;">Conatct #: </td>
                                   <td><?php echo $ShipRec["nmbr"]; ?></td>
                                </tr>
                                
                                 <tr>
                                   <td style="background-color:#666; font-weight:bold;">Address:</td>
                                   <td><?php echo $ShipRec["addrs"]; ?></td>
                                </tr>
                            </table>
                            
                       <?php     
						}
					}
				?>
        
        	<table class="table table-hover table-bordered table-responsive">
            	
                <tr style="background-color:#666; font-weight:bold;">
                	<td>Code</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Qty</td>
                    <td>Amount</td>
                </tr>
               
               <?php
			   		if(isset($_SESSION["userID"]) && !empty($_SESSION["userID"]) && isset($_GET["order_id"]) && !empty($_GET["order_id"]))
					{
					
					$varOrderID = $_GET["order_id"];
					
					
			   		$sqlOrderRecords = "SELECT tbl_order.product_id as prdID, 
tbl_order.product_name as prdName,
tbl_order.price as prdPrice,
tbl_order.qty as prdQty,
tbl_order.dt as prdDate,
tbl_order_shipping.c_name as shipName,
tbl_order_shipping.nmbr as ShipNumber,
tbl_order_shipping.addrs as SHipAddress
FROM tbl_order
inner JOIN tbl_order_shipping
on tbl_order.order_no = tbl_order_shipping.order_no
WHERE tbl_order.order_no = '$varOrderID'";
		
			$rslOrdr = mysqli_query($conn,$sqlOrderRecords);
			while($Records = mysqli_fetch_assoc($rslOrdr))
			{
				
				?>
                
                
                 <tr>
                	<td><?php echo $Records["prdID"]; ?></td>
                    <td><?php echo $Records["prdName"]; ?></td>
                    <td><?php echo $Records["prdPrice"]; ?></td>
                    <td><?php echo $Records["prdQty"]; ?></td>
                    <td><?php echo ($Records["prdPrice"] * $Records["prdQty"]) ; ?></td>
                </tr>
                
  <?php              
				
			}

				

}
			   ?>
               
            </table>
        </div>
    </div>
</div>


</body>
</html>