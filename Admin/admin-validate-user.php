<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $userName = $_POST['user-name'];
    if (empty($userName)) {
        echo "Name is empty";
    } else {
        echo $userName;
    }
}


?>

