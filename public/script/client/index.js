$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

function getAllProduct() {
    $.ajax({
        url: `/client/product`,
        method: "get",
        success: function(response) {
            var data = JSON.parse(response)
            alert(data)
            console.log(data);
        },
        error: function(err) {
            console.log(err);
        }
    });
}

$(document).ready(function() {
    // getAllProduct();
});
