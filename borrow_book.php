<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Borrow Book</h5>
		</div>
		<div class="card-body">
			<form action="#" method="POST">
				<div class="form-row">
					<div class="form-group col-md-4">
						<?php
						$getDeparment = "SELECT * FROM department";
						$query_run = mysqli_query($connection,$getDeparment);
						?>
						<label class="col-form-label">Department:</label>
						<select class="form-control" name="department_id" id= "department" onchange="updateStudent()" required>
							<?php
							if(mysqli_num_rows($query_run)>0){
							while ($row = mysqli_fetch_assoc($query_run)) {
							
							
							echo "<option value =".$row['id'].">".$row['name']."</option>";
							
							}
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-4 mx-auto">
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
					<div class="form-group col-md-4 mx-auto">
						<label for="student" class="col-form-label">Student:</label>
						<select class="form-control" name="student" id="student" required>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="issue_date" class="col-form-label">Issue Date:</label>
						<input type="date"  class="form-control" name="issue_date" required>
					</div>
					<div class="form-group col-md-4">
						<?php
						$bookList = "SELECT * FROM book";
						$query_run = mysqli_query($connection,$bookList);
						?>
						<label for="book_name" class="col-form-label">Book Name:</label>
						<select class="form-control" name="book_name" id= "book_name" required>
							<?php
							if(mysqli_num_rows($query_run)>0){
							while ($row = mysqli_fetch_assoc($query_run)) {
							
							
							echo "<option value =".$row['book_id'].">".$row['name']."</option>";
							
							}
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="book_qty" class="col-form-label">Quantity:</label>
						<input type="number" class="form-control" id="book_qty"  name= "book_qty" required>
					</div>
					<div class="form-group col-md-2">
						<label for="return_date" class="col-form-label">Return Date:</label>
						<input type="date"  class="form-control" name="return_date" id="return_date" required>
					</div>
					<div class="form-group col-md-2">
						<label for="book_fine" class="col-form-label">Fine:</label>
						<input type="number" class="form-control" id="book_fine"  name= "book_fine" required>
					</div>
				</div>

				<button type="submit" class="btn btn-primary" name="add" id="addButton">Add</button>
			</form>
			
			<div class="table-responsive mt-4">
				<table class="table table-bordered" id="table" width="100%" cellspacing="0" data-unique-id="title">
					<thead>
						<tr>
							<th data-field="title">Title</th>
							<th data-field="quantity">Quantity</th>
							<th data-field="return">Return</th>
							<th data-field="fine">Fine</th>
							  <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Delete</th>
						</tr>
					</thead>
				</table>
			</div>
			<br>
			<button type="submit" class="btn btn-primary" name="submit" id="submit" onclick="clickSubmit()">Submit</button>
			
		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
	
	<?php
		//include("includes/scripts.php");
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
	
  var $table = $('#table')
  var $button = $('#addButton')

 $('form').on('submit', function(event) {
    event.preventDefault();
    addRow()
    this.reset()

});

  function addRow(){
          
      var title = jQuery("#book_name option:selected").text();
      var quantity = $("#book_qty").val()
      var returnDate = $("#return_date").val()
      var fine = $("#book_fine").val()

      var array = $table.bootstrapTable('getRowByUniqueId', title)
      if(jQuery.isEmptyObject(array)){
      	 var randomId = 100 + ~~(Math.random() * 100)
        $table.bootstrapTable('insertRow', {
        index: 0,
        row: {
          title: title,
          quantity: quantity,
          return: returnDate,
          fine :fine
        }
      })
      }else{
      	alert("This book already added !!")
      }

     
    }

    function operateFormatter(value, row, index) {
    return [
      '<a class="remove" href="javascript:void(0)" title="Remove">',
      '<i class="fa fa-trash"></i>',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
     'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'title',
        values: [row.title]
      })
    }
  }


  function clickSubmit(){
  	var storeItems = $table.bootstrapTable('getData');
  	alert(storeItems.length);

  	for(let item in storeItems){
    console.log(`${storeItems[item].title}
    ${storeItems[item].fine}`);
   }

  }
  
	
	
	
	$(function() {
	var data = [	]
	$table.bootstrapTable({data: data})
	})
	window.onload=updateStudent;
	</script>
	