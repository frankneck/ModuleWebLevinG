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
	// Включаем отображение ошибок — только для разработки
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// Подключаем базу
	require_once('db.php');

	// Если пользователь уже авторизован
	if (isset($_COOKIE['User'])) {
		header('Location: /profile.php');
		exit;
	}

	// Обработка формы
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$login = trim($_POST['login']);
		$email = trim($_POST['email']);
		$pass  = trim($_POST['password']);

		if (!$login || !$email || !$pass) {
			die("Input all parameters");
		}

		// Подготовленный запрос — безопасно
		$stmt = $link->prepare("INSERT INTO users (username, email, pass) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $login, $email, $pass);

		if (!$stmt->execute()) {
			die("Error inserting user: " . $stmt->error);
		} else {
			header("Location: /login.php");
			exit;
		}
	}
?>