<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Add Department Model -->
<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#"  method="POST">
					<div class="form-group">
						<label for="subject-name" class="col-form-label">Name:</label>
						<input type="text" class="form-control" id="subject-name" name="sName" required>
					</div>
					<div class="form-group">
						<label for="code" class="col-form-label">Code:</label>
						<input type="number" class="form-control" id="code" min="1" name= "sCode" required>
					</div>
					<div class="form-group">
						<label for="credit" class="col-form-label">Credit:</label>
						<input type="number" class="form-control" id="credit" name="sCredit" required>
					</div>
					<div class="form-group">
						<?php
						$getDeparment = "SELECT * FROM department";
						$query_run = mysqli_query($connection,$getDeparment);
						?>
						<label class="col-form-label">Department:</label>
						<select class="form-control" name="department_id">
							<?php
							if(mysqli_num_rows($query_run)>0){
							while ($row = mysqli_fetch_assoc($query_run)) {
							
							
							echo "<option value =".$row['id'].">".$row['name']."</option>";
							
							}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="Semester" class="col-form-label">Semester:</label>
						<select class="form-control" name="semester">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
						</select>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 mt-4 text-gray-800">Subject</h1>
	<button name="add_department" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addSubject">
	Add Subject
	</button>
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Subject Information</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?php
				$getsubject = "SELECT * FROM subject LEFT JOIN department ON subject.department_id = department.id";
				$query_run = mysqli_query($connection,$getsubject);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<!-- <div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="dataTables_length" id="dataTable_length">
								<label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div id="dataTable_filter" class="dataTables_filter">
								<label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
							</div>
						</div>
					</div> -->
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Credit</th>
							<th>Deparment</th>
							<th>Semester</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
						?>
					
					
					<tbody>
						
						<tr>
							<td><?php echo $row['subject_name']; ?></td>
							<td><?php echo $row['subject_code']; ?></td>
							<td><?php echo $row['subject_credit']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['semester']; ?></td>
							<td>
								<form action="edit_subject.php" method="POST">
									<input type="hidden" name="edit_id" value="<?php echo $row['subject_id']?>">
									<button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
								</form>
								
							</td>
							<td>
								<form action="#" method="POST">
									<input type="hidden" name="delete_id" value="<?php echo $row['subject_id']?>">
									<button type="submit" class="btn btn-danger" name="delete">DELETE</button>
								</form>
							</td>
						</tr>
						
					</tbody>
					<?php
						}
						} else{
							echo "<p class='text-center font-weight-bold my-5'>No Record Found.</p>";
						}
						?>
				</table>
			</div>
		</div>
	</div>
	<!-- Page level plugins -->
	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- Page level custom scripts -->
	<script src="js/demo/datatables-demo.js"></script>
	<?php
	include("includes/scripts.php");
	include("includes/footer.php");
	if(isset($_POST["submit"])){
		$sName = $_POST["sName"];
		$sCode = $_POST["sCode"];
		$sCredit = $_POST["sCredit"];
		$department_id = $_POST["department_id"];
		$semester = $_POST["semester"];
		$query = "INSERT INTO subject (subject_name,subject_code,subject_credit,department_id,semester) VALUES ('$sName','$sCode','$sCredit','$department_id','$semester')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	echo "<script>hideModel();</script>";
	echo '<meta http-equiv="refresh" content="0">';
	}
	}

	if(isset($_POST["delete"])){
	$id = $_POST["delete_id"];
	$query = "DELETE FROM subject WHERE subject_id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}else{
	echo "Data note Delete";
	}
	}
	?>