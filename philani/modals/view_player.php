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
	$results_U15_Boys = $results['U15_Boys'];
	$results_U15_Girls = $results['U15_Girls'];
	$results_U18_Boys = $results['U18_Boys'];
	$results_U18_Girls = $results['U18_Girls'];
	
	//DOUBLES
	$doubles = mysqli_query($con, "SELECT * FROM players WHERE age < '19' AND AC_number != '{$ac_number}'");
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
<div class="modal fade" id="viewPlayerModal" tabindex="-1" role="dialog" aria-labelledby="viewPlayerModalLabel">
    <div class="modal-dialog modal-lg" role="player">
        <div class="modal-content">
            <div class="modal-header">                    
                <h4 class="modal-title text-center"><span style="color:#fff; padding-left:100px;"><a class="fa fa-info-circle"></a> </span>Update your player to the correct category</h4>
                <button type="button" class="close" onClick="closeModal();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:#000">&times;</span></button>
            </div>
            <div class="modal-body">                  	                
                <div class="row col-md-4" id="assigneInvesrigater">
                    <div id="assigneInvesrigater_div" style="display:block;">
                    	<form action="controller/update_matches.php" method="post">
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
                                        <th>U13 Boys</th>
                                        <th>U15 Boys</th>
                                        <th>U18 Boys</th>
                                        <?php }else{ ?>
                                        <th>U13 Girls</th>                                        
                                        <th>U15 Girls</th>                                        
                                        <th>U18 Girls</th>
                                        <?php }?>
                                        <th>Doubles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                    	<td><?php echo $results_name; ?></td>
                                        <td><?php echo $results_surname ?></td>
                                        <td><input type="checkbox" <?php if($results_U13_Boys == 1 || $results_U13_Girls == 1):?>checked<?php endif; ?> <?php if($results_age > 13):?>disabled<?php endif; ?> value="1" name="U13" id="chk" onClick="return limit()"></td>
                                        <td><input type="checkbox" <?php if($results_U15_Boys == 1 || $results_U15_Girls == 1):?>checked<?php endif; ?> <?php if($results_age > 15):?>disabled<?php endif; ?> value="1" name="U15" id="chk" onClick="return limit()"></td>
                                        <td><input type="checkbox" <?php if($results_U18_Boys == 1 || $results_U18_Girls == 1):?>checked<?php endif; ?> <?php if($results_age > 18):?>disabled<?php endif; ?> value="1" name="U18" id="chk" onClick="return limit()"></td>
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
			jQuery('#viewPlayerModal').modal('hide');
			setTimeout 
			(
				function()
				{
					jQuery('#viewPlayerModal').remove();
					jQuery('#viewPlayerModal').remove();
				},500
			);
		}
  </script>
    <?php echo ob_get_clean(); ?>