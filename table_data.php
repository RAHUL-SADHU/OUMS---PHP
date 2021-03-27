<?php
include("security.php");
$action = $_POST['action'];

// ATTENDANCE TABLE
if($action == 'attendance_table'){
						$department_id = $_POST["department_id"];
						$semester = $_POST["semester"];
						$getDeparment = "SELECT * FROM student WHERE department_id = '$department_id' AND semester = '$semester'";
						$query_run = mysqli_query($connection,$getDeparment);
							if(mysqli_num_rows($query_run)>0){
echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									
							<thead>
									<tr>
											<th>Student Id</th>
											<th>Name</th>
											<th>Is Present ?</th>
									</tr>
							</thead>';
	while ($row = mysqli_fetch_assoc($query_run)) {
							
							
			echo '<tbody>
							<tr>
									<th>'.$row["student_id"].'</th>
									<th>'.$row["first_name"].'</th>
									<th><div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
									</div>
								</th>
					</tr>
		</tbody>';
		
		}
		} else{
		echo "<p class='text-center font-weight-bold my-5'>No Record Found.</p>";
		}
		
echo '</table>';
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
?>