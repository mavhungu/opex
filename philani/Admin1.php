<?php 
	require ("connection/connection.php");
	require ("controller/export.php");
	if(!isset($_SESSION['email_admin']))
	{?>
    <script type="text/javascript">
    	window.location = "login.php";
    </script>
	<?php }

	$senior_players = mysqli_query($con, "SELECT * FROM players WHERE age > 18");
	$senior_num = mysqli_num_rows($senior_players);

	$junior_players = mysqli_query($con, "SELECT * FROM players WHERE age < 19");
	$junior_num = mysqli_num_rows($junior_players);
	$menagers = mysqli_query($con, "SELECT * FROM menager ORDER BY name ASC");
	
	$doubles = mysqli_query($con, "SELECT * FROM players WHERE paring != '' AND age < 19");
	$doubless = mysqli_query($con, "SELECT * FROM players WHERE paring != '' AND age > 18");	
	include("controller/filter.php");
	
?>
<!DOCTYPE html>
<!doctype html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Arnold Classic 2019 Admin</title>
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
                                         <li><a href="logout.php" >Logout</a></li>
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
    						<h1 class="page-title">Arnold Classic 2019</h1>
    						<ul>
    							<li>
    								<a class="active" href="index.html">Home</a>
    							</li>
    							<li>Arnold Classic 2019</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->

<!-- Header -->
<header>
  <p>&nbsp;</p>

 
</header>
	<legend>
    	<div class="container" style="width:100%">
        <form action="" method="post" style="width:100%">
            <table class="table table-responsive table-bordered table-condensed" cellspacing="0" style="margin-bottom:2%; width:100%">                    	
            <thead>
            	<tr>
            	    <td>
            	        <select name="menager" id="" style="" class="form-control col-md-12" required>
            	            <option <?php if($club_name_result['email']):?> style="background-color:#f44336!important;" value="<?php $club_name_result['email'];?>"<?php endif;?>><?php if($club_name_result['email']){ echo $club_name_result['name'].' '.$club_name_result['surname'].'('.$club_name_result['club_name'].')'; }else{ echo "Select Manager";}?></option>
                            <?php while($results = mysqli_fetch_assoc($menagers)): ?>
                                <option value="<?php echo $results['email']; ?>"><?php echo $results['name']." ".$results['surname']." (".$results['club_name'].")"; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="submit" style="" value="Filter" class="btn btn-sm btn-success">
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" href="Admin.php">Filter All Managers</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <button type="submit" id="btnExport"
                                name='export' value="Export to Excel"
                                class="btn btn-info btn-sm">Export to Excel</button>
                        </form>
                        <!--<a class="btn btn-sm btn-info" href="controller/export.php?export=true">Export To Excel</a>-->
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info" href="Admin.php?paid">View who paid</a>
                    </td>
            	</tr>
            </thead>
            </table>
            <?php if(isset($_GET['paid'])): ?>
            <table id="example" class="table table-responsive table-bordered" cellspacing="0" style="margin-bottom:2%; width:100%">                    	
                <thead>
                	<tr>
                    <th colspan="6"><h2 style="background-color:black; color:#fff; padding:1%;">Managers Paid for Juniors</h2></th></tr>
                    <tr>            	
                        <th>#</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>            
                        <th>Club</th>
                        <th>Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $p_juniors = mysqli_query($con, "SELECT * FROM proofs WHERE type = 'Juniors'");
                        while($r = mysqli_fetch_assoc($p_juniors)):
                            $m = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$r['email']}'");
                            $m_r = mysqli_fetch_assoc($m);
                            $approved = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$r['email']}'");
                            $approved_r = mysqli_fetch_assoc($approved);
                    ?>
                        <tr>
                            <td></td>
                            <td><?php echo $m_r['name']; ?></td>
                            <td><?php echo $m_r['surname']; ?></td>
                            <td><?php echo $m_r['email']; ?></td>
                            <td><?php echo $m_r['club_name']; ?></td>
                            <td><a href="proof.php?proof=<?php echo $r['email']; ?>">View Proof</a></td>
                            <td>
                                <?php
                                    if($approved_r['status'] == '0')
                                    {
                                        echo "Not Approved";
                                    }
                                    else
                                    {
                                        echo "Approved";
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tbody>
                </tbody>
            </table>
            
            <table id="example" class="table table-responsive table-bordered" cellspacing="0" style="margin-bottom:2%; width:100%">                    	
                <thead>
                	<tr>
                    <th colspan="6"><h2 style="background-color:black; color:#fff; padding:1%;">Managers Paid for Seniors</h2></th></tr>
                    <tr>            	
                        <th>#</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>            
                        <th>Club</th>
                        <th>Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $p_juniors = mysqli_query($con, "SELECT * FROM proofs WHERE type = 'Seniors'");
                        while($r = mysqli_fetch_assoc($p_juniors)):
                            $m = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$r['email']}'");
                            $m_r = mysqli_fetch_assoc($m);
                    ?>
                        <tr>
                            <td></td>
                            <td><?php echo $m_r['name']; ?></td>
                            <td><?php echo $m_r['surname']; ?></td>
                            <td><?php echo $m_r['email']; ?></td>
                            <td><?php echo $m_r['club_name']; ?></td>
                            <td><a href="proof.php?proof=<?php echo $r['email']; ?>">View Proof</a></td>
                            <td>
                                <?php
                                    if($approved_r['status'] == '0')
                                    {
                                        echo "Not Approved";
                                    }
                                    else
                                    {
                                        echo "Approved";
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tbody>
                </tbody>
            </table>
            <?php endif; ?>
        </form>
        </div>
    </legend>
    <?php if(isset($_GET['m'])){ ?>
    <div class="container" style="width:100%">
  	<table id="example" class="table table-responsive table-bordered" cellspacing="0" style="margin-bottom:2%; width:100%">                    	
        <thead>
        	<tr>
            <th colspan="17"><h2 style="background-color:black; color:#fff; padding:1%;"><?php echo $club_name_result['club_name']; ?> (Juniors)</h2></th></tr>
            <tr>            	
                <th>#</th>
                <th>AC Number</th>
                <th>Name</th>
                <th>Surname</th>            
                <th>ID Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>U13 Boys</th>
                <th>U13 Girls</th>
                <th>U15 Boys</th>
                <th>U15 Girls</th>
                <th>U18 Boys</th>
                <th>U18 Girls</th>
                <th>Doubles</th>
                <th>Seniors</th>
                <th>Senior Doubles</th>
                <th>Fees Applicable</th>
            </tr>
        </thead>
        <tbody>
        <form action="controller/update_matches.php" method="post">
			<?php 
				$number = 0; 
				while($my_players_output = mysqli_fetch_assoc($menager_juniors)):
				$number += 1;
				//Juniors playing seniors
	            $s_j1 = mysqli_query($con, "SELECT price as p FROM seniors_juniors WHERE AC_number = '{$my_players_output['AC_number']}'");
	            $_j_r1 = mysqli_fetch_assoc($s_j1);
	            $s_j2 = mysqli_query($con, "SELECT SUM(price) as tot_p FROM seniors_juniors WHERE menager = '{$_GET['m']}'");
	            $_j_r2 = mysqli_fetch_assoc($s_j2);
				$s_j_d = mysqli_query($con, "SELECT doubles as d FROM seniors_juniors WHERE AC_number = '{$my_players_output['AC_number']}'");
	            $s_j_d_r = mysqli_fetch_assoc($s_j_d);
				?>
                <tr>
                	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                    <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                    <td><?php echo $number ?></td>
                    <td><?php echo $my_players_output['AC_number']; ?></td>
                    <td><?php echo $my_players_output['name']; ?></td>
                    <td><?php echo $my_players_output['surname']; ?></td>
                    <td><?php echo $my_players_output['id_number']; ?></td>
                    <td><?php echo $my_players_output['age']; ?></td>
                    <td><?php echo $my_players_output['gender']; ?></td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U15_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U15_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U15_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U15_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U18_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U18_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U18_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U18_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><?php echo $my_players_output['paring'];?></p>               
                     </td>
                    <td>
                         <p><span style="font-size:13px; color:<?php if(mysqli_num_rows($s_j1) > 0){?>green<?php }else{?>red<?php }?>" class="<?php if(mysqli_num_rows($s_j1) > 0){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                     <td>
                         <?php echo $s_j_d_r['d']; ?>
                     </td>
                     <td>R <?php echo $my_players_output['price']+$_j_r1['p']; ?></td>
                </tr>                 
                <?php endwhile;?>
                <tr>
                	<td colspan="7" rowspan="6" style="text-align:center; background-color:rgba(108,101,101,0.66);">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                    <tr>
                    	<td colspan="10" style="text-aligne:center; background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="3">Total Entries</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $num_j; ?></td>
                        <td colspan="3" rowspan="4" style="background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="3">Email Address</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $_GET['m']; ?></td>
                    </tr>
                    <tr>
                    	<td colspan="3">Total Fees Due</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo "R ".number_format($cost_j_results['total_cost']+$_j_r2['tot_p'],2); ?></td>
                    </tr>
                    <tr>
                    	<td colspan="7" style=" background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="8"></td>
                    	<td colspan="3"><a href="proof.php?id=<?php echo $_GET['m']; ?>&type=Juniors&ref=<?php echo $menager_details_results_j['ref_num']; ?>">View proof of payment</a></td>
                        <td colspan="3">Ref : <?php echo $menager_details_results_j['ref_num']; ?></td>
                        <td colspan="2">
                            <?php if($status_j != "0" && $status_j == 'Approved'){ ?>
                            <p>Approved</p>
                            <?php }else{ ?>
                            <a href="approve.php?email=<?php echo $_GET['m'] ?>&type=Juniors">Approve</a>
                            <?php }?>
                        </td>
                        <td>
                            <?php 
                            $reminder = mysqli_query($con, "SELECT * FROM players WHERE menager = '{$_GET['m']}'");
                            $not_paid = mysqli_query($con, "SELECT * FROM proofs WHERE email = '{$_GET['m']}' AND type = 'Juniors'");
                            $no_matches = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['m']}'");
                            if(mysqli_num_rows($reminder) < 1){?>
                            <a class="btn btn-sm btn-success" href="reminder.php?no_players&email=<?php echo $_GET['m'] ?>">Send Reminder</a>
                            <?php } else if(mysqli_num_rows($reminder) > 0 && mysqli_num_rows($no_matches) < 1){ ?>
                            <a class="btn btn-sm btn-success" href="reminder.php?no_matches&email=<?php echo $_GET['m'] ?>">Send Reminder</a>
                            <?php }else if(mysqli_num_rows($reminder) > 0 && mysqli_num_rows($not_paid) < 1){ ?>
                            <a class="btn btn-sm btn-success" href="reminder.php?not_paid&email=<?php echo $_GET['m'] ?>&price=R <?php echo number_format($cost_j_results['total_cost']+$_j_r2['tot_p'],2) ?>">Send Reminder</a>
                            <?php } ?>
                        </td>
                    </tr>
                </tr>
            </tbody>
        </table>
    </form>
 
    <table id="example" class="table table-responsive table-bordered" cellspacing="0" style="margin-bottom:10%; width:100%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:black; color:#fff; padding:1%;"><?php echo $club_name_result['club_name']; ?> (Seniors)</h2></th></tr>
            <tr>            	
                <th>#</th>
                <th>AC Number</th>
                <th>Name</th>
                <th>Surname</th>            
                <th>ID Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Women</th>
                <th>Men</th>
                <th>Doubles</th>
                <th>Fees Applicable</th>
            </tr>
        </thead>
        <tbody>
        <form action="controller/update_matches.php" method="post">
			<?php 
				$number = 0; 
				while($my_players_output = mysqli_fetch_assoc($menager_seniors)):
				$number += 1;
				
				?>
                <tr>
                	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                    <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                    <td><?php echo $number ?></td>
                    <td><?php echo $my_players_output['AC_number']; ?></td>
                    <td><?php echo $my_players_output['name']; ?></td>
                    <td><?php echo $my_players_output['surname']; ?></td>
                    <td><?php echo $my_players_output['id_number']; ?></td>
                    <td><?php echo $my_players_output['age']; ?></td>
                    <td><?php echo $my_players_output['gender']; ?></td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['gender'] == 'Female'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['gender'] == 'Male'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                     <td>                                             	
                      <p><?php echo $my_players_output['paring']; ?></p>               
                     </td>
                    <td>R <?php echo $my_players_output['price']; ?></td>                                        
                </tr>                 
                <?php endwhile;?>
                <tr>
                	<td colspan="4" rowspan="6" style="text-align:center; background-color:rgba(108,101,101,0.66);">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                    <tr>
                    	<td colspan="7" style=" background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Total Entries</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $num_s; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Email Address</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $_GET['m']; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Total Fees Due</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo "R ".number_format($cost_s_results['total_cost'],2); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td colspan="7" style=" background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="5"></td>
                    	<td colspan="3"><a href="proof.php?id=<?php echo $_GET['m']; ?>&type=Seniors&ref=<?php echo $menager_details_results_s['ref_num']; ?>">View proof of payment</a></td>
                        <td colspan="2">Ref : <?php echo $menager_details_results_s['ref_num']; ?></td>
                        <td colspan="3">
                            <?php if($status_s != "0" && $status_s == 'Approved'){ ?>
                            <p>Approved</p>
                            <?php }else{ ?>
                            <a href="approve.php?email=<?php echo $_GET['m'] ?>&type=Seniors">Approve</a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php 
                            $reminder = mysqli_query($con, "SELECT * FROM players WHERE menager = '{$_GET['m']}'");
                            $not_paid = mysqli_query($con, "SELECT * FROM proofs WHERE email = '{$_GET['m']}' AND type = 'Seniors'");
                            $no_matches = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['m']}'");
                            if(mysqli_num_rows($reminder) < 1){?>
                            <a class="btn btn-sm btn-success" href="reminder.php?no_players&email=<?php echo $_GET['m'] ?>">Send Reminder</a>
                            <?php } else if(mysqli_num_rows($reminder) > 0 && mysqli_num_rows($no_matches) < 1){ ?>
                            <a class="btn btn-sm btn-success" href="reminder.php?no_matches&email=<?php echo $_GET['m'] ?>">Send Reminder</a>
                            <?php }else if(mysqli_num_rows($reminder) > 0 && mysqli_num_rows($not_paid) < 1){ ?>
                            <a class="btn btn-sm btn-success" href="reminder.php?not_paid&email=<?php echo $_GET['m'] ?>&price=R <?php echo number_format($cost_s_results['total_cost'],2) ?>">Send Reminder</a>
                            <?php } ?>
                        </td>
                    </tr>
                </tr>
            </tbody>
        </table>
    </form>
    <?php }else
		{
			include("includes/default_admin.php");
		} ?>

		<!-- Footer Start -->
        <footer id="footer-section" class="footer-section">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
						<h4 class="footer-title">about us</h4>
                            <div class="about-widget">
                                <p>We create Premium Html Themes for more than three years. Our team goal is to reunite the elegance of unique.</p>
                                <p class="margin-remove">We create Unique and Easy To Use Flexible Html Themes.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">Recent Posts</h4>
                            <div class="recent-post-widget">
                                <div class="post-item">
                                    <div class="post-date">
                                        <span>28</span>
                                        <span>June</span>
                                    </div>
                                    <div class="post-desc">
                                        <h3 class="post-title"><a href="blog-single.html">Welcome to  Soccer Theme</a></h3>
                                        <span class="post-category">Design</span>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-date">
                                        <span>28</span>
                                        <span>June</span>
                                    </div>
                                    <div class="post-desc">
                                        <h3 class="post-title"><a href="blog-single.html">Welcome to  Soccer Theme</a></h3>
                                        <span class="post-category">Design</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">Useful Links</h4>
                            <ul class="sitemap-widget">
                                <li class="active"><a href="about.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="point-table.html">Point Table</a></li> 
                                               <li><a href="world-cup.html">World Cup</a></li> 
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
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
                                <p>&copy; 2019 <a href="http://rstheme.com/" target="_blank">GCTTA</a>. All Rights Reserved.</p>
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
		<script src="js/owl.carousel.min.js"></script>
		<!-- magnific-popup js -->
		<script src="../gctta_revamp/js/jquery.magnific-popup.js"></script>
		<!-- jquery.counterup js -->
		<script src="../gctta_revamp/js/jquery.counterup.min.js"></script>
		<script src="../gctta_revamp/js/waypoints.min.js"></script>
        <!-- moogle map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgC6ZapXdUzFdeQOFhdm_wucwlDMMQ8CQ"></script>
        <!-- contact popup form js -->
        <script src="../gctta_revamp/js/contact.form.js"></script>
		<!-- main js -->
		<script src="../gctta_revamp/js/main.js"></script>
	</body>
</html>
