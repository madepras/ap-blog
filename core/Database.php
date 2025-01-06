<?php
    $host = DB_HOST;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $database = DB_NAME;

    $conn = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    function Query($query) {
        global $conn;
        return mysqli_query($conn, $query);
    }

    function Fetch($result) {
        return mysqli_fetch_assoc($result);
    }

    function FetchAll($result) {
        $rows = [];
        while ($row = Fetch($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function NumRows($result) {
        return mysqli_num_rows($result);
    }
