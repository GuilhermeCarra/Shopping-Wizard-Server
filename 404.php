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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <nav class="navbar navbar-light bg-light sticky-top">
            <a class="navbar-brand" href="#">
                <img src="assets/img/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                Nice Shoes
            </a>
        </nav>
        <div class="shoes">
            <ul id="scene">
                <li class="layer" data-depth="0.1"><img src="assets/img/404/0.png"></li>
                <li class="layer" data-depth="0.1"><img src="assets/img/404/1.png"></li>
                <li class="layer" data-depth="0.2"><img src="assets/img/404/2.png"></li>
                <li class="layer" data-depth="0.4"><img src="assets/img/404/3.png"></li>
                <li class="layer w-100 h-100 d-flex flex-column justify-content-center align-items-center" style="border: 1px solid red;" data-depth="0">
                    <span class="title-404">404</span>
                    <span class="text-404">Oh no! Feeling like Cinderella? </span>
                </li>
                <li class="layer" data-depth="0.6"><img src="assets/img/404/4.png"></li>
                <li class="layer" data-depth="0.8"><img src="assets/img/404/5.png"></li>
                <li class="layer" data-depth="1.2"><img src="assets/img/404/6.png"></li>
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
        <script>
            var scene = document.getElementById('scene');
            var parallaxInstance = new Parallax(scene);
        </script>
    </body>
</html>