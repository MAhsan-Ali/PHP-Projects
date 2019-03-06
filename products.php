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
    	<?php
			$sqlProduct = "select * from tbl_products where sub_catID = '".$_GET["id"]."'";
			$rsltPrd = mysqli_query($conn,$sqlProduct);
			while($rsProducts = mysqli_fetch_assoc($rsltPrd ))
			{
		?>
       
        <div class="col-md-3" style="border:1px solid #999; box-shadow:3px 5px 3px #CCCCCC; border-radius:10px; padding:5px; margin-top:10px; margin-right:20px; margin-bottom:20px;">
        	<div>
            	<form action="cart.php" method="post">
                
            	<img src="<?php echo $rsProducts["img_url"]; ?>" class="img-responsive">
                <h4 style="text-align:center;"><?php echo $rsProducts["product_name"]; ?></h4>
                <p  style="text-align:center;">Rs: <?php echo $rsProducts["price"]; ?>/=</p>
                <!--Carts Fields-->
                 <input type="text" class="form-control" value="<?php echo $rsProducts["id"]; ?>" name="txtProductsCode" />
                <input type="text" class="form-control" value="<?php echo $rsProducts["product_name"]; ?>" name="txtProductsName" />
                
                <input type="text" class="form-control" value="<?php echo $rsProducts["img_url"]; ?>" name="txtProductsImage" />
                
                <input type="text" class="form-control" value="<?php echo $rsProducts["price"]; ?>" name="txtProductsPrice" />
                <input type="number" class="form-control" value="1" name="txtQty" />
                <!--Carts Fields-->
                
                
                
                <input type="submit" style="margin-top:5px;" class="btn btn-success" value="Add Cart" name="btnAddCart" />
                
                </form>
            </div>
        </div>
        
        
        
        <?php
			}
		?>
        
    </div>
</div>

</body>
</html>