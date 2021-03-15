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
			<h5 class="m-0 font-weight-bold text-primary">Add Book</h5>
		</div>
		<div class="card-body">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="code_no" class="col-form-label">Code/ISBN No:</label>
					<input type="text" class="form-control" id="code_no" name="code_no" required>
				</div>
				<div class="form-group col-md-4">
					<label for="book_title" class="col-form-label">Title/Name:</label>
					<input type="text" class="form-control" id="book_title" name= "book_title" required>
				</div>
				<div class="form-group col-md-4">
					<label for="book_author" class="col-form-label">Author:</label>
					<input type="text" class="form-control" id="book_author" name= "book_author" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4 mx-auto">
					<label for="book_qty" class="col-form-label">Quantity:</label>
					<input type="number" class="form-control" id="book_qty"  name= "book_qty" required>
				</div>
				<div class="form-group col-md-4 mx-auto">
					<label for="rack_no" class="col-form-label">Rack No:</label>
					<input type="text" class="form-control" id="rack_no"  name= "rack_no" required>
				</div>
				<div class="form-group col-md-4 mx-auto">
					<label for="row_no" class="col-form-label">Row No:</label>
					<input type="number" class="form-control" id="row_no"  name= "row_no" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4 mx-auto">
					<label for="book_type" class="col-form-label">Book Type:</label>
					<select class="form-control" name="book_type">
						<option>Academic</option>
						<option>Story</option>
						<option>Magazine</option>
						<option>Other</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<?php
					$getDeparment = "SELECT * FROM department";
					$query_run = mysqli_query($connection,$getDeparment);
					?>
					<label class="col-form-label">Class:</label>
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
				<div class="form-group col-md-4">
					<label for="description"  class="col-form-label">Description:</label>
					<textarea type="text" class="form-control" id="description" name="description" row="5" required></textarea>
				</div>
				
			</div>
			
			<button type="submit" class="btn btn-primary" name="submit">Add Book</button>
			
			
			
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