<?php
	session_start();
	
	//initialize variables
	$firstName = "";
	$lastName = "";
	$email = "";
	$gender = "";
	$errors = array();
	
	//connect to the database
	$db = mysqli_connect('localhost:3307', 'root', '', 'test');
	
	//REGISTER
	if (isset($_POST['register'])){
		$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($db, $_POST['confirmPassword']);
		
		//ensure that form field are filled properly
		if (empty($firstName)) {
			array_push($errors, "First Name is required");
		}
		if (empty($lastName)) {
			array_push($errors, "Last Name is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password && $confirm_password)) {
			array_push($errors, "Password is required");
		}
		if ($password != $confirm_password) {
			array_push($errors, "Passwords do not match");
		}
		
		//check if field are the same
		$sql_f = "SELECT * FROM users WHERE first_name='$firstName' AND last_name='$lastName'";
		$sql_e = "SELECT * FROM users WHERE email='$email'";

		$res_u = mysqli_query($db, $sql_f) or die(mysqli_error($db));
		$res_e = mysqli_query($db, $sql_e) or die(mysqli_error($db));
		
		if (mysqli_num_rows($res_u) > 0){
			array_push($errors, "Name is already taken");
		}
		if (mysqli_num_rows($res_e) > 0){
			array_push($errors, "Email is already taken");
		}
		
		//if there are no errors, save user to database
		if (count($errors) == 0){
			$password = md5($password);
			$sql = "INSERT INTO users (first_name, last_name, email, password) 
					VALUES ('$firstName', '$lastName', '$email', '$password')";
			mysqli_query($db, $sql);
			
			$_SESSION['status'] = "Registered Successfully";
			header('location: login.php');
		}
	}
	
	//LOG IN
	if (isset($_POST['login'])){
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		
		//ensure that form field are filled properly
		if (empty($email)){
			array_push($errors, "Email is required");
		}
		if (empty($password)){
			array_push($errors, "Password is required");
		}
		
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			
			$result = mysqli_query($db, $query);
			
			$row = mysqli_fetch_assoc($result);
			
			if (mysqli_num_rows($result) == 1){
				//log user in
				$_SESSION['email'] = $email;
				$_SESSION['id'] = $row['id'];
				header('location: index.php');
			}else{
				array_push($errors, "Invalid username/password combination");
			}
		}
	}

	//UPDATE PROFILE
	if (isset($_POST['update'])){
		$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$gender = mysqli_real_escape_string($db, $_POST['genders']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$usersId = $_SESSION['id'];
		
		mysqli_query($db, "UPDATE users SET first_name='$firstName', last_name='$lastName', 
						   email='$email', gender='$gender', dob='$dob' WHERE id='$usersId'");

		$_SESSION['updated'] = "*Profile updated";
	}
	
	//logout
	if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['email']);
		header('location: login.php');
	}
?>