<?php

require_once '../functions/connect.php';

?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration of players</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="../apple-touch-icon.png">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/transitions.css">
	<link rel="stylesheet" href="../css/prettyPhoto.css">
	<link rel="stylesheet" href="../css/swiper.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/owl.theme.css">
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/customScrollbar.css">
	<link rel="stylesheet" href="../css/icomoon.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/color.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Mobile Menu Start
		*************************************-->
		<!--************************************
				Mobile Menu End
		*************************************-->
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="container">
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
					<div class="row">
						<div class="tg-topbar tg-haslayout">
							<nav id="tg-topaddnav" class="tg-topaddnav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-addnavigationm-mobile">
										<i class="fa fa-arrow-right"></i>
									</button>
								</div>
								<div id="tg-addnavigationm-mobile" class="tg-addnavigationm-mobile collapse navbar-collapse">
									<div class="tg-colhalf pull-right">
										<nav class="tg-addnav">
											<ul>
												
												<li>
													<a id="tg-btn-search" href="javascript:void(0)"><i class="fa fa-search"></i></a>
												</li>
											</ul>
										</nav>
									</div>
									<div class="tg-colhalf">
										<nav class="tg-addnav1">
											<ul>
												<li>
                                                    <a href="javascript().html" data-toggle="modal" data-target="#tg-login"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a>
                                                </li>
												<li>
											</ul>
										</nav>
									</div>
								</div>
							</nav>
						</div>
						<nav id="tg-nav" class="tg-nav brand-center">
							<div class="navbar-header">
								<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigationm-mobile">
									<i class="fa fa-bars"></i>
								</button>-->
								<strong class="tg-logo">
									<a href="index-2.html"><img src="../images/logo.png" alt="image description"></a>
								</strong>
							</div>
							<div id="tg-navigation" class="tg-navigation">
								<div class="tg-colhalf">
                                    
                                </div>
                                <div class="tg-colhalf">

                                </div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Banner Start
		*************************************-->
		<div class="tg-banner tg-haslayout">
			<div class="tg-imglayer">
				<img src="../images/bg-pattran.png" alt="image desctription">
			</div>
			<div class="container">
				<div class="row">
					<div class="tg-banner-content tg-haslayout">
						<div class="tg-pagetitle">
							<h1>Welcome <?php ?></h1>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Banner End
        *************************************-->
        		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
            <div class="form-group text-center select-entries" style="margin-bottom:15px;">
                <button class="btn btn-info">Junior Entries</button>
                <button class="btn btn-primary">Junior Doubles</button>
                <button class="btn btn-success">Seniors Entries</button>
                <button class="btn btn-warning">Senior Doubles</button>
                <!--<button class="btn btn-warning">All Entries</button>-->
            </div>
            <div class="container-fluid">
                <div class="row"style="margin-left:15px; margin-right:15px;">
                    <div class="Junior Entries">
                        <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover">
                        <div class="tg-section-heading text-center"><h2>Junior Entries</h2>
                            <thead>
                                <tr>
                                    <th>AC nunumber</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Assoc</th>
                                    <th>Club</th>
                                    <th>ID Number</th>
                                    <th>U13 Boys</th>
                                    <th>U13 Girls</th>
                                    <th>U15 Boys</th>
                                    <th>U15 Girls</th>
                                    <th>U18 Boys</th>
                                    <th>U18 Girls</th>
                                    <th>Payment Ref</th>
                                    <th>Pop</th>
                                    <th>Approve</th>
                                    <th>Complete</th>

                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                        <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                </tbody>
                        </table>
                        </div>
                            </div>
                </div>
                    <div class="Junior Doubles">
                        <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover">
                        <div class="tg-section-heading text-center"><h2>Junior Doubles</h2>
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Paring</th>
                                    <th>Surname1</th>
                                    <th>Surname2</th>
                                    <th>Team</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                        <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="Seniors Entries">
                    <div class="table-responsive">
                    <table class="table table-striped table-condensed table-hover">
                    <div class="tg-section-heading text-center"><h2>Seniors Entries</h2>
                            <thead>
                                <tr>
                                <th>AC nunumber</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Assoc</th>
                                    <th>Club</th>
                                    <th>ID Number</th>
                                    <th>Women</th>
                                    <th>Mens</th>
                                    <th>Payment Ref</th>
                                    <th>Pop</th>
                                    <th>Approve</th>
                                    <th>Complete</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                        <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    </div>
                        <div class="Senior Doubles">
                        <div class="table-responsive">
                        <table class="table table-striped table-condensed table-hover">
                        <div class="tg-section-heading text-center"><h2>Senior Doubles</h2>
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Paring</th>
                                    <th>Surname1</th>
                                    <th>Surname2</th>
                                    <th>Team</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                        <tr>
                                        <td>1</td>
                                        <td>w</td>
                                        <td>a</td>
                                        <td>e</td>
                                        <td>t</td>
                                    </tr>
                                </tbody>
                        </table>
</div>
                        </div>
            </div>
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">

			<div class="tg-footerbar">
				<div class="container">
					<span class="tg-copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></span>
					<nav class="tg-footernav">
						<ul>
							<li><a href="#">Main</a></li>
							<li><a href="#">Team</a></li>
							<li><a href="#">Buy Tickets</a></li>
							<li><a href="#">Match Results</a></li>
							<li><a href="#">Upcoming Matches</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<!--************************************
			Search Start
	*************************************-->
	<div class="tg-searchbox">
		<a id="tg-close-search" class="tg-close-search" href="javascript:void(0)"><span class="fa fa-close"></span></a>
		<div class="tg-searcharea">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<form class="tg-form-search">
							<fieldset>
								<input type="search" class="form-control" placeholder="keyword">
								<i class="icon-icon_search2"></i>
							</fieldset>
						</form>
						<p>Start typing and press Enter to search</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--************************************
			Search End
	*************************************-->
	<!--************************************
		LightBoxes Start
	*************************************-->

	<!--************************************
		LightBoxes End
	*************************************-->
	<script src="../js/vendor/jquery-library.js"></script>
	<script src="../js/vendor/bootstrap.min.js"></script>
	<script src="../js/customScrollbar.min.js"></script>
	<script src="../js/owl.carousel.js"></script>
	<script src="../js/isotope.pkgd.js"></script>
	<script src="../js/prettyPhoto.js"></script>
	<script src="../js/swiper.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/countTo.js"></script>
	<script src="../js/appear.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$(function (){
    "use strict";
	$('.registers').hide();

	$('.juniors').click(function(){
		$('.registers').show();
		$('.junior').show();
		$('.senior').hide();
	});

	$('.seniors').click(function(){
		$('.registers').show();
		$('.junior').hide();
		$('.senior').show();
	});
	})();
	</script>
</body>
</html>        