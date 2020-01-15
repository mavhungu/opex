<!--=============================juniors==================-->
  	<table id="example" class="table table-bordered table-hover" width="99%" cellspacing="0" style="margin-bottom:2%; margin-left:2%; margin-top:2%; margin-right:2%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:black; color:#fff; padding:1%;">Juniors</h2></th></tr>
            <tr>            	
                <th>#</th>
                <th>AC Number</th>
                <th>Name</th>
                <th>Surname</th>            
                <th>ID Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>U13 Boys</th>
                <th>U13 Girls</th>
                <th>U15 Boys</th>
                <th>U15 Girls</th>
                <th>U18 Boys</th>
                <th>U18 Girls</th>
                <th>Doubles</th>
                <th>Fees Applicable</th>
            </tr>
        </thead>
        <tbody>
        <form action="controller/update_matches.php" method="post">
			<?php 
				$number = 0; 
				while($my_players_output = mysqli_fetch_assoc($junior_players)):
				$number += 1;
				
				?>
                <tr>
                	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                    <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                    <td><?php echo $number ?></td>
                    <td><?php echo $my_players_output['AC_number']; ?></td>
                    <td><?php echo $my_players_output['name']; ?></td>
                    <td><?php echo $my_players_output['surname']; ?></td>
                    <td><?php echo $my_players_output['id_number']; ?></td>
                    <td><?php echo $my_players_output['age']; ?></td>
                    <td><?php echo $my_players_output['gender']; ?></td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U15_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U15_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U15_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U15_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U18_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U18_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U18_Girls'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U18_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td><td>                                             	
                      <p><?php echo $my_players_output['paring']; ?></p>               
                     </td>
                    <td>R <?php echo $my_players_output['price']; ?></td>                    
                </tr>                 
                <?php endwhile;?>
            </tbody>
        </table>
    </form>
    <table id="example" class="table table-bordered" width="50%" cellspacing="0" style="margin-bottom:1%; width:50%; margin-left:2%; margin-top:0%; margin-right:2%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:black; color:#fff; padding:1%;">Junior Doubles</h2></th></tr>
            <tr>            	
                <th>#</th>
                <th>Pairing</th>
                <th>Surname 1</th>            
                <th>Surname 2</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
				$n = 0; while($r = mysqli_fetch_assoc($doubles)): $n +=1;
				$pair = mysqli_query($con, "SELECT * FROM players WHERE AC_number = '{$r['paring']}'");
				$pair_r = mysqli_fetch_assoc($pair);
			?>
            	<tr>
                	<td><?php echo $n; ?></td>
                    <td><?php echo $r['AC_number']."/".$r['paring']; ?></td>
                    <td><?php echo $r['surname']; ?></td>
                    <td><?php echo $pair_r['surname']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!--========================End Juniors====================-->
    <!--==========Seniors========================-->
    <table id="example" class="table table-bordered" width="99%" cellspacing="0" style="margin-bottom:1%; margin-left:2%; margin-right:2%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:black; color:#fff; padding:1%;">Seniors</h2></th></tr>
            <tr>            	
                <th>#</th>
                <th>AC Number</th>
                <th>Name</th>
                <th>Surname</th>            
                <th>ID Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Women</th>
                <th>Men</th>
                <th>Doubles</th>
                <th>Fees Applicable</th>
            </tr>
        </thead>
        <tbody>
        <form action="controller/update_matches.php" method="post">
			<?php 
				$number = 0; 
				while($my_players_output = mysqli_fetch_assoc($senior_players)):
				$number += 1;
				
				?>
                <tr>
                	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                    <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                    <td><?php echo $number ?></td>
                    <td><?php echo $my_players_output['AC_number']; ?></td>
                    <td><?php echo $my_players_output['name']; ?></td>
                    <td><?php echo $my_players_output['surname']; ?></td>
                    <td><?php echo $my_players_output['id_number']; ?></td>
                    <td><?php echo $my_players_output['age']; ?></td>
                    <td><?php echo $my_players_output['gender']; ?></td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Girls'] == 1){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                    <td>                                             	
                      <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                     </td>
                     <td>                                             	
                      <p><?php echo $my_players_output['paring']; ?></p>               
                     </td>
                    <td>R <?php echo $my_players_output['price']; ?></td>                    
                </tr>                 
                <?php endwhile;?>
                <tr stlye="background-color:red;">
                    <td colspan='11'></td>
                </tr>
                <!--JuniorsPlaying doubles-->
                <?php
                    $j_s = mysqli_query($con, "SELECT * FROM seniors_juniors");
                    while($j_s_r = mysqli_fetch_assoc($j_s)):
                        $j_s2 = mysqli_query($con, "SELECT * FROM players WHERE AC_number = '{$j_s_r['AC_number']}'");
                        $j_s2_r = mysqli_fetch_assoc($j_s2);
                ?>
                    <tr>
                        <td><?php echo $number+=1; ?></td>
                        <td><?php echo $j_s2_r['AC_number']; ?></td>
                        <td><?php echo $j_s2_r['name']; ?></td>
                        <td><?php echo $j_s2_r['surname']; ?></td>
                        <td><?php echo $j_s2_r['id_number']; ?></td>
                        <td><?php echo $j_s2_r['age']; ?></td>
                        <td><?php echo $j_s2_r['gender']; ?></td>
                        <td>                                             	
                          <p><span style="font-size:13px; color:<?php if($j_s_r['women'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($j_s_r['women'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                         </td>
                         <td>                                             	
                          <p><span style="font-size:13px; color:<?php if($j_s_r['mens'] == 1){?>green<?php }else{?>red<?php }?>" class="<?php if($j_s_r['mens'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                         </td>
                         <td>                                             	
                          <p><?php echo $j_s_r['doubles']; ?></p>               
                         </td>
                         <td>R <?php echo $j_s_r['price']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>
    <table id="example" class="table table-bordered" width="50%" cellspacing="0" style="margin-bottom:1%; width:50%; margin-left:2%; margin-top:0%; margin-right:2%;">                    	
        <thead>
        	<tr><th colspan="17"><h2 style="background-color:black; color:#fff; padding:1%;">Senior Doubles</h2></th></tr>
            <tr>            	
                <th>#</th>
                <th>Pairing</th>
                <th>Surname 1</th>            
                <th>Surname 2</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
				$n = 0; while($r = mysqli_fetch_assoc($doubless)): $n +=1;
				$pair = mysqli_query($con, "SELECT * FROM players WHERE AC_number = '{$r['paring']}'");
				$pair_r = mysqli_fetch_assoc($pair);
			?>
            	<tr>
                	<td><?php echo $n; ?></td>
                    <td><?php echo $r['AC_number']."/".$r['paring']; ?></td>
                    <td><?php echo $r['surname']; ?></td>
                    <td><?php echo $pair_r['surname']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!--===========================End Seniors==============-->