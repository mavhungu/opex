<?php
if(isset($_POST['id']))
{
	require ("../connection/connection.php");
	$id = $_POST['id'];
	$proof = mysqli_query($con, "SELECT * FROM proofs where email = '{$id}'");
	$results = mysqli_fetch_assoc($proof);
	$img = $results['proof'];
	
}
ob_start();
?>
<div class="modal fade" id="viewProofModal" tabindex="-1" role="dialog" aria-labelledby="viewProofModalLabel">
    <div class="modal-dialog modal-lg" role="player">
        <div class="modal-content">
            <div class="modal-header">                    
                <h4 class="modal-title text-center"><span style="color:#fff; padding-left:100px;"><a class="fa fa-info-circle"></a> </span>Update Player Matches</h4>
                <button type="button" class="close" onClick="closeModal();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:#000">&times;</span></button>
            </div>
            <div class="modal-body">                  	                
                <div class="row col-md-4" id="assigneInvesrigater">
                    <div id="assigneInvesrigater_div" style="display:block;">
                        <img src="attachments/<?php echo $img; ?>" alt="No proof" width="100%" height="auto"/>
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
			jQuery('#viewProofModal').modal('hide');
			setTimeout 
			(
				function()
				{
					jQuery('#viewProofModal').remove();
					jQuery('#viewProofModal').remove();
				},500
			);
		}
  </script>
    <?php echo ob_get_clean(); ?>