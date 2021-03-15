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
			<h5 class="m-0 font-weight-bold text-primary">Fees</h5>
		</div>
		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-6">
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
				<div class="form-group col-md-6">
					<label for="fees_title" class="col-form-label">Title:</label>
					<input type="text" class="form-control" id="fees_title" name="fees_title"
					value="<?php echo $row['name']?>"
					required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 mx-auto">
					<label for="fees_amount" class="col-form-label">Amount:</label>
					<input type="number" class="form-control" id="fees_amount" name="fees_amount"
					value="<?php echo $row['name']?>"
					required>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="fees_desctiption" class="col-form-label">Description:</label>
					<textarea type="text" class="form-control" id="fees_desctiption" name="parmanent_address" row="5" required></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Save</button>
			
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
							<th>Department</th>
							<th>Title</th>
							<th>Amount</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>
					
					
					<tbody>
						<tr>
							<th>BCA</th>
							<th>Semester Fees</th>
							<th>1500</th>
							<th>BCA sem fees</th>
							<th><button type="submit" class="btn btn-danger" name="delete">DELETE</button></th>
						</tr>
						
						<tr>
							<th>MCA</th>
							<th>Semester Fees</th>
							<th>2000</th>
							<th>MCA sem fees</th>
							<th><button type="submit" class="btn btn-danger" name="delete">DELETE</button></th>
						</tr>
						<tr>
							<th>B.COM</th>
							<th>Semester Fees</th>
							<th>1200</th>
							<th>B.COM sem fees</th>
							<th><button type="submit" class="btn btn-danger" name="delete">DELETE</button></th>
						</tr>
						<tr>
							<th>M.COM</th>
							<th>Semester Fees</th>
							<th>2200</th>
							<th>M.COM sem fees</th>
							<th><button type="submit" class="btn btn-danger" name="delete">DELETE</button></th>
						</tr>
						<tr>
							<th>BE</th>
							<th>Semester Fees</th>
							<th>5000</th>
							<th>BE sem fees</th>
							<th><button type="submit" class="btn btn-danger" name="delete">DELETE</button></th>
						</tr>
						<tr>
							<th>ME</th>
							<th>Semester Fees</th>
							<th>5000</th>
							<th>ME sem fees</th>
							<th><button type="submit" class="btn btn-danger" name="delete">DELETE</button></th>
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