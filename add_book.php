<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Add Book</h5>
		</div>
		<div class="card-body">
			<form action="#" method="POST">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="code_no" class="col-form-label">Code/ISBN No:</label>
						<input type="text" class="form-control" id="code_no" name="code_no" required>
					</div>
					<div class="form-group col-md-4">
						<label for="book_title" class="col-form-label">Title/Name:</label>
						<input type="text" class="form-control" id="book_title" name= "book_title" required>
					</div>
					<div class="form-group col-md-4">
						<label for="book_author" class="col-form-label">Author:</label>
						<input type="text" class="form-control" id="book_author" name= "book_author" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4 mx-auto">
						<label for="book_qty" class="col-form-label">Quantity:</label>
						<input type="number" class="form-control" id="book_qty"  name= "book_qty" required>
					</div>
					<div class="form-group col-md-4 mx-auto">
						<label for="rack_no" class="col-form-label">Rack No:</label>
						<input type="text" class="form-control" id="rack_no"  name= "rack_no" required>
					</div>
					<div class="form-group col-md-4 mx-auto">
						<label for="row_no" class="col-form-label">Row No:</label>
						<input type="number" class="form-control" id="row_no"  name= "row_no" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4 mx-auto">
						<label for="book_type" class="col-form-label">Book Type:</label>
						<select class="form-control" name="book_type">
							<option>Academic</option>
							<option>Story</option>
							<option>Magazine</option>
							<option>Other</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<?php
						$getDeparment = "SELECT * FROM department";
						$query_run = mysqli_query($connection,$getDeparment);
						?>
						<label class="col-form-label">Class:</label>
						<select class="form-control" name="department_id">
							<?php
							if(mysqli_num_rows($query_run)>0){
							while ($row = mysqli_fetch_assoc($query_run)) {
							
							
							echo "<option value =".$row['id'].">".$row['name']."</option>";
							
							}
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="description"  class="col-form-label">Description:</label>
						<textarea type="text" class="form-control" id="description" name="description" row="5" required></textarea>
					</div>
					
				</div>
				
				<button type="submit" class="btn btn-primary" name="submit">Add Book</button>
				
			</form>
			
		</div>
	</div>
	
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
		if(isset($_POST["submit"])){
		$book_no = $_POST["code_no"];
		$name = $_POST["book_title"];
		$author = $_POST["book_author"];
		$quantity = $_POST["book_qty"];
		$rack_no = $_POST["rack_no"];
		$row_no = $_POST["row_no"];
		$book_type = $_POST["book_type"];
		$department_id = $_POST["department_id"];
		$description = $_POST["description"];
		$query = "INSERT INTO book (book_no,name,author,quantity,rack_no,row_no,book_type,department_id,description) VALUES ('$book_no','$name','$author','$quantity','$rack_no','$row_no','$book_type','$department_id','$description')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	
	echo '<meta http-equiv="refresh" content="0">';
	}
	}
	?>