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
        $("#customer-name").select2({
            tags: true,
            placeholder: "Write the name here ",
        });
    }
});
