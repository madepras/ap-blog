<?php

require_once '../core/Init.php';

if (isPostEmpty('username')) {
    setError('Username is required!');
    redirect("../" . LOGIN_ROUTE_NAME);
}

if (isPostEmpty('password')) {
    setError('Password is required!');
    redirect("../" . LOGIN_ROUTE_NAME);
}

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

// Find user by username
$query = Query("SELECT * FROM users WHERE username = '$username'");

// Check if user exists
if (NumRows($query) == 0) {
    setError('User not found!');
    redirect("../" . LOGIN_ROUTE_NAME);
}

$user = Fetch($query);

// Verify password
if (!password_verify($password, $user['password'])) {
    setError('Password is incorrect!');
    redirect("../" . LOGIN_ROUTE_NAME);
}

// Set session
$_SESSION['user'] = $user;

redirect("../" . INDEX_ROUTE_NAME);
