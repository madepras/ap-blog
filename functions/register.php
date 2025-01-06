<?php

require_once '../core/Init.php';

function isUsernameAlreadyExist($username)
{
    $query = Query("SELECT * FROM users WHERE username = '$username'");
    return NumRows($query) > 0;
}

if (isPostEmpty('username')) {
    setError('Username is required!');
    redirect(REGISTER_ROUTE_NAME);
}

if (isPostEmpty('password')) {
    setError('Password is required!');
    redirect(REGISTER_ROUTE_NAME);
}

if (isPostEmpty('confirm_password')) {
    setError('Confirm password is required!');
    redirect(REGISTER_ROUTE_NAME);
}

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$confirm_password = htmlspecialchars($_POST['confirm_password']);

if ($password !== $confirm_password) {
    setError('Password and confirm password do not match!');
    redirect(REGISTER_ROUTE_NAME);
}

if (isUsernameAlreadyExist($username)) {
    setError('Username already exists!');
    redirect(REGISTER_ROUTE_NAME);
}

$password = password_hash($password, PASSWORD_DEFAULT);

$query = Query("INSERT INTO users (username, password) VALUES ('$username', '$password')");

if (!$query) {
    setError('Register failed!');
    redirect(REGISTER_ROUTE_NAME);
}

redirect(LOGIN_ROUTE_NAME);
