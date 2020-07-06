catalog = [];
getAllProducts();

function getAllProducts() {
    var allProductsReq = new XMLHttpRequest();
    allProductsReq.onload = function() {
            catalog = JSON.parse(this.responseText);
            printCatalog();
    }
    allProductsReq.open("GET", "get-all-products.php", true);
    allProductsReq.send();
}

function printCatalog() {
    let emptyCol = '<div class="col-sm-6 col-md-4 col-lg-3 pb-4"></div>';
    let card = '<div class="card h-100"><div>';
    let img = '<img src="" class="card-img-top" data-toggle="modal" data-target="#product_details">';
    let cardBody = '<div class="card-body"></div>';
    let cardTitle = '<h5 class="card-title"></h5>';
    let cardText = '<p class="card-text"></p>';

    for (let n = 0; n < Object.keys(catalog).length; n++) {
        if (Object.keys(catalog)[n] != "last_id") {
            let id = Object.keys(catalog)[n];
            let color = catalog[n].color[Object.keys(catalog[n].color)[0]];
            let price = catalog[n].size[Object.keys(catalog[n].size)[0]];
            $("#products_list").append(
                $(emptyCol).append(
                    $(card).append(
                        $(img).attr("src", "assets/img/products/"+id+"-"+color+"-0.jpg").data("id",id).click(requestProduct),
                        $(cardBody).append(
                            $(cardTitle).text(catalog[n].name),
                            $(cardText).text(price + " €/pc")
                        )
                    )
                )
            )
        }
    }
}

function requestProduct() {
    window.location.href = "/php-forms/product.php?productId="+$(event.target).data("id")
}