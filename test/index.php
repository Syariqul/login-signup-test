<?php include('include/process.php');

	if (empty($_SESSION['email'])){
		header('location: login.php');
	}
	
	//fetch the record	
	$results = mysqli_query($db, "SELECT first_name, last_name, email FROM users ORDER BY id");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Users</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>
	<body class="bg-info-subtle">
		<?php include('include/navbar.php'); ?>

		<div class="container">
				<?php 
					$row = mysqli_fetch_array($results);
					echo "Welcome, " . $row['first_name'] . " " . $row['last_name'] . "!"; 
				?>
			<div class="my-3">
				<h2 class="text-center">List of Registered Users</h2>
			</div>
			<table class="table table-striped text-center mt-4 bg-white">
				<thead>
					<tr class="border border-dark">
						<th>No.</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 1; while ($row = mysqli_fetch_array($results)) { ?>
						<tr class="border border-dark border-opacity-75">
							<td class="numbers"><?php echo $i; ?></td>
							<td class="list"><?php echo $row['first_name']; ?></td>
							<td class="list"><?php echo $row['last_name']; ?></td>
							<td class="list"><?php echo $row['email']; ?></td>
						</tr>
					<?php $i++; } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>