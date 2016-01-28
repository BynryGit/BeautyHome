<html>
<head>	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800,800italic,300italic' rel='stylesheet' type='text/css'>

<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/loading.css">

<link rel="stylesheet" href="css/style1.css" />
<!--<link rel="stylesheet" href="css/style2.css" />-->
<!--<link rel="stylesheet" href="css/style3.css" />-->
<!--<link rel="stylesheet" href="css/style4.css" />-->
<!--<link rel="stylesheet" href="css/style5.css" />-->

<link rel="stylesheet" href="css/jquery.datetimepicker1.css">
<!--<link rel="stylesheet" href="css/jquery.datetimepicker2.css">-->
<!--<link rel="stylesheet" href="css/jquery.datetimepicker3.css">-->
<!--<link rel="stylesheet" href="css/jquery.datetimepicker4.css">-->
<!--<link rel="stylesheet" href="css/jquery.datetimepicker5.css">-->

<!-- <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/prettyPhoto.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	
<style type="text/css">
.about-section{
font-size: 20px;
}

.about-ther{
color:black;
}

#subscribe{
background: #817C76;
}


.page-block {
  padding: 6.5em 0 5.5em;
  background: #fff;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Open sans', Roboto, Arial;
  margin: 0;
  color: #61ad03;
  text-transform: uppercase;
}



a.top {
  display: none;
  color: #fff;
  text-align: center;
  padding: 0.8em 0.8em 1em 1.3em;
  -webkit-border-radius: 0.2em;
  -moz-border-radius: 0.2em;
  -ms-border-radius: 0.2em;
  border-radius: 0.2em;
  background: #352f2e;
  position: fixed;
  right: 1em;
  bottom: 1em;
  opacity: 0.8;
}



input[type=text], input[type=email], input[type=tel], textarea, input[type=number], input[type=datetime] {
    color: #817C76 !important;
}

#subscribe h4{
color:white;
}

#preloader{
		background-color:transparent;
		margin-top:35%;
}

</style>	
	</head>
<body>
<?php

///////////////// EDITABLE OPTIONS   /////////////////////

$receiving_email_address = "roykumar19@gmail.com";  // Set your email address here which you want to receive emails to

$receiving_email_address_name = "BeautyHome"; // Add name that is associated with your email address above.

$custom_subject = "Hello From BeautyHome"; // Change the subject line of email as per your choice.


// =============================  DO NOT EDIT BELOW THIS LINE  ======================================

if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}

if ((isset($_POST['phone'])) && (strlen(trim($_POST['phone'])) > 0)) {
	$phone = stripslashes(strip_tags($_POST['phone']));
} else {$phone = 'No phone entered';}

if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}

//if ((isset($_POST['datetimepicker'])) && (strlen(trim($_POST['datetimepicker'])) > 0)) {
//	$datetimepicker = stripslashes(strip_tags($_POST['datetimepicker']));
//} else {$datetimepicker = 'No email entered';}


if ((isset($_POST['comment'])) && (strlen(trim($_POST['comment'])) > 0)) {
	$comment = stripslashes(strip_tags($_POST['comment']));
} else {$phone = 'No comment entered';}
ob_start();


// Email Building
$to 			= $receiving_email_address;
$email 			= $_POST['email'];
$fromaddress 	= $_POST['email'];
$fromname 		= $_POST['name'];
$body = "Below are the details submitted by the user on your website.<br><br> Name: 
			 ".$_POST['name']."<br><br>Email: ".$_POST['email']."<br><br>Phone: ".$_POST['phone']."
			 <br><br>Comment: ".$_POST['comment']."";
			 
// Check if the security is filled
if ( $_POST['security'] == '' ) {

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
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12"></div>
	</div>	
	<section id="subscribe" class="page-block-small wow fadeInDown" style="margin-top:10%;" data-wow-offset="200" data-wow-delay="300ms">
	<div class="container">
		<div class="row">
        
        	<div class="col-md-12 col-sm-12 wow fadeInLeft" data-wow-offset="200" data-wow-delay="500ms">
				<h4 class="subscribeHeading" style="text-align:center;">Thank You for Contacting us!</h4><br>	
				<h5 style="text-align:center; color:#fff;">We will get back to you shortly.</h5>	
            </div>            
            
        </div><!-- end row -->
    </div><!-- end container -->
</section>
	<div id="preloader">
	<div class="loading">
        <ul class="spinner">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
   </div>
</div>
	<?php
	header('refresh:5; url=index.html');
	//header('Location:index.html');
//}
?>
</body>	
</html>