<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Add Department Model -->
<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="department-name" class="col-form-label">Name:</label>
						<input type="text" class="form-control" id="department-name" required>
					</div>
					<div class="form-group">
						<label for="code" class="col-form-label">Code:</label>
						<input type="number" class="form-control" id="code" min="1" required>
					</div>

                     <div class="form-group">
						<label for="years" class="col-form-label">Years:</label>
						<input type="number" class="form-control" id="years" required>
					</div>
					<div class="form-group">
						<label for="description" class="col-form-label">Description:</label>
						<input type="text" class="form-control" id="description" required>
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
	<h1 class="h3 mb-2 mt-4 text-gray-800">Department</h1>
	<button name="add_department" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addDepartment">
	Add Department
	</button>
	
	<div class="card shadow mb-4 mt-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Start date</th>
							<th>Salary</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td>
						</tr>
						<tr>
							<td>Garrett Winters</td>
							<td>Accountant</td>
							<td>Tokyo</td>
							<td>63</td>
							<td>2011/07/25</td>
							<td>$170,750</td>
						</tr>
						<tr>
							<td>Ashton Cox</td>
							<td>Junior Technical Author</td>
							<td>San Francisco</td>
							<td>66</td>
							<td>2009/01/12</td>
							<td>$86,000</td>
						</tr>
						<tr>
							<td>Cedric Kelly</td>
							<td>Senior Javascript Developer</td>
							<td>Edinburgh</td>
							<td>22</td>
							<td>2012/03/29</td>
							<td>$433,060</td>
						</tr>
						<tr>
							<td>Airi Satou</td>
							<td>Accountant</td>
							<td>Tokyo</td>
							<td>33</td>
							<td>2008/11/28</td>
							<td>$162,700</td>
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