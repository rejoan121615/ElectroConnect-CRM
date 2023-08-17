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
                     $("#email").val('');
                     $("#phone").val('');
                     $("#address").val('');
                }
            });
        }
        $("#customer-name").select2({
            tags: true,
            placeholder: "Write the name here ",
            style: null,
        });


        // load product 
        $.ajax({
            url: '',
            data: null,
            success: function () {

            },
            dataType: 'json'
        })
    }
});
