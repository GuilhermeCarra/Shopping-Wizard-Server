<?php
session_start();
// echo $_SESSION['user'];

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
        <!--Div Form Edit Product-->
        <div id="update-product-nb" class="d-flex mx-auto w-50 p-3 mt-5 bg-white rounded">
      <div class="w-75 p-3">
        <h4 class="font-weight-bold mt-3">Edit Product</h4> <br>
        <div class="form-group" id="update-product-div">
          <label for="product">Product title</label>
          <input type="text" class="form-control border border-dark" id="update-title">
        </div>
        <div class="form-group" id="url-u-div">
          <label for="url">Image URL</label>
          <input type="url" class="form-control border border-dark" id="update-url">
        </div>
        <div class="form-group" id="size-u-div">
          <label for="size">Size</label>
          <select class="custom-select custom-select border border-dark">
            <option selected>Chose size</option>
            <option value="1">38</option>
            <option value="2">39</option>
            <option value="3">40</option>
          </select>
          </div>
        <div class="form-group" id="color-u-div">
          <label for="color">Color</label>
          <input type="text" class="form-control border border-dark" id="update-weight">
        </div>
        <div class="form-group" id="category-u-div">
          <div class="d-flex flex-row flex-wrap justify-content-between">
          </div>
        </div>
        <button type="submit" id="submit-u-product" class="btn btn-dark w-100 mt-1 mb-3">Update product</button>
      </div>
    </div>
    <!--Div Form Update Category-->
    <div id="update-category-nb" class="d-none mx-auto w-50 h-25 p-3 mt-5 bg-white rounded">
      <div class=" w-75 p-3">
        <h4 class="font-weight-bold mt-3">Update Category</h4> <br>
        <div class="form-group" id="update-category-div">
          <label for="category">Category title</label>
          <input type="text" class="form-control border border-dark" id="update-title-category">
        </div>
        <button type="submit" id="submit-u-category" class="btn btn-dark w-100 mt-3 mb-2">Create category</button>
      </div>
    </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>