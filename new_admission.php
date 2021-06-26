<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Student Admission</h5>
		</div>
		<div class="card-body">
			<form action="#" method="POST" enctype="multipart/form-data">
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
						<input type="number" class="form-control" id="student_id"  name= "student_id" required>
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
						<label class="col-form-label">Gender :</label>
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
						<label for="religion"  class="col-form-label">Religion:</label>
						<select class="form-control" name="religion">
							<option>Hindu</option>
							<option>Islam</option>
							<option>Cristian</option>
							<option>Buddhist</option>
							<option>Other</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="nationality" class="col-form-label">Nationality:</label>
						<input type="text" class="form-control" id="nationality" name="nationality" value ="Indian" required>
					</div>
					<div class="form-group col-md-4"> <!-- Date input -->
					<label  class="col-form-label" for="date">Date:</label>
					<input class="form-control" id="date" name="date"  type="date" required/>
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="photograph" class="col-form-label">Photograph:</label>
					<input class="form-control" type="file" id="photograph" name="profile_photo" required>
				</div>
				<div class="form-group col-md-4">
					<label  class="col-form-label" for="phone">Mobile Number:</label>
					<input class="form-control" type="tel" id="phone" name="phone" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="father_name"   class="col-form-label">Father Name:</label>
					<input type="text" class="form-control" id="father_name" name="father_name" required>
				</div>
				<div class="form-group col-md-6">
					<label  class="col-form-label" for="father_mo">Father Mobile No:</label>
					<input class="form-control" type="tel" id="father_mo" name="father_mo" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="mother_name"   class="col-form-label">Mother Name:</label>
					<input type="text" class="form-control" id="mother_name" name="mother_name" required>
				</div>
				<div class="form-group col-md-6">
					<label class="col-form-label" for="mother_mo">Mother Mobile No:</label>
					<input class="form-control" type="tel" id="mother_mo" name="mother_mo" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="present_address"  class="col-form-label">Present Address:</label>
					<textarea type="text" class="form-control" id="present_address" name="present_address" row="5" required></textarea>
				</div>
				<div class="form-group col-md-6">
					<label for="parmanent_address"  class="col-form-label">Parmanent Address:</label>
					<textarea type="text" class="form-control" id="parmanent_address" name="parmanent_address" row="5" required></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			
			
		</form>
	</div>
</div>
<?php
	include("includes/scripts.php");
	include("includes/footer.php");
	if(isset($_POST["submit"])){
		$department_id = $_POST["department_id"];
		$semester = $_POST["semester"];
		$first_name = $_POST["first_name"];
		$middle_name = $_POST["middle_name"];
		$last_name = $_POST["last_name"];
		$student_id = $_POST["student_id"];
		$blood_group = $_POST["blood_group"];
		$gender = $_POST["gender"];
		$religion = $_POST["religion"];
		$nationality = $_POST["nationality"];
		$date = $_POST["date"];
		$phone = $_POST["phone"];
		$father_name = $_POST["father_name"];
		$father_mo = $_POST["father_mo"];
		$mother_name = $_POST["mother_name"];
		$mother_mo = $_POST["mother_mo"];
		$present_address = $_POST["present_address"];
		$parmanent_address = $_POST["parmanent_address"];
		$profile_photo = $_FILES["profile_photo"]["name"];
		$query = "INSERT INTO student (department_id,semester,first_name,last_name,middle_name,student_id,blood_group,gender,religion,nationality,bod,phone,father_name,father_mo,mother_name,mother_mo,present_address,permanent_address,profile_image) VALUES ('$department_id','$semester','$first_name','$last_name','$middle_name','$student_id','$blood_group','$gender','$religion','$nationality','$date','$phone','$father_name','$father_mo','$mother_name','$mother_mo','$present_address','$parmanent_address','$profile_photo')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	      move_uploaded_file($_FILES["profile_photo"]["tmp_name"],"upload/".$_FILES["profile_photo"]["name"]);
	echo '<meta http-equiv="refresh" content="0">';
	}
	}
?>