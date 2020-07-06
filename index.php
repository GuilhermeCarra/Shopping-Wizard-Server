<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Nice Shoes</title>
</head>

<body>
    <!-- HEADER -->
    <nav class="navbar navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#">
            <img src="assets/img/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Nice Shoes
        </a>
    </nav>

    <!-- CAROUSEL -->
    <section>
        <div id="carouselExampleCaptions" class="carousel slide carousel-h" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active overflow-hidden carousel-h">
                    <div id="carousel1" class="d-block carousel__img-container h-100"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>The best shoes</h5>
                        <p>Here you found the best quality shoes brands.</p>
                    </div>
                </div>
                <div class="carousel-item overflow-hidden carousel-h">
                    <div id="carousel2" class="d-block carousel__img-container h-100"></div>
                    <!-- <img src="assets/img/carousel/2.jpg" class="d-block w-100" alt="..."> -->
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item overflow-hidden carousel-h">
                    <div id="carousel3" class="d-block carousel__img-container h-100"></div>
                    <!-- <img src="assets/img/carousel/3.jpg" class="d-block w-100" alt="..."> -->
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section> <!-- CAROUSEL -->

    <!-- Products list -->
    <div class="container-fluid mt-4">
        <div class="row mx-0">
            <div class="col"></div>
            <div class="col-9 row" id="products_list">
                <!-- Products list printed dynamically -->
            </div>
            <div class="col"></div>
        </div>
    </div> <!-- Products list -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
</body>

</html>