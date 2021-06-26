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
	           <form action="#" method="POST">
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
					<div class="form-group col-md-6"> <!-- Date input -->
					<label class="col-form-label" for="date">Date:</label>
					<input class="form-control" id="date" name="date"type="date" required/>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="student" class="col-form-label">Student:</label>
					<select class="form-control" name="student" id="student" required>
					</select>
				</div>
			</div>
			<hr>
			
				<div class="form-group col-md-4">
					<label for="fees_amount"class="col-form-label">Fees Amount:</label>
					<input type="number" class="form-control" id="fees_amount" name="fees_amount"
					required>
				</div>
			
			<button type="submit" class="btn btn-primary my-2 mx-2" name="add">Add Fees
			</button>
			</form>
			
			<hr>
			<div class="form-row mt-4">
				<h6 class="col-md-2 my-auto">Current Total:</h6>
				<input type="number" class="form-control col-md-4" id="current_total" name="current_total" value="0" disabled>
			</div>
			<div class="form-row mt-4">
				<h6 class="col-md-2 my-auto">Late Fee:</h6>
				<input type="number" value="0" class="form-control col-md-4" id="late_fee" name="late_fee" onchange="calculateFees()">
			</div>
			<div class="form-row mt-4">
				<h6 class="col-md-2 my-auto">Previous Due:</h6>
				<input type="number" class="form-control col-md-4" id="previous_due" name="previous_due"  value="0" readonly>
			</div>
			<div class="form-row mt-4">
				<h6 class="col-md-2 my-auto">Grand Total:</h6>
				<input type="number" class="form-control col-md-4" id="grand_total" name="grand_total" disabled value="0">
			</div>
			<div class="form-row mt-4">
				<h6 class="col-md-2 my-auto">Paid Amount:</h6>
				<input type="number" class="form-control col-md-4" id="paid_amount" name="paid_amount" value="0" onchange="calculateFees()">
			</div>

			<div class="form-row mt-4">
				<h6 class="col-md-2 my-auto">Due Amount:</h6>
				<input type="number" class="form-control col-md-4" id="due_amount" name="paid_amount" disabled value="0">
			</div>

			<button type="submit" class="btn btn-primary my-4" name="submit" onclick="submitFees()">Submit Fee</button>
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


		$('form').on('submit', function(event) {
		event.preventDefault();
		var student_id = $("#student").val();
		$.ajax({
		type: "POST",
		url: "get_data.php",
		data: {action: 'student_dueAmount',student_id : student_id},
		dataType: "html",
		success: function(data){
			addFees(data);
		}
		});
		
		});

		function addFees(dueAmount){
			var fees_amount = Number(document.getElementById("fees_amount").value);
	        var due_amount = Number(dueAmount);
			document.getElementById("current_total").value = fees_amount;
			document.getElementById("previous_due").value = due_amount;
		    calculateFees();
		}


		function calculateFees(){
	         var currentTotal = Number(document.getElementById("current_total").value);
	         var lateFees = Number(document.getElementById("late_fee").value);
	         var previousDue = Number(document.getElementById("previous_due").value);
	         var paidAmount = Number(document.getElementById("paid_amount").value)

	         var grandTotal = currentTotal + lateFees + previousDue;
	         document.getElementById("grand_total").value = grandTotal;

	         var dueAmount = grandTotal - paidAmount;
	         document.getElementById("due_amount").value = dueAmount;
		}


		function submitFees(){


			if(checkValid()){
            var studentId = $("#student").val();
            var payableAmount = $("#grand_total").val();
            var lateFees =  $("#late_fee").val();
            var paidAmount = $("#paid_amount").val();
            var dueAmount = $("#due_amount").val();
            var payDate = $("#date").val()

			   	$.ajax({
		  type: "POST",
		  url: "get_data.php",
		  data: {action: 'submit_fees',
		         studentId : studentId,
		         payableAmount : payableAmount,
		         lateFees : lateFees,
		         paidAmount : paidAmount,
		         dueAmount : dueAmount,
		         payDate : payDate
		          },
		  dataType: "html",
		success: function(data){
			alert(data);
			window.location.reload();
		}
		});
			}
	 }

		function checkValid(){
	     var student_id = $("#student").val();
	     var currentTotal = Number($("#current_total").val());
	       if(!student_id || student_id.length === 0){
	       	  alert("Please select student");
	       	  return false;
	       }else if(!currentTotal || currentTotal.length === 0 || currentTotal<=0){
	       	  alert("Please add valid fees amount");
	       	  return false;
	       }
	       return true;

		}

		window.onload=updateStudent;
	</script>