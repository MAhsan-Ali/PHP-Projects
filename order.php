<?php
session_start();
require_once "PHPMailer/PHPMailerAutoload.php";
include('config.php');

if(isset($_SESSION["AddCart"]) && !empty($_SESSION["AddCart"]))
{
	if(isset($_POST["btnOrder"]))
	{
		$varDate = date('d-M-Y');
		$varCustomerID = $_SESSION["userID"];
		$varOrderNo = $_SESSION["OrderNo"];
		$varEmail =$_POST["txtEML"];
		
		$varItems = "";
		foreach($_SESSION["AddCart"] as $varName)
		{
			
			$varProductID = $varName[0];
			$varProductName = $varName[1];
			$varPrice = $varName[3];
			$varQty = $varName[4];
			
			$varTotal = $varQty * $varPrice;
			
			$sqlOrder = "insert into tbl_order (customer_id,product_id,product_name,price,qty,dt,order_no) values('$varCustomerID','$varProductID','$varProductName','$varPrice','$varQty','$varDate','$varOrderNo')";
			$sqlResult = mysqli_query($conn,$sqlOrder);
			
			$varItems .= '<tr>
			<td>'.$varProductID.'</td>
			<td>'.$varProductName.'</td>
			<td>'.$varPrice.'</td>
			<td>'.$varQty.'</td>
			<td>'.$varTotal.'</td>
			</tr>';
						
		}
		
		
			$varShipName = $_POST["txtName"];
			$varShipNumber = $_POST["txtNumber"];
			$varShipAddress = $_POST["txtAddress"];
		
		
			$sqlOrderShipp = "insert into tbl_order_shipping (customer_id,order_no,dt,c_name,nmbr,addrs) values('$varCustomerID','$varOrderNo','$varDate','$varShipName','$varShipNumber','$varShipAddress')";
			$sqlResultShip = mysqli_query($conn,$sqlOrderShipp);
			
			
			//==Email Process===================
				$mail = new PHPMailer;
				//Enable SMTP debugging. 
				//$mail->SMTPDebug = 3;                               
				//Set PHPMailer to use SMTP.
				$mail->isSMTP();            
				//Set SMTP host name                          
				$mail->Host = "smtp.gmail.com";
				//Set this to true if SMTP host requires authentication to send email
				$mail->SMTPAuth = true;                          
				//Provide username and password     
				$mail->Username = "aptech1.nn@gmail.com";                 
				$mail->Password = "ASHRAF@19";                           
				//If SMTP requires TLS encryption then set it
				$mail->SMTPSecure = "tls";                           
				//Set TCP port to connect to 
				$mail->Port = 25;                                   
				
				$mail->From = "aptech1.nn@gmail.com";
				$mail->FromName = "My Cart";
				
				$mail->addAddress("batchaptech@gmail.com", "My Cart");
				$mail->AddCC($varEmail,'');
				
				$mail->isHTML(true);
				
				$mail->Subject = "Order #: [ ".$varOrderNo." ]";
				$mail->Body = "<h3>Products Info:</h3>
				<table border=1>
				<tr>
				<td>Code</td>
				<td>Name</td>
				<td>Price</td>
				<td>Qty</td>
				<td>Total</td>
				</tr>
				$varItems
				</table>
				<h3>Shipping Info:</h3>
				<table border='1'>
				
				<tr><td>Name</td><td>".$varShipName."</td></tr>
				<tr><td>Number#:</td><td>".$varShipNumber."</td></tr>
				<tr><td>Address:</td><td>".$varShipAddress."</td></tr>
				
				</table>";
				
				$mail->AltBody = "This is the plain text version of the email content";
				$mail->send();		
			//==End Email Process===================
			
			
			
			
			
			
			
			unset($_SESSION["AddCart"]);
			unset($_SESSION["OrderNo"]);
			
			echo "Order Successfully Processed";
			
			
			
			
			
	}
}




//=============================================================================

if(isset($_SESSION["AddCart"]) && !empty($_SESSION["AddCart"]))
{
	if(isset($_POST["btnOrderP"]))
	{
		$varDate = date('d-M-Y');
		$varOrderNo = $_SESSION["OrderNo"];
		
		foreach($_SESSION["AddCart"] as $varName)
		{
			
			$varProductID = $varName[0];
			$varProductName = $varName[1];
			$varPrice = $varName[3];
			$varQty = $varName[4];
			
			
			
			$sqlOrder = "insert into tbl_order (customer_id,product_id,product_name,price,qty,dt,order_no) values('GUEST','$varProductID','$varProductName','$varPrice','$varQty','$varDate','$varOrderNo')";
			$sqlResult = mysqli_query($conn,$sqlOrder);
						
		}
		
			$varShipName = $_POST["txtName"];
			$varShipNumber = $_POST["txtNumber"];
			$varShipAddress = $_POST["txtAddress"];
		
		
			$sqlOrderShipp = "insert into tbl_order_shipping (customer_id,order_no,dt,c_name,nmbr,addrs) values('GUEST','$varOrderNo','$varDate','$varShipName','$varShipNumber','$varShipAddress')";
			$sqlResultShip = mysqli_query($conn,$sqlOrderShipp);
			
			unset($_SESSION["AddCart"]);
			unset($_SESSION["OrderNo"]);
			
			echo "Order Successfully Processed";
			
	}
}

?>