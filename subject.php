<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Add Department Model -->
<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="subject-name" class="col-form-label">Name:</label>
						<input type="text" class="form-control" id="subject-name" required>
					</div>
					<div class="form-group">
						<label for="code" class="col-form-label">Code:</label>
						<input type="number" class="form-control" id="code" min="1" required>
					</div>

                     <div class="form-group">
						<label for="credit" class="col-form-label">Credit:</label>
						<input type="number" class="form-control" id="credit" required>
					</div>

					<div class="form-group">
						<label for="department" class="col-form-label">Department:</label>
						<input type="text" class="form-control" id="department" required>
					</div>

					<div class="form-group">
						<label for="Semester" class="col-form-label">Semester:</label>
						<input type="text" class="form-control" id="Semester" required>
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 mt-4 text-gray-800">Subject</h1>
	<button name="add_department" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addSubject">
	Add Subject
	</button>
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Subject Information</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="dataTables_length" id="dataTable_length">
								<label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div id="dataTable_filter" class="dataTables_filter">
								<label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
							</div>
						</div>
					</div>
					<thead>
						<tr>
							<th>Name</th>
							<th>Code</th>
							<th>Credit</th>
							<th>Deparment</th>
							<th>Semester</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>Tiger Nixon</td>
							<td>123</td>
							<td>12</td>
							<td>EC</td>
							<td>2</td>
						</tr>
						<tr>
							<td>Tiger Nixon</td>
							<td>123</td>
							<td>12</td>
							<td>EC</td>
							<td>2</td>
						</tr>
						<tr>
							<td>Tiger Nixon</td>
							<td>123</td>
							<td>12</td>
							<td>EC</td>
							<td>2</td>
						</tr>
						<tr>
							<td>Tiger Nixon</td>
							<td>123</td>
							<td>12</td>
							<td>EC</td>
							<td>2</td>
						</tr>
						<tr>
							<td>Tiger Nixon</td>
							<td>123</td>
							<td>12</td>
							<td>EC</td>
							<td>2</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Page level plugins -->
	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- Page level custom scripts -->
	<script src="js/demo/datatables-demo.js"></script>
	<?php
	include("includes/scripts.php");
	include("includes/footer.php");
	?>