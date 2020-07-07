<?php
session_start();


?>


<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>eCommerce</title>
      <link rel="stylesheet" href="..\style-admin.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="bg-light">
      <div id="inAdminPage" class="d-none"></div>
      <header class="d-flex align-content-center flex-row justify-content-between p-4 bg-white">
        <p class="font-weight-bold">LOGO</p>
        <div class="d-flex flex-row">
        <?php
        echo "<p class='pt-2 pr-2'>" . $_SESSION['user'] . "</p>";
        ?>
        <a href="../Admin/admin-login.php"><button type="button" class="d-flex btn btn-light" id="signout-admin">Sign Out</button></a>
        </div>
      </header>
      <div class="container d-flex flex-row mw-100" id="container">
        <!--Div Navbar Vertical-->
        <div class="d-flex" id="navbar-admin">
          <nav class="nav flex-column m-0 pl-4 pr-4 pt-5 pb-5">
            <a class="nav-link  disabled pb-2" href="#">PRODUCTS</a>
            <a class="nav-link active text-dark pb-2" id="product-nb" href="../Admin/admin-product-update.php">Update Product</a>
            <a class="nav-link active text-dark pb-4" id="categories-nb" href="../Admin/admin-product-create.php">Add Product</a>
            <a class="nav-link disabled pb-2" href="#">USERS</a>
            <a class="nav-link active text-dark pb-2" id="user-admin" href="../Admin/admin-update.php">Update User</a>
            <a class="nav-link active text-dark pb-2" id="create-user" href="../Admin/admin-create.php">Add User</a>
          </nav>
        </div>
        <!--Div Form Create User-->
          <div id="new-manager" class="d-flex mx-auto w-50 h-25 p-3 mt-5 bg-white rounded">
            <div class=" w-75 p-3">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="w-100">
              <h4 class="font-weight-bold mt-3">New manager</h4> <br>
              <div class="form-group" id="new-manager-div">
                <label for="name">Full name</label>
                <input type="text" name="name-user" class="form-control border border-dark" id="user-name">
              </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $userName = $_POST['name-user'];

                  if (empty($userName)) {
                      echo "<p>Field is empty <p>";
                  } else {
                  }
                }
                ?>
              <div class="form-group" id="email-manager-div">
                <label for="email">Email</label>
                <input type="email" name="email-user" class="form-control border border-dark" id="user-email">
              </div>
              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $userEmail = $_POST['email-user'];

                  if (empty($userEmail)) {
                      echo "<p>Field is empty <p>";
                  } else {
                  }
                }
                ?>
              <div class="form-group" id="password-manager-div">
                <label for="password">Password</label>
                <input type="password" name="password-user" class="form-control border border-dark" id="user-password">
              </div>
              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $userPassword = $_POST['password-user'];

                  if (empty($userPassword)) {
                      echo "<p>Field is empty <p>";
                  } else {
                  }
                }
                ?>
                <button type="submit" id="submit-n-user" class="btn btn-dark w-100 mt-3 mb-2">Create user</button>
            </div>
          </div>
          </form>
        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>
