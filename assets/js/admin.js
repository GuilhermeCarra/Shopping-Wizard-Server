// search admins
$("#search-user-table").on("keyup", function () {
    const value = $(this).val().toLowerCase();
    $("#user-table tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

// search product
$("#search-product-table").on("keyup", function () {
    const value = $(this).val().toLowerCase();
    $("#table-products tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
})
