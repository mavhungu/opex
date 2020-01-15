<?php
if(isset($_GET['no_players']))
{
    require ("connection/connection.php");

    $m = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$_GET['email']}'");
    $m_r = mysqli_fetch_assoc($m);
    $firstname = $m_r['name'];
    $lastname = $m_r['surname'];
    $club_name = $m_r['club_name'];
    $email = $_GET['email'];
    //send email before exiting
	$subject = "Arnold Classic Registration Reminder.";
	$message = "This email is to remind :-
	
				Name and Surname: ".$firstname." ".$lastname."
				
				Club name       : ".$club_name."
				
				
				To please register yourself or additional players under your profile.
				Your web tickets will be issued before the 10th of May 2019.
				You will need your web ticket to exchange for a wrist band at the entrance.
				Your wrist band will allow you access to the convention center from the 17th to the 19th of May";
	$message = wordwrap($message);
	$send_email = mail($email, $subject, $message);
	if($send_email)
	{
    ?>
        <script type="text/javascript">
        window.alert('Reminder Sent.');
    	window.location = "Admin.php?m=<?php echo $_GET['email']; ?>";
    </script>
    <?php }
    else
    {
        die(mysqli_error($con));
    }
}
if(isset($_GET['no_matches']))
{
    require ("connection/connection.php");

    $m = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$_GET['email']}'");
    $m_r = mysqli_fetch_assoc($m);
    $firstname = $m_r['name'];
    $lastname = $m_r['surname'];
    $club_name = $m_r['club_name'];
    $email = $_GET['email'];
    //send email before exiting
	$subject = "Arnold Classic Registration Reminder.";
	$message = "This email is to remind :-
	
				Name and Surname: ".$firstname." ".$lastname."
				
				Club name       : ".$club_name."
				
				
				To please update your players into the correct category.
				Your web tickets will be issued before the 10th of May 2019.
				You will need your web ticket to exchange for a wrist band at the entrance.
				Your wrist band will allow you access to the convention center from the 17th to the 19th of May";
	$message = wordwrap($message);
	$send_email = mail($email, $subject, $message);
	if($send_email)
	{
    ?>
        <script type="text/javascript">
        window.alert('Reminder Sent.');
    	window.location = "Admin.php?m=<?php echo $_GET['email']; ?>";
    </script>
    <?php }
    else
    {
        die(mysqli_error($con));
    }
}
if(isset($_GET['not_paid']))
{
    require ("connection/connection.php");

    $m = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$_GET['email']}'");
    $m_r = mysqli_fetch_assoc($m);
    $firstname = $m_r['name'];
    $lastname = $m_r['surname'];
    $club_name = $m_r['club_name'];
    $email = $_GET['email'];
    //send email before exiting
	$subject = "Arnold Classic Registration Reminder.";
	$message = "This email is to remind :-
	
				Name and Surname: ".$firstname." ".$lastname."
				
				Club name       : ".$club_name."
				
				
				To please pay the outsyanding fee of R".$_GET['price']."
				Your web tickets will be issued before the 10th of May 2019.
				You will need your web ticket to exchange for a wrist band at the entrance.
				Your wrist band will allow you access to the convention center from the 17th to the 19th of May";
	$message = wordwrap($message);
	$send_email = mail($email, $subject, $message);
	if($send_email)
	{
    ?>
        <script type="text/javascript">
        window.alert('Reminder Sent.');
    	window.location = "Admin.php?m=<?php echo $_GET['email']; ?>";
    </script>
    <?php }
    else
    {
        die("...".mysqli_error($con));
    }
}
?>