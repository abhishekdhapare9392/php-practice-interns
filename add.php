<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "php-test";

    // print_r($_POST);
    // exit;
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email =$_POST['email'];
    if (empty($first_name) || !preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
        die("Error: Enter a valid first name!");
    }
    if (!empty($last_name) && !preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
        die("Error: Enter a valid last name!");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Enter a valid email!");
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $first_name, $last_name, $email);

    if ($stmt->execute()) {
        // echo "<script>
        //     document.getElementById('successMessage').style.display = 'block';
        //     setTimeout(() => { document.getElementById('successMessage').style.display = 'none'; }, 5000);
        // </script>";
        $stmt->close();
        $conn->close();
        echo json_encode(array('status' => 'success', 'message' => 'New User added successfully'));
    } else {
        $stmt->close();
        $conn->close();
        echo json_encode(array('status' => 'error', 'message' => 'Error: ' . $stmt->error));
        // echo "<div class='text-danger text-center'>Error: " . $stmt->error . "</div>";
    }
}
?>