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
    if ($('#sale-form').length) {

            $.ajax({
                url: "http://127.0.0.1:8000/sales/customers",
                data: null,
                success: function (e) {
                    // console.log(e);
                    CustomerNameBox(e);
                },
                dataType: "json",
            });
            // load data on customer name table 
            function CustomerNameBox(data) {
                // data?.forEach((item) => {});
                $.each(data, function (_, item) {
                    $("#customer-name").append(function () {
                        return `<option value="${item["id"]}">${item["name"]}</option>`;
                    });
                });

                // Register the change event handler
                $("#customer-name").on("change", function () {
                    var selectedValue = $(this).val();


                    console.log(selectedValue);

                    // var data = $.grep(data, function (obj) {
                    //     console.log(obj);
                    //     return obj.id === selectedValue;
                    // })

                    // console.log(data);
                    // load on email address
                    // $('#email')
                    // load phone number 

                    
                    // load address 
                });
            }


            $("#customer-name").select2({
                tags: true,
                placeholder: "Write the name here ",
            });



    }
});
