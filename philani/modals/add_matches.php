<?php
/*require("../connection/connection.php");
$a = mysqi_query($con, "SELECT * FROM players");
$n = mysqli_num_rows($a);
$r = 165 - $n;
if($_POST['number'] > $r)
{
    $d = $_POST['number'] - $r;
    $q = $_POST['number'] - $d;
}
else
{
    $q = $_POST['number'];
}*/
?>

<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-xl">    
      <!-- Modal content-->
      <div class="modal-content">
          <form action="modals/error_check.php" method="post">
            <div class="modal-header">
                <h4 class="modal-title">Please provide the information of the playerssss</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>          
            </div>
            <div class="modal-body" style="display:inline;">
            	<table class="table table-bordered" id="dataTable" width="99%" cellspacing="0">                    	
                    <thead>
                        /*<tr>
                            <td>Q-<?php echo $q; ?></td>
                            <td>n-<?php echo $n; ?></td>
                            <td>R-<?php echo $r; ?></td>
                            <td>D-<?php echo $d; ?></td>
                        </tr>*/
                        <tr>
                            <th><label for="name">Name :</label></th>
                            <th><label for="surname">Surname :</label></th>
                            <th><label for="id_number">ID Number :</label></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
						$number = $_POST['number'];
						for($i = 0; $i < $number; $i++):
					?>
                        <tr>
                        	<input type="hidden" name="number" value="<?php echo $number; ?>">
                            <td><input type="text" name="<?php echo "name".$i; ?>" required placeholder="Enter Name" class="form-control"></td>
                            <td><input type="text" name="<?php echo "surname".$i; ?>" required placeholder="Enter Surname" class="form-control"></td>
                            <td><input type="text" name="<?php echo "id_number".$i; ?>" required placeholder="Enter ID Number" maxlength="13" min="13" class="form-control"></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
				</table>          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info" name="save">Save</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
  
  <script>
  	function register()
	{
		var data = {
			'name': jQuery('#name').val(),
			'name': jQuery('#name').val(),
			'name': jQuery('#name').val(),
			'name': jQuery('#name').val(),
		};
		jQuery.ajax({
			url : 'modals/error_check.php',
			method : 'POST',
			data : data,
			success: function(data){
					if(data != 'passed')
					{
						jQuery('#department_errors').html(data);
					}
				},
			error : function(){alert("Something went wrong.");},
			});
	}
  </script>