<?php
session_start();
// echo $_SESSION['user'];
$adminJson = file_get_contents('../json/admins.json');
$admins = json_decode($adminJson, true);
$admin = $admins[$_GET['id']];

if(isset($_POST['btn-edit-user'])){
  $admins[$_GET['id']]["username"] = $_POST["edit-username"];
  $admins[$_GET['id']]["email"] = $_POST["edit-email"];
  $admins[$_GET['id']]["password"] = $_POST["edit-password"];
  $adminsUpdated = json_encode($admins);
  $adminsFinalJSON = file_put_contents('../json/admins.json', $adminsUpdated);
}


// var_dump($admins[$_GET['id']]);


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
        <p class="font-weight-bold"><img src="../assets/img/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">Nice Shoes</p>
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
            <div id="edit-manager" class="d-flex mx-auto w-50 h-25 p-3 mt-5 bg-white rounded">
        <div class=" w-75 p-3">
        <form method="post" action="edit-user.php?id=<?php echo $_GET['id'] ?>">
            <h4 class="font-weight-bold mt-3">Edit manager</h4> <br>
            <div class="form-group" id="edit-manager-div">
            <label for="name">Username</label>
            <input type="text" name="edit-username" value="<?php echo $admin['username']?>" class="form-control border border-dark" id="user-name-u">
            </div>
            <div class="form-group" id="email-manager-u-div">
            <label for="name">Email</label>
            <input type="email" name="edit-email" value="<?php echo $admin['email']?>" class="form-control border border-dark" id="user-email-u">
            </div>
            <div class="form-group" id="password-manager-u-div">
            <label for="name">Password</label>
            <input type="password" name="edit-password" value="<?php echo $admin['password']?>" class="form-control border border-dark" id="user-password-u">
            </div>
            <button type="submit" name="btn-edit-user" id="submit-upd-user" class="btn btn-dark w-100 mt-3 mb-2">Save</button>
        </form>
        </div>
        </div>
    </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>