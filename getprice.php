<?php
//echo "Value is".$_POST['treatment_id'];
$treatment_id = $_POST['treatment_id'];
$area = $_POST['area_val'];
$treatment = $_POST['treatment'];
require_once("library.php");

if($area == 'zone'){
$result=mysql_query("select price from treatment_type where treatment_id='$treatment_id' and treatment_type='$treatment'");
while($row=mysql_fetch_array($result))
     {     	
       echo $row['price'];             
     }	
	}
	else{
		$result=mysql_query("select price_outside from treatment_type where treatment_id='$treatment_id' and treatment_type='$treatment'");
		while($row=mysql_fetch_array($result))
     {     	
       echo $row['price_outside'];             
     }
		}
             
     exit;
?>