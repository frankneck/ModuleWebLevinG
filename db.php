<?php
	$server = "localhost";
	$user = "root";
	$password = "kali";
	$dbName = "first";

	// 1. Подключение к MySQL без выбора базы
	$link = mysqli_connect($server, $user, $password);

	if (!$link) {
		die("Error connect: " . mysqli_connect_error());
	}

	// 2. Создаём базу, если её нет
	$sql = "CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
	if (!mysqli_query($link, $sql)) {
		die("Error create DB: " . mysqli_error($link));
	}

	// Закрываем соединение
	mysqli_close($link);

	// 3. Подключаемся к базе
	$link = mysqli_connect($server, $user, $password, $dbName);

	if (!$link) {
		die("Error connect DB: " . mysqli_connect_error());
	}

	// 4. Создаём таблицу users
	$sql = "CREATE TABLE IF NOT EXISTS users(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		pass VARCHAR(255) NOT NULL
	)";
	if (!mysqli_query($link, $sql)) {
		die("Error create table users: " . mysqli_error($link));
	}

	// 5. Создаём таблицу posts
	$sql = "CREATE TABLE IF NOT EXISTS posts(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		title VARCHAR(100) NOT NULL,
		main_text TEXT NOT NULL
	)";
	if (!mysqli_query($link, $sql)) {
		die("Error create table posts: " . mysqli_error($link));
	}
?>
