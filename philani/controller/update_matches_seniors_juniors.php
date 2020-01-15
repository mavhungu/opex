<?php
require ("../connection/connection.php");
$id = $_POST['id'];
if($_POST['gender'] == "Female")
{
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
		$check = mysqli_query($con, "SELECT * FROM seniors_juniors WHERE AC_number = '{$_POST['ac']}'");
		if(mysqli_num_rows($check) < 1)
		{
		    $save = mysqli_query($con, "INSERT INTO seniors_juniors VALUES (NULL, '{$_POST['ac']}', NULL, '{$_POST['U13']}', '{$_POST['doubles']}', '{$price}', '{$_SESSION['email']}')");
		}
		else
		{
		    $save = mysqli_query($con, "UPDATE seniors_juniors SET doubles = '{$_POST['doubles']}', women = '{$_POST['U13']}', price = '{$price}' WHERE AC_number = '{$_POST['ac']}'");
		}
	}
	if($save)
	{?>
       <script type="text/javascript">
           window.alert("Match Updated.");
           window.location = "../index.php";
       </script> 
    <?php }
	else if(isset($error))
	{?>
	    <script type="text/javascript">
	        window.alert("<?php echo $error; ?>");
	        window.location = "../index.php";
	    </script>
	<?php }
	else
	{?>
	    <script type="text/javascript">
	        window.alert("No Updates were done.");
	        window.location = "../index.php";
	    </script>
	<?php }
}
if($_POST['gender'] == "Male")
{
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
		$check = mysqli_query($con, "SELECT * FROM seniors_juniors WHERE AC_number = '{$_POST['ac']}'");
		if(mysqli_num_rows($check) < 1)
		{
		    $save = mysqli_query($con, "INSERT INTO seniors_juniors VALUES (NULL, '{$_POST['ac']}', '{$_POST['U13']}', NULL, '{$_POST['doubles']}', '{$price}', '{$_SESSION['email']}')");
		}
		else
		{
		    $save = mysqli_query($con, "UPDATE seniors_juniors SET doubles = '{$_POST['doubles']}', mens = '{$_POST['U13']}', price = '{$price}' WHERE AC_number = '{$_POST['ac']}'");
		}
	}
	if($save)
	{?>
       <script type="text/javascript">
           window.alert("Match Updated.");
           window.location = "../index.php";
       </script> 
    <?php }
	else if(isset($error))
	{?>
	    <script type="text/javascript">
	        window.alert("<?php echo $error; ?>");
	        window.location = "../index.php";
	    </script>
	<?php }
	else
	{?>
	    <script type="text/javascript">
	        window.alert("No Updates were done.");
	        window.location = "../index.php";
	    </script>
	<?php }
}
?>