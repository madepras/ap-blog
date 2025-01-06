<?php
require_once 'functions/post.php';

$posts = getPostsWithKeyword(getSearchKeyword());

function getSearchKeyword()
{
    if (isset($_POST['search']))
        return htmlspecialchars($_POST['search']);

    return "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
            <div class="logo"><a href="#"><span>AP</span>Blog</a></div>
            <div class="search-bar">
                <form action="" method="post">

                    <input type="text" name="search" autofocus placeholder="masukan keyword.." autocomplete="off">
                    <button type="submit">Cari</button>

                </form>
            </div>

            <div class="nav-list">
                <li><a href="profile.php">Profile</a></li>
                <li class="btn-logout" id="btn-logout"><a href="functions/logout.php" class="submit-btn">Logout</a></li>
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
                            <p class="content-author"><?= $post['username'] ?></p>
                            <p class="content-date">
                                <small><?= $post['upload_date'] ?></small>
                            </p>
                            <a href="<?= DETAIL_POST_ROUTE_NAME ?>?id=<?= $post['id_post'] ?>" class="content-link">read more</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </main>
            <aside class="aside-main" style="margin-top: 40px;">
                <div class="aside-categories">
                    <a href="#" class="aside-title">Category</a>
                    <a href="#" class="aside-item">science</a>
                    <a href="#" class="aside-item">art</a>
                    <a href="#" class="aside-item">food</a>
                    <h1 style="color: blue;">Coming soon!!</h1>
                </div>
            </aside>
        </section>
    </div>

</body>

<script>
    var logoutButton = document.getElementById("btn-logout");
    if (<?= !hasSession() ?>) {
        logoutButton.classList.add("hidden");
    }
</script>

</html>