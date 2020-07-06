<?php
    session_start();
    // Verifies if was received a productId variable
    if(!isset($_SESSION['productId'])) header("Location: home-page.php");

    // Gets the catalog.json
    $catalogJSON = file_get_contents('json/catalog.json');

    // Parses the catalog.json
    $catalog = json_decode($catalogJSON, true);

    // Searches for the product on catalog and stringify the response
    $productJSON =  $catalog[$_SESSION['productId']];
    $productJSON = json_encode($productJSON);

    // Checks if the products exists and send the product
    if ($productJSON == "null") {
        echo "error";
    } else {
        echo "[".$_SESSION['productId']."," .$productJSON . "]";
    }
?>