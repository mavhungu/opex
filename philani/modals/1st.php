<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-xl">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Modal Header</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
            <table class="table table-bordered" id="dataTable" width="99%" cellspacing="0">
                <tr>
                    <th><strong style="color:#000;">Tournament</strong></th>
                    <td>Arnold Classic 2019</td>
                    <th><strong>Registration</strong></th>
                    <th><a href="#">Juniors</a></th>                                                
                    <th><a href="">Seniors</a></th>
                </tr>
                <tr>
                    <th><strong>Date:</strong></th>
                    <td>17 to 19 May</td>
                    <td><a href="#">Download Prospectus</a></td>                        
                </tr>
                <tr>
                    <th><strong>Time : </strong></th>
                    <td>8:30 - 5:30 pm</td>
                    <td rowspan="4">Your registraion will be validated and an email will be sent to you confirm your participation.</br>
                        Arnold Classic will then issue you a web ticket to your email. <br>
                        Once you arrive at the Tournament Entrance a weeknd Wrist band will be issued to you.
                    </td>
                </tr>
                <tr>
                    <th colspan="2" style="background-color:rgba(108,159,81,1.00);"></th>
                </tr>
                <tr>
                    <th><strong>Awards Ceremony :</strong></th>
                    <td>19 May</td>
                </tr>
                <tr>
                    <th><strong>Time : </strong></th>
                    <td>4:30 PM </td>
                </tr>
            </table>
            <hr><hr>
            <table class="table table-bordered" id="dataTable" width="99%" cellspacing="0">                    	
                    <thead>
                        <tr>
                            <th>U13 Boys</th>
                            <th>U13 Girls</th>
                            <th>U15 Boys</th>
                            <th>U15 Girls</th>
                            <th>U18 Boys</th>
                            <th>U18 Girls</th>
                            <th>Doubles</th>
                            <th>Women</th>
                            <th>Mens</th>
                            <th>Doubles</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>5</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                </tbody>
                    <tfoot>
                        <tr>
                            <th>U13 Boys</th>
                            <th>U13 Girls</th>
                            <th>U15 Boys</th>
                            <th>U15 Girls</th>
                            <th>U18 Boys</th>
                            <th>U18 Girls</th>
                            <th>Doubles</th>
                            <th>Women</th>
                            <th>Mens</th>
                            <th>Doubles</th>
                        </tr>
                    </tfoot>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" onClick='number("0")'>Register</button>
        </div>
      </div>
      
    </div>
  </div>
  <script>
  	function number(id)
		{
			var data = {"id": id}
			jQuery.ajax
			(
				{
					url: "modals/number_players.php",
					method: "post",
					data: data,
					success: function(data)
					{
						jQuery('body').append(data);
						$('#numberModal').modal('toggle');
					},
					error: function()
					{
						alert('error');
					}
				}
			);
		}
  </script>