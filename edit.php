<?php
require_once 'functions/post.php';

if (!hasSession()) {
    redirect(LOGIN_ROUTE_NAME);
}

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}

if (!isset($_GET['id'])) {
    echo "<script>alert('No id post specified!');</script>";
    redirect(MY_POST_ROUTE_NAME);
}

$post = getPostById($_GET['id']);

if (isset($_POST['submit'])) {
    $arguments = [
        'id_post' => $post['id_post'],
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];

    updatePost($arguments);
}

if (isset($_POST['delete'])) {
    deletePost($post['id_post']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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


    <div class="container">
        <section class="section-main">
            <main class="main-content">
                <div class="content-item">
                    <img src="uploads/<?= $post['path'] ?>" alt="Image" class="content-image-edit">
                    <form action="" method="post">

                        <div class="content-description">
                            <ul class="form-list">
                                <li class="form-item">
                                    <input type="text" name="title" placeholder="Title..." value="<?= $post['title'] ?>" class="form-input-text" requied>
                                </li>
                                <li class="form-item">
                                    <textarea name="description" placeholder="Description..." class=" form-textarea"><?= $post['description'] ?></textarea>
                                </li>
                            </ul>
                            <input type="submit" value="Confirm Edit" class="content-link" name="submit">
                    </form>
                    <form action="" method="post">
                        <input type="submit" value="Delete" name="delete" class="content-link">
                    </form>
                </div>
    </div>
    </main>
    </section>
    </div>

</body>

</html>