<?php
if(isset($_POST['id']))
{
	require ("../connection/connection.php");
	$id = $_POST['id'];
	$player = mysqli_query($con, "SELECT * FROM players where id_number = '{$id}'");
	$results = mysqli_fetch_assoc($player);
	$ac_number = $results['AC_number'];
	$results_id = $results['id_number'];
	$results_gender = $results['gender'];
	$results_age = $results['age'];
	$results_name = $results['name'];
	$results_surname = $results['surname'];
	
	//Matches
	$results_U13_Boys = $results['U13_Boys'];
	$results_U13_Girls = $results['U13_Girls'];
	
	//DOUBLES
	$doubles = mysqli_query($con, "SELECT * FROM players WHERE menager = '{$_SESSION['email']}' and age > '18' AND AC_number != '{$ac_number}'");
}
ob_start();
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("input[id='chk']").change( function(){
			var maxAllowed = 2;
			var cnt = $("input[id='chk']:checked").length;
			if(cnt > maxAllowed){
				$(this).prop("checked", "");
				alert("One player can play up to 2 matches and a double for free.");
			}
		});
	});
</script>
<div class="modal fade" id="playSenoirJuniorModal" tabindex="-1" role="dialog" aria-labelledby="playSenoirJuniorModalLabel">
    <div class="modal-dialog modal-lg" role="player">
        <div class="modal-content">
            <div class="modal-header">                    
                <h4 class="modal-title text-center"><span style="color:#fff; padding-left:100px;"><a class="fa fa-info-circle"></a> </span>Update Player Matches</h4>
                <button type="button" class="close" onClick="closeModal();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:#000">&times;</span></button>
            </div>
            <div class="modal-body">                  	                
                <div class="row col-md-4" id="assigneInvesrigater">
                    <div id="assigneInvesrigater_div" style="display:block;">
                    	<form action="controller/update_matches_seniors.php" method="post">
                        	<!--================================Hidden inputs==========================-->
                            <input type="hidden" name="gender" value="<?php echo $results_gender; ?>">
                            <input type="hidden" name="id" value="<?php echo $results_id; ?>">
                            <!--================================Hidden inputs==========================-->
                        	<table class="table table-bordered" width="100%" style="margin-bottom:10%;">                    	
                                <thead>                                    
                                    <tr>            	
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <?php if($results_gender == "Male"){ ?>
                                        <th>Men</th>
                                        <?php }else{ ?>
                                        <th>Women</th>
                                        <?php }?>
                                        <th>Doubles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                    	<td><?php echo $results_name; ?></td>
                                        <td><?php echo $results_surname ?></td>
                                        <?php if($results_gender = 'Female'){ ?>
                                        <td><input type="checkbox" <?php if($results_U13_Girls == 1): echo "checked"; endif; ?> value="1" name="U13" id="chk" onClick="return limit()"></td>                                        <?php }else{ ?>
                                        <td><input type="checkbox" <?php if($results_U13_Boys == 1):?>checked<?php endif; ?> value="1" name="U13" id="chk" onClick="return limit()"></td>
                                        <?php } ?>
                                        <td>
                                        	<select name="doubles" id="">
                                            	<option value="">No Double</option>
                                            	<?php 
													while($r = mysqli_fetch_assoc($doubles)):
												?>
                                                	<option value="<?php echo $r['AC_number']; ?>"><?php echo $r['AC_number']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                             </table>
                            <button type="submit" class="btn btn-sm btn-info">Save</button>
                        </form>
                    </div>
                </div>                
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onClick="closeModal();" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
      <!--Modal Processes-->
  <script>
  		function closeModal()
		{
			jQuery('#playSenoirJuniorModal').modal('hide');
			setTimeout 
			(
				function()
				{
					jQuery('#playSenoirJuniorModal').remove();
					jQuery('#playSenoirJuniorModal').remove();
				},500
			);
		}
  </script>
    <?php echo ob_get_clean(); ?>