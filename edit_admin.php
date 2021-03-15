<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-2 mt-4 text-gray-800">Department</h1>
	<button name="add_department" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addDepartment">
	Add Department
	</button> -->
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
		</div>
		<div class="card-body">
			<?php
			if(isset($_POST['edit_btn'])){
			
			$id =  $_POST['edit_id'];
			$query = "SELECT * FROM admin WHERE id='$id'";
			$query_run = mysqli_query($connection,$query);
			foreach($query_run as $row){
			?>
			<form action="#" method="POST">
				<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
				<div class="form-group">
					<label for="first_name" class="col-form-label">First Name:</label>
					<input type="text" class="form-control" id="first_name" name="first_name"
					value="<?php echo $row['first_name']?>"
					required>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-form-label">Last Name:</label>
					<input type="text" class="form-control" id="last_name" name="last_name"
					value="<?php echo $row['last_name']?>" required>
				</div>
				<div class="form-group">
					<label for="role" class="col-form-label">Role:</label>
					<select class="form-control" name="role">
						<option <?php if($row['role']=="Admin") echo 'selected="selected"'; ?>>Admin</option>
						<option <?php if($row['role']=="Teacher") echo 'selected="selected"'; ?>>Teacher</option>
					</select>
				</div>
				<div class="form-group">
					
					<label for="email" class="col-form-label">Email:</label>
					<input type="email" name="email" class="form-control form-control-user"
					id="email" aria-describedby="emailHelp" value="<?php echo $row['email']?>" required>
				</div>
				<div class="form-group">
					<label for="password" class="col-form-label">Password:</label>
					<input type="password" name="password" class="form-control form-control-user"
					id="password" value="<?php echo $row['password']?>"required>
				</div>
				<a href="department.php" class="btn btn-danger mt-3">Cancel</a>
				<button type="submit" class="btn btn-primary ml-3 mt-3" name="update">Update</button>
			</form>
			<?php
			}
			}
			?>
			
		</div>
	</div>
</div>
</div>
<?php
include("includes/scripts.php");
include("includes/footer.php");
if(isset($_POST["update"])){
	$id = $_POST["edit_id"];
	$fName = $_POST["first_name"];
		$lName = $_POST["last_name"];
		$role = $_POST["role"];
		$password = $_POST["password"];
		$email = $_POST["email"];
	$query = "UPDATE admin SET first_name='$fName',last_name='$lName',role='$role',password ='$password',email = '$email' WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
echo " <script> location.replace('admin.php'); </script>";
}else{
echo "Data note update";
}
}
?>