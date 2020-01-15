<?php
    require("connection/connection.php");
    //Registered Players
	$reg_players1 = mysqli_query($con, "SELECT * FROM players");
	$reg_players_num1 = mysqli_num_rows($reg_players1);
    //Records
	$records1 = mysqli_query($con, "SELECT * FROM records");
	$records_results1 = mysqli_fetch_assoc($records1);
    //Spaces Left
	$spaces_left1 = $records_results1['number'] - $reg_players_num1;
?>
<div class="modal fade" id="numberModal" role="dialog">
    <div class="modal-dialog modal-md">    
      <!-- Modal content-->
      <div class="modal-content">
          <form method="post">
            <div class="modal-header">
                <h4 class="modal-title">Add the number of players you want to register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>          
            </div>
            <div class="modal-body" style="display:inline;">
                <div class="form-group col-md-10">
                    <label for="name">Number of Players :</label>
                    <input type="text" id="number" name="number" required placeholder="Enter Number of players" class="form-control">
                    <input type="hidden" id="left" name="left" value="<?php echo $spaces_left1; ?>">
                </div>           
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info" onClick='register("1")'>Proceed</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <script>
  	function register(id)
		{
			var data = {"id": id,
						"number" : jQuery("#number").val(),
						"left"   : jQuery("#left").val(),
					}
			jQuery.ajax
			(
				{
					url: "modals/register.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#register').modal('toggle');
					},
					error: function()
					{
						alert('error');
					}
				}
			);
		}
  </script>