<?php
session_start();

include('database/dbconfig.php');

if($dbconfig){
	//echo "Database Connection";
}else{
	header('Location:database/dbconfig.php');
}

if(!$_SESSION['userName']){
header('Location:login.php');
}
?>