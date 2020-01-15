<?php 
	require ("connection/connection.php");
	if(!isset($_SESSION['email']))
	{?>
    <script type="text/javascript">
    	window.location = "login1.php";
    </script>
	<?php }
	if(isset($_GET['seniors']))
	{
		$my_players = mysqli_query($con, "SELECT * FROM players WHERE age > 18 AND menager = '{$_SESSION['email']}'");
		$num = mysqli_num_rows($my_players);
		$cost = mysqli_query($con, "SELECT SUM(price) as price FROM players WHERE menager = '{$_SESSION['email']}' and age > 18");
		$cost_results = mysqli_fetch_assoc($cost);
		$menager = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_SESSION['email']}' AND type = 'Seniors'");
	    $menager_results = mysqli_fetch_assoc($menager);
	}
	else
	{
		$my_players = mysqli_query($con, "SELECT * FROM players WHERE age < 19 AND menager = '{$_SESSION['email']}'");
		$num = mysqli_num_rows($my_players);
		$cost = mysqli_query($con, "SELECT SUM(price) as price FROM players WHERE menager = '{$_SESSION['email']}' and age < 19");
		$cost_results = mysqli_fetch_assoc($cost);
		$menager = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_SESSION['email']}' AND type = 'Juniors'");
	    $menager_results = mysqli_fetch_assoc($menager);
	}
	//statistics
	//Records
	$records = mysqli_query($con, "SELECT * FROM records");
	$records_results = mysqli_fetch_assoc($records);
	//Registered Players
	$reg_players = mysqli_query($con, "SELECT * FROM players");
	$reg_players_num = mysqli_num_rows($reg_players);
	//Spaces Left
	$spaces_left = $records_results['number'] - $reg_players_num;
	//percantage
	$percentage = ($reg_players_num/$records_results['number'])*100;
	//U13 BOYS
	$u13B = mysqli_query($con, "SELECT SUM(U13_Boys) as U13B FROM players WHERE age < 19");	
	$u13B_results = mysqli_fetch_assoc($u13B);
	$u13B_num = $u13B_results['U13B'];
	//U13 GIRLS
	$u13G = mysqli_query($con, "SELECT SUM(U13_Girls) as U13G FROM players WHERE age < 19");	
	$u13G_results = mysqli_fetch_assoc($u13G);
	$u13G_num = $u13G_results['U13G'];
	//U15 BOYS
	$u15B = mysqli_query($con, "SELECT SUM(U15_Boys) as U15B FROM players WHERE age < 19");	
	$u15B_results = mysqli_fetch_assoc($u15B);
	$u15B_num = $u15B_results['U15B'];
	//U15 Girls
	$u15G = mysqli_query($con, "SELECT SUM(U15_Girls) as U15G FROM players WHERE age < 19");	
	$u15G_results = mysqli_fetch_assoc($u15G);
	$u15G_num = $u15G_results['U15G'];
	//U18 BOYS
	$u18B = mysqli_query($con, "SELECT SUM(U18_Boys) as U18B FROM players WHERE age < 19");	
	$u18B_results = mysqli_fetch_assoc($u18B);
	$u18B_num = $u18B_results['U18B'];
	//U18 GIRLS
	$u18G = mysqli_query($con, "SELECT SUM(U18_Girls) as U18G FROM players WHERE age < 19");	
	$u18G_results = mysqli_fetch_assoc($u18G);
	$u18G_num = $u18G_results['U18G'];
	//seniors
	//U13 BOYS
	$u13B_s = mysqli_query($con, "SELECT SUM(U13_Boys) as U13B FROM players WHERE age > 18");	
	$u13B_results_s = mysqli_fetch_assoc($u13B_s);
	$u13B_num_s = $u13B_results_s['U13B'];
	//U13 GIRLS
	$u13G_s = mysqli_query($con, "SELECT SUM(U13_Girls) as U13G FROM players WHERE age > 18");	
	$u13G_results_s = mysqli_fetch_assoc($u13G_s);
	$u13G_num_s = $u13G_results_s['U13G'];
	//doubles senior
	$doubles_s = mysqli_query($con, "SELECT COUNT(paring) as doubles_s FROM players WHERE age > 18 AND paring != ''");
	$doubles_s_r = mysqli_fetch_assoc($doubles_s);
	
	//doubles junior
	$doubles_j = mysqli_query($con, "SELECT COUNT(paring) as doubles_j FROM players WHERE age < 19 AND paring != ''");
	$doubles_j_r = mysqli_fetch_assoc($doubles_j);
	
	
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Arnold Classic Index </title>
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
                                        <li><a href="login.php">Logout</a></li>
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
    						<h1 class="page-title">Details</h1>
    						<ul>
    							<li>
    								<a class="active" href="index.html">Home</a>
    							</li>
    							<li>Details</li>
    						</ul>
    					</div>
    				</div>
    			</div>
            </div>
		</div>
		<!-- Breadcrumbs Section End -->
<header class="w3-container w3-center" >
  <p>&nbsp;</p>
  <p >&nbsp;</p>
  <p >&nbsp;</p>
  <h1 class="w3-margin w3-xxxlarge"></h1>
 
</header>
<div class="container" style="width:100%">
	<table class="table table-responsive table-bordered" id="dataTable" cellspacing="0" style="margin-top:2%;width:100%">
                <tr>
                    <th><strong style="color:#000;">Tournament</strong></th>
                    <td>Arnold Classic 2019</td>
                    <th><strong>As a manager you merely need to add players by clicking the yellow button bellow.</strong></th>
                   <!-- <th><a href="#">Juniors</a></th>                                                
                    <th><a href="">Seniors</a></th>-->
                </tr>
                <tr>
                    <th><strong>Date:</strong></th>
                    <td>17 to 19 May</td>
                    <td><a href="Prospectus GCTTA Arnold Classic 2019.pdf" target="_blank" style="color:blue;">Download Prospectus</a></td>                         
                </tr>
                <tr>
                    <th><strong>Time : </strong></th>
                    <td>8:30 - 5:30 pm</td>
                    <td rowspan="4">Your registraion will be validated and an email will be sent to you confirm your participation.</br>
                        Arnold Classic will then issue you a web ticket to your email. <br>
                        Once you arrive at the Tournament Entrance a weekend Wrist band will be issued to you.
                    </td>
                </tr>
                <tr>
                    <th colspan="2" style="background-color:black;"></th>
                </tr>
                <tr>
                    <th><strong>Awards Ceremony :</strong></th>
                    <td>19 May</td>
                </tr>
                <tr>
                    <th><strong>Time : </strong></th>
                    <td>4:30 PM </td>
                </tr>
            </table>
            <hr>
            <a class="btn btn-sm btn-default">STATS % registration until closing:</a> <a class="btn btn-sm btn-black" style="width:80px;"><?php echo round($percentage)."%"; ?></a>
            <hr>
            <a class="btn btn-sm btn-default">Current Players Registered:</a> <a class="btn btn-sm btn-black" style="margin-left:5%; width:80px;"><?php echo $reg_players_num; ?> </a>
            <a class="btn btn-sm btn-default"><span style="margin-left:0%;">Spaces Available:</a> <a class="btn btn-sm" style="background-color:green; color:#fff; width:80px;"><?php echo $records_results['number']; ?></span></a>
            <a class="btn btn-sm btn-default"><span style="margin-left:0%;">Spaces Left:</a> <a class="btn btn-sm" style="background-color:#f44336!important; color:#fff; width:80px;"><?php echo $spaces_left; ?></span></a>
            <hr>
  <h2 style="background-color:black; color:#fff; margin-top:2%; padding:1%;">Total Records</h2>
  <!-- Trigger the modal with a button -->
  <table class="table table-responsive table-bordered" id="dataTable" width="99%" cellspacing="0">                    	
    <thead>
        <tr>
            <th>U13 Boys</th>
            <th>U13 Girls</th>
            <th>U15 Boys</th>
            <th>U15 Girls</th>
            <th>U18 Boys</th>
            <th>U18 Girls</th>
            <th>Doubles</th>
            <th>Women</th>
            <th>Mens</th>
            <th>Doubles</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $u13B_num; ?></td>
            <td><?php echo $u13G_num; ?></td>
            <td><?php echo $u15B_num; ?></td>
            <td><?php echo $u15G_num; ?></td>
            <td><?php echo $u18B_num; ?></td>
            <td><?php echo $u18G_num; ?></td>
            <td><?php echo $doubles_j_r['doubles_j']/2; ?></td>
            <td><?php echo $u13G_num_s; ?></td>
            <td><?php echo $u13B_num_s; ?></td>
            <td><?php echo $doubles_s_r['doubles_s']/2; ?></td>
        </tr>
    </tbody>
</table>
<legend><hr></legend>
  <!-- Trigger the modal with a button -->
  	<legend>
  	    <a href="index.php?juniors" class="btn btn-sm" style="background-color:#ff4e1c;color:#fff;">Juniors</a>
  	    <a class="btn btn-sm" style="background-color:rgba(60,109,111,1.00); color:#fff;" href="index.php?seniors">Seniors</a>
  	    <a href="#" data-toggle="modal" data-target="#numberModal" style="margin-left:10%;" class="btn btn-sm btn-success">Add Players</a>
  	</legend>
    <?php if(!isset($_GET['seniors'])){ ?>
  	<table class="table table-responsive table-bordered table-condensed" cellspacing="0" style="margin-bottom:10%; width:100%">                    	
        <thead>
        	<tr><th colspan="19"><h2 style="background-color:#ff4e1c; color:#fff; padding:1%;"><?php echo $_SESSION['club_name']; ?> (Juniors)</h2></th></tr>
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
                <th>Fees Available</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
			<?php 
				$number = 0; 
				while($my_players_output = mysqli_fetch_assoc($my_players)):
				$number += 1;
				//Juniors playing seniors
	            $s_j1 = mysqli_query($con, "SELECT price as p FROM seniors_juniors WHERE AC_number = '{$my_players_output['AC_number']}'");
	            $_j_r1 = mysqli_fetch_assoc($s_j1);
	            $s_j2 = mysqli_query($con, "SELECT SUM(price) as tot_p FROM seniors_juniors WHERE menager = '{$_SESSION['email']}'");
	            $_j_r2 = mysqli_fetch_assoc($s_j2);
	            $s_j_d = mysqli_query($con, "SELECT doubles as d FROM seniors_juniors WHERE AC_number = '{$my_players_output['AC_number']}'");
	            $s_j_d_r = mysqli_fetch_assoc($s_j_d);
				?>
                <tr>
                	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                    <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                    <td><a href="delete.php?id=<?php echo $my_players_output['AC_number']; ?>" style="color:red;"><span class='fa fa-trash'>Delete</span></a></td>
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
                    </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U15_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U15_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                    </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U15_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U15_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U18_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U18_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U18_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U18_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                     <td>                                             	
                      <p><?php echo $my_players_output['paring']; ?></p>               
                     </td>
                     <td>
                         <p><span style="font-size:13px; color:<?php if(mysqli_num_rows($s_j1) > 0){?>green<?php }else{?>red<?php }?>" class="<?php if(mysqli_num_rows($s_j1) > 0){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                     <td>
                         <?php echo $s_j_d_r['d']; ?>
                     </td>
                    <td>R <?php echo $my_players_output['price']+$_j_r1['p']; ?></td>                    
                    <td><a style="color:red;" onClick='viewPlayer("<?php echo $my_players_output['id_number']; ?>")'>Update</a></td>
                    <td><a style="color:red;" onClick='playSeniorsJuniors("<?php echo $my_players_output['id_number']; ?>")'>Play Seniors</a></td>
                </tr>                 
                <?php endwhile;?>
                <tr>
                	<td colspan="8" rowspan="6" class="text-center" style="text-aligne:center; background-color:rgba(108,101,101,0.66);">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                	<tr>
                    	<td colspan="7" style="background-color:rgba(108,101,101,0.66);"></td>
                    	<td colspan="4" rowspan="5" style="background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="3">Total Entries</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $num; ?></td>
                    </tr>
                    <tr>
                    	<td colspan="3">Email Address</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $_SESSION['email']; ?></td>
                    </tr>
                    <tr>
                    	<td colspan="3">Total Fees Due</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo "R ".number_format($cost_results['price']+$_j_r2['tot_p'],2); ?></td>
                    </tr>
                    <tr>
                    	<td colspan="7" style="background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="8"></td></form>
                        <?php
                            	if(isset($_POST['proof_junior']))
								{
									//Attachment
									$attachment = $_FILES['proof']['name'];
									$directory = "attachments/".$attachment;
									$tmp_name = $_FILES['proof']['tmp_name'];
									$m = move_uploaded_file($tmp_name,$directory);
									if(!$m)
									{
									    die("failed to load".mysqli_error($m));
									}
									else
									{
									$save = mysqli_query($con, "INSERT INTO proofs VALUES ('{$_SESSION['email']}', '{$attachment}', 'Juniors','Yes')");
									if($save)
									{?>
										<script type="text/javascript">
                                        	window.alert('Proof uploaded.');
                                        </script>
									<?php }}
								}
							?>
                    	<td colspan="3">Upload proof of payment</td>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php if($menager_results['ref_num'] != ''): ?>
                            <td colspan="2"><input type="file" required name="proof"></td>
                            <td><input type="submit" name="proof_junior" value="Upload" class="btn-sm btn-info"></td>
                            <?php endif; ?>
                        </form>
                        <td colspan="5">Ref: <?php echo $menager_results['ref_num']; ?></td>
                    </tr>
                </tr>
            </tbody>
        </table>
    
    <?php }else{ ?>
    <table class="table table-bordered table-responsive table-condensed" width="100%" cellspacing="0" style="margin-bottom:10%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:rgba(60,109,111,1.00); color:#fff; padding:1%;"><?php echo $_SESSION['club_name']; ?> (Seniors)</h2></th></tr>
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
                <th>Fees Available</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
			<?php 
				$number = 0; 
				while($my_players_output = mysqli_fetch_assoc($my_players)):
				$number += 1;
				
				?>
                <tr>
                	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                    <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                    <td><a href="delete.php?id=<?php echo $my_players_output['AC_number']; ?>" style="color:red;"><span class='fa fa-trash'>Delete</span></a></td>
                    <td><?php echo $my_players_output['AC_number']; ?></td>
                    <td><?php echo $my_players_output['name']; ?></td>
                    <td><?php echo $my_players_output['surname']; ?></td>
                    <td><?php echo $my_players_output['id_number']; ?></td>
                    <td><?php echo $my_players_output['age']; ?></td>
                    <td><?php echo $my_players_output['gender']; ?></td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Girls'] == 1){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                     <td>                                             	
                      <p><?php echo $my_players_output['paring']; ?></p>               
                     </td>
                    <td>R <?php echo $my_players_output['price']; ?></td>                    
                    <td><a style="color:red;" onClick='viewSenior("<?php echo $my_players_output['id_number']; ?>")'>Update</a></td>                    
                </tr>                 
                <?php endwhile;?>
                <tr>
                	<td colspan="5" rowspan="5" style="text-align:center;">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                    <tr>
                    	<td colspan="2">Total Entries</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $num; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Email Address</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $_SESSION['email']; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Total Fees Due</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo "R ".number_format($cost_results['price'],2); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td colspan="7"></td>
                    </tr>
                    <tr>
                    	<td colspan="5"></td>
                    	<td colspan="2">Upload proof of payment</td>
                        <td colspan="2"></form>
                        	<?php
                            	if(isset($_POST['proof_senior']))
								{
									//Attachment
									$attachment = $_FILES['proof']['name'];
									$directory = "attachments/".$attachment;
									$tmp_name = $_FILES['proof']['tmp_name'];
									move_uploaded_file($tmp_name,$directory);
									$save = mysqli_query($con, "INSERT INTO proofs VALUES ('{$_SESSION['email']}', '{$attachment}', 'Seniors','Yes')");
									if($save)
									{?>
										<script type="text/javascript">
                                        	window.alert('Proof uploaded.');
                                        </script>
									<?php }
								}
							?>
                        	<form action="" method="post" enctype="multipart/form-data">
                        	<?php if($menager_results['ref_num'] != ''): ?>
                        	<input type="file" required name="proof">                           
                            </td>
                            <td>
                        	<input type="submit" name="proof_senior" value="Upload" class="btn-sm btn-info">
                        	<?php endif; ?>
                            </form>
                        </td>
                        <td colspan="3">Ref: <?php echo $menager_results['ref_num']; ?></td>
                    </tr>
                </tr>
            </tbody>
        </table>
    
    <?php } ?>
  <!-- Modal -->
  <?php include ("modals/number_players.php");?>
</div>
  <script>
  	function viewPlayer(id)
		{
			var data = {"id": id}
			jQuery.ajax
			(
				{
					url: "modals/view_player.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#viewPlayerModal').modal('toggle');
					},
					error: function()
					{
						alert('error');
					}
				}
			);
		}
		function viewSenior(id)
		{
			var data = {"id": id}
			jQuery.ajax
			(
				{
					url: "modals/view_seniors.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#viewSenoirModal').modal('toggle');
					},
					error: function()
					{
						alert('error');
					}
				}
			);
		}
		function playSeniorsJuniors(id)
		{
			var data = {"id": id}
			jQuery.ajax
			(
				{
					url: "modals/play_seniors_juniors.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#playSenoirJuniorModal').modal('toggle');
					},
					error: function()
					{
						alert('error');
					}
				}
			);
		}
  </script>
  </script>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/slidervideo/script.js"></script>  

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
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
		<script src="../gctta_revamp/js/owl.carousel.min.js"></script>
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