<?php
$con = mysqli_connect("localhost","gcttaco_sport","golive3000");
if($con)
{
	session_start();
	
	$con -> select_db("gcttaco_gctta_sport");
	
	mysqli_query($con, "CREATE TABLE players (player_id int(13) PRIMARY KEY AUTO_INCREMENT, AC_number varchar(255), name varchar(255), surname varchar(255), association varchar(255), club varchar(255), id_number varchar(255), age varchar(255), gender varchar(255), menager varchar(255), U13_Boys varchar(255), U13_Girls varchar(255),	U15_Boys varchar(255), U15_Girls varchar(255), U18_Boys varchar(255), U18_Girls varchar(255), price varchar(255), paring varchar(255))");
	mysqli_query($con, "CREATE TABLE menager (menager_id int(13) PRIMARY KEY AUTO_INCREMENT, name varchar(255), surname varchar(255), club_name varchar(255), email varchar(255), password varchar(255), ref varchar(255))");
	mysqli_query($con, "CREATE TABLE cost (menager varchar(255), total_cost varchar(255), proof_payment varchar(255), players varchar(255))");
	mysqli_query($con, "CREATE TABLE records (number varchar(255))");
	mysqli_query($con, "CREATE TABLE proofs (email varchar(255), proof varchar(255))");
	mysqli_query($con, "CREATE TABLE seniors_juniors (s_j_id int(13) PRIMARY KEY AUTO_INCREMENT, AC_number varchar(255), mens varchar(255), women varchar(255), doubles varchar(255))");
}
else
{
	die("Failed to connect to the database".mysqli_error($con));
}
?>