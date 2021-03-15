<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Add Department Model -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" method="POST">
					<div class="form-group">
						<label for="first_name" class="col-form-label">First Name:</label>
						<input type="text" class="form-control" id="first_name" name="first_name" required>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-form-label">Last Name:</label>
						<input type="text" class="form-control" id="last_name" name="last_name" required>
					</div>
					<div class="form-group">
						<label for="role" class="col-form-label">Role:</label>
						<select class="form-control" name="role">
							<option>Admin</option>
							<option>Teacher</option>
						</select>
					</div>
					<div class="form-group">
						
						<label for="email" class="col-form-label">Email:</label>
						<input type="email" name="email" class="form-control form-control-user"
						id="email" aria-describedby="emailHelp" required>
					</div>
					<div class="form-group">
						<label for="password" class="col-form-label">Password:</label>
						<input type="password" name="password" class="form-control form-control-user"
						id="passsword"required>
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="submit" >Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 mt-4 text-gray-800">Users</h1>
	<button name="add_department" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addUser">
	Add User
	</button>
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Users Information</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?php
				$getadmin = "SELECT * FROM admin";
				$query_run = mysqli_query($connection,$getadmin);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<!-- 	<div class="row">
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
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Role</th>
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
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['role']; ?></td>
							<td>
								<form action="edit_admin.php" method="POST">
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
		$fName = $_POST["first_name"];
		$lName = $_POST["last_name"];
		$role = $_POST["role"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$query = "INSERT INTO admin (first_name,last_name,email,password,role) VALUES ('$fName','$lName','$email','$password','$role')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	echo "<script>hideModel();</script>";
	echo '<meta http-equiv="refresh" content="0">';
	}
	}
	if(isset($_POST["delete"])){
	$id = $_POST["delete_id"];
	$query = "DELETE FROM admin WHERE id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}else{
	echo "Data note Delete";
	}
	}
	?>