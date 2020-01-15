<?php
require("connection/connection.php");
if(isset($_GET['id']))
{
    $d = mysqli_query($con, "DELETE FROM players WHERE AC_number = '{$_GET['id']}'");
    if($d)
    {
        $d2 = mysqli_query($con, "DELETE FROM seniors_juniors WHERE AC_number = '{$_GET['id']}'");?>
        <script type="text/javascript">
            window.alert("Player Deleted.");
            window.location = "index.php";
        </script>
    <?php }
}
?>