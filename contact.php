<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact Us Page</title>
        <meta name="description" content="">
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
		<!-- modernizr JS
		============================================ -->		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!--start header  area --> 
	<?php require_once('header.php');
		  require_once('menu.php');
	?>
	<!--end mobile menu  area -->	
	<div class="map_area">
		<div class="container-fulid">
			<div class="map">
			   <!-- Start contact-map -->
					<div class="contact-map">
						<div id="googleMap"></div>
					</div>
				<!-- End contact-map -->
			</div>							
		</div>	
	</div>	
	<div class="contact_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<p class="lead">
							We are always here to hear from you.
						</p>
					</div>
				</div>
			</div>		
			<div class="row">
				<!-- start  blog left -->
				<div class="col-md-4 col-sm-4">
					<div class="contact-address">	
						<div class="media">
							<div class="media-left">
								<i class="fa fa-phone"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Phone</h4>
								<p>
									<span class="contact-emailto">+243-81-045-5774</span> <br>
									<span class="contact-emailto">+243-81-004-7880</span>
								</p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Email</h4>
								<p>
									<span class="contact-emailto"><a href="mailto:info@flacademy.cd">info@flacademy.cd</a></span>
								</p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Address</h4>
								<p>
									<span class="contact-emailto">
										No 1 Avenue de la Montagne Macampagne,  <br />
										Ngaliema.<br />
										Kinshasa D.R.Congo								
									</span>
								</p>
							</div>
						</div>							
					</div>				
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="contact_us">
					<form action="mail.php" method="post">
						<div class="form-group">
							<div class="col-md-4 col-sm-4">
								<p class="fnone"><label class="" for="Name">Name <em>*</em></label></p>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="i_box">									
									<input type="text" name="name" id="Name"/>								
								</div>						
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-sm-4">
								<p class="fnone"><label class="" for="Email">Email <em>*</em></label></p>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="i_box">									
									<input type="email" name="email" id="Email"/>							
								</div>						
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-sm-4">
								<p class="fnone"><label class="" for="mes">Message <em>*</em></label></p>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="i_box">									
									<textarea name="comment" id="mes" cols="30" rows="10"></textarea>							
								</div>						
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4 col-sm-4"></div>
							<div class="col-md-8 col-sm-8">
								<p class=""><button type="submit" name="ok" class="read_more buttonc">submit</button></p>
							</div>							
						</div>
					</form>
					</div>
				</div>			
			</div>
		</div>
	</div>	
	<!--end courses  area -->
	<!--start share  area -->
	
	<!-- breadcrumb-area end -->
	<!-- footer  area -->	
	<?php require_once('footer.php'); ?>
	<!-- end footer  area -->
	<!-- footer bottom area -->
	
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
		<!-- Add venobox js -->
		<script type="text/javascript" src="venobox/venobox.min.js"></script>
		<!-- Apple TV Effect -->
        <script src="js/atvImg-min.js"></script>		
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="js/main.js"></script>
        <!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-PkqupU_kiHrDstIekeoMNv5CWvp6Fh0"></script>
        <script>
            function initialize() {
              var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(-4.3601129,15.2516232)
              };

              var map = new google.maps.Map(document.getElementById('googleMap'),
                  mapOptions);


              var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation:google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
              });

            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>		
    </body>
</html>
