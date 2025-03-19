<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-card {
            width: 450px;
            max-width: 100%;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .message {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container centered-div">
        <div class="login-card">
            <h2 class="mb-4">User Login</h2>

            <span id="successMessage" class="text-success message">New User added successfully</span>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Last Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>

            <div class="mt-3">
                <a href="/" class="fs-5">View Users</a>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            let successMessage = document.getElementById("successMessage");
            if (successMessage && successMessage.style.display === "block") {
                successMessage.style.display = "none";
            }
        }, 5000);
    </script>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "php-test";

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email =$_POST['email'];
    if (empty($first_name) || !preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
        die("<div class='text-danger text-center'>Error: Enter a valid first name!</div>");
    }
    if (!empty($last_name) && !preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
        die("<div class='text-danger text-center'>Error: Enter a valid last name!</div>");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<div class='text-danger text-center'>Error: Enter a valid email!</div>");
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $first_name, $last_name, $email);

    if ($stmt->execute()) {
        echo "<script>
            document.getElementById('successMessage').style.display = 'block';
            setTimeout(() => { document.getElementById('successMessage').style.display = 'none'; }, 5000);
        </script>";
    } else {
        echo "<div class='text-danger text-center'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>