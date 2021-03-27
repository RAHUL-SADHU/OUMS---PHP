<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 mt-4 text-gray-800">Students</h1>
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Students Information</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?php
				$getDeparment = "SELECT * FROM student";
				$query_run = mysqli_query($connection,$getDeparment);
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
							<th>Photo</th>
							<th>Name</th>
							<th>ID No</th>
							<!-- 	<th>View</th> -->
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
							<td> <?php echo '<img class="rounded-circle"
							src="upload/'.$row['profile_image'].'" width="80px" height="80px" alt ="Image">'?></td>
							<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['student_id']; ?></th>
						<!-- <td><button type="submit" class="btn btn-info" name="delete">View</button></td> -->
						<td>
							<form action="edit_student.php" method="POST">
								<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
								<button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
							</form>
						</td>
						<td>
							<form action="#" method="POST">
									<input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
								<button type="submit" class="btn btn-danger" name="delete">DELETE</button>
							</form>
						</td>
						
						
						<!-- <tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['code']; ?></td>
							<td><?php echo $row['year']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td>
								<form action="edit_department.php" method="POST">
									<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
									<button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
								</form>
								
							</td>
							<td>
								<form action="#" method="POST">
									<input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
									<button type="submit" class="btn btn-danger" name="delete">DELETE</button>
								</form>
							</td>
						</tr>
						-->
						
						
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
	<script>
				function hideModel(){
				$('#addDepartment').modal('hide')
				}
	</script>
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
		if(isset($_POST["submit"])){
		$dName = $_POST["dName"];
		$dCode = $_POST["dCode"];
		$dYear = $_POST["dYear"];
		$description = $_POST["description"];
		$query = "INSERT INTO department (name,code,year,description) VALUES ('$dName','$dCode','$dYear','$description')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	echo "<script>hideModel();</script>";
	echo '<meta http-equiv="refresh" content="0">';
	}
	}
	if(isset($_POST["delete"])){
	$id = $_POST["delete_id"];
	$query = "DELETE FROM student WHERE id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}else{
	echo "Data note Delete";
	}
	}
	?>