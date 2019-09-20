<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Viensdindin | <?php echo $page_title;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/global/favicon.png" type="image/x-icon">
  	<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/global/favicon.png">
	<!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,900" rel="stylesheet">
    <!-- links boostrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/bootstrap-grid.css" media="screen">
    <!-- links css personal -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/style_header.css">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/style_home.css">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/style_video.css">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/style_login.css">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/css/style_footer.css">
	<!-- links fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/fontawesome/css/font-awesome.min.css">
	<!-- script owlcarousel -->
	
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/js/OwlCarousel/assets/owl.carousel.css"/>
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/js/OwlCarousel/assets/owl.theme.default.css"/>
	<!--  -->
	<!-- links script -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/bootstrap.min.js" ></script>
	<style>
		.black_text{color:#000; background-color: #f3f3f3;}
		.blue_text{color: #0080ff;}
	</style>
</head>
<?php
$bg_color = "#272727";
if ($page_name == 'signup' || $page_name == 'signin' || $page_name == 'faq' ||
		$page_name == 'termsofuse' || $page_name == 'refundpolicy' ||
   			$page_name == 'youraccount' || $page_name== 'billinghistory'||
   				$page_name == 'emailchange' || $page_name== 'passwordchange'||
   					$page_name == 'cancelplan' || $page_name == 'purchaseplan')
    $bg_color = "#272727";
?>
<body style="background-color:<?php echo $bg_color;?>;">
<?php include ($page_name . '.php');?>


<!-- script js -->
<script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/jquery.js" ></script>
<script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/js/OwlCarousel/owl.carousel.js" ></script>
<script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/app.js" ></script>
</body>
</html>
