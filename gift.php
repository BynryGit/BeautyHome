<?php
		require ('library.php'); 
        $query = mysql_query("SELECT * FROM voucher_purchases where voucher_code ='".$_REQUEST["product_id"]."'");
        if($query==FALSE) {
        		die(mysql_error());
        	}        	
        while ($row = mysql_fetch_array($query)) {
          
          $order_date = $row['order_date'];
			$exp_date = date("d/m/y", strtotime("+ 365 day"));          
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title>Mobile Beauty Services in London | Beauty Home</title>
<meta name="description" content="One stop mobile beauty shop for all waxing, facial, massage, nails, hair, tan & men treatments from expert therapists in London">
<meta name="author" content="tungsten5" >
<meta name="robots" content="index, follow">
<meta name="keywords" content="comfort,style,beauty,manicure amp,manicured,manicure pedicure,luxury manicure,express manicure,expertise manicure,
shellac manicure,therapist manicure,perfectly manicured,manicured nails,regular manicures,massage manicure,manicure pedicure waxing,beauty therapist manicure,
pedicure shellac manicure,hands perfectly manicured,facials massage manicure,holidays luxury manicure,massage,massages,massage facials,massage therapist,
swedish massage,waxing massage,tissue massage,head massage,shoulders massage,aromatherapy massage,massage treatments,massage table,
pregnancy massage,massage aromatherapy,regular massage,facials massage,relaxing massage,massage therapists,massage techniques,massage qualified,
massage specifications,shoulder massage,various massage,massage strokes,massage drink,massage destressing,massage treatment,shorter massage,
body massage,therapist massage,professional massage,expertise massage,men massage,spray tan,spary tanning,spray tan treatment,glow spray tan,
chin threading,threading eyebrows,threading lip,chin threading,amp chin threading,laser hair removal,epilator,hair removal,
pedicure waxing	waxing session	waxing massage	after waxing	waxing treatment	back waxing	waxing full	waxing chest	waxing price	waxing removes	waxing treatments	waxing specifications	waxing experience	latest waxing	waxing trends	booking waxing	manicure pedicure waxing	waxing massage facials	after waxing session	waxing any body	waxing price	waxing treatment tips">

<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-language" content="en">
<meta name="language" content="english"> 
<!-- Google Font Code -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800,800italic,300italic' rel='stylesheet' type='text/css'>

<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/loading.css">

<link rel="stylesheet" href="css/style1.css" media="screen"/>
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

<script src="js/modernizr.custom.63321.js"></script>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Favicon and Apple Icons -->
<link rel="shortcut icon" href="img/icons/favicon.ico">
<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icons/apple-touch-icon.png">

<style type="text/css" media="all">

body{
background-color: white;
}

#logo{
  margin-left:37%;
  width:34%;
}

#print_btn {
    color: #fff;
    background-color: #817C76 !important;
    border-color: #645F5A;
}

#print_btn:hover {
    color: #fff !important;
    background-color: #817C76 !important;
    border-color: #645F5A !important;
}

span{
color:#817C76 !important;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Open sans', Roboto, Arial;
  margin: 0;
  color: #817C76 !important;
  text-transform: none;
}

.certificate-section{
padding:1%;
}

h5{
color: #817C76;
line-height: 32px;
font-size: 1.286em;
}

b{
color: #817C76 !important;
}

.price_box{_
width: 50%;
}

.grey{
/*background-color: #ddd;*/
background: url('img/grey-bg.jpg') !important;
visibility: visible !important;
}
</style>

</head>

<body data-spy="scroll" data-offset="150">
<div style="padding:1%;" id="print" class="text-center">
<button id="print_btn" class="btn btn-primary">Print this page</button>
<!--<a href="http://www.web2pdfconvert.com/convert">Save to PDF</a>-->
</div>
<div id="gift-layout">
<div class="certificate-section">
<div class="row">
		<div id="logo" class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">		    
            <img class="img-responsive" src="img/logo.png" alt="Mobile Beauty Services London logo" /> 
       </div>
       
</div>
</div>  
<div class="">     
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-4">
<img class="img-responsive" src="img/gallery/gift1.jpg" alt="Mobile Beauty Services London blog">
</div>

<div class="col-md-4 col-sm-4 col-xs-4">
<img class="img-responsive" src="img/gallery/gift2.jpg" alt="Mobile Beauty Services London blog">
</div>

<div class="col-md-4 col-sm-4 col-xs-4">
<img class="img-responsive" src="img/gallery/gift3.jpg" alt="Mobile Beauty Services London blog">
</div> 
</div>
</div>
<div class="certificate-section">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<h2 class="text-center">Dear <?php echo $row['payer_name']; ?>, Welcome to BeautyHome!</h2>
<br>
<h4 class="text-center"><b>Voucher Code:</b> <?php echo $row['voucher_code']; ?></h4>
</div>
</div>
</div>
<div class="certificate-section">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-6">
<h2 style="text-align:center;">Amount</h2><br>
<h2 style="font-size: 5em;text-align:center;">&pound;<?php echo $row['voucher_value']; ?></h2>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 price_box">
<ul>
<li style="color:#817C76;"><h5>London's premier mobile beauty services</h5></li>
<li style="color:#817C76;"><h5>7 days a week, 9 AM to 9 PM</h5></li>
<li style="color:#817C76;"><h5>We treat you at your home or hotel</h5></li>
<li style="color:#817C76;"><h5>Wide range of beauty treatments</h5></li>
<li style="color:#817C76;"><h5>Friendly, inspired and qualified therapists</h5></li>
</ul>
</div>
</div>
</div>
<div class="certificate-section grey">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="pull-left">
<h5><b>To :</b> &nbsp;<?php echo $row['sender_name']; ?></h5>
<h5><b>Message :</b> &nbsp; <?php echo $row['voucher_message']; ?></h5>
<h5><b>From :</b> &nbsp;<?php echo $row['payer_name']; ?></h5>
<h5><b>Expiration Date :</b> &nbsp;<?php echo $exp_date; ?></h5>
</div>
</div>
</div>
</div>
<div class="certificate-section">
<div class="row">
<div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
<div>
<ul>
<li style="color:#817C76;"><h5>To redeem go to beautyhome.co.uk or call: +44 20 3794 4990 or email: info@beautyhome.co.uk</h5></li>
<li style="color:#817C76;"><h5>More than one voucher can be used for booking</h5></li>
<li style="color:#817C76;"><h5>Voucher cannot be exchanged for cash. By using this voucher you accept the T&Cs. Please visit beautyhome.co.uk for details</h5></li>
</ul>
</div>
</div>
</div>
</div>
<div style="padding:4px;" class="grey">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<h2 class="text-center">Thank you for choosing BeautyHome</h2>
</div>
</div>
</div>
</div>

<!--START SCRIPTS -->
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/wow.min.js"></script> 
<script src="js/placeholders.js"></script>
<script src="js/jquery.superslides.min.js" type="text/javascript"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/master.js"></script>

<script type="text/javascript">
	
$(function () {
  $('#print_btn').click(function(){		
  	$('#print_btn').hide();
  	window.print();
  	$('#print_btn').show();
  });
});

</script>

</body>
</html>
<?php
}
?>