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
				<div class="form-group col-md-3">
					<label for="code_no" class="col-form-label">Code/ISBN No:</label>
					<input type="text" class="form-control" id="code_no" name="code_no" required>
				</div>
				<div class="form-group col-md-3">
					<label for="issue_date" class="col-form-label">Issue Date:</label>
					<input type="date"  class="form-control" name="issue_date">
				</div>
				<div class="form-group col-md-3">
					<label for="return_date" class="col-form-label">Return Date:</label>
					<input type="date"  class="form-control" name="return_date">
				</div>
				<div class="form-group col-md-3 mx-auto">
					<label for="status" class="col-form-label">Status:</label>
					<select class="form-control" name="status">
						<option>Borrowed</option>
						<option>Returned</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Get List</button>
			
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
					<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>
					<thead>
						<tr>
							<th>Student Name</th>
							<th>Code/ISBN No</th>
							<th>Quantity</th>
							<th>Issue Date</th>
							<th>Return Date</th>
							<th>Fine</th>
							<th>Action</th>
							
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<th>JAVA Reference Book</th>
							<th>BK1001</th>
							<th>1</th>
							<th>06/03/2021</th>
							<th>10/03/2021</th>
							<th>50</th>
							<th>	<button type="button" class="btn btn-primary btn-circle">
								<i class="fas fa-edit"></i>
								</button>
								<button type="button" class="btn btn-danger btn-circle">
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