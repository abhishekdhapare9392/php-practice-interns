<?php
    echo "<h1>Hello, World!</h1>";

    // variable declaration
// $a = 10;
// $b = 10;
// $c = 10;
// $d = $a + $b;

// // echo $e;
// print("Testing rpint<br>");
// print_r("Testing print r<br>");
// var_dump($d);


// // die();

// // array
// $a = [ '12', '233', '2323'];
// $b = [];
// $c = [10, 20, 30];
// $d = array("abc" => 'testing');

// print_r($a);
// // operators
// /* 
//     && || 
//     < > == 
//     + - 
// */
// // conditions
// if ($a == $b) {
//     print ('true');
// }

// if($a == $b){
//     print ('false');
// } else {
//     print ('true');
// }

// if ($a == $b) {
//     print ('true');
// } elseif ($a == $c) {
//     print ('false');
// } else {
//     print ('true');
// }

// // turnary operators
// ($a = $b) ? 'true' : (($b = $c) ? 'true':'false');

// // loops
// for ($i = 0; $i < 10; $i++) {
//     print($i);
// }
// $a = [ '12', '233', '2323'];
// foreach ($a as $key => $value) {
//     print($key . " - " . $value . "<br>");
// }

// $i = 1;
// while($i < 6){
//     echo $i;
//     $i++;
// }

// $k = 0;
// do{
//     echo $k;
//     $k++;
// } while($k < 6);
// // functions
// $d = 0;
// function addition(){
//     return $a + $b;
// }

// $mystring = "Dhapare Solutions";
// // print ("<pre>");
// // print_r(explode(" ", $mystring));
// // print ("</pre>");

// $myarray = ["PHP", "is", "a", "very", "funny", "language"];
// // echo implode("||", $myarray);

// echo substr($mystring, 6, 5);

// $x = 24;

// function testing()
// {
//     echo $_SERVER['PHP_SELF'] . "<br>";
//     echo $_SERVER['SERVER_NAME'] . "<br>";
//     echo $_SERVER['HTTP_HOST'] . "<br>";
//     // echo $_SERVER["HTTP_REFERER"] . "<br>";
//     echo $_SERVER["HTTP_USER_AGENT"] . "<br>";
//     echo $_SERVER["SCRIPT_NAME"] . "<br>";
//     echo $_SERVER['SERVER_SOFTWARE'];



// //     echo $_REQUEST;
// //     echo $_POST;
// //     echo $_GET;
// }
// testing();

// if (isset($_GET["first_name"])) {
//     echo "<pre>";
//     print_r($_GET);
//     echo "</pre>";
//     echo $_GET['first_name'];
//     exit;
// }

// if(isset($_POST['first_name'])){
//     echo "<pre><br>This is post<br>";
//     print_r($_POST);
//     echo "</pre>";
//     echo $_POST['first_name'];
//     exit;
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "php-test";
    try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connect Successfully";
        // $sql = "SELECT id, first_name, last_name, email FROM users";
        // $stmt = $conn->prepare($sql);
        // $stmt->execute();

        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // // print_r($result);
        // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        //     echo $v;
        //   }
        // exit;

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("connection failed");
        }
        $sql = "INSERT INTO users (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
        if(mysqli_query($conn, $sql)){
            echo "New User added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // $sql = "SELECT * FROM users";
        // $result = mysqli_query($sql);
        
        // if (mysqli_num_rows($result) > 0) {
        //     // output data of each row
        //     while($row = mysqli_fetch_assoc($result)) {
        //       echo "id: " . $row["id"]. " <br> Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>" . " Email: " . $row["email"];
        //     }
        //   } else {
        //     echo "0 results";
        //   }
          
          mysqli_close($conn);


    } catch(PDOException $e) {
        echo "Connection Failed: ", $e->getMessage();
        exit;
    }
    if (isset($_REQUEST['first_name'])) {
        // echo "<br>Request<br>";
        if (!preg_match("/^[a-zA-z-' ]*$/", $_REQUEST["first_name"])) {
            echo "<span style='color:red'>Error: Enter a valid name!</span>";
        } else {
            print_r($_REQUEST['first_name']);
        }
    } else {
        echo "<span style='color:red'>Error: First name is required!</span>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<div class="container">
    <a href="post.php">Create Post!</a>
    <div class="flex flex-col gap-3">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="first_name">First Name</label><br>
            <input class="border border-gray-400 p-1" type="text" id="first_name" name="first_name"
                placeholder="First Name" required>
            <br>
            <label for="last_name">Last Name</label><br>
            <input class="border border-gray-400 p-1" type="text" id="last_name" name="last_name"
                placeholder="Last Name">
            <br>
            <label for="email">Email</label><br>
            <input class="border border-gray-400 p-1" type="email" id="email" name="email" placeholder="Email">
            <br>
            <br>
            <button type="submit" class="bg-blue-500 text-white p-2">Save</button>
        </form>
    </div>
</div>

<body>
    <!-- <h3>Hello World <?php  
    // echo $d['abc'] ?></h3>
</body>

</html>