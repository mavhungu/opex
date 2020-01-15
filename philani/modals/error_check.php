<?php
require ("../connection/connection.php");
for($l =0; $l < $_POST['number']; $l++):

	$name = $_POST['name'.$l];
	$surname = $_POST['surname'.$l];
	$id = $_POST['id_number'.$l];
		
	$ac = "AC".rand();
	
	include ("id-substring.php");
	if(isset($gender) && isset($age))
	{
	  //check id
	  $check_id = mysqli_query($con, "SELECT * FROM players WHERE id_number = '{$id}'");
	  if(mysqli_num_rows($check_id) < 1)
	  {
	      $save = mysqli_query($con, "INSERT INTO players VALUES (NULL, '{$ac}', '{$name}', '{$surname}', 'GCTTA', '{$_SESSION['club_name']}', '{$id}', '{$age}', '{$gender}', '{$_SESSION['email']}', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL)");  
	  }
	  else
	  {?>
	      <script type="text/javascript">
	        window.alert("ID number (<?php echo $id; ?>) already exists in the system.");
	        window.location = "../index.php";
	    </script>
	  <?}
	}
	else
	{?>
	    <script type="text/javascript">
	        window.alert("You inserted wrong ID number");
	        window.location = "../index.php";
	    </script>
	<?php }
endfor;
if($save)
{	
	if($age < 19)
	{
		$player = "Juniors";
		$check = mysqli_query($con, "SELECT * FROM cost WHERE menager = '{$_SESSION['email']}' and players = '$player'");
		$check_num = mysqli_num_rows($check);
		if($check_num < 1)
		{			
			$save_cost = mysqli_query($con, "INSERT INTO cost VALUES ('{$_SESSION['email']}', '0', NULL, '{$player}')");
			if(!$save_cost)
			{
				die(mysqli_error($con));
			}
		}
	}
	if($age > 18)
	{
		$player = "Seniors";
		$check = mysqli_query($con, "SELECT * FROM cost WHERE menager = '{$_SESSION['email']}' and players = '$player'");
		$check_num = mysqli_num_rows($check);
		if($check_num < 1)
		{
			$save_cost = mysqli_query($con, "INSERT INTO cost VALUES ('{$_SESSION['email']}', '0', NULL, '{$player}')");
		}
	}	
	?>
	<script type="text/javascript">
    	window.alert("Player Saved.");
		window.location = "../index.php";
    </script>
<?php }
else{die(mysqli_error($con));}
?>