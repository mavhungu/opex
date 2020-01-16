<?php
	require_once '../functions/connect.php';
	 $id = uniqid();
	 
	 function juniors(){
		 global $con;

		 $q= mysqli_query($con,"select * from junior");
			while($row = mysqli_fetch_assoc($q)){
				$id = $row['junior_ac_number'];
				echo <<<_END
                <option value="$id">$id</option>
_END;
			}
	 };
	 function seniors(){
		global $con;

		$q= mysqli_query($con,"select * from junior");
		   while($row = mysqli_fetch_assoc($q)){
			   $id = $row['junior_ac_number'];
               echo <<<_END
                <option value="$id">$id</option>
_END;
		   }
	};
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
									<a href="index-2.php"><img src="../images/logo.png" alt="image description"></a>
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
							<h1>Registration</h1>
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
			<div class="container">
				<div class="text-center" style="margin-bottom: 10px" >
					<button class="btn btn-primary juniors">Junoir</button>
					<button class="btn btn-info seniors">Senoir</button>
				</div>
			</div>
			<section class="tg-main-section tg-paddingbottom-zero tg-haslayout registers">
				<div class="container">
					<div class="tg-section-name">
						<h2>Registration</h2>
					</div>
						<div class="junior">
							<div class="col-sm-11 col-xs-11 pull-right">
								<div class="row">
									<div class="tg-contactus tg-haslayout">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<form method="post" action="registration.php" class="tg-commentform help-form" id="tg-commentform">
													<?php junior_adding();?>
													<fieldset>
														<div class="form-group" style="display: none">
															<input type="text" name="acc" value="ACC<?php echo $id ?>" required=""class="form-control">
														</div>
														<div class="form-group">
															<input type="text" required="" placeholder="Name*" class="form-control" name="name">
														</div>
														<div class="form-group">
															<input type="text" required="" placeholder="Surname*" class="form-control" name="surname">
														</div>
														<div class="form-group">
															<input type="text" required="" placeholder="Assoc*" class="form-control" name="assoc">
														</div>
														<div class="form-group">
															<input type="text" required="" placeholder="Club*" class="form-control" name="club">
														</div>
														<div class="form-group">
															<input type="tel" required="" placeholder="id Number*" class="form-control" name="id_number">
														</div>
														<div class="form-group">
															<div class="tg-select1">
                                                                <input type="text" name="structure" value="100" class="" style="display: none;">
																<select name="under">
																	<option value="" disabled selected>Structure*</option>
																	<option value="ud13b">U13 boys</option>
																	<option value="ud13g">U13 Girls</option>
																	<option value="ud15b">U15 Boys</option>
																	<option value="ud15g">U15 Girls</option>
																	<option value="ud18b">U18 Boys</option>
																	<option value="ud18g">U18 Girls</option>
																</select>
															</div>
															<div class="tg-select1">
                                                                <input type="text" name="structure" value="100" class="" style="display: none;">
																<select name="double">
																	<option value="" disabled selected>Double*</option>
																	<option value="ud13b">U13 boys</option>
																	<option value="ud13g">U13 Girls</option>
																	<option value="ud15b">U15 Boys</option>
																	<option value="ud15g">U15 Girls</option>
																	<option value="ud18b">U18 Boys</option>
																	<option value="ud18g">U18 Girls</option>
																</select>
															</div>
														</div>
														<!--<div class="form-group">
															<div class="tg-select">
																<select name="doubles[type]">
																	<option value="" disabled selected>Doubles*</option>
																	<option value="ud13b">U13 boys</option>
																	<option value="ud13g">U13 Girls</option>
																	<option value="ud15b">U15 Boys</option>
																	<option value="ud15g">U15 Girls</option>
																	<option value="ud18b">U18 Boys</option>
																	<option value="ud18g">U18 Girls</option>
																</select>
															</div>
														</div>-->
														<div class="form-group">
															<div class="tg-select">
																<select name="paring">
																<option value="" disabled selected>Double Paring*</option>
																	<?php 
																		juniors();
																	?>
																</select>
																	
															</div>
														</div>
															<div class="form-group">
																<input type="text" disabled placeholder="Price" value="">
															</div>
														
														<div class="form-group">
															<button type="submit" name="junior_submit" class="tg-btn">Save</button>
														</div>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="senior">
								<div class="col-sm-11 col-xs-11 pull-right">
									<div class="row">
										<div class="tg-contactus tg-haslayout">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<form action="registration.php" method="post" class="tg-commentform help-form" id="tg-commentform">
                                                        <?php senior_adding(); ?>
														<fieldset>
															<div class="form-group" style="display: none">
																<input type="text" name="acc" required=""disabled value="ACC<?php echo $id ?>" placeholder="Ac*" class="form-control" >
															</div>
															<div class="form-group">
																<input type="text" required="" placeholder="Name*" class="form-control" name="name">
															</div>
															<div class="form-group">
																<input type="text" required="" placeholder="Surname*" class="form-control" name="surname">
															</div>
															<div class="form-group">
																<input type="text" required="" placeholder="Assoc*" class="form-control" name="assoc">
															</div>
															<div class="form-group">
																<input type="text" required="" placeholder="Club*" class="form-control" name="club">
															</div>
															<div class="form-group">
																<input type="text" required="" placeholder="Id Number*" class="form-control" name="id_number]">
															</div>
															<div class="form-group">
																<div class="tg-select">
																	<select name="structure">
																		<option value="" disabled selected>Structure*</option>
																		<option value="woman">Women</option>
																		<option value="man">Man</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<div class="tg-select">
																	<select name="paring">
																		<option value="" disabled selected>Paring*</option>
																			<?php seniors();?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<button type="submit" name="senior_submit" class="tg-btn">Save</button>
															</div>
														</fieldset>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
				</div>
			</section>

			<section class="tg-main-section tg-haslayout" style="background: #52c27d">
				<div class="container">
					<!--<div class="tg-section-name">

                    </div>-->
					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="tg-pointtable">
							<div class="tg-box">
								Gauteng Central Table Tennis
							</div>

						</div>
						<div class="tg-pointtable">
							<div class="tg-box">
								Bank
							</div>
							<div class="tg-box">FNB</div>
						</div>
						<div class="tg-pointtable">
							<div class="tg-box">
								Cheque Acc
							</div>
							<div class="tg-box">62803580655</div>
						</div>
					</div>
				</div>
			</section>
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