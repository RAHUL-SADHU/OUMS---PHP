<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Borrow Book</h5>
		</div>
		<div class="card-body">
			<form>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="code_no" class="col-form-label">Code/ISBN No:</label>
						<input type="text" class="form-control" id="code_no" name="code_no" required>
					</div>
					<div class="form-group col-md-3">
						<label for="issue_date" class="col-form-label">Issue Date:</label>
						<input type="date"  class="form-control" name="issue_date" id="issue_date" required>
					</div>
					<div class="form-group col-md-3">
						<label for="return_date" class="col-form-label">Return Date:</label>
						<input type="date"  class="form-control" name="return_date" id="return_date" required>
					</div>
					<div class="form-group col-md-3 mx-auto">
						<label for="status" class="col-form-label">Status:</label>
						<select class="form-control" name="status" id="status">
							<option>Borrowed</option>
							<option>Returned</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Get List</button>
			</form>
			
			<div class="table-responsive mt-4">
				<table class="table table-bordered" id="table" width="100%" cellspacing="0">
					
				</table>
			</div>
			
		</div>
	</div>
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
		if(isset($_POST["delete"])){
	$id = $_POST["delete_id"];
	echo "$id";
	$query = "DELETE FROM borrow_book WHERE id ='$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}else{
	echo "Data note Delete";
	}
	}
	?>

	<script type="text/javascript">

$('form').on('submit', function(event) {
	event.preventDefault();
	loadTable()
	this.reset()
	});

	function loadTable() {
	var book_no= document.getElementById("code_no").value;
	var issue_date = document.getElementById("issue_date").value;
	var return_date = document.getElementById("return_date").value;
	var status = document.getElementById("status").value;
	$.ajax({
	type: "POST",
	url: "table_data.php",
	data: {action: 'borrow_book_list',
	       book_no : book_no,
           issue_date : issue_date,
           return_date : return_date,
           status : status },
	dataType: "html",
	success: function(data){
	$("#table").html(data);
	}
	});
	}
	</script>