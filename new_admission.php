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
			<h5 class="m-0 font-weight-bold text-primary">Student Admission</h5>
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
				<div class="form-group col-md-4">
					<label for="first_name" class="col-form-label">First Name:</label>
					<input type="text" class="form-control" id="first_name" name="first_name" required>
				</div>
				<div class="form-group col-md-4 mx-auto">
					<label for="middle_name" class="col-form-label">Middle Name:</label>
					<input type="text" class="form-control" id="middle_name" name= "middle_name" required>
				</div>
				<div class="form-group col-md-4 mx-auto">
					<label for="last_name" class="col-form-label">Last Name:</label>
					<input type="text" class="form-control" id="last_name"  name= "last_name" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4 mx-auto">
					<label for="student_id" class="col-form-label">ID No:</label>
					<input type="text" class="form-control" id="student_id"  name= "student_id" required>
				</div>
				
				<div class="form-group col-md-4 mx-auto">
					<label for="blood_group" class="col-form-label">Blood Group:</label>
					<select class="form-control" name="blood_group">
						<option>A+</option>
						<option>A-</option>
						<option>B+</option>
						<option>B-</option>
						<option>AB+</option>
						<option>AB-</option>
						<option>O+</option>
						<option>O-</option>
					</select>
				</div>
				<div class="form-group  col-md-4 mx-auto my-auto">
					<label>Gender :</label>
					<div class="radio">
						<label class="radio-inline">
							<input type="radio"  name="gender" id="male" value="male" checked>Male
						</label>
						<label class="radio-inline ml-2">
							<input type="radio" name="gender" id="female" value="female">Female
						</label>
					</div>
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-4 mx-auto">
					<label for="religion" class="control-label">Religion:</label>
					<select class="form-control" name="religion">
						<option>Hindu</option>
						<option>Islam</option>
						<option>Cristian</option>
						<option>Buddhist</option>
						<option>Other</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="nationality" class="control-label">Nationality:</label>
					<input type="text" class="form-control" id="nationality" name="nationality" value ="Indian" required>
				</div>
				<div class="form-group col-md-4"> <!-- Date input -->
				<label class="control-label" for="date">Date:</label>
				<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="photograph" class="control-label">Photograph:</label>
				<input class="form-control" type="file" id="photograph">
			</div>
			<div class="form-group col-md-4">
				<label class="control-label" for="phone">Mobile Number:</label>
				<input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="father_name"  class="control-label">Father Name:</label>
				<input type="text" class="form-control" id="father_name" name="father_name" required>
			</div>
			<div class="form-group col-md-6">
				<label class="control-label" for="father_mo">Father Mobile No:</label>
				<input class="form-control" type="tel" id="father_mo" name="father_mo" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="mother_name"  class="control-label">Mother Name:</label>
				<input type="text" class="form-control" id="mother_name" name="mother_name" required>
			</div>
			<div class="form-group col-md-6">
				<label class="control-label" for="mother_mo">Mother Mobile No:</label>
				<input class="form-control" type="tel" id="mother_mo" name="mother_mo" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="present_address"  class="control-label">Present Address:</label>
				<textarea type="text" class="form-control" id="present_address" name="present_address" row="5" required></textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="parmanent_address"  class="control-label">Parmanent Address:</label>
				<textarea type="text" class="form-control" id="parmanent_address" name="parmanent_address" row="5" required></textarea>
			</div>
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