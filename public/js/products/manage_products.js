/*
 Author: Dieudonne Takougang
 Date: 22/06/2021
 Description: Add a new product to the system after vaildating all neccessary fields
 */
function add_product() {

    var product_name = $("#product_name").val();
    var product_qty = $("#product_qty").val();
    var product_price = $("#product_price").val();
    //validate all inputs fields to make sure, they are not empty
    if (product_name.length === '' || product_qty.length === '' || product_price.length === '') {

        //display error to the user to filled all fields
        $('#error_general_msg').show();
        //after showing the error , hide it after 3s of displayed
        setTimeout(function () {
            $('#error_general_msg').hide();
        }, 3000);

    } else {
        $.ajax({
            url: $('#baseUrl').val() + '/add/product',
            type: 'post',
            data: {
                product_name: product_name,
                product_quantity: product_qty,
                product_price: product_price,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var products_response = JSON.parse(response);
                //check if the request was successful
                if (products_response.status === 'success') {

                    //empty the add product form
                    $("#product_name").val('');
                    $("#product_qty").val('');
                    $("#product_price").val('');

                    //build the table data and display to the product list table
                    var products = products_response.products;
                    var product_list = "";

                    var sum_total_value_number = 0;
                    for (var key in products) {
                        var total_value_number = (products[key].product_quantity) * (products[key].product_price);
                        sum_total_value_number += total_value_number;
                        product_list += "<tr>" +
                            "<td>" + (key * 1 + 1) + "</td>" +
                            "<td>" + products[key].product_name + "</td>" +
                            "<td>" + products[key].product_quantity + "</td>" +
                            "<td>" + products[key].product_price + "</td>" +
                            "<td>" + products[key].product_date + "</td>" +
                            "<td>" + total_value_number + "</td>" +

                            "</tr>";
                    }
                    product_list += "<tr><td colspan='5'>Total value number</td><td >" +
                        "" + sum_total_value_number +
                        "</td>" +
                        "</tr>";

                    $("#product_list_body").html(product_list);
                }
            },
            error: function (response) {
                console.log('error connecting to the server to check username');
            }
        });
    }

}
