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
    if (isset($_REQUEST['first_name'])) {
        echo "<br>Request<br>";
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
</head>
<div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>

        <button type="submit">Save</button>
    </form>
</div>

<body>
    <!-- <h3>Hello World <?php  
    // echo $d['abc'] ?></h3>
</body>

</html>