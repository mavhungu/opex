<?php include ("connection/connection.php");?>
<?php
    if(isset($_SESSION['email']))
    {
        unset($_SESSION['email']); 
    }
    if(isset($_SESSION['email_admin']))
    {
        unset($_SESSION['email_admin']);
    }
?>
<script type="text/javascript">window.location = "index1.php"; </script>