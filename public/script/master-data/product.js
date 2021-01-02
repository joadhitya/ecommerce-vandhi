$("#form-product").submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: `/master-data/product`,
        type: "post",
        data: formData,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: async function(response) {
            console.log(response);
            alert(response[0].message)
            await successAlert("add", response[0].message, 'product');
            displayData('product', response[0].id);
            $(`#form-product`).unbind("submit");
        },
        error: function(err) {
            console.log(err);
            alert('error')
            // $(`#save-data-${type}`).removeAttr("disabled");
            // await errorAlert("add", "Silahkan lengkapi data Form", type);
            // $(`#form-${type}`).unbind("submit");
        }
    });
});
