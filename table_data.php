<?php
	include("security.php");
	$action = $_POST['action'];


	// ATTENDANCE TABLE
	if($action == 'attendance_table'){
							$department_id = $_POST["department_id"];
							$semester = $_POST["semester"];
							$getStudent = "SELECT id,student_id,RTRIM(LTRIM(CONCAT(COALESCE(first_name,''),' ', COALESCE(last_name,'')))) AS name, 'false' AS isPresent
FROM student WHERE department_id = '$department_id' AND semester = '$semester'";
							$query_run = mysqli_query($connection,$getStudent);
							$json = array();
						if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
								$json[] = $row;
			}
}
			echo json_encode($json);
			
	}


	// ATTENDANCE LIST TABLE use in attendance_list
	if($action == 'get_attendance_list_table'){
							$department_id = $_POST["department_id"];
							$semester = $_POST["semester"];
							$subject_id = $_POST["subject_id"];
							$date = $_POST["date"];


							$getStudent = "SELECT a.id,s.student_id,RTRIM(LTRIM(CONCAT(COALESCE(first_name,''),' ', COALESCE(last_name,'')))) AS name, a.present AS isPresent
FROM attendance AS a INNER JOIN student AS s ON a.student_id = s.id WHERE a.department_id = '$department_id' AND a.semester = '$semester' AND a.attendance_date = '$date' AND a.subject_id = '$subject_id'";
							$query_run = mysqli_query($connection,$getStudent);
							$json = array();
						if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
								$json[] = $row;
			}
}
			echo json_encode($json);
			
	}






// BOOK TABLE
if($action == 'book_table'){
		$department_id = $_POST["department_id"];
		
		$getbook = "SELECT * FROM book WHERE department_id = '$department_id'";
		$query_run = mysqli_query($connection,$getbook);
		if(mysqli_num_rows($query_run)>0){
		echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
														<tr>
																			<th>Code/ISBN NO</th>
																			<th>Title</th>
																			<th>Auther</th>
																			<th>Type</th>
																			<th>Quantity</th>
																			<th>Rack No</th>
																			<th>Row No</th>
																			<th>Description</th>
																			<th>Action</th>
														</tr>
										</thead>';
						while ($row = mysqli_fetch_assoc($query_run)) {
						
						echo '<tbody>
														<tr>
																			<th>'.$row["book_no"].'</th>
																			<th>'.$row["name"].'</th>
																			<th>'.$row["author"].'</th>
																			<th>'.$row["book_type"].'</th>
																			<th>'.$row["quantity"].'</th>
																			<th>'.$row["rack_no"].'</th>
																			<th>'.$row["row_no"].'</th>
																			<th>'.$row["description"].'</th>
																			<th>
																							<form action="edit_book.php" method="POST">
																												<input type="hidden" name="edit_id" value="'.$row["book_id"].'">
																												<button type="submit" name="edit_btn" class="btn btn-primary btn-circle">
																													<i class="fas fa-edit"></i>
																												</button>
																								</form>
																							<form action="#" method="POST">
																													<input type="hidden" name="delete_id" value="'.$row["book_id"].'">
																												<button type="submit" name="delete" class="btn btn-danger btn-circle">
																													<i class="fas fa-trash"></i>
																												</button>
																							</form>
																								
																								
																			</th>
														</tr>
								</tbody>';
								}
						} else{
						echo "<p class='text-center font-weight-bold my-5'>No Record Found.</p>";
						}
						
			echo '</table>';
}
		
// Student DropDown in borrow_book.php
if($action == 'student_dropdown'){
								$department_id = $_POST["department_id"];
								$semester = $_POST["semester"];
								$getDeparment = "SELECT * FROM student WHERE department_id = '$department_id' AND semester = '$semester'";
								$query_run = mysqli_query($connection,$getDeparment);
			while ($row = mysqli_fetch_assoc($query_run)) {
								echo "<option value =".$row['id'].">".$row['first_name']." ".$row['last_name']."</option>";
				}
				
		}
// Add Borrow Book in borrow_book.php
if($action == "add_borrow_book"){
		$department_id = $_POST["department_id"];
						$semester = $_POST["semester"];
						$student_id = $_POST["student_id"];
						$storeItems = $_POST["table_data"];
						$status = 'Borrowed';
				
			
						$st = mysqli_prepare($connection,'INSERT INTO borrow_book(department_id,semester, student_id,issue_date,book_id,quantity,return_date,fine,status) VALUES (?,?,?,?,?,?,?,?,?)');
						mysqli_stmt_bind_param($st,'isisiisss',$department_id,$semester,$student_id,$issue_date,$book_id,$qty,$return_date,$fine,$status);
		foreach ($storeItems as $item) {
			$issue_date = $item['issue'];
			$book_id =  $item['book_id'];
			$qty = $item['quantity'];
			$return_date = $item['return'];
			$fine = $item['fine'];
			mysqli_stmt_execute($st);
		}
		mysqli_close($connection);
		$response = array("status"=>1, "message"=>"Book borrow successfully !!", "data"=>"");
		echo json_encode($response);
			
}
// borrow book list table in borrow_book.php
if($action == 'borrow_book_list'){
		$book_no = $_POST["book_no"];
		$issue_date = $_POST["issue_date"];
		$return_date = $_POST["return_date"];
		$status = $_POST["status"];
		/*echo $book_no + $issue_date + $return_date + $status;*/
		$getbook = "SELECT *,bb.id AS borrow_book_id FROM (( borrow_book AS bb INNER JOIN book AS b ON bb.book_id = b.book_id) INNER JOIN student AS s ON bb.student_id = s.id) WHERE book_no = '$book_no' AND issue_date = '$issue_date' AND return_date = '$return_date' AND status = '$status'";
		$query_run = mysqli_query($connection,$getbook);
		if(mysqli_num_rows($query_run)>0){
		echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
														<tr>
																			<th>Student Name</th>
																			<th>Book Name</th>
																			<th>Quantity</th>
																			<th>Issue Date</th>
																			<th>Return Date</th>
																			<th>Fine</th>
																			<th>Action</th>
														</tr>
										</thead>';
						while ($row = mysqli_fetch_assoc($query_run)) {
						
						echo '<tbody>
														<tr>
																			<th>'.$row["first_name"].'</th>
																			<th>'.$row["name"].'</th>
																			<th>'.$row["quantity"].'</th>
																			<th>'.$row["issue_date"].'</th>
																			<th>'.$row["return_date"].'</th>
																			<th>'.$row["fine"].'</th>
																			<th>
																							<form action="edit_book_borrow.php" method="POST">
																												<input type="hidden" name="edit_id" value="'.$row["borrow_book_id"].'">
																												<button type="submit" name="edit_btn" class="btn btn-primary btn-circle">
																													<i class="fas fa-edit"></i>
																												</button>
																								</form>
																							<form action="#" method="POST">
																													<input type="hidden" name="delete_id" value="'.$row["borrow_book_id"].'">
																												<button type="submit" name="delete" class="btn btn-danger btn-circle">
																													<i class="fas fa-trash"></i>
																												</button>
																							</form>
																								
																								
																			</th>
														</tr>
								</tbody>';
								}
						} else{
						echo "<p class='text-center font-weight-bold my-5'>No Record Found.</p>";
						}
						
			echo '</table>';
}
// submit Attendence list in attendance.php
if($action == "submit_attendence"){
		$department_id = $_POST["department_id"];
						$semester = $_POST["semester"];
						$subject_id = $_POST["subject_id"];
						$storeItems = $_POST["table_data"];
						$date = $_POST["date"];
						$checkAttendance = "SELECT * FROM attendance WHERE department_id = '$department_id' AND semester = '$semester' AND subject_id = $subject_id AND attendance_date = '$date'";
						$query_run = mysqli_query($connection,$checkAttendance);
		if(mysqli_num_rows($query_run)>0){
$response = array("status"=>1, "message"=>"Attedence Already Submitted!!", "data"=>"");
		}else{
				try {
				$st = mysqli_prepare($connection,'INSERT INTO attendance(department_id,semester,subject_id,attendance_date,student_id,present) VALUES (?,?,?,?,?,?)');
						mysqli_stmt_bind_param($st,'isisii',$department_id,$semester,$subject_id,$date,$student_id,$isPresent);
		foreach ($storeItems as $item) {
			$student_id = $item['id'];
			$present =  $item['isPresent'];
			if($present == "true"){
				$isPresent = 1;
				
			}else{
				$isPresent = 0;
			}
			mysqli_stmt_execute($st);
			
		}
		mysqli_close($connection);
		$response = array("status"=>1, "message"=>"Attedence submit successfully !!", "data"=>"");
										
									} catch (Exception $e) {
										$response = array("status"=>1, "message"=>$e->getMessage(), "data"=>"");
															}
		}
						/*foreach ($storeItems as $item) {
			$student_id = $item['id'];
			$isPresent =  0;
			echo "$department_id $semester $subject_id $date $student_id  $isPresent";
			
			$query = "INSERT INTO attendance(department_id,semester,subject_id,attendance_date,student_id,present) VALUES ('$department_id','$semester','$subject_id','$date','$student_id','$isPresent')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "successfully";
		}else{
			echo "button";
		}
		}*/


			
						
		echo json_encode($response);
			
}


// EXAM TABLE use in exam.php
	if($action == 'exam_table'){
							$department_id = $_POST["department_id"];
							$semester = $_POST["semester"];
							$getStudent = "SELECT id,student_id,RTRIM(LTRIM(CONCAT(COALESCE(first_name,''),' ', COALESCE(last_name,'')))) AS name, 0 AS written,0 AS presentation, 0 AS practical
FROM student WHERE department_id = '$department_id' AND semester = '$semester'";
							$query_run = mysqli_query($connection,$getStudent);
							$json = array();
						if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
								$json[] = $row;
			}
}
			echo json_encode($json);
			
	}


// submit exam list in exam.php
if($action == "submit_exam"){
		                $department_id = $_POST["department_id"];
						$semester = $_POST["semester"];
						$subject_id = $_POST["subject_id"];
						$storeItems = $_POST["table_data"];
						$exam = $_POST["exam"];
						$checkExam = "SELECT * FROM exam WHERE department_id = '$department_id' AND semester = '$semester' AND subject_id = $subject_id AND exam = '$exam'";
						$query_run = mysqli_query($connection,$checkExam);
		if(mysqli_num_rows($query_run)>0){
$response = array("status"=>1, "message"=>"Exam Already submited!!", "data"=>"");
		}else{
				try {
				$st = mysqli_prepare($connection,'INSERT INTO exam(department_id,semester,subject_id,student_id,exam,written,presentation,practical) VALUES (?,?,?,?,?,?,?,?)');
						mysqli_stmt_bind_param($st,'isiisiii',$department_id,$semester,$subject_id,$student_id,$exam,$written,$presentation,$practical);
		foreach ($storeItems as $item) {
			$student_id = $item['id'];
			$written =  $item['written'];
			$presentation = $item['presentation'];
			$practical = $item['practical'];
			mysqli_stmt_execute($st);
			
		}
		mysqli_close($connection);
		$response = array("status"=>1, "message"=>"Exam submit successfully !!", "data"=>"");
										
									} catch (Exception $e) {
										$response = array("status"=>1, "message"=>$e->getMessage(), "data"=>"");
															}
		}			
						
		echo json_encode($response);
			
}


// EXAM LIST TABLE use in exam_list
	if($action == 'get_exam_list_table'){
							$department_id = $_POST["department_id"];
							$semester = $_POST["semester"];
							$subject_id = $_POST["subject_id"];
							$exam = $_POST["exam"];


							$getStudent = "SELECT e.exam_id,s.student_id,RTRIM(LTRIM(CONCAT(COALESCE(first_name,''),' ', COALESCE(last_name,'')))) AS name, e.written,e.presentation,e.practical
FROM exam AS e INNER JOIN student AS s ON e.student_id = s.id WHERE e.department_id = '$department_id' AND e.semester = '$semester' AND e.exam = '$exam' AND e.subject_id = '$subject_id'";
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