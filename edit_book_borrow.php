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
			<?php
			if(isset($_POST['edit_btn'])){
			
			$id =  $_POST['edit_id'];
			$query = "SELECT * FROM borrow_book LEFT JOIN book ON borrow_book.book_id = book.book_id WHERE borrow_book.id='$id'";
			$query_run = mysqli_query($connection,$query);
			foreach($query_run as $row){
			?>
			<form action="#" method="POST">
				   <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
				
					<div class="form-group col-md-4">
						<label for="book_name" class="col-form-label">Book Name:</label>
						<input type="text"  class="form-control" name="book_name" id="book_name" value="<?php echo $row['name']?>" readonly required>
					</div>
					<div class="form-row">
					<div class="form-group col-md-4 mx-2">
						<label for="issue_date" class="col-form-label">Issue Date:</label>
						<input type="date"  class="form-control" name="issue_date" id="issue_date" value="<?php echo $row['issue_date']?>" readonly required>
					</div>
					<div class="form-group col-md-4">
						<label for="return_date" class="col-form-label">Return Date:</label>
						<input type="date"  class="form-control" name="return_date" id="return_date" value="<?php echo $row['return_date']?>" required>
					</div>
					</div>
					<div class="form-group col-md-4">
						<label for="book_fine" class="col-form-label">Fine:</label>
						<input type="number" class="form-control" id="book_fine"  name= "book_fine" value="<?php echo $row['fine']?>" required>
					</div>

					<div class="form-group col-md-4">
						<label for="status" class="col-form-label">Status:</label>
						<select class="form-control" name="status" id="status">
							<option <?php echo $row['status'] == "Borrowed" ? "selected" : "" ?>>Borrowed</option>
							<option <?php echo $row['status'] == "Returned" ? "selected" : "" ?>>Returned</option>
						</select>
					</div>
				
				<button type="submit" class="btn btn-primary my-2 mx-2" name="submit" id="submit">Update</button>
			</form>
			<?php
			}
			}
			?>
		</div>
	</div>
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
		if(isset($_POST["submit"])){
	$id = $_POST["edit_id"];
	$return_date = $_POST["return_date"];
	$fine = $_POST["book_fine"];
	$status = $_POST["status"];
	$query = "UPDATE borrow_book SET return_date='$return_date',fine='$fine',status='$status'WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);
	if($query_run){
echo " <script> location.replace('borrow_book_list.php'); </script>";
}else{
echo "Data note update";
}
}
	?>