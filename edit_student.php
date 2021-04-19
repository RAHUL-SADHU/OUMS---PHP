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
			<?php
			if(isset($_POST['edit_btn'])) {
			$id =  $_POST['edit_id'];
			$query = "SELECT * FROM student WHERE id='$id'";
			$query_run = mysqli_query($connection,$query);
			foreach($query_run as $row){
			?>
			<form action="#" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
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
							while ($row_department = mysqli_fetch_assoc($query_run)) {
							
							if($row['department_id'] == $row_department['id']){
							echo "<option value =".$row_department['id']." selected = selected>".$row_department['name']."</option>";
							}else{
							echo "<option value =".$row_department['id'].">".$row_department['name']."</option>";
																		}
							}
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-6 mx-auto">
						<label for="Semester" class="col-form-label">Semester:</label>
						<select class="form-control" name="semester">
							<?php
							for ($x = 0; $x <= 8; $x++) {
								if($row['semester'] == $x){
							echo "<option selected = selected>".$x."</option>";
								}else{
							echo "<option>".$x."</option>";
								}
							
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="first_name" class="col-form-label">First Name:</label>
						<input type="text" class="form-control" id="first_name" name="first_name"
						value="<?php echo $row['first_name']?>" required>
					</div>
					<div class="form-group col-md-4 mx-auto">
						<label for="middle_name" class="col-form-label">Middle Name:</label>
						<input type="text" class="form-control" id="middle_name" name= "middle_name" value="<?php echo $row['middle_name']?>" required>
					</div>
					<div class="form-group col-md-4 mx-auto">
						<label for="last_name" class="col-form-label">Last Name:</label>
						<input type="text" class="form-control" id="last_name"  name= "last_name" value="<?php echo $row['last_name']?>"required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4 mx-auto">
						<label for="student_id" class="col-form-label">ID No:</label>
						<input type="number" class="form-control" id="student_id"  name= "student_id" value="<?php echo $row['student_id']?>" required>
					</div>
					
					<div class="form-group col-md-4 mx-auto">
						<label for="blood_group" class="col-form-label">Blood Group:</label>
						<select class="form-control" name="blood_group">
							<option <?php if($row['blood_group'] ==  "A+") echo 'selected="selected"';?>>A+</option>
							<option <?php if($row['blood_group'] == "A-") echo 'selected="selected"'; ?>>A-</option>
							<option <?php if($row['blood_group'] == "B+") echo 'selected="selected"'; ?>>B+</option>
							<option <?php if($row['blood_group'] == "B-") echo 'selected="selected"'; ?>>B-</option>
							<option <?php if($row['blood_group'] == "AB+") echo 'selected="selected"'; ?>>AB+</option>
							<option <?php if($row['blood_group'] == "AB-") echo 'selected="selected"'; ?>>AB-</option>
							<option <?php if($row['blood_group'] == "O+") echo 'selected="selected"'; ?>>O+</option>
							<option <?php if($row['blood_group'] == "O-") echo 'selected="selected"'; ?>>O-</option>
						</select>
					</div>
					<div class="form-group  col-md-4 mx-auto my-auto">
						<label  class="col-form-label">Gender :</label>
						<div class="radio">
							<label class="radio-inline">
								<input type="radio"  name="gender" id="male" value="male" <?php if($row['gender'] == 'male') echo "checked";?> >Male
							</label>
							<label class="radio-inline ml-2">
								<input type="radio" name="gender" id="female" value="female" <?php if($row['gender'] == 'female') echo "checked";?> >Female
							</label>
						</div>
					</div>
					
				</div>
				<div class="form-row">
					<div class="form-group col-md-4 mx-auto">
						<label for="religion"  class="col-form-label">Religion:</label>
						<select class="form-control" name="religion">
							<option <?php if($row['religion'] == "Hindu") echo 'selected="selected"'; ?>>Hindu</option>
							<option <?php if($row['religion'] == "Islam") echo 'selected="selected"'; ?>>Islam</option>
							<option <?php if($row['religion'] == "Cristian") echo 'selected="selected"'; ?>>Cristian</option>
							<option <?php if($row['religion'] == "Buddhist") echo 'selected="selected"'; ?>>Buddhist</option>
							<option <?php if($row['religion'] == "Other") echo 'selected="selected"'; ?>>Other</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="nationality" class="col-form-label">Nationality:</label>
						<input type="text" class="form-control" id="nationality" name="nationality"value="<?php echo $row['nationality']?>" required>
					</div>
					<div class="form-group col-md-4"> <!-- Date input -->
					<label class="col-form-label" for="date">Date:</label>
					<input class="form-control" id="date" name="date"  type="date"
					value="<?php echo $row['bod']?>" required/>
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="photograph"  class="col-form-label">Photograph:</label>
					<input class="form-control" type="file" id="photograph" name="profile_photo"
					value="<?php echo $row['profile_image']?>">
				</div>
				<div class="form-group col-md-4">
					<label  class="col-form-label" for="phone">Mobile Number:</label>
					<input class="form-control" type="tel" id="phone" name="phone"
					value="<?php echo $row['phone']?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="father_name"   class="col-form-label">Father Name:</label>
					<input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $row['father_name']?>" required>
				</div>
				<div class="form-group col-md-6">
					<label  class="col-form-label" for="father_mo">Father Mobile No:</label>
					<input class="form-control" type="tel" id="father_mo" name="father_mo" value="<?php echo $row['father_mo']?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="mother_name"  class="col-form-label">Mother Name:</label>
					<input type="text" class="form-control" id="mother_name" name="mother_name"
					value="<?php echo $row['mother_name']?>" required>
				</div>
				<div class="form-group col-md-6">
					<label  class="col-form-label"for="mother_mo">Mother Mobile No:</label>
					<input class="form-control" type="tel" id="mother_mo" name="mother_mo"
					value="<?php echo $row['mother_mo']?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="present_address"   class="col-form-label">Present Address:</label>
					<textarea type="text" class="form-control" id="present_address" name="present_address" row="5" required ><?php echo $row['present_address']?></textarea>
				</div>
				<div class="form-group col-md-6">
					<label for="parmanent_address"   class="col-form-label">Parmanent Address:</label>
					<textarea type="text" class="form-control" id="parmanent_address" name="parmanent_address" row="5" required><?php echo $row['permanent_address']?> </textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
		<?php
		}
		}
		?>
	</div>
</div>
<?php
	include("includes/scripts.php");
	include("includes/footer.php");
	if(isset($_POST["submit"])){
		$id =  $_POST['edit_id'];
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
		if(empty($profile_photo)){
		$query = "UPDATE student SET department_id='$department_id',semester='$semester',first_name='$first_name',last_name = '$last_name', middle_name = '$middle_name',
			student_id = '$student_id',blood_group = '$blood_group', gender = '$gender',religion = '$religion',nationality = '$nationality',bod = '$date',phone = '$phone',father_name = '$father_name',father_mo = '$father_mo',mother_name = '$mother_name',mother_mo = '$mother_mo',present_address = '$present_address',permanent_address = '$parmanent_address' WHERE id = '$id'";
	}else{
		$query = "UPDATE student SET department_id='$department_id',semester='$semester',first_name='$first_name',last_name = '$last_name', middle_name = '$middle_name',
		student_id = '$student_id',blood_group = '$blood_group', gender = '$gender',religion = '$religion',nationality = '$nationality',bod = '$date',phone = '$phone',father_name = '$father_name',father_mo = '$father_mo',mother_name = '$mother_name',mother_mo = '$mother_mo',present_address = '$present_address',permanent_address = '$parmanent_address',profile_image = '$profile_photo' WHERE id = '$id'";
	}
		
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			if(!empty($profile_photo)){
	move_uploaded_file($_FILES["profile_photo"]["tmp_name"],"upload/".$_FILES["profile_photo"]["name"]);
}
	
echo " <script> location.replace('student_list.php'); </script>";
}else{
echo "Data Not Update";
}
}
?>