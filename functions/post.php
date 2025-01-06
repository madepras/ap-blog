<?php

require_once 'core/Init.php';

function getPostById($id)
{
    $query = Query("SELECT * FROM postswithuser WHERE id_post = '$id'");
    return Fetch($query);
}

function getPostsWithKeyword($keyword = "")
{
    $query = Query("SELECT * FROM postswithuser WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%' OR username LIKE '%$keyword%'");
    return FetchAll($query);
}

function getPostsWithKeywordAndUserId($id, $keyword = "")
{
    $query = Query("SELECT * FROM postswithuser
                            where id_user = '$id'
                            AND title LIKE '%$keyword%'");

    return FetchAll($query);
}

function getPostsByUserId($id)
{
    $query = Query("SELECT * FROM postswithuser WHERE id_user = '$id'");
    return FetchAll($query);
}

function createPost($data)
{
    $path = uploadPicture();
    $title = htmlspecialchars($data['title']);
    $description = htmlspecialchars($data['description']);
    $date = date('Y-m-d H:i:s');
    $id_user = $_SESSION['user']['id_user'];

    $query = Query("INSERT INTO post (path, title, description, upload_date, id_user) VALUES ('$path', '$title', '$description', '$date', $id_user)");

    if (!$query) {
        setError('Error creating post!');
        redirect(MY_POST_ROUTE_NAME);
    }

    redirect(MY_POST_ROUTE_NAME);
}

function updatePost($data)
{
    $id = htmlspecialchars($data['id_post']);
    $title = htmlspecialchars($data['title']);
    $description = htmlspecialchars($data['description']);

    $query = Query("UPDATE post SET title = '$title', description = '$description' WHERE id_post = '$id'");

    if (!$query) {
        setError("Failed to update post");
        redirect(EDIT_POST_ROUTE_NAME . "?id=" . $id);
    }

    redirect(MY_POST_ROUTE_NAME);
}

function deletePost($id)
{
    $query = Query("DELETE FROM post WHERE id_post = '$id'");

    if (!$query) {
        setError("Failed to update post");
        redirect(EDIT_POST_ROUTE_NAME . "?id=" . $id);
    }

    redirect(MY_POST_ROUTE_NAME);
}

function uploadPicture()
{
    $picture = $_FILES['picture'];
    $picture_name = $picture['name'];
    $picture_tmp = $picture['tmp_name'];
    $picture_size = $picture['size'];
    $picture_error = $picture['error'];

    $picture_ext = explode('.', $picture_name);
    $picture_ext = strtolower(end($picture_ext));

    $allowed = ['jpg', 'jpeg', 'png'];

    if (!in_array($picture_ext, $allowed)) {
        setError('File type not allowed!');
        redirect(MY_POST_ROUTE_NAME);
    }

    if ($picture_error !== 0) {
        setError('Error uploading file!');
        redirect(MY_POST_ROUTE_NAME);
    }

    if ($picture_size > 1000000) {
        setError('File size too large!');
        redirect(MY_POST_ROUTE_NAME);
    }

    $picture_name_new = uniqid('', true) . '.' . $picture_ext;

    $picture_destination = 'uploads/' . $picture_name_new;

    if (!move_uploaded_file($picture_tmp, $picture_destination)) {
        setError('Error uploading file!');
        redirect(MY_POST_ROUTE_NAME);
    }

    return $picture_name_new;
}
