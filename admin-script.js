
// update product

$("#product-nb").click(function(){
    $("#product-admin").addClass("d-flex");
    $("#product-admin").removeClass("d-none");
    //
    $("#new-product").addClass("d-none");
    $("#new-product").removeClass("d-flex");


    $("#manager-admin").addClass("d-none");
    $("#manager-admin").removeClass("d-flex");

    $("#new-manager").addClass("d-none");
    $("#new-manager").removeClass("d-flex");
});

//Add product
$("#categories-nb").click(function(){
    $("#new-product").addClass("d-flex");
    $("#new-product").removeClass("d-none");

    //
    $("#product-admin").addClass("d-none");
    $("#product-admin").removeClass("d-flex");

    $("#manager-admin").addClass("d-none");
    $("#manager-admin").removeClass("d-flex");

    $("#new-manager").addClass("d-none");
    $("#new-manager").removeClass("d-flex");
})

//Update User
$("#user-admin").click(function(){
    $("#new-product").addClass("d-none");
    $("#new-product").removeClass("d-flex");

    //
    $("#product-admin").addClass("d-none");
    $("#product-admin").removeClass("d-flex");

    $("#manager-admin").addClass("d-flex");
    $("#manager-admin").removeClass("d-none");

    $("#new-manager").addClass("d-none");
    $("#new-manager").removeClass("d-flex");
});

//Add User

$("#create-user").click(function(){
    $("#new-product").addClass("d-none");
    $("#new-product").removeClass("d-flex");

    //
    $("#product-admin").addClass("d-none");
    $("#product-admin").removeClass("d-flex");

    $("#manager-admin").addClass("d-none");
    $("#manager-admin").removeClass("d-flex");

    $("#new-manager").addClass("d-flex");
    $("#new-manager").removeClass("d-none");
});