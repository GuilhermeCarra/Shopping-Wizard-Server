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
      <header class="d-flex flex-row justify-content-between p-4 bg-white">
        <p class="font-weight-bold">LOGO</p>
        <a href="../Admin/admin-login.php"><button type="button" class="d-flex btn btn-light" id="signout-admin">Sign Out</button></a>
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
        <!--Div Table Update User-->
        <div class="w-50 text-center bg-white d-flex flex-column rounded" id="manager-admin">
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
                  <td><a href="../Admin/edit-user.php"><button type="button" class="btn btn-dark" id="edit-user">Edit</button></a>
                    <button type="button" class="btn btn-danger">X</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      <script src="../assets/js/script.js"></script>

    </body>
    </html>
