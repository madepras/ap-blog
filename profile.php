<?php
require_once 'functions/post.php';

if (!hasSession()) {
    redirect(LOGIN_ROUTE_NAME);
}

if (!isset($_SESSION['user'])) {
    redirect(LOGIN_ROUTE_NAME);
}

function getSearchKeyword()
{
    if (isset($_POST['search']))
        return htmlspecialchars($_POST['search']);

    return "";
}

$posts = getPostsWithKeywordAndUserId($_SESSION['user']['id_user'], getSearchKeyword());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
            <div class="search-bar">
                <form action="" method="post">

                    <input type="text" name="search" autofocus placeholder="masukan keyword.." autocomplete="off">
                    <button type="submit">Cari</button>

                </form>
            </div>
            <div class="nav-menu">
                <li><a href="homepage.php">Home</a></li>
                <li><a href=<?= ADD_POST_ROUTE_NAME ?>>Addpost</a></li>
            </div>
        </div>

    </header>


    <div class="container">
        <section class="section-main">
            <main class="main-content">
                <?php foreach ($posts as $post): ?>
                    <div class="content-item">
                        <img src="uploads/<?= $post['path'] ?>" alt="Image" class="content-image">
                        <div class="content-description">
                            <h3 class="content-title"><?= $post['title'] ?></h3>
                            <p class="content-text"><?= $post['description'] ?></p>
                            <p class="content-date">
                                <small><?= $post['upload_date'] ?></small>
                            </p>
                            <a href="<?= EDIT_POST_ROUTE_NAME ?>?id=<?= $post['id_post'] ?>" class="content-link">edit</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </main>
        </section>
    </div>

</body>

</html>