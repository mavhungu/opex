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
<html>
  <!-- Site made with Mobirise Website Builder v4.9.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../assets/images/crest2-120x181.png" type="image/x-icon">
  <meta name="description" content="">
  <title>GCTTA Tournaments</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- datatables-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="DataTables-1.10.18/css/dataTables.bootstrap.min.css">
  
    <link href="w3.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    </style>
</head>
<body>
<!-- Navbar -->
<div class="w3-top" style="background-color:#ff4e1c;">
  <div class="w3-bar w3-card-2 w3-left-align w3-large" style="background-color:#ff4e1c;">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="../index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="../league/league.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">League</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Clubs</a>
    <a href="../news/news.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">News</a>
    <a href="../tournaments/index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Tournaments</a>
    <a href="../links/links.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Links</a>
    <a href="../contact.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large"  style="background-color:#ff4e1c;">
    <a href="../index.html" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="../league/league.html" class="w3-bar-item w3-button w3-padding-large">League</a>
    <a href="../news/news.html" class="w3-bar-item w3-button w3-padding-large">News</a>
    <a href="../tournaments/index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Tournaments</a>
    <a href="../links/links.html" class="w3-bar-item w3-button w3-padding-large">Links</a>
    <a href="../contact.html" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
    <a href="#" data-toggle="modal" data-target="#myModal" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-center" style="background-color:#ff4e1c;">
  <p>&nbsp;</p>
  <p >&nbsp;</p>
  <h1 class="w3-margin w3-xxxlarge">Arnold Classic</h1>
 
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

<footer class="w3-container w3-center">


 <p class="foot text-center">© GCTTA All Rights Reserved. Hosted by OPEX Business Solutions (PTY) ltd | <a href="http://www.opexsolutions.co.za">Opex Business Solutions</a></p>
</footer>
<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
<scirpt type="text/javascript" src="DataTables-1.10.18/js/dataTables.bootstrap.min.js"></scirpt>
<scirpt type="text/javascript" src="DataTables-1.10.18/js/jquery.dataTables.min.js"></scirpt>
<script type="text/javascript">
    $(document).ready(fuction(){
        $(".table").DataTable();
    });
</script>
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
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
