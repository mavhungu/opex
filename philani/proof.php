<?php
if(isset($_GET['id']))
{
	require ("connection/connection.php");
	$id = $_GET['id'];
	$proof = mysqli_query($con, "SELECT * FROM proofs where email = '{$id}' AND type = '{$_GET['type']}'");
}
else if(isset($_GET['proof']))
{
    require ("connection/connection.php");
    $id = $_GET['proof'];
    $proof = mysqli_query($con, "SELECT * FROM proofs where email = '{$id}'");
	
	//ref
	$ref = mysqli_query($con, "SELECT * FROM ref WHERE email = '{$_GET['proof']}'");
	$ref_r = mysqli_fetch_assoc($ref);
}

?>
<br>
<p style="font-size:20px; color:green">Refference Number : <strong><?php if(isset($_GET['proof'])){echo $ref_r['ref_num'];}else{echo $_GET['ref'];} ?></strong></p>
<br>
<?php
if(isset($_GET['id']))
{?>
	<a href="Admin.php?m=<?php echo $_GET['id']; ?>">Back</a>
<?php }
else if(isset($_GET['proof']))
{?>
    <a href="Admin.php?paid">Back</a>
<?php }
?>

<br>
<?php 
    while($results = mysqli_fetch_assoc($proof)):
    $img = $results['proof'];
?>
<iframe style="width:40%; height:1000px;" src="attachments/<?php echo $img;?>"></iframe>
<?php endwhile; ?>