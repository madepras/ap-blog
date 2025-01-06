<?php

function setError($error)
{
    $_SESSION['error'] = $error;
}

function redirect($page)
{
    header("Location: $page");
    exit();
}

function isPostEmpty($post)
{
    return !isset($_POST[$post]) || empty($_POST[$post]);
}

function isPasswordMatched()
{
    return $_POST['password'] === $_POST['confirm_password'];
}

function checkForSession()
{
    if (!session_id()) {
        redirect(LOGIN_ROUTE_NAME);
    }
}

function hasSession()
{
    return isset($_SESSION['user']);
}
