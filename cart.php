<?php
session_start();
include('config.php');



//For AddToCart 
if(isset($_POST["btnAddCart"]))
{
			
		$varProductCode = $_POST["txtProductsCode"];
		$varProductName = $_POST["txtProductsName"];
		$varProductImage = $_POST["txtProductsImage"];
		$varProductPrice = $_POST["txtProductsPrice"];
		$varProductQty = $_POST["txtQty"];
		
		if(!isset($_SESSION["AddCart"]) && !empty($_SESSION["AddCart"]))
		{
			$_SESSION["AddCart"][$varProductCode] = array($varProductCode,$varProductName,$varProductImage,$varProductPrice,$varProductQty);
						
		}
		else
		{
			$_SESSION["AddCart"][$varProductCode] = array($varProductCode,$varProductName,$varProductImage,$varProductPrice,$varProductQty);
		}
						
		header('Location: viewcart.php');
}
///////////////////////



//for Update Cart
if(isset($_POST["btnUpdate"]))
{
	$varP_Id = $_POST["txtDelID"];
	$varP_Qty = $_POST["txtQty"];
	if($varP_Id == $_SESSION["AddCart"][$varP_Id][0])
	{
		$_SESSION["AddCart"][$varP_Id][4] = $varP_Qty;
	}
	
	header('Location: viewcart.php');
}

///=================

if(isset($_POST["btnDelete"]))
{
	$var_PID = $_POST["txtDelID"];
	if($var_PID == $_SESSION["AddCart"][$var_PID][0])
	{
		
		unset($_SESSION["AddCart"][$var_PID]);
	}
	
	header('Location: viewcart.php');
	
}


?>
            
            
           
            
            
    
       