<?php
require("connection/connection.php");
$m = mysqli_query($con, "SELECT * FROM menager");
$j_sum = mysqli_query($con, "SELECT SUM(price) as price FROM players");
$j_sum_r = mysqli_fetch_assoc($j_sum);
/*if(mysqli_num_rows($s) < 1)
{
    die(mysqli_error($con));
}
else
{
    die("sss");
}*/
    $p1 = 0;
    $p = 0;
    while($r = mysqli_fetch_assoc($m))
    {
        $j_p = mysqli_query($con, "SELECT DISTINCT SUM(price) as price FROM players WHERE menager = '{$r['email']}' AND age < 19");
        $j_p_r = mysqli_fetch_assoc($j_p);
        
        
        $s_p = mysqli_query($con, "SELECT DISTINCT SUM(price) as price FROM players WHERE menager = '{$r['email']}' AND age > 18");
        $s_p_r = mysqli_fetch_assoc($s_p);
        
        $proofs_j = mysqli_query($con, "SELECT DISTINCT * FROM proofs INNER JOIN ref WHERE proofs.email = '{$r['email']}' AND proofs.type = 'Juniors' AND ref.email = proofs.email AND ref.type = 'Juniors' AND ref.status = 'Approved'");
        
        if(mysqli_num_rows($proofs_j) > 0)
        {
            //echo $r['email']."--".$j_p_r['price']."<br>";
            $p += $j_p_r['price'];
        }
        
        
        $proofs_s = mysqli_query($con, "SELECT * FROM proofs INNER JOIN ref WHERE proofs.email = '{$r['email']}' AND proofs.type = 'Seniors' AND ref.email = proofs.email AND ref.type = 'Seniors' AND ref.status = 'Approved'");
        
        if(mysqli_num_rows($proofs_s) > 0)
        {
            //echo "<br><br><br><br>".$r['email']."--".$p1 += $s_p_r['price']."<br>";
            $p1 += $s_p_r['price'];
        }
    }
    
    echo $o = $p + $p1;
    /*echo $r['email'].$p1."<br>";
    echo $p."<br>";
    echo $o = $j_sum_r['price'] - ($p+$p1)."<br>";
    echo $p+$p1+$o."<br>".$j_sum_r['price'];*/
?>