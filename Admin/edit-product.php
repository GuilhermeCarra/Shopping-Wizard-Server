<?php
session_start();
// echo $_SESSION['user'];
$catalogJSON = file_get_contents('../json/catalog.json');
$catalog = json_decode($catalogJSON, true);
$product = $catalog[$_GET['id']];

if(isset($_POST['btn-edit-product'])){
  $catalog[$_GET['id']]["name"] = $_POST["product-name"];
  $catalog[$_GET['id']]["color"][0] = $_POST["product-color"];
  $catalog[$_GET['id']]["color"][1] = $_POST["product-color2"];
  $catalog[$_GET['id']]["color"][2] = $_POST["product-color3"];
  $sizes =  new stdClass();
  $sizes->{$_POST["size1"]} = $_POST["price1"];
  $sizes->{$_POST["size2"]} = $_POST["price2"];
  $sizes->{$_POST["size3"]} = $_POST["price3"];
  $catalog[$_GET['id']]["size"] = $sizes;
  $catalogUpdated = json_encode($catalog);
  file_put_contents('../json/catalog.json', $catalogUpdated);
  header("Location: admin-product-update.php");
}
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
        <a href="../index.php">
          <p class="font-weight-bold"><img src="../assets/img/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">Nice Shoes</p>
        </a>
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
      <form method="post" action="edit-product.php?id=<?php echo $_GET['id'] ?>" class="w-100">
              <h4 class="font-weight-bold mt-3">Edit Product</h4> <br>
              <div class="form-group" id="new-product-div">
                <label for="product">Product title</label>
                <input value="<?php echo $product['name'] ?>" type="text" name="product-name" class="form-control border border-dark" id="product-title"> 
              </div>
              <div class="form-group" id="size-div">
              <label for="product">Shoe's Size 1</label>
                <div class="row">
                  <div class="col">
                    <input value="<?php echo array_keys($product['size'])[0] ?>" type="number" name="size1" id="size1" class="form-control border border-dark" placeholder="Size 1">
                  </div>
                  <div class="col">
                    <input value="<?php echo $product['size'][array_keys($product['size'])[0]] ?>" type="number" step=0.01 name="price1" id="color1" class="form-control border border-dark" placeholder="Price 1"> <br>
                  </div>
                </div>
                <label for="product">Shoe's Size 2</label>
                <div class="row">
                  <div class="col">
                    <input value="<?php echo array_keys($product['size'])[1] ?>" type="number" name="size2" id="size2" class="form-control border border-dark" placeholder="Size 2">
                  </div>
                  <div class="col">
                    <input value="<?php echo $product['size'][array_keys($product['size'])[1]] ?>" type="number" step=0.01  name="price2" id="color2" class="form-control border border-dark" placeholder="Price 2"> <br>
                  </div>
                </div>
                <label for="product">Shoe's Size 3</label>
                <div class="row">
                  <div class="col">
                    <input value="<?php echo array_keys($product['size'])[2] ?>" type="number"  name="size3" id="size3" class="form-control border border-dark" placeholder="Size 3">
                  </div>
                  <div class="col">
                    <input value="<?php echo $product['size'][array_keys($product['size'])[2]] ?>" type="number" step=0.01  name="price3" id="color3" class="form-control border border-dark" placeholder="Price 3">
                  </div>
                </div>
              </div>
              <div class="form-group" id="color-div">
                <label for="product-color">Color 1:</label>
                <input value="<?php echo $product['color'][0] ?>" type="text" name="product-color" class="form-control border border-dark" id="product-color"> <br>
                <label for="product-color2">Color 2:</label>
                <input value="<?php echo $product['color'][1] ?>" type="text" name="product-color2" class="form-control border border-dark" id="product-color2"> <br>
                <label for="product-color3">Color 3:</label>
                <input value="<?php echo $product['color'][2] ?>" type="text" name="product-color3" class="form-control border border-dark" id="product-color3">
              </div>
              <button type="submit" name="btn-edit-product" class="btn btn-dark w-100 mt-1 mb-3">Edit product</button>
            </form>
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