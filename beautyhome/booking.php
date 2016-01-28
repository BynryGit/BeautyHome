<?php

///////////////// EDITABLE OPTIONS   /////////////////////

$receiving_email_address = "kumar.roy@tungstenbigdata.com";  // Set your email address here which you want to receive emails to

$receiving_email_address_name = "BeautyHome"; // Add name that is associated with your email address above.

$custom_subject = "BeautyHome: Customer Booking Details"; // Change the subject line of email as per your choice.


// =============================  DO NOT EDIT BELOW THIS LINE  ======================================


$area= $_POST['area'];
$name= $_POST['name'];
$time= $_POST['time'];
$date= $_POST['date'];
$email= $_POST['email'];
$address= $_POST['address'];
$phone= $_POST['phone'];
$promo= $_POST['promo'];
$postcode= $_POST['postcode'];
$list=$_POST['tlist'];
$comments=$_POST['comments'];
//$tlist=implode(" ",$list);

$last  = array_slice($list, -1);
$first = join(', ', array_slice($list, 0, -1));
$both  = array_filter(array_merge(array($first), $last));
$tlist = join(' and ', $both);


if ((isset($_POST['area'])) && (strlen(trim($_POST['area'])) > 0)) {
	$comment = stripslashes(strip_tags($_POST['area']));
} else {$phone = 'No area entered';}

/*if ((isset($_POST['treatment'])) && (strlen(trim($_POST['treatment'])) > 0)) {
	$comment = stripslashes(strip_tags($_POST['treatment']));
} else {$phone = 'No treatment entered';}


if ((isset($_POST['tlist'])) && (strlen(trim($_POST['tlist'])) > 0)) {
	$comment = stripslashes(strip_tags($_POST['treatment_type']));
} else {$phone = 'No treatment type entered';}
*/

if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}

if ((isset($_POST['promo'])) && (strlen(trim($_POST['promo'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['promo']));
} else {$name = 'No promo entered';}


if ((isset($_POST['postcode'])) && (strlen(trim($_POST['postcode'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['postcode']));
} else {$name = 'No postcode entered';}


if ((isset($_POST['address'])) && (strlen(trim($_POST['address'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['address']));
} else {$name = 'No address entered';}

if ((isset($_POST['phone'])) && (strlen(trim($_POST['phone'])) > 0)) {
	$phone = stripslashes(strip_tags($_POST['phone']));
} else {$phone = 'No phone entered';}

if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}

if ((isset($_POST['date'])) && (strlen(trim($_POST['date'])) > 0)) {
	$datetimepicker = stripslashes(strip_tags($_POST['date']));
} else {$datetimepicker = 'No date entered';}

if ((isset($_POST['time'])) && (strlen(trim($_POST['time'])) > 0)) {
	$datetimepicker = stripslashes(strip_tags($_POST['time']));
} else {$datetimepicker = 'No time entered';}

//ob_start();


// Email Building
$to 			= $receiving_email_address;
$email 			= $_POST['email'];
$fromaddress 	= $_POST['email'];
$fromname 		= $_POST['name'];
$body = "Booking Details: <br><br> Name:".$_POST['name']."
			<br><br>Area: ".$area."
			 <br><br>Address: ".$_POST['address']."
			 <br><br>Postcode: ".$_POST['postcode']."
			 <br><br>Date: ".$date."			
			 <br><br>Time: ".$time."
			 <br><br>Email: ".$email."
			 <br><br>Phone: ".$phone."			
			<br><br>Treatments: ".$tlist."
			<br><br>Comments: ".$comments."";
			 
// Check if the security is filled
//if ( $_POST['security'] == '' ) {

	require("phpmailer.php");
	$mail = new PHPMailer();
	
	$mail->From    					= "$email";
	$mail->FromName 			= "$fromname";
	$mail->AddAddress("$receiving_email_address","$receiving_email_address_name");
	
	$mail->IsHTML(true);
	
	$mail->Subject  				= "$custom_subject";
	$mail->Body     					= $body;
	$mail->AltBody 					= "This is the text-only body";
	
	if(!$mail->Send()) {
		$recipient 					= '$receiving_email_address';
		$subject 						= 'Contact form failed';
		$content						= $body;	
		
	  // Send Mail
	  mail($recipient, $subject, $content, "From: $receiving_email_address\r\nReply-To: $email\r\nX-Mailer: DT_formmail");	  
	}
	echo "Success!!";
	//header("Location: http://www.tungstenbigdata.com/testweb/beautyhome/index.html");
//}
?>
