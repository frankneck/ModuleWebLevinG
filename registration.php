<!DOCTYPE html!>
<html lang="en">
<head>
	<meta charset="UTF=8">
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Levin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="row">
			<div class="col12 text-center">
				<h1 class="mb-4">Registraion by Levin Grigory</h1>
                <form action="/registration.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" placeholder="login" class="form-contol-hacker-input"> 
                    <input type="email" name="email" placeholder="email" class="form-contol-hacker-input"> 
                    <input type="password" name="password" placeholder="password" class="form-contol-hacker-input">
                    <button class="btn btn-primary" type="submit" name="submit">Registraion</button>
                    <p class="mt-3">Already have an account?<a href="/login.php">Login</a></p>
                </form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	require_once('db.php');

	if (isset($_COOKIE['User'])){
		header('Location: /profile.php')
		exit;
	}

	$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

	if (isset($_POST['submit'])){
		$login = $_POST['login'];
		$email = $_POST['email']
		$pass = $_POST['password']

		if (!$login || !$pass || !$email)
		{
			die('input all parameters');
		}

		$sql = "INSERT INTO users(username, email, pass) VALUES ('$login','$email', '$password')";

		if (!mysqli_query($link, $sql)) {
			echo "Error insert users";
		} else {
			header("Location /login.php");
			exit;
		}
	}
?>