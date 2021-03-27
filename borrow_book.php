<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<!-- Date Picker Lib -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Borrow Book</h5>
		</div>
		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-4">
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
				<div class="form-group col-md-4 mx-auto">
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
				<div class="form-group col-md-4 mx-auto">
					<label for="student" class="col-form-label">Student:</label>
					<select class="form-control" name="student">
						<option>Mario Speedwagon</option>
						<option>Petey Cruiser</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="issue_date" class="col-form-label">Issue Date:</label>
					<input type="date"  class="form-control" name="issue_date">
				</div>
				<div class="form-group col-md-4">
					<label for="book_name" class="col-form-label">Book Name:</label>
					<select class="form-control" name="book_name">
						<option>JAVA</option>
						<option>C++</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="book_qty" class="col-form-label">Quantity:</label>
					<input type="number" class="form-control" id="book_qty"  name= "book_qty" required>
				</div>
				<div class="form-group col-md-2">
					<label for="return_date" class="col-form-label">Return Date:</label>
					<input type="date"  class="form-control" name="return_date">
				</div>
				<div class="form-group col-md-2">
					<label for="book_fine" class="col-form-label">Fine:</label>
					<input type="number" class="form-control" id="book_fine"  name= "book_fine" required>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Add</button>
			
			<div class="table-responsive mt-4">
				<?php
				$getDeparment = "SELECT * FROM department";
				$query_run = mysqli_query($connection,$getDeparment);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<div class="row">
						<!-- <div class="col-sm-12 col-md-6">
											<div class="dataTables_length" id="dataTable_length">
																<label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
											</div>
						</div> -->
						<!-- 	<div class="col-sm-12 col-md-6">
								<div id="dataTable_filter" class="dataTables_filter">
													<label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
								</div>
						</div> -->
					</div>
						<thead>
						<tr>
							<th>Title</th>
							<th>Quantity</th>
							<th>Return</th>
							<th>Fine</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>
				
					
					<tbody>
						<tr>
							<th>JAVA</th>
							<th>1</th>
							<th>06/03/2021</th>
							<th>10</th>
							<th><button type="button" class="btn btn-danger btn-circle">
								<i class="fas fa-trash"></i>
							</button></th>
						</tr>
						
						<!-- 	<tr>
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

				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</div>
	</div>
	<script>
	$(document).ready(function(){
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
	format: 'mm/dd/yyyy',
	container: container,
	todayHighlight: true,
	autoclose: true,
	};
	date_input.datepicker(options);
	})
	</script>
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
	?>