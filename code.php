<?php
	include("database/dbconfig.php");
	if(isset($_POST["update"])){
	$id = $_POST["edit_id"];
	$dName = $_POST["dName"];
	$dCode = $_POST["dCode"];
	$dYear = $_POST["dYear"];
	$description = $_POST["description"];
	$query = "UPDATE department SET name='$dName',code='$dCode',year='$dYear',description = '$description' WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);

	echo "$id $dName $dCode $dYear $description";

	if($query_run){
header("Location:department.php");
}else{
	echo "Data note update";
}
}
?>