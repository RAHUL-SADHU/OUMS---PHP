<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "OUMS";

$connection = mysqli_connect($server_name,$db_username,$db_password);
$dbconfig = mysqli_select_db($connection,$db_name);

if($dbconfig){

	echo "Database Connection";
}else{
	echo "Database Failed";
}



?>