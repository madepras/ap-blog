<?php
require_once 'functions/post.php';

if (!hasSession()) {
    redirect(LOGIN_ROUTE_NAME);
}

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}

if (isset($_POST['submit'])) {
    createPost($_POST);
    unset($_POST['submit']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addpost</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="homepage.php"><span>AP</span>Blog</a></div>
            <div class="nav-menu">
                <li><a href="homepage.php">home</a></li>
                <li><a href="profile.php">Back</a></li>
            </div>
        </div>

    </header>

    <form action="" method="post" enctype="multipart/form-data" class="form-container">
        <ul class="form-list">
            <li class="form-item">
                <input type="file" name="picture" class="form-input-file" requied>
            </li>
            <li class="form-item">
                <input type="text" name="title" placeholder="Title..." class="form-input-text" requied>
            </li>
            <li class="form-item">
                <textarea name="description" placeholder="Description..." class="form-textarea"></textarea>
            </li>
            <li class="form-item">
                <button type="submit" name="submit" class="form-button">Kirim</button>
            </li>
        </ul>
    </form>


</body>

</html>