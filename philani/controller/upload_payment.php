<?php
if(isset($_POST['proof_senior']))
{
	//Attachment
	$attachment = $_FILES['file']['name'];
	$directory = "../attachments/".$attachment;
	$tmp_name = $_FILES['file']['tmp_name'];
	move_uploaded_file($tmp_name,$directory);
}
?>