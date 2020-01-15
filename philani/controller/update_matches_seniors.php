<?php
require ("../connection/connection.php");
$id = $_POST['id'];
if($_POST['gender'] == "Female")
{
	$u13 = "";
	$u15 = "";
	$u18 = "";
	$price = 0;
	
	if(isset($_POST['U13']))
	{
		$u13 = $_POST['U13'];
		$price += 200;
	}
	if($_POST['doubles'] != '')
	{
		$price += 100;
	}
	if(!isset($_POST['U13']))
	{
		$error = "Please select atlist one match!";
	}
	else
	{		
		$save = mysqli_query($con, "UPDATE players SET paring = '{$_POST['doubles']}', U13_Girls = '{$u13}', U15_Girls = '{$u15}', U18_Girls = '{$u18}', price = '{$price}' WHERE id_number = '{$id}'");
		$cost = mysqli_query($con, "SELECT SUM(price) as price FROM players WHERE menager = '{$_SESSION['email']}' AND age < '19'");
		$cost_results = mysqli_fetch_assoc($cost);
		$update = mysqli_query($con, "UPDATE cost SET total_cost = '{$cost_results['price']}' WHERE menager = '{$_SESSION['email']}' and players = 'Juniors'");
		$ref = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_SESSION['email']}' AND type = 'Seniors'");
		$ref_n = mysqli_num_rows($ref);
		if($save)
		{
		    if($ref_n < 1)
		    {
		        $r = rand();
		        $update = mysqli_query($con, "INSERT INTO ref VALUES ('{$_SESSION['email']}','{$r}', 'Seniors', '0')");
		    }
		?>
        	<script type="text/javascript">
            	window.alert("Match Updated");
				window.location = "../index.php?seniors";
            </script>
		<?php }
		else
		{?>
			<script type="text/javascript">
            	window.alert("Failed to update");
				window.location = "../index.php?seniors";
            </script>
		<?php }
	}
}
if($_POST['gender'] == "Male")
{
	$u13 = "";
	$u15 = "";
	$u18 = "";
	$price = 0;
	
	if(isset($_POST['U13']))
	{
		$u13 = $_POST['U13'];
		$price += 200;
	}
	if($_POST['doubles'] != '')
	{
		$price += 100;
	}
	if(!isset($_POST['U13']) && !isset($_POST['U15']) && !isset($_POST['U18']))
	{
		$error = "Please select atlist one match!";
	}
	else
	{
		$save = mysqli_query($con, "UPDATE players SET paring = '{$_POST['doubles']}', U13_Boys = '{$u13}', U15_Boys = '{$u15}', U18_Boys = '{$u18}', price = '{$price}' WHERE id_number = '{$id}'");
		$cost = mysqli_query($con, "SELECT SUM(price) as price FROM players WHERE menager = '{$_SESSION['email']}' AND age < '19'");
		$cost_results = mysqli_fetch_assoc($cost);
		$update = mysqli_query($con, "UPDATE cost SET total_cost = '{$cost_results['price']}' WHERE menager = '{$_SESSION['email']}' and players = 'Juniors'");
		$ref = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_SESSION['email']}' AND type = 'Seniors'");
		$ref_n = mysqli_num_rows($ref);
		if($save)
		{
		    if($ref_n < 1)
		    {
		        $r = rand();
		        $update = mysqli_query($con, "INSERT INTO ref VALUES ('{$_SESSION['email']}','{$r}', 'Seniors', '0')");
		    }
		?>
        	<script type="text/javascript">
            	window.alert("Match Updated");
				window.location = "../index.php?seniors";
            </script>
		<?php }
		else
		{?>
			<script type="text/javascript">
            	window.alert("Failed to update");
				window.location = "../index.php?seniors";
            </script>
		<?php }
	}
}
if(isset($error))
{?>
	<script type="text/javascript">
    	window.alert("<?php echo $error; ?>");
		window.location = "../index.php?seniors";
    </script>
<?php }
?>