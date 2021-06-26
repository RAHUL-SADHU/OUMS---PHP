<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online University Managment - Login</title>
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">
			<link href="css/sb-admin-2.min.css" rel="stylesheet">
			<body class="bg-gradient-primary">
				<div class="container">
					<!-- Toast container -->
					<div style="position: absolute; top: 1rem; right: 1rem;">
						<!-- Toast -->
						<div class="toast" id="toastBasic" role="alert" aria-live="assertive" aria-atomic="false" data-delay="5000">
							<div class="toast-header bg-warning text-white">
								<i data-feather="alert-circle"></i>
								<strong class="mr-auto">Error</strong>
								<button class="ml-2 mb-1 close text-white" type="button" data-dismiss="toast" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="toast-body">Please enter valid Email or Password</div>
						</div>
					</div>
					
					<!-- Outer Row -->
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="card o-hidden border-0 shadow-lg my-5">
								<div class="card-body p-0 ">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<!-- Login Image -->
										 <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>  -->
										<div class="col">
											<div class="p-5">
												<div class="text-center">
													<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
												</div>
												<form class="user" action="#" method="POST">
													<div class="form-group">
														<input type="email" name="useremail" class="form-control form-control-user"
														id="useremail" aria-describedby="emailHelp"
														placeholder="Enter Email Address..." required>
													</div>
													<div class="form-group">
														<input type="password" name="userpasssword" class="form-control form-control-user"
														id="userpasssword" placeholder="Password" required>
													</div>
													
													<button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">
													Login
													</button>
												</form>
												<hr>
												<div class="text-center">
													<a class="small" href="forgot-password.php">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				include("includes/scripts.php")
				?>
				<!-- <script src="js/bootstrap-validate.js"></script>
				<script>
					bootstrapValidate(`#useremail`,`email:Enter a valid email address`)
					bootstrapValidate(`#userpasssword`,`min:6 : Enter at least 6 characters`)
				</script> -->
				<script>
				function showToast(){
				$("#toastBasic").toast("show");
				}
				</script>
			</body>
		</html>

		
		<!-- Login Logic -->
		<?php

		include('database/dbconfig.php');
		session_start();
		//Connection Database
		if(isset($_POST["login_btn"])){
		$email_login =  $_POST["useremail"];
		$password_login = $_POST["userpasssword"];
		$query = "SELECT * FROM admin WHERE email ='$email_login' AND password = '$password_login'";
		$query_run = mysqli_query($connection,$query);
		if(mysqli_num_rows($query_run)>0){
		while ($row = mysqli_fetch_assoc($query_run)) {
		$_SESSION["userName"] = $row['first_name']." ".$row['last_name'];
		$_SESSION["role"] = $row["role"];
		$_SESSION["userId"] = $row["id"];
		header("Location:index.php");
	     }

		}else{
		echo "<script>showToast();</script>";
		}
		}
		
		?>