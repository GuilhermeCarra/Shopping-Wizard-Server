<?php
session_start();
echo $_SESSION['user'];
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>eCommerce</title>
      <link rel="stylesheet" href="style-admin.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="bg-light">
      <div id="inAdminPage" class="d-none"></div>
      <header class="d-flex flex-row justify-content-between p-4 bg-white">
        <p class="font-weight-bold">LOGO</p>
        <a href="../Admin/admin-login.php"><button type="button" class="d-flex btn btn-light" id="signout-admin">Sign Out</button></a>
      </header>
      <div class="container d-flex flex-row mw-100" id="container">
        <!--Div Navbar Vertical-->
        <div class="d-flex" id="navbar-admin">
          <nav class="nav flex-column m-0 pl-4 pr-4 pt-5 pb-5">
            <a class="nav-link  disabled pb-2" href="#">PRODUCTS</a>
            <a class="nav-link active text-dark pb-2" id="product-nb" href="#">Update Product</a>
            <a class="nav-link active text-dark pb-4" id="categories-nb" href="#">Add Product</a>
            <a class="nav-link disabled pb-2" href="#">USERS</a>
            <a class="nav-link active text-dark pb-2" id="user-admin" href="#">Update User</a>
            <a class="nav-link active text-dark pb-2" id="create-user" href="#">Add User</a>
          </nav>
        </div>
        <!--Div Table Update Product-->
        <div class="w-50 text-center bg-white d-none flex-column rounded" id="product-admin">
          <h4 class="font-weight-bold mt-3 d-flex justify-content-start p-4">Update Product</h4>
          <input class="form-control p-1 w-75 ml-4 shadow-none search-admin" type="search" placeholder="Search" aria-label="Search" id="search-product-table">
          <div class="table-div table-responsive d-flex p-4">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Size</th>
                  <th scope="col">Color</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody id="table-products">
                <tr>
                  <th scope="row">00001</th>
                  <td>Product name</td>
                  <td>30</td>
                  <td>15</td>
                  <td><button type="button" class="btn btn-dark" id="edit-product">Edit</button>
                    <button type="button" class="btn btn-danger">X</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--Div Form Add Product-->
        <div id="new-product" class="d-none mx-auto w-50 p-3 mt-5 bg-white rounded">
          <div class="w-75 p-3">
          <h4 class="font-weight-bold mt-3">New Product</h4> <br>
          <div class="form-group" id="new-product-div">
            <label for="product">Product title</label>
            <input type="text" class="form-control border border-dark" id="product-title">
          </div>
          <div class="form-group" id="url-div">
            <label for="url">Image URL</label>
            <input type="url" class="form-control border border-dark" id="product-url">
          </div>
          <div class="form-group" id="size-div">
            <label for="size">Size</label>
            <input type="number" class="form-control border border-dark" id="product-size">
          </div>
          <div class="form-group" id="color-div">
            <label for="color">Color</label>
            <input type="text" class="form-control border border-dark" id="product-color">
          </div>
          <button type="submit" id="submit-n-product" class="btn btn-dark w-100 mt-1 mb-3">Create product</button>
        </div>
        </div>
        <!--Div Table Update User-->
        <div class="w-50 text-center bg-white d-none rounded" id="manager-admin">
          <h4 class="font-weight-bold mt-3 d-flex justify-content-start p-4">Managers</h4>
          <input class="form-control p-1 w-75 ml-4 shadow-none search-admin" type="search" placeholder="Search" aria-label="Search" id="search-user-table">
          <div class="table-div table-responsive d-flex p-4">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Full name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Edit</th>
                </tr>
              </thead>
              <tbody id="user-table">
                <tr>
                  <th scope="row">00001</th>
                  <td>Anna Mark</td>
                  <td>anna@gmail.com</td>
                  <td><button type="button" class="btn btn-dark" id="edit-user">Edit</button>
                    <button type="button" class="btn btn-danger">X</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--Div Form Create User-->
          <div id="new-manager" class="d-none mx-auto w-50 h-25 p-3 mt-5 bg-white rounded">
            <div class=" w-75 p-3">
              <h4 class="font-weight-bold mt-3">New manager</h4> <br>
              <div class="form-group" id="new-manager-div">
                <label for="name">Full name</label>
                <input type="text" class="form-control border border-dark" id="user-name">
              </div>
              <div class="form-group" id="email-manager-div">
                <label for="name">Email</label>
                <input type="email" class="form-control border border-dark" id="user-email">
              </div>
              <div class="form-group" id="password-manager-div">
                <label for="name">Password</label>
                <input type="password" class="form-control border border-dark" id="user-password">
              </div>
                <button type="submit" id="submit-n-user" class="btn btn-dark w-100 mt-3 mb-2">Create user</button>
            </div>
          </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script src="/assets/js/main.js"></script>
    </body>
    </html>

