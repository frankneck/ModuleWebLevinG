<?php 
    $link = mysqli_connect("localhost","root","12345","first");

    if (!isset($_GET["id"])) {
        die("Error: no id provided");
    }

    $id = $_GET["id"]; 
    $sql = "SELECT * FROM posts WHERE id = $id";

    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("SQL error: " . mysqli_error($link));
    }

    $row = mysqli_fetch_array($result);

    if (!$row) {
        die("Post not found");
    }

    // ВЫТАСКИВАЕМ ДАННЫЕ!
    $title = $row['title'];
    $main_text = $row['main_text'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Levin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="row">
			<div class="col12 text-center">
				<?php 
					echo "<h1> $title </h1>";
					echo "<p> $main_text </p>";
				?>
            </div>
		</div>
	</div>
</body>
</html>