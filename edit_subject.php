<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Subject</h6>
		</div>
		<div class="card-body">
			<?php
			if(isset($_POST['edit_btn'])){
			
			$id =  $_POST['edit_id'];
			$query = "SELECT * FROM subject WHERE subject_id='$id'";
			$query_run = mysqli_query($connection,$query);
			foreach($query_run as $row){
			?>
			<form action="#" method="POST">
				<input type="hidden" name="edit_id" value="<?php echo $row['subject_id']?>">
				<div class="form-group">
					<label for="subject-name" class="col-form-label">Name:</label>
					<input type="text" class="form-control" id="subject-name" name="sName"
					value="<?php echo $row['subject_name']?>"
					required>
				</div>
				<div class="form-group">
					<label for="code" class="col-form-label">Code:</label>
					<input type="number" class="form-control" id="code" min="1" name= "sCode"
					value="<?php echo $row['subject_code']?>" required>
				</div>
				<div class="form-group">
					<label for="credit" class="col-form-label">Credit:</label>
					<input type="number" class="form-control" id="credit" name="sCredit"
					value="<?php echo $row['subject_credit']?>" required>
				</div>
				<div class="form-group">
					<?php
					$getDeparment = "SELECT * FROM department";
					$query_run = mysqli_query($connection,$getDeparment);
					?>
					<label>Department:</label>
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
				<div class="form-group">
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
				<a href="subject.php" class="btn btn-danger mt-3">Cancel</a>
				<button type="submit" class="btn btn-primary ml-3 mt-3" name="update">Update</button>
			</form>
			<?php
			}
			}
			?>
			
		</div>
	</div>
</div>
</div>
<?php
include("includes/scripts.php");
include("includes/footer.php");
if(isset($_POST["update"])){
	    $id = $_POST["edit_id"];
	    $sName = $_POST["sName"];
		$sCode = $_POST["sCode"];
		$sCredit = $_POST["sCredit"];
		$department_id = $_POST["department_id"];
		$semester = $_POST["semester"];

	$query = " UPDATE subject SET subject_name='$sName',subject_code='$sCode',subject_credit = '$sCredit', department_id = '$department_id',semester = '$semester' WHERE subject_id = '$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
echo " <script> location.replace('subject.php'); </script>";
}else{
echo "Data note update";
}
}
?>