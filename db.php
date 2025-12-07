<?php
	$server = "127.0.0.1";
	$user = "root";
	$password = "kali";
	$dbName = "first";

	// Первое подключение — без базы
	$link = mysqli_connect($server, $user, $password);

	if (!$link) {
		die("Error connect: " . mysqli_connect_error());
	}

	// Создаём базу
	$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
	if (!mysqli_query($link, $sql)) {
		echo "Error create DB: " . mysqli_error($link);
	}

	mysqli_close($link);

	// Подключаемся ко вновь созданной базе
	$link = mysqli_connect($server, $user, $password, $dbName);

	if (!$link) {
		die("Error connect DB: " . mysqli_connect_error());
	}

	// Создание таблицы users
	$sql = "CREATE TABLE IF NOT EXISTS users(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(15) NOT NULL,
		email VARCHAR(50) NOT NULL,
		pass VARCHAR(20) NOT NULL
	)";
	if (!mysqli_query($link, $sql)) {
		echo "Error create table users: " . mysqli_error($link);
	}

	// Создание таблицы posts
	$sql = "CREATE TABLE IF NOT EXISTS posts(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		title VARCHAR(20) NOT NULL,
		main_text VARCHAR(400) NOT NULL
	)";
	if (!mysqli_query($link, $sql)) {
		echo "Error create table posts: " . mysqli_error($link);
	}

	mysqli_close($link);
?>
