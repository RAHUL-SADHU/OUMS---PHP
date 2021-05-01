<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Student Fees</h5>
		</div>
		<div class="card-body">
			<form method="post" action="student_fee_receipt.php">
				<div class="form-row">
					<div class="form-group col-md-6">
						<?php
						$getDeparment = "SELECT * FROM department";
						$query_run = mysqli_query($connection,$getDeparment);
						?>
						<label class="col-form-label">Department:</label>
						<select class="form-control" name="department_id" id="department" onchange="updateStudent()" required>
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
						<select class="form-control" name="semester" id="semester" onchange="updateStudent()" required>
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
					
					
					<div class="form-group col-md-6">
						<label for="student"  class="col-form-label">Student:</label>
						<select class="form-control" name="student" id="student" required>	</select>	
					</div>
				</div>
				
				
				<button type="submit" class="btn btn-primary my-2" name="submit">Get Receipt</button>
			</form>
			
			<hr>
		</div>
	</div>

	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
	?>

		<script>
	function updateStudent(){
			var department_id = $("#department").val();
			var semester  = $("#semester").val();
		$.ajax({
		type: "POST",
		url: "table_data.php",
		data: {action: 'student_dropdown',department_id : department_id,semester :semester},
		dataType: "html",
		success: function(data){
			console.log(data)
		$("#student").html(data);
		}
		});
		}

		window.onload=updateStudent;
	</script>