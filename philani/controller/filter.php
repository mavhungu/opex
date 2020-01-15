<?php
if(isset($_POST['submit']))
{?>
	<script type="text/javascript">
    	window.location = "Admin.php?m=<?php echo $_POST['menager']; ?>";
    </script>
	<?php
}
if(isset($_GET['m']))
{
    $menager_juniors = mysqli_query($con, "SELECT * FROM players WHERE menager = '{$_GET['m']}' AND age < 19");
	$num_j = mysqli_num_rows($menager_juniors);
	$cost_j = mysqli_query($con, "SELECT SUM(price) as total_cost FROM players WHERE menager = '{$_GET['m']}' and age < 19");
	$cost_j_results = mysqli_fetch_assoc($cost_j);
	
	$menager_seniors = mysqli_query($con, "SELECT * FROM players WHERE menager = '{$_GET['m']}' AND age > 18");
	$num_s = mysqli_num_rows($menager_seniors);
	$cost_s = mysqli_query($con, "SELECT SUM(price) as total_cost FROM players WHERE menager = '{$_GET['m']}' and age > 18");
	$cost_s_results = mysqli_fetch_assoc($cost_s); 
	
	$menager_details_s = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['m']}' AND type = 'Seniors'");
	$menager_details_results_s = mysqli_fetch_assoc($menager_details_s);
	
	$menager_details_j = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['m']}' AND type = 'Juniors'");
	$menager_details_results_j = mysqli_fetch_assoc($menager_details_j);
	
	//ref
	$ref_j = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['m']}' AND type = 'Juniors'");
	$ref_j_r = mysqli_fetch_assoc($ref_j);
	$status_j = $ref_j_r["status"];
	
	$ref_s = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['m']}' AND type = 'Seniors'");
	$ref_s_r = mysqli_fetch_assoc($ref_s);
	$status_s = $ref_s_r["status"];
	
	//club name
	$club_name = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$_GET['m']}'");
	$club_name_result = mysqli_fetch_assoc($club_name);
}
?>