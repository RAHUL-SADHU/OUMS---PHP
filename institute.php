<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container-fluid">
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Institute Information</h5>
		</div>
		<div class="card-body">
			<?php
			$query = "SELECT * FROM institute WHERE institute_id ='1'";
			$query_run = mysqli_query($connection,$query);
			foreach($query_run as $row){
			?>
			<form action="#" method="POST">
				<div class="form-group col-md-6 mx-auto">
					<label for="name" class="col-form-label">Name:</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']?>" required>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="establish" class="col-form-label">Establish:</label>
					<input type="number" class="form-control" min="1900" max="2099" step="1" name="establish" value="<?php echo $row['establish']?>" required/>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="web" class="col-form-label">WebSite:</label>
					<input type="url" class="form-control" id="web" name="web"  value="<?php echo $row['website']?>"required>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label for="email" class="col-form-label">Email:</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']?>" required>
				</div>
				<div class="form-group col-md-6 mx-auto">
					<label class="col-form-label" for="phone">Phone Number:</label>
					<input class="form-control" type="tel" id="phone" name="phone" value="<?php echo $row['phone_number']?>" required>
				</div>
				<div class="form-group col-md-6  mx-auto">
					<label for="address"  class="control-label">Address:</label>
					<textarea type="text" class="form-control" id="address" name="address" row="5"required><?php echo $row['address']?></textarea>
				</div>
				<div class="form-group col-md-4  mx-auto">
					<button type="submit" class="col mx-auto my-2 btn btn-primary" name="submit">Submit</button>
				</div>
			</form>
			<?php
			}
			?>
			
		</div>
	</div>
	
	<?php
		include("includes/scripts.php");
		include("includes/footer.php");
		if(isset($_POST["submit"])){
		$name = $_POST["name"];
		$establish = $_POST["establish"];
		$website = $_POST["web"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$query = "UPDATE institute SET name='$name',establish='$establish',website='$website',phone_number='$phone',address ='$address',email = '$email'";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
	echo '<meta http-equiv="refresh" content="0">';
	}
	}
	?>