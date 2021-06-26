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
			<h6 class="m-0 font-weight-bold text-primary">Edit Department</h6>
		</div>
		<div class="card-body">
			<?php
			if(isset($_POST['edit_btn'])){
			
			$id =  $_POST['edit_id'];
			$query = "SELECT * FROM department WHERE id='$id'";
			$query_run = mysqli_query($connection,$query);
			foreach($query_run as $row){
			?>
			<form action="#" method="POST">
				<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
				<div class="form-group">
					<label for="department-name" class="col-form-label">Name:</label>
					<input type="text" class="form-control" id="department-name" name="dName"
					value="<?php echo $row['name']?>"
					required>
				</div>
				<div class="form-group">
					<label for="code" class="col-form-label">Code:</label>
					<input type="number" class="form-control" id="code" min="1" name = "dCode" value="<?php echo $row['code']?>"required>
				</div>
				<div class="form-group">
					<label for="years" class="col-form-label">Years:</label>
					<input type="number" class="form-control" id="years" name= "dYear"
					value="<?php echo $row['year']?>"
					required>
				</div>
				<div class="form-group">
					<label for="description" class="col-form-label">Description:</label>
					<input type="text" class="form-control" id="description" name="description"
					value="<?php echo $row['description']?>"
					required>
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
	$dName = $_POST["dName"];
	$dCode = $_POST["dCode"];
	$dYear = $_POST["dYear"];
	$description = $_POST["description"];
	$query = "UPDATE department SET name='$dName',code='$dCode',year='$dYear',description = '$description' WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
echo " <script> location.replace('department.php'); </script>";
}else{
echo "Data note update";
}
}
?>