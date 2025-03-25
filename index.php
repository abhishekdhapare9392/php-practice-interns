<?php

// $user = "root";

// Relaltions
// One to One
// user table - id, name, email
// posts table - id, user_id, title, body

$sql = "INSERT INTO posts (user_id, title, body) VALUES (1, 'My first post', 'This is my first post')";
$sql = "SELECT * FROM posts WHERE user_id = 1";

// One to Many
// user table - id, name, email
// posts table - id, user_id, title, body
$sql = "SELECT * FROM users JOIN posts ON users.id = posts.user_id";

// JOIN
// OUTER JOIN
// INNER JOIN
// LEFT JOIN
// RIGHT JOIN

// Many to Many

// user table - id, name, email
// posts table - id, title, body
// user_post_map_table - id, user_id, post_id



session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    // if (($_POST['username'] == $user) && ($_POST['password'] == "1234")) {
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
        header("Location: sessions.php");
    // } else {
    
    // }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <a href="sessions.php">Go to session page.</a> -->

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="">Username</label>
        <input type="text" name="username">
        <label for="">Password</label>
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>
</body>

</html>