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
			<h5 class="m-0 font-weight-bold text-primary">Books</h5>
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
				<div class="col-md-2 my-auto mx-auto">
					<button type="submit" class="btn btn-primary mx-auto" name="submit">Get List</button>
				</div>
				
			</div>
			
			<div class="table-responsive mt-4">
				<?php
				$getDeparment = "SELECT * FROM department";
				$query_run = mysqli_query($connection,$getDeparment);
				?>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<div class="row">
					
					</div>
					<thead>
						<tr>
							<th>Code/ISBN NO</th>
							<th>Title</th>
							<th>Auther</th>
							<th>Department</th>
							<th>Type</th>
							<th>Quantity</th>
							<th>Rack No</th>
							<th>Row No</th>
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
							<th>BK1001</th>
							<th>JAVA Reference Book</th>
							<th>Atul Prakashan</th>
							<th>BCA</th>
							<th>Others</th>
							<th>5</th>
							<th>A</th>
							<th>2</th>
							<th>Java BCA BOOK</th>
							<th>
								<button type="button" class="btn btn-primary btn-circle">
									<i class="fas fa-edit"></i>
								</button>	
								<button type="button" class="btn btn-danger btn-circle">
									<i class="fas fa-trash"></i>
								</button>
								
							</th>
						</tr>
						<tr>
							<th>BK1002</th>
							<th>Data Structures</th>
							<th>Atul Prakashan</th>
							<th>BCA</th>
							<th>Others</th>
							<th>10</th>
							<th>A</th>
							<th>3</th>
							<th>Data Structures BCA BOOK</th>
							<th>
								<button type="button" class="btn btn-primary btn-circle">
									<i class="fas fa-edit"></i>
								</button>	
								<button type="button" class="btn btn-danger btn-circle">
									<i class="fas fa-trash"></i>
								</button>
								
							</th>
						</tr>
						<tr>
							<th>BK1003</th>
							<th>Environmental Studies</th>
							<th>Atul Prakashan</th>
							<th>BCA</th>
							<th>Others</th>
							<th>10</th>
							<th>E</th>
							<th>1</th>
							<th>Environmental Studies BCA BOOK</th>
							<th>
								<button type="button" class="btn btn-primary btn-circle">
									<i class="fas fa-edit"></i>
								</button>	
								<button type="button" class="btn btn-danger btn-circle">
									<i class="fas fa-trash"></i>
								</button>
								
							</th>
						</tr>
						<tr>
							<th>BK1004</th>
							<th>Computer Networks (Cisco Track)</th>
							<th>Atul Prakashan</th>
							<th>BCA</th>
							<th>Others</th>
							<th>10</th>
							<th>C</th>
							<th>2</th>
							<th>Computer Networks BCA BOOK</th>
							<th>
								<button type="button" class="btn btn-primary btn-circle">
									<i class="fas fa-edit"></i>
								</button>	
								<button type="button" class="btn btn-danger btn-circle">
									<i class="fas fa-trash"></i>
								</button>
								
							</th>
						</tr>
						<tr>
							<th>BK1005</th>
							<th>Operating Systems</th>
							<th>TechMax</th>
							<th>BCA</th>
							<th>Others</th>
							<th>10</th>
							<th>A</th>
							<th>3</th>
							<th>Operating Systems BCA BOOK</th>
							<th>
								<button type="button" class="btn btn-primary btn-circle">
									<i class="fas fa-edit"></i>
								</button>	
								<button type="button" class="btn btn-danger btn-circle">
									<i class="fas fa-trash"></i>
								</button>
								
							</th>
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