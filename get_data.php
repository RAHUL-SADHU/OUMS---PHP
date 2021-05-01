<?php
include("security.php");
$action = $_POST['action'];



// fees dueamount in fee_collection.php
if($action == 'student_dueAmount'){
								$student_id = $_POST["student_id"];
								$query = "SELECT * FROM fees WHERE student_id ='$student_id' ORDER BY fees_id DESC LIMIT 1";
	$query_run = mysqli_query($connection,$query);
	if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
       echo $row['dueAmount'];
     }
}else{
echo "0";
}
}


// submit fees in fee_collection.php
if($action == 'submit_fees'){
   $studentId = $_POST["studentId"];
   $payableAmount = $_POST["payableAmount"];
   $lateFees = $_POST["lateFees"];
   $paidAmount = $_POST["paidAmount"];
   $dueAmount = $_POST["dueAmount"];
   $payDate = $_POST["payDate"];

   $query = "INSERT INTO fees(student_id,payableAmount,lateFee,paidAmount,dueAmount,payDate) VALUES ('$studentId','$payableAmount','$lateFees','$paidAmount','$dueAmount','$payDate')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	    echo 'Fees submit Successfully !!';
	}else{
		echo "Fees not submit !!";
	}

}



?>