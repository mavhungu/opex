<?php
$id_length = strlen($id);
$id_month = substr($id,2,2);
$id_day = substr($id,4,2);
$id_year = substr($id,0,2);
$id_gender = substr($id,6,1);
$id_citizenship = substr($id,10,1);
$current_year = date("y");
$current_year_full  = date("Y");
if($id_length == 13 && $id_month > 0 && $id_month < 13 && $id_day > 0 && $id_day < 32)
{
	//Get month from id
	//array
	$months_array = array("January","February","March","April","May","June","July","August","September","October","Novermber","December");
	$months_array_number = array("01","02","03","04","05","06","07","08","09","10","11","12");
	//foreach
	for($i= 0; $i < 12; $i++)
	{
		if($id_month == $months_array_number[$i])
		{
			$birth_month = $months_array[$i];
		}
	}
	//find birth year and age
	if($id_year <= $current_year)
	{
		$birth_year = "20".$id_year;
		$age = $current_year_full - $birth_year;
	}
	else
	{
		$birth_year = "19".$id_year;
		$age = $current_year_full - $birth_year;
	}
	//find gender
	if($id_gender > 4)
	{
		$gender = "Male";
	}
	else
	{
		$gender = "Female";
	}
	//citizenship
	if($id_citizenship == 0)
	{
		$citizenship = "South African Citizen";
	}
	else
	{
		$citizenship = "Non SA Citizen";
	}
}
else
{
	$id_error = "<p class='small' style='color:red;'>Invalid ID number.</p>";
}
?>