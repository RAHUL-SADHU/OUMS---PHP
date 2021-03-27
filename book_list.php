<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
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
					<select class="form-control" name="department_id" id="department_id" onchange="loadTable()">
						<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
						
						
						echo "<option value =".$row['id'].">".$row['name']."</option>";
						
						}
						}
						?>
					</select>
				</div>
				<!-- <div class="col-md-2 my-auto mx-auto">
					<button type="submit" class="btn btn-primary mx-auto" name="submit">Get List</button>
				</div> -->
				
			</div>
			
			<div class="table-responsive mt-4" id="loadTable">
				
			</div>
		</div>
	</div>
	<script>
	function loadTable() {
	var department_id = document.getElementById("department_id").value;
	$.ajax({
	type: "POST",
	url: "table_data.php",
	data: {action: 'book_table',department_id : department_id},
	dataType: "html",
	success: function(data){
	$("#loadTable").html(data);
	}
	});
	}
	window.onload=loadTable;
	</script>
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
   if(isset($_POST["delete"])){
	$id = $_POST["delete_id"];
	$query = "DELETE FROM book WHERE book_id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<script>loadTable()</script>';
	}else{
	echo "Data note Delete";
	}
	}
	?>