<?php 
	require ("connection/connection.php");
	if(!isset($_SESSION['email']))
	{?>
    <script type="text/javascript">
    	window.location = "login.php";
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
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.9.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/crest2-120x181.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Home</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  
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
    <a href="../../tournaments/index1.html" class="w3-bar-item w3-button w3-padding-large w3-white">Tournaments</a>
    <a href="../links/links.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Links</a>
    <a href="../contact.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large" style="background-color:#ff4e1c;">
    <a href="../index.html" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="../league/league.html" class="w3-bar-item w3-button w3-padding-large">League</a>
    <a href="../news/news.html" class="w3-bar-item w3-button w3-padding-large">News</a>
    <a href="../../tournaments/index1.html" class="w3-bar-item w3-button w3-padding-large w3-white">Tournaments</a>
    <a href="../links/links.html" class="w3-bar-item w3-button w3-padding-large">Links</a>
    <a href="../contact.html" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
    <a href="#" data-toggle="modal" data-target="#myModal" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  </div>
</div>
<header class="w3-container w3-center" style="background-color:#ff4e1c;">
  <p>&nbsp;</p>
  <p >&nbsp;</p>
  <h1 class="w3-margin w3-xxxlarge">Arnold Classic</h1>
 
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
            <a class="text-danger" style="margin-left:2%;"><strong>Due to additional players wanting to register, GCTTA has increased player registration by 20. Closing date is stil the 10th of May.</strong></a>
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
                <th colspan="2"></th>            	
                <th>#</th>
                <th>Fees Available</th>
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
                    <td><a style="color:red;" onClick='viewPlayer("<?php echo $my_players_output['id_number']; ?>")'>Update</a></td>
                    <td><a style="color:red;" onClick='playSeniorsJuniors("<?php echo $my_players_output['id_number']; ?>")'>Play Seniors</a></td>
                    <td><a href="delete.php?id=<?php echo $my_players_output['AC_number']; ?>" style="color:red;"><span class='fa fa-trash'>Delete</span></a></td>
                    <td>R <?php echo $my_players_output['price']+$_j_r1['p']; ?></td>
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
                </tr>                 
                <?php endwhile;?>
                <tr>
                	<td colspan="5" rowspan="6" class="text-center" style="text-aligne:center; background-color:rgba(108,101,101,0.66);">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                	<tr>
                    	<td colspan="7" style="background-color:rgba(108,101,101,0.66);"></td>
                    	<td colspan="7" rowspan="5" style="background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Total Entries</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $num; ?></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Email Address</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $_SESSION['email']; ?></td>
                    </tr>
                    <tr>
                    	<td colspan="2">Total Fees Due</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo "R ".number_format($cost_results['price']+$_j_r2['tot_p'],2); ?></td>
                    </tr>
                    <tr>
                    	<td colspan="7" style="background-color:rgba(108,101,101,0.66);"></td>
                    </tr>
                    <tr>
                    	</form>
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
									<?php }
									    
									}
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
                        <td colspan="8"></td>
                    </tr>
                </tr>
            </tbody>
        </table>
    
    <?php }else{ ?>
    <table class="table table-bordered table-responsive table-condensed" width="100%" cellspacing="0" style="margin-bottom:10%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:rgba(60,109,111,1.00); color:#fff; padding:1%;"><?php echo $_SESSION['club_name']; ?> (Seniors)</h2></th></tr>
            <tr>   
                <th></th>
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
                    <td><a style="color:red;" onClick='viewSenior("<?php echo $my_players_output['id_number']; ?>")'>Update</a></td>                    
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
  
  
</body>
</html>