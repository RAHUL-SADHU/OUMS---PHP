	<?php
	include("security.php");
	$action = $_POST['action'];
	// ATTENDANCE TABLE
	if($action == 'attendance_table'){
							$department_id = $_POST["department_id"];
							$semester = $_POST["semester"];
							$getDeparment = "SELECT * FROM student WHERE department_id = '$department_id' AND semester = '$semester'";
							$query_run = mysqli_query($connection,$getDeparment);
							$json = array();
						if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
								$json[] = $row;
			}
			} else {
			
			}
			echo"[
	{
	'id': 0,
	'name': 'Item 0',
	'price': '$0'
	},
	{
	'id': 1,
	'name': 'Item 1',
	'price': '$1'
	},
	{
	'id': 2,
	'name': 'Item 2',
	'price': '$2'
	},
	{
	'id': 3,
	'name': 'Item 3',
	'price': '$3'
	},
	{
	'id': 4,
	'name': 'Item 4',
	'price': '$4'
	},
	{
	'id': 5,
	'name': 'Item 5',
	'price': '$5'
	}
	]";
			
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

		?>