<?php

function OpenCon(){
	$hostname="localhost";
	$user_name="root";
	$password="";
	$db="foodshala";
	$con=new mysqli($hostname,$user_name,$password,$db)or die(mysql_error());

	return $con;
}

?>
