<?php
require_once 'core/Init.php';

if (hasSession()) {
    redirect(INDEX_ROUTE_NAME);
}

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylelogin.css">
</head>

<body>

    <div class="login-box">
        <div class="login-header">
            <header>Register</header>
        </div>
        <form action="functions/register.php" method="POST">
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username" name="username" autocomplete="off" requied>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="password" name="password" requied>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="confirm password" name="confirm_password" requied>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit">
                    <label for="submit">Login</label>
                </button>
            </div>
            <div class="register-link">
                <p>have an account?<a href="login.php">Login</a></p>
            </div>
        </form>

    </div>


</body>

</html>