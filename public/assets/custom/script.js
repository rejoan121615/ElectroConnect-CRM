$(document).ready(function () {
    $("#table").DataTable({
        columnDefs: [
            {
                targets: "no-sort",
                orderable: false,
            },
        ],
    });
});
