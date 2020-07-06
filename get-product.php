<?php
    session_start();
    if(!isset($_SESSION['productId'])) header("Location: home-page.php");
    $catalogJSON = file_get_contents('json/catalog.json');
    $catalog = json_decode($catalogJSON, true);
    $productJSON = json_encode($catalog[$_SESSION['productId']]);
    if ($productJSON == "null") {
        echo "error";
    } else {
        echo $productJSON;
    }
?>