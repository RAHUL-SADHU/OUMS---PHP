<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Result</h5>
		</div>
		<div class="card-body">
			<form method="POST" action="result_subject.php">
			<div class="form-row">
				<div class="form-group col-md-6">
					<?php
					$getDeparment = "SELECT * FROM department";
					$query_run = mysqli_query($connection,$getDeparment);
					?>
					<label class="col-form-label">Department:</label>
					<select class="form-control" name="department" id="department" onchange="updateSubject()">
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
					<select class="form-control" name="semester" id="semester" onchange="updateSubject()" required>
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
				<div class="form-group col-md-6 mx-auto">
					<label for="exam" class="col-form-label">Exam:</label>
					<select class="form-control" name="exam" id="exam" >
						<option>Midterm Exam</option>
						<option>Final Exam</option>
					</select>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="subject" class="col-form-label">Subject:</label>
					<select class="form-control" name="subject" id="subject" required>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Get Result Sheet</button>
		</form>
			
		</div>
	</div>
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
	?>
	<script type="text/javascript">
		function updateSubject(){
		var department_id = $("#department").val();
		var semester  = $("#semester").val();
 	$.ajax({
	type: "POST",
	url: "get_data.php",
	data: {action: 'subject_dropdown',department_id : department_id,semester :semester},
	dataType: "html",
	success: function(data){
	$("#subject").html(data);
	}
	});
	}

	window.onload=updateSubject;
	</script>