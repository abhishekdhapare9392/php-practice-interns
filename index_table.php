<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Centering the table */
    .table-container {
        width: 60%;
        margin: 50px auto;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        background-color: white;
        padding: 20px;
    }

    .fa-pen {
        color: #007bff;
        cursor: pointer;
        transition: 0.2s;
    }

    .fa-pen:hover {
        color: #0056b3;
        transform: scale(1.1);
    }

    .fa-trash {
        color: rgb(241, 76, 58);
        cursor: pointer;
        transition: 0.2s;
    }

    .fa-trash:hover {
        color: rgb(255, 139, 139);
        transform: scale(1.1);
    }

    #successMessage {
        display: none;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="fs-1 text-center mt-5">
            <h1>Registered Users</h1>
        </div>
        <span id="successMessage" class="text-danger message"></span>
        <div class="table-container">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>EMAIL</th>
                        <th>Edit Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "php-test";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_POST['id'])) {
                    // print_r($_POST);
                    $id = $_POST['id'];
                    $sql = "DELETE FROM users WHERE id = $id";
                    $result = $conn->query($sql);

                    if ($result) {
                        echo "<script>document.getElementById('successMessage').style.display = 'block';
                        document.getElementById('successMessage').innerHTML = 'User deleted successfully';
                        setTimeout(() => {document.getElementById('successMessage').style.display = 'none';}, 5000);</script>";
                    }
                    
                }

                $sql = "SELECT id, first_name, last_name, email FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['first_name']) . "</td>
                                <td>" . htmlspecialchars($row['last_name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>
                                    <a href='/edit.php?id=" . $row['id'] . "' class='edit-btn'>
                                        <i class='fa-solid fa-pen'></i>
                                    </a>
                                <form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit'  class='btn'>
                                        <i class='fa-solid fa-trash'></i>
                                    </button>
                                </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No users found</td></tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

        <div class="fs-4 text-center">
            <a href="/add.php" class="btn btn-primary">Add User</a>
        </div>
    </div>

    <!-- <script>
    // Adding event listener for all edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default redirect
            let userId = this.getAttribute('data-id'); // Get user ID
            if (confirm("Do you want to edit this user?")) {
                window.location.href = 'edit.php ?id=' + userId; // Redirect to edit page
            }
        });
    });
    </script> -->

</body>

</html>