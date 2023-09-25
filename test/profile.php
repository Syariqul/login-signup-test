<?php include('include/process.php');

	if (empty($_SESSION['email'])){
		header('location: login.php');
	}
	
	//retrieve list
	if (isset($_SESSION['id'])){
		$usersId = $_SESSION['id'];
		$results = mysqli_query($db, "SELECT first_name, last_name, email, dob, gender FROM users WHERE id=$usersId");
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
        <body class="bg-info-subtle">
            <?php include('include/navbar.php'); ?>

            <div class="container">
                <div class="text-center my-3">
                    <h2>Profile</h2>
                </div>
                <div class="card mx-auto" style="max-width: 700px">
                    <div class="card-body mt-3 mx-3">
                        <form action="profile.php" method="POST">
                            <?php $row = mysqli_fetch_array($results); ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label pe-0 fw-medium">First Name:</label>
                                <div class="col-sm-4 pb-3">
                                    <input type="text" name="firstName" class="form-control"
                                     value="<?php echo $row['first_name']; ?>"/>
                                </div>
                                <label class="col-sm-2 col-form-label pe-0 fw-medium">Last Name:</label>
                                <div class="col-sm-4 pb-3">
                                    <input type="text" name="lastName" class="form-control"
                                    value="<?php echo $row['last_name']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-nowrap pe-0 fw-medium">Date of Birth:</label>
                                <div class="col-sm-4 pb-3">
                                    <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>"/>
                                </div>
                                <label class="col-sm-2 col-form-label pe-0 fw-medium">Gender:</label>
                                <div class="col-sm-4 pb-3">
                                    <select class="custom-select form-control" name="genders">
                                        <option selected disabled value="" class="fw-light">Select Gender...</option>
                                        <option name="genders" value="Male"
                                         <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                        <option name="genders" value="Female"
                                         <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label pe-0 fw-medium">Email:</label>
                                <div class="col-sm-10 pb-3">
                                    <input type="email" name="email" class="form-control"
                                     value="<?php echo $row['email']; ?>"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <?php
                                    if(isset($_SESSION['updated'])){
                                ?>
                                    <div class="alert alert-success py-1 w-50 mx-auto m-0 p-0 align-self-center text-center" role="alert">
                                        <?php echo $_SESSION['updated']; ?>
                                    </div>
                                <?php
                                    unset($_SESSION['updated']);
                                }
                                ?>
                                <input type="submit" name="update" value="Update" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>
</html>