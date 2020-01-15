<?php
    /*$productResult = mysqli_query($con, "SELECT DISTINCT players.AC_number as 'AC Number', players.name as 'Name', players.surname as 'Surname', players.association as 'Assoc.', players.club as 'Club', players.id_number as 'ID Number', players.U13_Boys as 'U13 Boys', players.U13_Girls as 'U13 Girls', players.U15_Boys as 'U15 Boys', players.U15_Girls as 'U15 Gilrs', players.U18_Boys as 'U18 Boys', players.U18_Girls as 'U18 Girls', players.price as 'Price', ref.ref_num as 'Refference', proofs.excel as 'POP', ref.status as 'Status' FROM players INNER JOIN ref INNER JOIN proofs ON players.age < 19 AND players.menager = ref.email AND ref.type = 'Juniors' AND players.menager = proofs.email");*/
    $productResult = mysqli_query($con, "SELECT DISTINCT * FROM players WHERE age < 19");
    $j_sum = mysqli_query($con, "SELECT SUM(price) as price FROM players");
    $j_sum_r = mysqli_fetch_assoc($j_sum);
    
    
    //$s = mysqli_query($con, "SELECT DISTINCT players.AC_number as 'AC Number', players.name as 'Name', players.surname as 'Surname', players.association as 'Assoc', players.club as 'Club', players.id_number as 'ID Number', players.U13_Boys as 'Mens', players.U13_Girls as 'Womens', players.paring as 'paring', players.price as 'Price', ref.ref_num as 'Refference', proofs.excel as 'POP', ref.status as 'Status' FROM players INNER JOIN ref INNER JOIN proofs ON players.age > 18 AND players.menager = ref.email AND ref.type = 'Seniors' AND players.menager = proofs.email");
    $s = mysqli_query($con, "SELECT DISTINCT * FROM players WHERE age > 18");
    
    
    //Juniors playing seniors
    //$junionrs_s = mysqli_query($con, "SELECT * FROM players INNER JOIN seniors_juniors WHERE players.age < 19 AND seniors_juniors.AC_number = players.AC_number");
    
    $m = mysqli_query($con, "SELECT * FROM menager");
    $total_fees = mysqli_query($con, "SELECT SUM(price) as 'price' FROM players");
    $total_fees_r = mysqli_fetch_assoc($total_fees);
    if (isset($_POST["export"]))
    {
        $filename = "Export_excel.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $isPrintHeader = false;
        if (! empty($productResult))
    	{
    	    echo "\n\t#\tAC Number\tName\tSurname\tID Number\tU13 Boys\tU13 Girls\tU15 Boys\tU15 Girls\tU18 Boys\tU18 Girls\tDoubles\tMens\tWomens\tDoubles\tFees Due\tHow Much is Paid\tOutstanding\n";
    	    $n = 1;
    	    $paid = 0;
    	    $outstanding = 0;
    	    $men ="";
    	    $women = "";
    	    $doubles = '';
    	    while($r = mysqli_fetch_assoc($productResult))
    	    {
    	        $due = $r['price'];
    	        $junionrs_s = mysqli_query($con, "SELECT * FROM players JOIN seniors_juniors WHERE players.age < 19 AND seniors_juniors.AC_number = players.AC_number AND players.AC_number = '{$r['AC_number']}'");
    	        $junionrs_s_r = mysqli_fetch_assoc($junionrs_s);
    	        $pop = mysqli_query($con, "SELECT DISTINCT * FROM proofs INNER JOIN ref WHERE proofs.email = '{$r['menager']}' AND ref.email = proofs.email AND ref.status = 'Approved' AND proofs.type = 'Juniors' AND ref.type = 'Juniors'");
    	        if(mysqli_num_rows($pop) > 0)
    	        {
    	            $paid = $r['price'];
    	            $outstanding = 0;
    	            
    	            
        	            $due = $r['price'] + $junionrs_s_r['price'];
        	            $paid = $paid + $junionrs_s_r['price'];
        	            $outstanding = $outstanding + 0;
        	            $men = $junionrs_s_r['mens'];
        	            $women = $junionrs_s_r['women'];
        	            $doubles = $junionrs_s_r['doubles'];
        	        
    	        }
    	        else
    	        {
    	            $outstanding = $r['price'];
    	            $paid = 0;
    	            
    	            //Juniors_seniors
        	        if(mysqli_num_rows($junionrs_s) > 0)
        	        {
        	            $due = $r['price'] + $junionrs_s_r['price'];
        	            $paid = 0;
        	            $outstanding = $outstanding + $junionrs_s_r['price'];
        	            $men = $junionrs_s_r['mens'];
        	            $women = $junionrs_s_r['women'];
        	            $doubles = $junionrs_s_r['doubles'];
        	        }
    	        }
    	        
                echo "\t".$n++."\t". $r['AC_number']."\t". $r['name']."\t".$r['surname']."\t".$r["id_number"]."\t".$ref_r["U13_Boys"]."\t". $r['U13_Girls']."\t". $r['U15_Boys']."\t". $r['U15_Girls']."\t". $r['U18_boys']."\t". $r['U18_Girls']."\t". $r['paring']."\t".$men."\t".$women."\t".$doubles."\t". $due."\t".$paid."\t".$outstanding."\n";
            
    	        $paid += $paid;
    	        $outstanding += $outstanding;
    	    }
        }
    	if (! empty($s))
    	{
            while($r = mysqli_fetch_assoc($s))
    	    {
    	        $pop = mysqli_query($con, "SELECT DISTINCT * FROM proofs INNER JOIN ref WHERE proofs.email = '{$r['menager']}' AND ref.email = proofs.email AND ref.status = 'Approved' AND proofs.type = 'Seniors' AND ref.type = 'Seniors'");
    	        if(mysqli_num_rows($pop) > 0)
    	        {
    	            $paid = $r['price'];
    	            $outstanding = 0;
    	        }
    	        else
    	        {
    	            $paid = 0;
    	            $outstanding = $r['price'];
    	        }
                echo "\t".$n++."\t". $r['AC_number']."\t". $r['name']."\t".$r['surname']."\t".$r["id_number"]."\t\t\t\t\t\t\t\t". $r['U13_Boys']."\t". $r['U13_Girls']."\t". $r['paring']."\t". $r['price']."\t".$paid."\t".$outstanding."\n";
            
    	        $paid += $paid;
    	        $outstanding += $outstanding;
    	    }
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
            $p += $j_p_r['price'];
        }
        
        
        $proofs_s = mysqli_query($con, "SELECT * FROM proofs INNER JOIN ref WHERE proofs.email = '{$r['email']}' AND proofs.type = 'Seniors' AND ref.email = proofs.email AND ref.type = 'Seniors' AND ref.status = 'Approved'");
        
        if(mysqli_num_rows($proofs_s) > 0)
        {
            $p1 += $s_p_r['price'];
        }
    }
    $o = $j_sum_r['price'] - ($p + $p1);
    $pr = $p1 + $p;
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tTotal Fees :\tR".number_format($j_sum_r['price'],2)."\tR 21 760\tR 10 840";
        }
        exit();
    }
?>