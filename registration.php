<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Registration by Levin Grigory</h1>

                <form action="" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="login" placeholder="login" class="form-control"> 
                    <input type="email" name="email" placeholder="email" class="form-control"> 
                    <input type="password" name="password" placeholder="password" class="form-control">
                    <button class="btn btn-primary" type="submit" name="submit">Registration</button>

                    <p class="mt-3">Already have an account? <a href="/login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once('db.php');

	if (isset($_COOKIE['User'])) {
		header('Location: /profile.php');
		exit;
	}

	$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

	if (isset($_POST['submit'])) {
		$login = $_POST['login'];
		$email = $_POST['email'];
		$pass = $_POST['password'];

		if (!$login || !$pass || !$email) {
			die('Input all parameters');
		}

		$sql = "INSERT INTO users (username, email, pass) VALUES ('$login', '$email', '$pass')";

		if (!mysqli_query($link, $sql)) {
			echo "Error insert users";
		} else {
			header("Location: /login.php");
			exit;
		}
	}
?>
