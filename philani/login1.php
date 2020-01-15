<?php 
	require ("connection/connection.php");
	if(isset($_SESSION['email']))
	{?>
    <script type="text/javascript">
    	window.location = "index1.php";
    </script>
	<?php }
?>
<!DOCTYPE html>
<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Arnold Classic 2019 Login</title>
		<meta name="description" content="">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<!-- Place favicon.ico in tde root directory -->
		<link rel="shortcut icon" type="image/x-icon" href="../gctta_revamp/images/fav.png">    
		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="../gctta_revamp/css/bootstrap.min.css">
		<!-- font-awesome css -->
		<link rel="stylesheet" href="../gctta_revamp/css/font-awesome.min.css">
		<!-- animate css -->
		<link rel="stylesheet" href="../gctta_revamp/css/animate.css">
		<!-- Main Menu css -->
		<link rel="stylesheet" href="../gctta_revamp/css/rsmenu-main.css">
		<!-- rsmenu transitions css -->
		<link rel="stylesheet" href="../gctta_revamp/css/rsmenu-transitions.css">
		<!-- hover-min css -->
		<link rel="stylesheet" href="../gctta_revamp/css/hover-min.css">
		  <!-- magnific-popup css -->
		<link rel="stylesheet" href="../gctta_revamp/css/magnific-popup.css">
		<!-- owl.carousel css -->
		<link rel="stylesheet" href="../gctta_revamp/css/owl.carousel.css">
		<!-- style css -->
		<link rel="stylesheet" href="../gctta_revamp/style.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="../gctta_revamp/css/responsive.css">
		<!-- modernizr js -->
		<script src="../gctta_revamp/js/modernizr-2.8.3.min.js"></script>
	</head>
	<body class="home-two">
		<!--Preloader start here-->
		<div id="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
		<!--Preloader area end here-->
        
		<!--Header area start here-->
		<header class="header-inner-page">
			<div class="header-top-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
							<div class="header-top-left">                            
								<ul>
									<li><a href="mailto:info@gctta.co.za"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@gctta.co.za</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<div class="social-media-area">
								<nav>
									<ul>
										<li><a href="#" class="active"><i class="fa fa-facebook"></i></a></li>
										<li class="log"><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li> 
										<li class="sign"><a href="#"><span>/</span> Sign Up</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div> 
				</div>
			</div>
			<div class="header-middle-area menu-sticky">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-sm-12 col-xs-12 logo">
							<a href="../gctta_revamp/index.html"><img src="../gctta_revamp/images/logo.png" alt="logo"></a>
						</div>
						<div class="col-md-10 col-sm-12 col-xs-12 mobile-menu">
				            <div class="main-menu">
								<a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <!-- Home -->
                                        <li>
                                            <a href="../gctta_revamp/index.html">Home</a>
                                        </li>
                                         <!-- End Home -->
                                        <li class="menu-item-has-children">
                                            <a href="#">Leagues</a>
                                            <ul class="sub-menu">
                                                <li><a href="../gctta_revamp/result.html">Results</a></li> 
                                                <li><a href="../gctta_revamp/fixtures.html">Fixtures</a></li>
                                            </ul>
                                        </li>
                                        <!-- Drop Down -->
                                        <li class="menu-item-has-children">
                                            <a href="#">Clubs</a>
                                            <ul class="sub-menu">
                                               <li><a href="../gctta_revamp/anchors.html">Anchors</a></li>  
                                               <li><a href="../gctta_revamp/bluefount.html">Blue Fountains</a></li> 
                                               <li><a href="../gctta_revamp/flames.html">Flames</a></li> 
                                               <li><a href="../gctta_revamp/maccabi.html">Maccabi</a></li> 
                                               <li><a href="../gctta_revamp/queens.html">Queens</a></li> 
                                               <li><a href="../gctta_revamp/raiders.html">Raiders</a></li>
                                               <li><a href="../gctta_revamp/rivonia.html">Rivonia</a></li>
                                               <li><a href="../gctta_revamp/soweto.html">Soweto</a></li>
                                               <li><a href="../gctta_revamp/wits.html">Wits</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#">News</a>
                                            <ul class="sub-menu">
                                                <li><a href="../gctta_revamp/blog.html">News</a></li>
                                                <li><a href="gallery.html">Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../gctta_revamp/links.html">Links</a></li>
                                        <li><a href="../gctta_revamp/tournaments.html">Tournaments</a></li>
                                        <li><a href="../gctta_revamp/contact.html">Contact</a></li>
                                    </ul>
                               </nav>
						  </div>
					  </div>
					</div>
				</div>
			</div>
		</header>
		<!--Header area end here-->
		        <!-- Breadcrumbs Section Start -->
		<div class="rs-breadcrumbs sec-color">
              <img src="../gctta_revamp/images/breadcrumbs/tournaments-header.jpg" alt="Breadcrubs" />
            <div class="breadcrumbs-inner">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12 text-center">
    						<h1 class="page-title">Login</h1>
    						<ul>
    							<li>
    								<a class="active" href="index.html">Home</a>
    							</li>
    							<li>Login</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->

<!-- Header -->
<header >
  <p>&nbsp;</p>
  
  
</header>
	<?php if(!isset($_GET['reg'])){; ?>
	
<div class="w3-content"  style="width:100%; margin-left:20%;margin-rigt:auto">
  <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
	<div class="container">
	        <span style="margin-left:23%">Login</span>
	<form action="controller/login_reg.php" method="post">
        <div class="col-md-12 w3-responsive w3-centered text-center" style="top:10px; margin-bottom:10px;text-align:center;">
            <div style="border-radius:2%; padding:10px; text-align:center; margin-right:auto; margin-left:auto" class="col-md-6 form-group text-center" style="border-color:grey;">
                <input name="email" required style="margin-left:0%;border-color:grey;" type="email" class="form-control col-md-12 text-center btn" placeholder="Enter Email">
                <input name="password" required style="margin-left:0%; margin-top:2%;border-color:grey;" type="password" class="form-control col-md-12 text-center btn" placeholder="Enter Password">
                <br/>
                <input name="login" style="margin-left:0%; margin-top:2%" value="Login" type="submit" class="form-control col-md-12 text-center btn btn-sm btn-info" style="background-color:#f44336;">
                <br/><a href="login1.php?reg">Don't have an account? Register here</a>
            </div>
        </div>
    </form>
</div>
</div>
</div>


    <?php }else{ ?>
    <div class="w3-content">
  <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
    <form action="controller/login_reg.php" method="post">
        <div class="col-md-12 w3-responsive w3-centered text-center" style="top:10px; margin-bottom:10px; padding:10px;">
             <h3>Register</h3>
            <div style="border-radius:2%; padding:10px; margin-right:auto; margin-left:auto" class="col-md-6 form-group text-center">
            	<input name="name" type="text" class="form-control col-md-12 text-center" placeholder="Enter Name" style="border-color:grey;"><br/>
                <input name="surname" type="text" class="form-control col-md-12 text-center" placeholder="Enter Surname" style="border-color:grey;"><br/>
                <input name="club_name" type="text" class="form-control col-md-12 text-center" placeholder="Enter Club Name" style="border-color:grey;"><br/>
                <input name="email" type="email" class="form-control col-md-12 text-center" placeholder="Enter Email" style="border-color:grey;"><br/>
                <input name="password" type="password" class="form-control col-md-12 text-center" placeholder="Enter Password" style="border-color:grey;"><br/>
                <input name="register" style="margin-left:0%" value="Register" type="submit" class="form-control col-md-12 text-center btn btn-sm btn-info" style="background-color:#f44336;">
                <br><a href="login1.php">Already have an account? Login here</a>
            </div>
        </div>
    </form>
    <?php } ?>
</div>

</div>
		<!-- Footer Start -->
        <footer id="footer-section" class="footer-section">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
						<h4 class="footer-title">Notice</h4>
                            <div class="about-widget">
                                <p>Keep checking on the website for open tournaments and do not forget to register in time!</p>
                                <p class="margin-remove">For the love of Table Tennis</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">Recent Posts</h4>
                            <div class="recent-post-widget">
                                <div class="post-item">
                                    <div class="post-date">
                                        <span>17</span>
                                        <span>May</span>
                                    </div>
                                    <div class="post-desc">
                                        <h3 class="post-title"><a href="../tournaments.html">Arnold Classic 2019</a></h3>
                                        <span class="post-category"></span>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-date">
                                        <span>22</span>
                                        <span>April</span>
                                    </div>
                                    <div class="post-desc">
                                        <h3 class="post-title"><a href="blog-single.html">Season 1 League Results</a></h3>
                                        <span class="post-category"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">Useful Links</h4>
                            <ul class="sitemap-widget">
                                <li class="active"><a href="..index.html">Home</a></li>
                                <li><a href="../results.html">Leagues</a></li>
                                <li><a href="../clubs.html">Clubs</a></li> 
                                <li><a href="../tournaments.html">Tournaments</a></li> 
                                <li><a href="../contact.html">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">newsletter</h4>
                            <form class="footer-subscribe">
	                            <input type="text" class="form-input" placeholder="Name">
	                            <input type="email" class="form-input" placeholder="Email">
	                            <input type="submit" class="form-input" value="Send">
	                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="copyright">
                                <p>&copy; 2019 <a href="https://gctta.co.za" target="_blank">GCTTA</a>. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <div class="text-right ft-bottom-right">
                                <div class="footer-bottom-share">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End --> 
        
        <!-- Search Modal Start Here -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="eg: Soccer News" type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End Here -->
        
		<!-- Start scrollUp  -->
		<div id="return-to-top">
			<span>Top</span>
		</div>
		<!-- End scrollUp  -->

		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="../gctta_revamp/js/jquery.min.js"></script>
		<!-- Menu js -->
		<script src="../gctta_revamp/js/rsmenu-main.js"></script> 
		 <!-- jquery-ui js -->
		<script src="../gctta_revamp/js/jquery-ui.min.js"></script>
		<!-- bootstrap js -->
		<script src="../gctta_revamp/js/bootstrap.min.js"></script>
		<!-- meanmenu js -->
		<script src="../gctta_revamp/js/jquery.meanmenu.js"></script>
		<!-- wow js -->
		<script src="../gctta_revamp/js/wow.min.js"></script>
		<!-- Slick js -->
		<script src="../gctta_revamp/js/slick.min.js"></script>
		<!-- masonry js -->
		<script src="../gctta_revamp/js/masonry.js"></script>
		<!-- magnific-popup js -->
		<!-- owl.carousel js -->
		<script src="../gctta_revamp/js/owl.carousel.min.js"></script>
		<script src="../gctta_revamp/js/time-circle.js"></script>
		<!-- magnific-popup js -->
		<script src="../gctta_revamp/js/jquery.magnific-popup.js"></script>
		<!-- main js -->
		<script src="../gctta_revamp/js/main.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-17916081-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
