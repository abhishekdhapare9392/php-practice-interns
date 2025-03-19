<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "php-test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, first_name, last_name, email FROM users";
    $result = $conn->query($sql);
    $users = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }

    // Set the content type to JSON
    // header('Content-Type: application/json');
    echo json_encode($users);
// print_r($result);
// exit();