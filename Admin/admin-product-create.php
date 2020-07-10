<?php
session_start();

$errorProductName = '';
$errorColor = '';
$errorSize = '';
$formOk = true;

if(isset($_POST['submit-product'])){
  if(empty($_POST['product-name'])){
    $errorProductName = "<p class='error_form'> Field is empty </p>";
    $formOk = false;
  }
  if(empty($_POST['product-color']) || empty($_POST['product-color2']) || empty($_POST['product-color3'])) {
    $errorColor = "<p class='error_form'> Fill all colors fields </p>";
    $formOk = false;
  }
  if(empty($_POST['size1']) || empty($_POST['color1']) ||
      empty($_POST['size2']) || empty($_POST['color2']) ||
      empty($_POST['size3']) || empty($_POST['color3'])
    ){
    $errorSize = "<p class='error_form'>Fill all shoe's sizes and prices</p>";
    $formOk = false;
  }
  if(file_exists('../json/catalog.json') && $formOk) {
    $currentDataProduct = file_get_contents('../json/catalog.json');
    $dataProduct = substr($currentDataProduct, 0, -1);
    $objectProduct = new stdClass();
    $size = new stdClass();
    $size->{$_POST['size1']} = $_POST['color1'];
    $size->{$_POST['size2']} = $_POST['color2'];
    $size->{$_POST['size3']} = $_POST['color3'];
    $objectProduct->name = $_POST['product-name'];
    $objectProduct->size = $size;
    $objectProduct->color = array($_POST['product-color'],$_POST['product-color2'],$_POST['product-color3']);

    // Getting last ID, sum 1, save the ID to the product.
    $lastId = json_decode($currentDataProduct, true);
    $idOrigin = '"last_id": ' . $lastId['last_id'];
    $idNew = '"last_id": ' . ($lastId['last_id']+1);
    $dataProduct = str_replace($idOrigin , $idNew , $dataProduct);

    $lastId = $lastId['last_id']+1;

    $finalProduct = $dataProduct . ',' . '"' . $lastId. '":' . json_encode($objectProduct) . "}";

    file_put_contents('../json/catalog.json', $finalProduct);

    $target_dir = "../assets/img/products/";
    foreach($_FILES['colors1']['name'] as $key => $value) {
      $type = ltrim(strstr($_FILES['colors1']['type'][$key], '/'), '/');
      if ($type == 'jpg' || $type == 'jpeg'){
        // $target_file = $target_dir . $lastId . '-' . $_POST['product-color'] . '-' . $key . '.' . $type;
        $target_file = $target_dir . $lastId . '-' . $_POST['product-color'] . '-' . $key . '.jpg';
        move_uploaded_file($_FILES['colors1']['tmp_name'][$key] ,$target_file);
      }
    }
    foreach($_FILES['colors2']['name'] as $key => $value) {
      $type = ltrim(strstr($_FILES['colors2']['type'][$key], '/'), '/');
      if ($type == 'jpg' || $type == 'jpeg'){
        $target_file = $target_dir . $lastId . '-' . $_POST['product-color2'] . '-' . $key . '.jpg';
        move_uploaded_file($_FILES['colors2']['tmp_name'][$key] ,$target_file);
      }
    }
    foreach($_FILES['colors3']['name'] as $key => $value) {
      $type = ltrim(strstr($_FILES['colors3']['type'][$key], '/'), '/');
      if ($type == 'jpg' || $type == 'jpeg'){
        $target_file = $target_dir . $lastId . '-' . $_POST['product-color3'] . '-' . $key . '.jpg';
        move_uploaded_file($_FILES['colors3']['tmp_name'][$key] ,$target_file);
      }
    }
  }
}

?>


<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>eCommerce</title>
      <link rel="icon" type="image/png" href="../assets/img/icons/favicon.png">
      <link rel="stylesheet" href="..\style-admin.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
        <!--Div Form Add Product-->
        <div id="new-product" class="d-flex mx-auto w-50 p-3 mt-5 bg-white rounded">
          <div class="w-75 p-3">
            <form method="post" class="w-100" enctype="multipart/form-data">
              <h4 class="font-weight-bold mt-3">New Product</h4> <br>
              <div class="form-group" id="new-product-div">
                <label for="product">Product title</label>
                <input type="text" name="product-name" class="form-control border border-dark" id="product-title"> 
                <?php echo $errorProductName; ?>
              </div>
              <div class="form-group" id="size-div">
              <label for="product">Shoe's Size 1</label>
                <div class="row">
                  <div class="col">
                    <input type="number" name="size1" id="size1" class="form-control border border-dark" placeholder="Size 1">
                  </div>
                  <div class="col">
                    <input type="number" step=0.01 name="color1" id="color1" class="form-control border border-dark" placeholder="Price 1"> <br>
                  </div>
                </div>
                <label for="product">Shoe's Size 2</label>
                <div class="row">
                  <div class="col">
                    <input type="number"  name="size2" id="size2" class="form-control border border-dark" placeholder="Size 2">
                  </div>
                  <div class="col">
                    <input type="number" step=0.01  name="color2" id="color2" class="form-control border border-dark" placeholder="Price 2"> <br>
                  </div>
                </div>
                <label for="product">Shoe's Size 3</label>
                <div class="row">
                  <div class="col">
                    <input type="number"  name="size3" id="size3" class="form-control border border-dark" placeholder="Size 3">
                  </div>
                  <div class="col">
                    <input type="number" step=0.01  name="color3" id="color3" class="form-control border border-dark" placeholder="Price 3">
                  </div>
                </div>
                <?php echo $errorSize; ?>
              </div>
              <div class="form-group" id="color-div">
                <label for="product-color">Color 1:</label>
                <input type="text" name="product-color" class="form-control border border-dark" id="product-color"><br>
                <input type="file" class="form-control-file" id="fileToUpload" multiple name="colors1[]"><br>
                <label for="product-color2">Color 2:</label>
                <input type="text" name="product-color2" class="form-control border border-dark" id="product-color2"> <br>
                <input type="file" class="form-control-file" id="fileToUpload2" multiple name="colors2[]"><br>
                <label for="product-color3">Color 3:</label>
                <input type="text" name="product-color3" class="form-control border border-dark" id="product-color3"><br>
                <input type="file" class="form-control-file" id="fileToUpload3" multiple name="colors3[]"><br>
                <?php echo $errorColor; ?>
              </div>
              <button type="submit" name="submit-product" id="submit-n-product" class="btn btn-dark w-100 mt-1 mb-3">Create product</button>
            </form>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
  </html>