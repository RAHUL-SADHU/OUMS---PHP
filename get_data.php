<?php
include("security.php");
$action = $_POST['action'];
// fees due amount in fee_collection.php
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
// get Subject using deparment and semsester
if($action == 'subject_dropdown'){
								$department_id = $_POST["department_id"];
								$semester = $_POST["semester"];
								$getSubject = "SELECT * FROM subject WHERE department_id = '$department_id' AND semester = '$semester'";
								$query_run = mysqli_query($connection,$getSubject);
			while ($row = mysqli_fetch_assoc($query_run)) {
								echo "<option value =".$row['subject_id'].">".$row['subject_name']."</option>";
				}
				
		}


// get Deparments name use in chat.bar.demo.js
if($action == 'deparment_name_list'){
 	$getDeparment = "SELECT name FROM department";
	$query_run = mysqli_query($connection,$getDeparment);
	$json = array();
	if(mysqli_num_rows($query_run)>0){
	 while ($row = mysqli_fetch_assoc($query_run)) {
				$json[] = $row;
	 }
    }
	echo json_encode($json);
			
}

// get student count use in chat.bar.demo.js
if($action == "student_count_with_department"){
 	$getDeparment = "SELECT COUNT(department_id) AS total, department_id FROM student GROUP BY department_id";
	$query_run = mysqli_query($connection,$getDeparment);
	$json = array();
	if(mysqli_num_rows($query_run)>0){
	 while ($row = mysqli_fetch_assoc($query_run)) {
				$json[] = $row;
	 }
    }
	echo json_encode($json);			
}


// get student list use in report_student_list.php
	if($action == 'get_student_list_table'){
							$department_id = $_POST["department_id"];
							$getStudent = "SELECT s.student_id,RTRIM(LTRIM(CONCAT(COALESCE(first_name,''),' ', COALESCE(last_name,'')))) AS name, d.name AS department_name, s.semester,s.phone,s.present_address FROM student AS s INNER JOIN department AS d ON s.department_id = d.id WHERE s.department_id = '$department_id'";
							$query_run = mysqli_query($connection,$getStudent);
							$json = array();
						if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
								$json[] = $row;
			}
}
			echo json_encode($json);
			
	}


?>