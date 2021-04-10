<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
  
 
 <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Student Attendence</h5>
		</div>
		<div class="card-body">
			<form action="#" method="POST">
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
					<div class="form-group col-md-6 mx-auto">
						<label for="Semester" class="col-form-label">Semester:</label>
						<select class="form-control" name="semester"  id= "semester">
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
					<input class="form-control" id="date" name="date" type="date"/>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<?php
						$getSubject = "SELECT * FROM subject";
						$query_run = mysqli_query($connection,$getSubject);
					?>
					<label for="subject" class="col-form-label">Subject:</label>
					<select class="form-control" name="subject" id="subject">
						<?php
						if(mysqli_num_rows($query_run)>0){
						while ($row = mysqli_fetch_assoc($query_run)) {
						echo "<option value =".$row['subject_id'].">".$row['subject_name']."</option>";
						
						}
						}
						?>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
		
		<div class="table-responsive mt-4">
			<table class="table" id="table">
				<thead>
					<tr>
						<th data-field="id">Student Id</th>
						<th data-field="name">Name</th>
						<th data-field="price">Is Present ?</th>
					</tr>
				</thead>
			</table>
				
			</div>
		</div>
	</div>

	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>

<!-- 
     <script>
  var $table = $('#table')

  $(function() {
    
    $table.bootstrapTable({data: data})
  })
</script> -->
	
	<?php
		//include("includes/scripts.php");
		include("includes/footer.php");
		if(isset($_POST["submit"])){
			$department_id = $_POST["department_id"];
			$semester = $_POST["semester"];
			$date = $_POST["date"];
			$subject = $_POST["subject"];
			
			$query = "INSERT INTO subject (subject_name,subject_code,subject_credit,department_id,semester) VALUES ('$sName','$sCode','$sCredit','$department_id','$semester')";
			$query_run = mysqli_query($connection,$query);
			if($query_run){
	echo "<script>hideModel();</script>";
	echo '<meta http-equiv="refresh" content="0">';
	}
	}
	if(isset($_POST["delete"])){
	$id = $_POST["delete_id"];
	$query = "DELETE FROM subject WHERE subject_id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}else{
	echo "Data note Delete";
	}
	}
	?>

     
	<script>
	function loadTable() {

    var data12 = [
      {
        'id': 0,
        'name': 'Item 0',
        'price': '$0'
      },
      {
        'id': 1,
        'name': 'Item 1',
        'price': '$1'
      },
      {
        'id': 2,
        'name': 'Item 2',
        'price': '$2'
      },
      {
        'id': 3,
        'name': 'Item 3',
        'price': '$3'
      },
      {
        'id': 4,
        'name': 'Item 4',
        'price': '$4'
      },
      {
        'id': 5,
        'name': 'Item 5',
        'price': '$5'
      }
    ];

	var department_id = document.getElementById("department_id").value;
	var semester = document.getElementById("semester").value;
	console.log(department_id);
	 $.ajax({
	type: "POST",
	url: "table_data.php",
	data: {action: 'attendance_table',department_id : department_id ,semester : semester},
	dataType: "html",
	success: function(result){
	var myData = JSON.parse(result);
	console.log(result);
	$("#table").bootstrapTable({data: data12});
	}
	});
}
	window.onload=loadTable;
	document.getElementById('date').valueAsDate = new Date();
	</script>