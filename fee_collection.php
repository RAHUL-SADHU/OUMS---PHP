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
			<h5 class="m-0 font-weight-bold text-primary">Student Fees</h5>
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
				<div class="form-group col-md-6 mx-auto">
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
			</div>
			<div class="form-row">
				<div class="form-group col-md-6"> <!-- Date input -->
				<label class="col-form-label" for="date">Date:</label>
				<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
			</div>
			<div class="form-group col-md-6 mx-auto">
				<label for="student" class="col-form-label">Student:</label>
				<select class="form-control" name="student">
					<option>Mario Speedwagon</option>
					<option>Petey Cruiser</option>
				</select>
			</div>
		</div>
		<hr>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="fees_list" class="col-form-label">Fee Name:</label>
				<select class="form-control" name="fees_list">
					<option>Fees BCA</option>
					<option>Fees MCA</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="fees_amount"class="col-form-label">Fees Amount:</label>
				<input type="number" class="form-control" id="fees_amount" name="fees_amount"
				value="<?php echo $row['name']?>"
				required>
			</div>
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Add Fees</button>
		
		<hr>
		<div class="form-row mt-4">
			<h6 class="col-md-2 my-auto">Current Total:</h6>
			<input type="number" class="form-control col-md-4" id="current_total" name="current_total" value="1500" disabled>
		</div>
		<div class="form-row mt-4">
			<h6 class="col-md-2 my-auto">Late Fee:</h6>
			<input type="number" value="0" class="form-control col-md-4" id="late_fee" name="late_fee" >
		</div>
		<div class="form-row mt-4">
			<h6 class="col-md-2 my-auto">Previous Due:</h6>
			<input type="number" class="form-control col-md-4" id="previous_due" name="previous_due"  value="0" disabled>
		</div>
		<div class="form-row mt-4">
			<h6 class="col-md-2 my-auto">Grand Total:</h6>
			<input type="number" class="form-control col-md-4" id="grand_total" name="grand_total" disabled value="1500">
		</div>
		<div class="form-row mt-4">
			<h6 class="col-md-2 my-auto">Paid Amount:</h6>
			<input type="number" class="form-control col-md-4" id="paid_amount" name="paid_amount" value="1500">
		</div>

		<div class="form-row mt-4">
			<h6 class="col-md-2 my-auto">Due Amount:</h6>
			<input type="number" class="form-control col-md-4" id="due_amount" name="paid_amount" disabled value="0">
		</div>

		<button type="submit" class="btn btn-primary my-4" name="submit">Submit Fee</button>
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