<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Events || FLA</title>
        <meta name="description" content="flacademy">
        <meta name="keyword" content="flacademy,school,kinshasa,education,english shool,google,yahoo,bing,children,level,mission">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href="http://allfont.net/allfont.css?fonts=montserrat-light" rel="stylesheet" type="text/css" />
		<!--linearicons font-->
		<link rel="stylesheet" href="css/linearfont.css">
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- meanmenu CSS
		============================================ -->		
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
		<!-- Nivo Slider CSS -->
		<link rel="stylesheet" href="css/nivo-slider.css">
		<!-- Add venobox css -->
		<link rel="stylesheet" href="venobox/venobox.css"> 
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="css/main.css">
		<!-- Nivo Slider CSS -->
		<link rel="stylesheet" href="css/nivo-slider.css">		
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/lightbox.css" rel="stylesheet">
		<!-- modernizr JS
		============================================ -->		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!--start header  area --> 
	<?php require_once('header.php'); ?>
    <!--end header  area --> 
    <!--Start nav  area --> 
	<?php 
		require_once('menu.php');
	?>
	<!--end mobile menu  area -->	
    <!--Start about title  area --> 

    <!--Start about  area --> 
	<div class="about_area page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h3 class="module-title about_titlea">
						  Our <span>previous events</span>
						</h3>
					</div>
				</div>
			</div>		
			<div class="row">
			    
			    <a href="events/1.jpg" data-lightbox="roadtrip" data-title="My caption" class="col-md-3"><img src="events/1.jpg"></a>
			    
			    <?php
			        for($i = 2; $i<=99;$i++){
			            ?>
			                
			                    
			                    <!--<img src="events/<?php echo $i ?>.jpg" class="img-responsive">-->
			                    <a href="events/<?php echo $i ?>.jpg" data-lightbox="roadtrip" class="col-md-3"><img src="events/<?php echo $i ?>.jpg"></a>
			                
			            <?php
			        }
			    ?>
			</div>
		</div>
	</div>
	<!--end about  area -->	
	<!--start banar  area -->	

	<!--end banar  area -->	
	<!--start share  area -->
	
	<!--start offer  area -->
	
	<!--end offer  area -->
	<!-- breadcrumb-area start -->
	
	<!-- breadcrumb-area end -->	
	<!-- footer  area -->	
	<?php require_once('footer.php'); ?>
		<!-- jquery
		============================================ -->		
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="js/wow.min.js"></script>
		 <!-- Nivo Slider JS -->
		<script src="js/jquery.nivo.slider.pack.js"></script> 		
		<!-- meanmenu JS
		============================================ -->		
        <script src="js/jquery.meanmenu.min.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Apple TV Effect -->
        <script src="js/atvImg-min.js"></script>
		<!-- Add venobox js -->
		<script type="text/javascript" src="venobox/venobox.min.js"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="js/main.js"></script>
        <script src="js/lightbox.js"></script>
        <script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>
    </body>
</html>