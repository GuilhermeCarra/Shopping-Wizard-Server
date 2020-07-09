<?php
session_start();
if(isset($_SESSION['user'])){
// header("Location: admin-panel.php");
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>eCommerce</title>
      <link rel="icon" type="image/png" href="../assets/img/icons/favicon.png">
      <link rel="stylesheet" href="../style-admin.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="bg-light">
      <div id="inAdminPage" class="d-none"></div>
      <header class="d-flex flex-row justify-content-between p-4 bg-white">
        <a href="../index.php">
          <p class="font-weight-bold"><img src="../assets/img/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">Nice Shoes</p>
        </a>
        <button type="button" class="btn btn-light" id="login-admin">Log in</button>
        <button type="button" class="d-none btn btn-light" id="signout-admin">Sign Out</button>
      </header>
      <div class="container d-flex flex-row mw-100" id="container">
        <!--Div Form Log in Admin-->
        <form class="bg-white p-3 mx-auto mt-5 w-25 border rounded" method="post" action="admin-validate.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="login-mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="login-pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>

        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>
