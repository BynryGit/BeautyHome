<?php
//echo "Value is".$_POST['treatment_id'];
$treatment_id = $_POST['treatment_id'];
//$area = $_POST['area_val'];
require_once("library.php");

$result=mysql_query("select treatment_type from treatment_type where treatment_id='$treatment_id'");
     while($row=mysql_fetch_array($result))
     {     	
       echo "<option>".$row['treatment_type']."</option>";             
     }        
     exit;
?>