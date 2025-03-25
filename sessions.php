<?php 

session_start();

// echo 'session id: ' . session_id() . '<br>';
echo 'username: ' . $_SESSION['user'] . '<br>';
echo 'password: ' . $_SESSION['pass'] . '<br>';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>

<body>
    <h1>This is the session of <?php echo $_SESSION['user']; ?></h1>
</body>

</html>