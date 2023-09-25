<?php include('include/process.php'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Log in</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">	
	</head>	
	<body class="bg-info-subtle">
		<?php include('include/navbar1.php'); ?>
		<div class="container m-auto mt-5 p-0">
			<?php
				if(isset($_SESSION['status'])){
					?>
						<div class="alert alert-success alert-dismissible fade show w-25 mx-auto" role="alert">
							<?php echo $_SESSION['status']; ?>
    						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php
						unset($_SESSION['status']);
				}
			?>
			<div class="card mx-auto p-3 bg-warning-subtle border-0" style="width: 380px">
			<h2 class="mb-3 ms-3 mt-2 fw-bolder">LOGIN</h2>
				<div class="card-body p-3">
					<form action="login.php" method="POST">
						<?php include('include/errors.php'); ?>
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label align-self-center fw-medium">Email:</label>
							<div class="col-sm-9">
								<input type="email" name="email" class="form-control" value="<?php echo $email; ?>"
								placeholder="example@gmail.com"/>
							</div>
						</div>
						<div class="mb-3 row">
							<label class="col-sm-3 p-0 ps-3 col-form-label text-nowrap align-self-center fw-medium">Password:</label>
							<div class="col-sm-9">
								<input type="password" name="password" class="form-control" value=""
								placeholder="Password"/>
							</div>
						</div>
						<input type="submit" name="login" value="Log In" class="btn btn-primary w-100"/>
					</form>
					<p class="mt-3">Don't have an account yet? <a href="register.php"><i>Register!</i></a></p>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>
</html>