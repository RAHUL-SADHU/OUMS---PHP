<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online University Managment - Login</title>
		<link href="css/all.min.css" rel="stylesheet" type="text/css">
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">
			<link href="css/sb-admin-2.min.css" rel="stylesheet">
			<body class="bg-gradient-primary">
				<div class="container">
					<!-- Outer Row -->
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="card o-hidden border-0 shadow-lg my-5">
								<div class="card-body p-0">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<!-- Login Image -->
										<!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
										<div class="col">
											<div class="p-5">
												<div class="text-center">
													<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
												</div>
												<form class="user">
													<div class="form-group">
														<input type="email" class="form-control form-control-user"
														id="useremail" aria-describedby="emailHelp"
														placeholder="Enter Email Address..." required>
													</div>
													<div class="form-group">
														<input type="password" class="form-control form-control-user"
														id="userpasssword" placeholder="Password" required>
													</div>
													<div class="form-group">
														<div class="custom-control custom-checkbox small">
															<input type="checkbox" class="custom-control-input" id="customCheck">
															<label class="custom-control-label" for="customCheck">Remember
															Me</label>
														</div>
													</div>
													<a href="loginController.php" class="btn btn-primary btn-user btn-block">
														Login
													</a>
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
				<!-- Bootstrap core JavaScript-->
				<script src="js/jquery.min.js"></script>
				<script src="js/bootstrap.bundle.min.js"></script>
				<!-- Core plugin JavaScript-->
				<script src="js/jquery.easing.min.js"></script>
				<!-- Custom scripts for all pages-->
				<script src="js/sb-admin-2.min.js"></script>
				<script src="js/bootstrap-validate.js"></script>
				<script>
					bootstrapValidate(`#useremail`,`email:Enter a valid email address`)
					bootstrapValidate(`#userpasssword`,`min:6 : Enter at least 6 characters`)
				</script>
			</body>
		</html>