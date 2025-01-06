<?php
require_once 'functions/post.php';

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}

if (!isset($_GET['id'])) {
    echo "<script>alert('No id post specified!');</script>";
    redirect(INDEX_ROUTE_NAME);
}

$post = getPostById($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
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
                <li><a href=<?= INDEX_ROUTE_NAME ?>>Back</a></li>
            </div>
        </div>

    </header>


    <div class="container">
        <section class="section-main">
            <main class="main-content">
                <div class="content-item">
                    <img src="uploads/<?= $post['path'] ?>" alt="Image" class="content-image-edit">
                    <div class="content-description">
                        <h3 class="content-title-edit"><?= $post['title'] ?></h3>
                        <p class="content-text"><?= $post['description'] ?></p>
                        <p><?= $post['username'] ?></p>
                        <p class="content-date">
                            <small><?= $post['upload_date'] ?></small>
                        </p>
                    </div>
                </div>
            </main>
        </section>
    </div>

</body>

</html>