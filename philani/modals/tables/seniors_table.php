<?php
require("../../connection/connection.php");
$my_players = mysqli_query($con, "SELECT * FROM players WHERE age > 18 AND menager = '{$_SESSION['email']}'");
$num = mysqli_num_rows($my_players);
$cost = mysqli_query($con, "SELECT SUM(price) as price FROM players WHERE menager = '{$_SESSION['email']}' and age > 18");
$cost_results = mysqli_fetch_assoc($cost);
$menager = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_SESSION['email']}' AND type = 'Seniors'");
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
  width: 190%;
  left: 0;
  border: 2px solid rgba(60,109,111,1.00);
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
  padding-left: 20%;
  padding-bottom: 4%;
  background: rgba(60,109,111,1.00);
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
  width:190%;
  height: 60px;
  padding: 10px;
  background: #f1f3f5;
}
}

</style>

<div class="modal fade" id="seniorsTableModal" tabindex="-1" role="dialog" aria-labelledby="seniorsTableModalLebel">
    <div class="modal-dialog modal-lg" role="player">
        <div class="modal-content">
            <div class="modal-header">                    
                <h4 class="modal-title text-center"><span style="color:#fff; padding-left:100px;"><a class="fa fa-info-circle"></a> </span><?php echo $_SESSION['club_name']; ?> (Seniors)</h4>
                <button type="button" class="close" onClick="closeModal();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:#000">&times;</span></button>
            </div>
            <div class="modal-body">                  	                
                <div class="row col-md-4" id="assigneInvesrigater">
                    <div id="assigneInvesrigater_div" style="display:block;">
                        <table class="table table-bordered table-responsive" width="100%" cellspacing="0" style="margin-bottom:10%; margin-top:3%;">                    	
                                <thead>
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
                                        <th>Fees Available</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form action="controller/update_matches.php" method="post">
                        			<?php 
                        				$number = 0; 
                        				while($my_players_output = mysqli_fetch_assoc($my_players)):
                        				$number += 1;
                        				
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
                                              <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Girls'] == 1){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Girls'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                                             </td>
                                            <td>                                             	
                                              <p><span style="font-size:13px; color:<?php if($my_players_output['U13_Boys'] == '1'){?>green<?php }else{?>red<?php }?>" class="<?php if($my_players_output['U13_Boys'] == '1'){?>fa fa-check<?php }else{?>fa fa-close<?php }?>"></span></p>               
                                             </td>
                                             <td>                                             	
                                              <p><?php echo $my_players_output['paring']; ?></p>               
                                             </td>
                                            <td>R <?php echo $my_players_output['price']; ?></td>                    
                                            <td><a style="color:red;" onClick='viewSenior("<?php echo $my_players_output['id_number']; ?>")'>Update</a></td>                    
                                        </tr>                 
                                        <?php endwhile;?>
                                        <tr>
                                        	<td colspan="5" rowspan="5" style="text-align:center;">Gauteng Central Table Tennis<br>Bank : FNB <br>Chaque Acc : 62803580655</td>
                                            <tr>
                                            	<td colspan="2">Total Entries</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $num; ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="2">Email Address</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo $_SESSION['email']; ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="2">Total Fees Due</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><?php echo "R ".number_format($cost_results['price'],2); ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="7"></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="5"></td>
                                            	<td colspan="2">Upload proof of payment</td>
                                                <td colspan="2"></form>
                                                	<?php
                                                    	if(isset($_POST['proof_senior']))
                        								{
                        									//Attachment
                        									$attachment = $_FILES['proof']['name'];
                        									$directory = "../../attachments/".$attachment;
                        									$tmp_name = $_FILES['proof']['tmp_name'];
                        									move_uploaded_file($tmp_name,$directory);
                        									$save = mysqli_query($con, "INSERT INTO proofs VALUES ('{$_SESSION['email']}', '{$attachment}', 'Seniors')");
                        									if($save)
                        									{?>
                        										<script type="text/javascript">
                                                                	window.alert('Proof uploaded.');
                                                                </script>
                        									<?php }
                        								}
                        							?>
                                                	<form action="" method="post" enctype="multipart/form-data">
                                                	<?php if($menager_results['ref_num'] != ''): ?>
                                                	<input type="file" required name="proof">                           
                                                    </td>
                                                    <td>
                                                	<input type="submit" name="proof_senior" value="Upload" class="btn-sm btn-info">
                                                	<?php endif; ?>
                                                    </form>
                                                </td>
                                                <td colspan="3">Ref: <?php echo $menager_results['ref_num']; ?></td>
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
			jQuery('#seniorsTableModal').modal('hide');
			setTimeout 
			(
				function()
				{
					jQuery('#seniorsTableModal').remove();
					jQuery('#seniorsTableModal').remove();
				},500
			);
		}
		
		function viewSenior(id)
		{
			var data = {"id": id}
			jQuery.ajax
			(
				{
					url: "modals/view_seniors.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#viewSenoirModal').modal('toggle');
					},
					error: function()
					{
						alert('error,modal did not load');
					}
				}
			);
		}
  </script>
    <?php echo ob_get_clean(); ?>