<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
<!-- Add Department Model -->
<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="#" method="POST">
					<div class="form-group">
						<label for="department-name" class="col-form-label">Name:</label>
						<input type="text" class="form-control" id="department-name" name="dName" required>
					</div>
					<div class="form-group">
						<label for="code" class="col-form-label">Code:</label>
						<input type="number" class="form-control" id="code" min="1" name = "dCode"required>
					</div>
					<div class="form-group">
						<label for="years" class="col-form-label">Year:</label>
						<input type="text" class="form-control" id="years" name= "dYear" pattern="^19[5-9]\d|20[0-4]\d|2050$" title="Please enter your valid year" required>
					</div>
					<div class="form-group">
						<label for="description" class="col-form-label">Description:</label>
						<input type="text" class="form-control" id="description" name="description" required>
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
	<h1 class="h3 mb-2 mt-4 text-gray-800">Department</h1>
	<button name="add_department" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addDepartment">
	Add Department
	</button>
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Department Information</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<?php
				$getDeparment = "SELECT * FROM department";
				$query_run = mysqli_query($connection,$getDeparment);
				?>
				<table
					class="table table-bordered"
					id="dataTable"
					width="100%"
					cellspacing="0"
					data-show-print="true"
					>
					
					<thead>
						<tr>
							<th data-field="name">Name</th>
							<th data-field="code">Code</th>
							<th data-field="years">Years</th>
							<th data-field="description">Description</th>
							<th data-field="edit" data-print-ignore=true >Edit</th>
							<th data-field="delete" data-print-ignore=true >Delete</th>
						</tr>
					</thead>
					
					<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>
					
					<tbody>
						
						<tr>
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
	<!-- 	<script>
	var $table = $('#dataTable')
	$(function() {
	var data = [
	
	]
	$table.bootstrapTable({data: data})
	})
	</script> -->
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
	$query = "DELETE FROM department WHERE id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}else{
	echo "Data note Delete";
	}
	}
	?>