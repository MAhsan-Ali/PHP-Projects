<?php
session_start();

if(isset($_POST["btnUpdate"]))
{
	$varID = $_POST["txtDelID"];
	$varQty = $_POST["txtQty"];
	
	$countIndexItemNumber = 0;
	foreach($_SESSION["AddCart"] as $varItem)
	{
		if($varItem[0]  == $varID)
		{
			$_SESSION["AddCart"][$countIndexItemNumber][4] = $varQty;
			
		}
		$countIndexItemNumber++;
	}
	
	
	header('Location: viewcart.php');
}
?>