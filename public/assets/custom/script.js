$(document).ready(function () {
    // check if the table exists
    if ($("#table").length) {
        $("#table").DataTable({
            columnDefs: [
                {
                    targets: "no-sort",
                    orderable: false,
                },
            ],
        });
    }

    // sale create pages
    if ($("#sale-form").length) {
        $.ajax({
            url: "http://127.0.0.1:8000/api/customers",
            data: null,
            success: function (e) {
                // console.log(e);
                CustomerInfo(e);
            },
            dataType: "json",
        });
        // load data on customer name table
        function CustomerInfo(data) {
            // generate option
            $.each(data, function (_, item) {
                $("#customer-name").append(function () {
                    return `<option value="${item["id"]}">${item["name"]}</option>`;
                });
            });

            // Register the change event handler
            $("#customer-name").on("change", function () {
                var selectedValue = $(this).val();
                // find the object
                let selected = data.find((data) => {
                    return data.id == selectedValue;
                });

                if (selected) {
                    // load data
                    $("#email").val(selected.email);
                    $("#phone").val(selected.phone);
                    $("#address").val(selected.address);
                } else {
                    $("#email").val("");
                    $("#phone").val("");
                    $("#address").val("");
                }
            });
        }
        $("#customer-name").select2({
            tags: true,
            placeholder: "Write the name here ",
            style: null,
        });

        // load product ------------------------
        $.ajax({
            url: "http://127.0.0.1:8000/api/products",
            data: null,
            success: function (data) {
                ProductList(data);
            },
            dataType: "json",
        });

        let productTable = $("#product-table tbody");

        function ProductList(data) {
            $.each(data, function (_, item) {
                $("#product").append(
                    `<option value="${item.id}">${item.name}</option>`
                );
            });

            $("#product").select2({
                placeholder: "Select your product",
                style: null,
            });
            $("#product").on("change", function () {
                $("#add-product").attr("disabled", false);
                let selectVal = $(this).val();
                let selectedProduct = data.find((item) => item.id == selectVal);

                $("#add-product")
                    .off("click")
                    .on("click", function (e) {
                        e.preventDefault();
                        let quantity = parseInt($("#quantity").val());

                        let existingRow = productTable.find(
                            `tr[data-product="${selectedProduct.id}"]`
                        );

                        if (existingRow.length > 0) {
                            // Update quantity and price in existing row
                            let existingQuantity = parseInt(
                                existingRow.find(".quantity").text()
                            );
                            let newQuantity = existingQuantity + quantity;
                            existingRow.find(".quantity").text(newQuantity);

                            let price = parseFloat(selectedProduct.price);
                            let newPrice = newQuantity * price;
                            existingRow
                                .find(".price")
                                .text(newPrice.toFixed(2));
                        } else {
                            // Add new row to the table
                            productTable.prepend(`
                                <tr data-product="${selectedProduct.id}">
                                    <td>${selectedProduct.name}</td>
                                    <td class="quantity">${quantity}</td>
                                    <td class="price">${(
                                        parseFloat(selectedProduct.price) *
                                        quantity
                                    ).toFixed(2)}</td>
                                    <td style="width: 0px;"><button class="btn btn-danger remove-product">Remove</button></td>
                                    <input type="hidden" name="products[]" value="${selectedProduct.id}" />
                                </tr>
                            `);
                        }

                        calculateTotalPrice();

                        // Handle Remove button click
                        // $(".remove-product")
                        //     .off("click")
                        //     .on("click", function () {
                        //         $(this).closest("tr").remove();
                        //     });
                    });
            });
        }

        productTable.on("click", ".remove-product", function () {
            $(this).closest("tr").remove();
            calculateTotalPrice(); // Update the total price
        });

        // total price
        function calculateTotalPrice() {
            let totalPrice = 0;
            productTable.find("tr").each(function () {
                let priceCell = $(this).find(".price");
                if (priceCell.length > 0) {
                    totalPrice += parseFloat(priceCell.text());
                }
            });
            $("#total-price").text(totalPrice.toFixed(2));
        }

          function validateForm() {
              let isValid = true;

              // Check if customer info fields are empty
              if (
                  $("#customer-name").val() === "" ||
                  $("#email").val() === "" ||
                  $("#phone").val() === "" ||
                  $("#address").val() === ""
              ) {
                  isValid = false;
              }

              // Check if product info fields are empty
              if ($("#product").val() === "" || $("#quantity").val() === "") {
                  isValid = false;
              }

              return isValid;
          }

        $("#sale-form").submit(function (e) {
            // e.preventDefault();

            if (validateForm()) {
                let formData = new FormData($(this)[0]);
                let productData = [];

                productTable.find("tr[data-product]").each(function () {
                    let productId = $(this).attr("data-product");
                    let quantity = $(this).find(".quantity").text();
                    let price = $(this).find(".price").text();

                    productData.push({ productId, quantity, price });
                });

                formData.append("products", JSON.stringify(productData));
                $.ajax({
                    url: "http://127.0.0.1:8000/api/store",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Handle success response
                        // console.log(response);
                        console.log(JSON.parse(response));
                    },
                    error: function (error) {
                        // Handle error response
                        console.log('got error => ', error);
                    },
                });
            } else {
                alert("Please fill in all required fields.");
            }
        });


    }
});
