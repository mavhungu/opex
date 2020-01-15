<?php
require("../../connection/connection.php");
$my_players = mysqli_query($con, "SELECT * FROM players WHERE age < 19 AND menager = '{$_SESSION['email']}'");
$num = mysqli_num_rows($my_players);
$cost = mysqli_query($con, "SELECT SUM(price) as price FROM players WHERE menager = '{$_SESSION['email']}' and age < 19");
$cost_results = mysqli_fetch_assoc($cost);
$menager = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_SESSION['email']}' AND type = 'Juniors'");
$menager_results = mysqli_fetch_assoc($menager);
?>

<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400);

.font-roboto {
  font-family: 'roboto condensed';
}

* {
  box-sizing: border-box;
}

body {
  .font-roboto();
}

.modal {
  position: fixed;
  top: 20px;
  right: 20px;
  bottom: 20px;
  left: 10%;
  overflow: hidden;
}

.modal-dialog {
  position: fixed;
  margin: 0;
  width: 100%;
  height: 70%;
  padding: 0;
}

.modal-content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  width: 270%;
  left: 0;
  border: 2px solid #f44336;
  border-radius: 10px;
  box-shadow: none;
}

.modal-header {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  width:100%;
  height: 50px;
  padding: 10px;
  padding-left: 25%;
  padding-bottom: 4%;
  background: #f44336;
  border: 0;
  text-align:center;
}

.modal-title {
  font-weight: 300;
  font-size: 2em;
  color: #fff;
  line-height: 30px;
}

.modal-body {
  position: absolute;
  top: 50px;
  bottom: 60px;
  width: 100%;
  font-weight: 300;
  overflow: auto;
}

.modal-footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  width:270%;
  height: 60px;
  padding: 10px;
  background: #f1f3f5;
}
}

</style>
<div class="modal fade" id="juniorsTableModal" tabindex="-1" role="dialog" aria-labelledby="juniorsTableModalLebel">
    <div class="modal-dialog modal-full" role="player">
        <div class="modal-content">
            <div class="modal-header">                    
                <h4 class="modal-title text-center"><span style="color:#fff; padding-left:100px;"><a class="fa fa-info-circle"></a> </span><?php echo $_SESSION['club_name']; ?> (Juniors)</h4>
                <button type="button" class="close" onClick="closeModal();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:#000">&times;</span></button>
            </div>
            <div class="modal-body">                  	                
                <div class="row col-md-4" id="assigneInvesrigater">
                    <div id="assigneInvesrigater_div" style="display:block; text-align:center;">
                        <table class="table table-responsive table-bordered" cellspacing="0" style="margin-bottom:10%; margin-top:3%; width:100%">                    	
                                <thead>
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
                                        <th>Seniors</th>
                                        <th>Senior Doubles</th>
                                        <th>Fees Available</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form action="controller/update_matches.php" method="post" style="width:100%">
                        			<?php 
                        				$number = 0; 
                        				while($my_players_output = mysqli_fetch_assoc($my_players)):
                        				$number += 1;
                        				//Juniors playing seniors
                        	            $s_j1 = mysqli_query($con, "SELECT price as p FROM seniors_juniors WHERE AC_number = '{$my_players_output['AC_number']}'");
                        	            $_j_r1 = mysqli_fetch_assoc($s_j1);
                        	            $s_j2 = mysqli_query($con, "SELECT SUM(price) as tot_p FROM seniors_juniors WHERE menager = '{$_SESSION['email']}'");
                        	            $_j_r2 = mysqli_fetch_assoc($s_j2);
                        	            $s_j_d = mysqli_query($con, "SELECT doubles as d FROM seniors_juniors WHERE AC_number = '{$my_players_output['AC_number']}'");
                        	            $s_j_d_r = mysqli_fetch_assoc($s_j_d);
                        				?>
                                        <tr>
                                        	<input type="hidden" name="gender" value="<?php echo $my_players_output['gender']; ?>">
                                            <input type="hidden" name="id_number" value="<?php echo $my_players_output['id_number']; ?>">
                                            <td><a href="delete.php?id=<?php echo $my_players_output['AC_number']; ?>" style="color:red;"><span class='fa fa-trash'>Delete</span></a></td>
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
                                             </td>
                                             <td>                                             	
                                              <p><?php echo $my_players_output['paring']; ?></p>               
                                             </td>
                                             <td>
                                                 <p><span style="font-size:13px; color:<?php if(mysqli_num_rows($s_j1) > 0){?>green<?php }else{?>red<?php }?>" class="<?php if(mysqli_num_rows($s_j1) > 0){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                                             </td>
                                             <td>
                                                 <?php echo $s_j_d_r['d']; ?>
                                             </td>
                                            <td>R <?php echo $my_players_output['price']+$_j_r1['p']; ?></td>                    
                                            <td><a style="color:red;" onClick='viewPlayer("<?php echo $my_players_output['id_number']; ?>")'>Update</a></td>
                                            <td><a style="color:red;" onClick='playSeniorsJuniors("<?php echo $my_players_output['id_number']; ?>")'>Play Seniors</a></td>
                                        </tr>                 
                                        <?php endwhile;?>
                                        <tr>
                                        	<td colspan="8" rowspan="6" class="text-center" style="text-aligne:center; background-color:rgba(108,101,101,0.66);">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                                        	<tr>
                                            	<td colspan="7" style="background-color:rgba(108,101,101,0.66);"></td>
                                            	<td colspan="4" rowspan="5" style="background-color:rgba(108,101,101,0.66);"></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="3">Total Entries</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $num; ?></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="3">Email Address</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $_SESSION['email']; ?></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="3">Total Fees Due</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo "R ".number_format($cost_results['price']+$_j_r2['tot_p'],2); ?></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="7" style="background-color:rgba(108,101,101,0.66);"></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="8"></td></form>
                                                <?php
                                                    	if(isset($_POST['proof_junior']))
                        								{
                        									//Attachment
                        									$attachment = $_FILES['proof']['name'];
                        									$directory = "../../attachments/".$attachment;
                        									$tmp_name = $_FILES['proof']['tmp_name'];
                        									$m = move_uploaded_file($tmp_name,$directory);
                        									if(!$m)
                        									{
                        									    die("failed to load".mysqli_error($m));
                        									}
                        									else
                        									{
                        									$save = mysqli_query($con, "INSERT INTO proofs VALUES ('{$_SESSION['email']}', '{$attachment}', 'Juniors')");
                        									if($save)
                        									{?>
                        										<script type="text/javascript">
                                                                	window.alert('Proof uploaded.');
                                                                </script>
                        									<?php }}
                        								}
                        							?>
                                            	<td colspan="3">Upload proof of payment</td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <?php if($menager_results['ref_num'] != ''): ?>
                                                    <td colspan="2"><input type="file" required name="proof"></td>
                                                    <td><input type="submit" name="proof_junior" value="Upload" class="btn-sm btn-info"></td>
                                                    <?php endif; ?>
                                                </form>
                                                <td colspan="5">Ref: <?php echo $menager_results['ref_num']; ?></td>
                                            </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>                
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onClick="closeModal();" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
    <script>
  		function closeModal()
		{
			jQuery('#juniorsTableModal').modal('hide');
			setTimeout 
			(
				function()
				{
					jQuery('#juniorsTableModal').remove();
					jQuery('#juniorsTableModal').remove();
				},500
			);
		}
		function viewPlayer(id)
		{
			var data = {"id": id}
			jQuery.ajax
			(
				{
					url: "modals/view_player.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#viewPlayerModal').modal('toggle');
					},
					error: function()
					{
						alert('error');
					}
				}
			);
		}
  </script>
    <?php echo ob_get_clean(); ?>