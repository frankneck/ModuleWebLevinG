<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Levin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="hacker.jpg" alt="logo" class="me-2">
                <span class="text-light">History</span>
            </a>
            <?php 
                if(isset($_COOKIE["User"])):
            ?>
                <form action="/logout.php" method="post" class="d-flex">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            <?php
            endif;
            ?>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="story-container">
            <div class="story-text">
                <p>Text text text text text</p>
            </div>
            <img src="skull.gif" alt="hack1" class="hacker-img">
        </div>
        <div class="text-center mt-4"><button id="toggleButton" class="btn btn-primary">Open</button></div>
        <div class="mt-3 text-center"><img id="extraImage" style="display: none;" src="dog.png" alt="hack2"
                class="hacker-img"></div>
        <div class="mt-5">
            <h2 class="text-center mb-4">Add New Post</h2>
            <form action="profile.php" method="post" id="postform" class="d-flex flex-column gap-3"
                enctype="multipart/form-data">
                <div class="form-group">
                    <lable class="form-lable" for="postTitle">Post Title</lable><input type="text" name="postTitle" id="postTitle" placeholder="Enter post Title"
                        class="form-control hacker-input">
                </div>
                <div class="form-group">
                    <lable class="form-lable" for="postContent">Post Content</lable>
                    <textarea type="text"
                        name="postContent" id="postContent" rows="5" 
                        class="form-control hacker-input" class="form-control hacker-input" 
                        aria-placeholder="Enter post Content"
                        required>
                    </textarea>
                </div>
                <div class="form-group">
                    <lable class="form-lable" for="file">Upload file</lable><input type="file" id="file" name="file"
                        class="form-control hacker-input">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Save post</button>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
<?php
    if(!isset($_COOKIE["User"])){
        header("/login.php");
        exit();
    }
    require_once("db.php");
    $link = mysqli_connect("localhost","root","12345","first");

    if(isset($_POST["submit"]))
    {
        $title = $_POST["postTitle"];
        $main_text = $_POST["postContent"];
        
        if (!$title && !$main_text) {
            die("no data post");
        } 
        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

        if(!mysqli_query($link, $sql)) die ('error insert data post');
        
        if (!empty($_FILES['file']))
        {
            if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] > 1))
            {
                move_uploaded_file($_FILES["file"]["tmp_name"],"upload/". $_FILES["file"]["name"]);
                echo "Load in: " . "upload/". $_FILES["file"]["name"];
            } else {
                echo "upload failed";
            }
        }
    }

?>