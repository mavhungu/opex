<?php 
	require ("../connection/connection.php");
	
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		//ADMIN 
		$admin = mysqli_query($con, "SELECT * FROM admin WHERE email = '{$email}' and password = '{$password}'");
		$admin_num = mysqli_num_rows($admin);
		
		$user = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$email}' and password = '{$password}'");
		$num = mysqli_num_rows($user);
		
		
		if($admin_num > 0)
		{
		    $admin_results = mysqli_fetch_assoc($admin);
		    $_SESSION['email_admin'] = $admin_results['email'];?>
			<script type="text/javascript">
            	window.location = "../Admin.php";
            </script>
		<?php }
		else if($num > 0)
		{
			$user_results = mysqli_fetch_assoc($user);
			$_SESSION['name'] = $user_results['name'];
			$_SESSION['surname'] = $user_results['surname'];
			$_SESSION['club_name'] = $user_results['club_name'];
			$_SESSION['email'] = $user_results['email'];?>
			<script type="text/javascript">
            	window.location = "../index.php";
            </script>
		<?php }
		else
		{?>
			<script type="text/javascript">
            	window.alert("Incorrect login credentials.");
				window.location = "../login.php";
            </script>
		<?php }
	}
	 if(isset($_POST['register']))
	{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$club_name = $_POST['club_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$ref = rand();
		$save = mysqli_query($con, "INSERT INTO menager VALUES (NULL, '{$name}', '{$surname}', '{$club_name}', '{$email}', '{$password}','{$ref}')");
		if($save)
		{
			$_SESSION['name'] = $name;
			$_SESSION['surname'] = $surname;
			$_SESSION['club_name'] = $club_name;
			$_SESSION['email'] = $email;?>
            <script type="text/javascript">
            	window.location = "../index.php";
            </script>
		<?php }
		else
		{
			die(mysqli_error($con));
		}
	}
?>