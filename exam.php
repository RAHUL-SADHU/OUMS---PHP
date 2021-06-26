<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>

 <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">


<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Exam</h5>
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
					<select class="form-control" name="department" id="department" onchange="updateSubject()" required>
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
					<select class="form-control" name="exam" id="exam" required>
						<option>Midterm Exam</option>
						<option>Final Exam</option>
					</select>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="subject" class="col-form-label">Subject:</label>
					<select class="form-control" name="subject" id="subject">
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
			
			<div class="table-responsive mt-4">
				<table class="table" id="table">
					<thead>
						<tr>
							<th data-field="student_id">Student Id</th>
							<th data-field="name">Name</th>
							<th data-field="written" data-formatter="writtenFormatter"
        data-events="writtenEvents">Written</th>
							<th data-field="presentation" data-formatter="writtenFormatter"
        data-events="presentationEvents">Presentation</th>
							<th data-field="practical" data-formatter="writtenFormatter"
        data-events="practicalEvents">Lab/Practical</th>
						</tr>
					</thead>			
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
	<?php
		//include("includes/scripts.php");
		include("includes/footer.php");
	?>
	<script type="text/javascript">
	
	var $table = $('#table');

	function loadTable() {
	var department_id = document.getElementById("department").value;
	var semester = document.getElementById("semester").value;
	console.log(department_id);
	 $.ajax({
	type: "POST",
	url: "table_data.php",
	data: {action: 'exam_table',department_id : department_id ,semester : semester},
	dataType: "html",
	success: function(result){
	 var myData = JSON.parse(result);
	 console.log(result);
	 $table.bootstrapTable('load',myData);
	
	}
	});
	}

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

	  loadTable();
	}


	   function writtenFormatter(value) {
        return '<input type="text"  maxlength="3" pattern="([0-9]|[0-9]|[0-9])"/>'
  }

   window.writtenEvents = {
    'change :text': function (e, value, row, index) {
        var mark = 	$(e.target).val();
        if(mark<0 || mark>100){
        	alert("Please enter valid mark in 0 to 100");
        	row.written = 0;
        }else{
        	 row.written = $(e.target).val();
        }
      
    }
  }

    window.presentationEvents = {
    'change :text': function (e, value, row, index) {
        var mark = 	$(e.target).val();
        if(mark<0 || mark>100){
        	alert("Please enter valid mark in 0 to 100");
        	row.presentation = 0;
        }else{
        	 row.presentation = $(e.target).val();
        }
      
    }
  }


   window.practicalEvents = {
    'change :text': function (e, value, row, index) {
        var mark = 	$(e.target).val();
        if(mark<0 || mark>100){
        	alert("Please enter valid mark in 0 to 100");
        	row.practical = 0;
        }else{
        	 row.practical = $(e.target).val();
        }
    }
  }

  $('form').on('submit', function(event) {
	event.preventDefault();
	   clickSubmit();
	});

  function clickSubmit(){
	var storeItems = $table.bootstrapTable('getData');
	//alert(JSON.stringify(storeItems));


	var department_id = document.getElementById("department").value;
	var semester = document.getElementById("semester").value;
	var subject_id = document.getElementById("subject").value;
	var exam = document.getElementById("exam").value;

	
    console.log("department_id "+department_id);
    console.log("semester "+semester);
	console.log("subject_id "+subject_id);

	
	$.ajax({
	type: "POST",
	url: "table_data.php",
	data: {action: 'submit_exam',department_id : department_id ,
	                                 semester : semester,
	                                 subject_id : subject_id,
	                                 exam : exam,
	                                 table_data : storeItems},
	dataType: "html",
	success: function(result){
		 var myData = JSON.parse(result);
	     alert(myData.message);

	      
	}
	});
	}

    	
	
	
	 $(function() {
	var data = [	]
	$table.bootstrapTable({data: data})
	})

	window.onload=updateSubject;
	</script>