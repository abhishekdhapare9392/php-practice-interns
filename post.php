<?php

if (isset($_REQUEST['first_name'])) {
    echo 'Came from index: '. $_REQUEST['first_name'] .'';
} else {
    echo 'not authorized!';
}


// sleep(5);
// header('Location: index.php');
exit();