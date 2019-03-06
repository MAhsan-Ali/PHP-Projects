<div class="container">
		<nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">My Cart</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  
                  <?php
				  	$sqlCat = "select * from tbl_category";
					$result = mysqli_query($conn,$sqlCat);
					while($RsRecord = mysqli_fetch_assoc($result))
					{
				  ?>
                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php
							echo $RsRecord["cat_name"];
						?>
                        <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu">
                        
                        	<?php
								$sqlSubCat = "select * from tbl_sub_cat where cat_id = '".$RsRecord["id"]."'";
								$ResultSub = mysqli_query($conn,$sqlSubCat);
								while($RsSubRecord = mysqli_fetch_assoc($ResultSub))
								{
							?>
                          	
                            	<li><a href="products.php?id=<?php echo $RsSubRecord["id"] ?>"><?php echo $RsSubRecord["sub_cat_name"];  ?></a></li>
                         	<?php
								}
							?>
                         
                        </ul>
                        
                      </li>
                  
                   <?php
					}
				  ?>
                  
                  
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                 
                 
                 <?php
				 	if(isset($_SESSION["userName"]))
					{
					
				 ?>
                 
                  <li><a href="accounts.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["userName"]; ?></a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
                  
                  
                 <?php } else { ?> 
                 
                 
                 <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  
                  
                  <?php } ?> 
                  
                   <li><a href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> 
                   
                   <?php
				   	if(isset($_SESSION["AddCart"]) && !empty($_SESSION["AddCart"]))
					{
						echo "cart [ " . count($_SESSION["AddCart"]). " ]";
					}
					else
					{
						echo "cart[0]";
					}
				   ?>
                  
                   
                   
                   
                   </a></li>
   				 </ul>
                 
              </div>
			</nav>
</div>