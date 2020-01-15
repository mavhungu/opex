<?php 
	require ("connection/connection.php");
	if(isset($_SESSION['email']))
	{?>
    <script type="text/javascript">
    	window.location = "index.php";
    </script>
	<?php }
	
	if(isset($_SESSION['email_admin']))
	{?>
    <script type="text/javascript">
    	window.location = "Admin.php";
    </script>
	<?php }
?>
<!DOCTYPE html>
<html>
<title>GCTTA Tournaments</title>
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

<meta charset="UTF-8">
<link rel="shortcut icon" href="../images/crest.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}

</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-17916081-1', 'auto');
  ga('send', 'pageview');

</script><body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card-2 w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="../index.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="../league/league.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">League</a>
    <a href="../clubs/clubs.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Clubs</a>
    <a href="../news/news.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">News</a>
    <a href="../tournaments/index1.html" class="w3-bar-item w3-button w3-padding-large w3-white">Tournaments</a>
    <a href="../links/links.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Links</a>
    <a href="../contact.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="../index.html" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="../../league/league.html" class="w3-bar-item w3-button w3-padding-large">League</a>
    <a href="../news/news.html" class="w3-bar-item w3-button w3-padding-large">News</a>
   <a href="../tournaments/index1.html" class="w3-bar-item w3-button w3-padding-large w3-white">Tournaments</a>
    <a href="../links/links.html" class="w3-bar-item w3-button w3-padding-large">Links</a>
    <a href="../contact.html" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" >
  <p>&nbsp;</p>
  <p >&nbsp;</p>
  <h1 class="w3-margin w3-xxxlarge">Arnold Classic 2019</h1>
 
</header>
	<?php if(!isset($_GET['reg'])){; ?>
<div class="w3-content">
  <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
	<div class="container" style="text-align:center">
	        <p>Login</p>
	<form action="controller/login_reg.php" method="post">
        <div class="col-md-12 w3-responsive w3-centered text-center" style="top:10px; margin-bottom:10px; padding:10px;text-align:center;">
            <div style="border-radius:2%; padding:10px; text-align:center; margin-right:auto; margin-left:auto" class="col-md-6 form-group text-center" style="border-color:grey;">
                <input name="email" required style="margin-left:0%;border-color:grey;" type="email" class="form-control col-md-12 text-center btn" placeholder="Enter Email">
                <input name="password" required style="margin-left:0%; margin-top:2%;border-color:grey;" type="password" class="form-control col-md-12 text-center btn" placeholder="Enter Password">
                <input name="login" style="margin-left:0%" value="Login" type="submit" class="form-control col-md-12 text-center btn btn-sm btn-info" style="background-color:#f44336;">
                <br><a href="#" style="color:red;"><strong>Registration Closed</strong></a>
            </div>
        </div>
    </form>
</div>
</div>
</div>
    <?php }else{ ?>
    <div class="w3-content">
  <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
    <form action="controller/login_reg.php" method="post">
        <div class="col-md-12 w3-responsive w3-centered text-center" style="top:10px; margin-bottom:10px; padding:10px;">
             <h3>Register</h3>
            <div style="border-radius:2%; padding:10px; margin-right:auto; margin-left:auto" class="col-md-6 form-group text-center">
            	<input name="name" type="text" class="form-control col-md-12 text-center" placeholder="Enter Name" style="border-color:grey;"><br/>
                <input name="surname" type="text" class="form-control col-md-12 text-center" placeholder="Enter Surname" style="border-color:grey;"><br/>
                <input name="club_name" type="text" class="form-control col-md-12 text-center" placeholder="Enter Club Name" style="border-color:grey;"><br/>
                <input name="email" type="email" class="form-control col-md-12 text-center" placeholder="Enter Email" style="border-color:grey;"><br/>
                <input name="password" type="password" class="form-control col-md-12 text-center" placeholder="Enter Password" style="border-color:grey;"><br/>
                <input name="register" style="margin-left:0%" value="Register" type="submit" class="form-control col-md-12 text-center btn btn-sm btn-info" style="background-color:#f44336;">
                <br><a href="login.php">Already have an account? Login here</a>
            </div>
        </div>
    </form>
    <?php } ?>
</div>

</div>
<footer class="w3-container w3-center">


 <p class="foot text-center">© GCTTA All Rights Reserved. Hosted by OPEX Business Solutions (PTY) ltd | <a href="http://www.opexsolutions.co.za">Opex Business Solutions</a></p>
</footer>

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
