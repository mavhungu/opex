<?php
if(isset($_GET['email']))
{
    require ("connection/connection.php");
    $update = mysqli_query($con, "UPDATE ref SET status = 'Approved' WHERE email = '{$_GET['email']}' and type = '{$_GET['type']}'");
    if($update)
    {
        $m = mysqli_query($con, "SELECT * FROM menager WHERE email = '{$_GET['email']}'");
        $m_r = mysqli_fetch_assoc($m);
        $firstname = $m_r['name'];
        $lastname = $m_r['surname'];
        $club_name = $m_r['club_name'];
        $email = $_GET['email'];
        //send email before exiting
		$subject = "Arnold Classic Registration Approval.";
		$message = "This email is to confirm that:-
		
					Name and Surname: ".$firstname." ".$lastname."
					
					Club name       : ".$club_name."
					
					
					Has been approved for registration, we are looking forward to seeing you at the tournament from the 17th to the 19th  of May 2019 at the Sandton Center.
					Your web tickets will be issued before the 10th of May 2019.
					You will need your web ticket to exchange for a wrist band at the entrance.
					Your wrist band will allow you access to the convention center from the 17th to the 19th of May";
		$message = wordwrap($message);
		$send_email = mail($email, $subject, $message);
		if($send_email)
		{
    ?>
        <script type="text/javascript">
        window.alert('Approved');
    	window.location = "Admin.php?m=<?php echo $_GET['email']; ?>";
    </script>
    <?php }
    else
    {
        die(mysqli_error($con));
    }
    }
}
?>