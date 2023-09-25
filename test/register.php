<?php include('include/process.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>
	<body class="bg-info-subtle">
		<?php include('include/navbar1.php'); ?>
		<div class="container m-auto mt-5 p-0">
			<div class="card mx-auto p-3 bg-warning-subtle border-0" style="width: 380px">
				<h2 class="mb-3 ms-3 mt-2 fw-bolder">REGISTER</h2>
				<div class="card-body p-3">
					<form action="register.php" method="POST">
						<?php include('include/errors.php'); ?>
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label text-nowrap align-self-center fw-medium">First Name:</label>
							<div class="col-sm-9">
								<input type="text" name="firstName" class="form-control"
								placeholder="First Name" value="<?php echo $firstName; ?>"/>
							</div>
						</div>
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label text-nowrap align-self-center fw-medium">Last Name:</label>
							<div class="col-sm-9">
								<input type="text" name="lastName" class="form-control"
								placeholder="Last Name" value="<?php echo $lastName; ?>"/>
							</div>
						</div>
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label align-self-center fw-medium">Email:</label>
							<div class="col-sm-9">
								<input type="email" name="email" class="form-control"
								placeholder="example@mail.com" value="<?php echo $email; ?>"/>
							</div>
						</div>	
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label text-nowrap align-self-center fw-medium">Password:</label>
							<div class="col-sm-9">
								<input type="password" name="password" class="form-control"
								placeholder="Password"/>
							</div>
						</div>
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label text-nowrap align-self-center fw-medium">Confirm</br> Password:</label>
							<div class="col-sm-9">
								<input type="password" name="confirmPassword" class="form-control"
								placeholder="Confirm Password"/>
							</div>
						</div>
						<input type="submit" name="register" value="Create Account" class="btn btn-primary w-100"/>
					</form>
					<p class="mt-3">Have an account already? <a href="login.php" target="_self"><i>Log in</i></a></p>
				</div>
			</div>
		</div>
	</body>
</html>