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
				<h1 class="mb-4">Login in!</h1>
				<?php if(!isset($_COOKIE['User'])){?>
				<div class="d-flex justify-content-center gap-3">
					<a href="/registration.php" class="btn btn-primary">Registraion</a>
					<a href="/login.php" class="btn btn-primary">Login</a>
				</div>
				<?php } else {
					$link = mysqli_connect('localhost','root','12345','first');
					$sql = 'SELECT * FROM posts';
					$result = mysqli_query($link,$sql);
					if (mysqli_num_rows($result)> 0){
						while ($posts = mysqli_fetch_array($result)) {
							echo'<a href=/posts.php?id='.$posts['id'].'>'.$posts['title'].'</a><br>';
						}
					} else {
						echo 'No posts';
					}
				}?>
			</div>
		</div>
	</div>
</body>
</html>
