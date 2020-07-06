<?php
    // if (!isset($_GET["productId"])) header("Location: index.php");
    session_start();
    // $_SESSION["productId"] = $_GET["productId"];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page not found</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="shoes">
            <ul id="scene">
                <li class="layer" data-depth="0.1"><img src="assets/img/404/0.png"></li>
                <li class="layer" data-depth="0.1"><img src="assets/img/404/1.png"></li>
                <li class="layer" data-depth="0.2"><img src="assets/img/404/2.png"></li>
                <li class="layer" data-depth="0.4"><img src="assets/img/404/3.png"></li>
                <li class="layer" data-depth="0.6"><img src="assets/img/404/4.png"></li>
                <li class="layer" data-depth="0.8"><img src="assets/img/404/5.png"></li>
                <li class="layer" data-depth="1.2"><img src="assets/img/404/6.png"></li>
            </ul>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
        <script>
            var scene = document.getElementById('scene');
            var parallaxInstance = new Parallax(scene);
        </script>
    </body>
</html>