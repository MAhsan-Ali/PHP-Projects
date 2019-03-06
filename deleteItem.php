<?php
session_start();
//echo $_SESSION["AddCart"][0][1];
//var_dump($_SESSION["AddCart"]);
//echo $_SESSION["AddCart"][1][1];
//unset($_SESSION["AddCart"][0]);
if(isset($_POST["btnDelete"]))
{
	
	$varID = $_POST["txtDelID"];
	
	$countIndexItemNumber = 0;
	foreach($_SESSION["AddCart"] as $varItem)
	{
		
		//echo $varItem[0] ."<br>";
		//echo $varID ."abc<br>";
		
		if($varItem[0]  == $varID)
		{
			//echo "done<br>";
			unset($_SESSION["AddCart"][$countIndexItemNumber]);
			break;
		}
		
		
		$countIndexItemNumber++;
	}
	
	
	//header('Location: viewcart.php');
}
?>