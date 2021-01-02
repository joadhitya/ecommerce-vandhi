$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});

const url = () => {
    const url = window.location.href;
    const arr = url.split("/");
    const data = arr[4];
    return data;
};

const resetForm = type => {
    $(`#back-${type}`).hide();
    $(`#form-body-${type}`).hide();
    $(`#table-${type}`).show();
    $(`#add-${type}`).show();
    $(`#table-list-${type}`).show();
    $(`#save-data-${type}`).removeAttr("disabled");
    $(`#update-data-${type}`).removeAttr("disabled");
    $(`#form-${type}`)[0].reset();
};

const hideData = type => {
    $(`#table-${type}`).hide();
    $(`#table-list-${type}`).hide();
    $(`#add-${type}`).hide();
    $(`#back-${type}`).show();
    $(`#form-body-${type}`).show();
    $(`#title-form-${type}`).show();
};

const successAlert = (method, response, type) => {
    Toast.fire({
        icon: "success",
        title: response
    });
    if (method === "add") {
        resetForm(type);
    } else if (method === "edit") {
        resetForm(type);
    } else if (method === "delete") {
        return false;
    }
};

const errorAlert = (method, response, type) => {
    Toast.fire({
        icon: "error",
        title: response
    });
};

const displayData = (data, id) => {
    $.ajax({
        url: `/master-data/${data}/displayData`,
        method: "get",
        success: async response => {
            const result = await response;
            $(`#data-${data}`).html(result);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
        },
        error: function(err) {
            console.log(err);
        }
    });
};

const addForm = (type, value) => {
    $(`#title-form-${type}`).text(`Tambah Data ${type}`);
    $(`#save-data-${type}`).show();
    $(`#update-data-${type}`).hide();
    if (value == "Y") {
        hideData(type);
    } else if (value == "N") {
        $(`#title-form-${type}`).text(`List Data ${type}`);
        resetForm(type);
    }
};

const editForm = (type, id, value) => {
    $(`#title-form-${type}`).text(`Ubah Data ${type}`);
    $(`#save-data-${type}`).hide();
    $(`#update-data-${type}`).show();
    hideData(type);
    fetchData(type, id);
};

function attach_photo() {
    console.log("ye");
}

const saveDataMaster = type => {
    $(`#form-${type}`).submit(function(e) {
        $(`#save-data-${type}`).attr("disabled", "true");
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: `/master-data/${type}`,
            type: "post",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: async function(response) {
                await successAlert("add", response[0].message, type);
                displayData(type, response[0].id);
                $(`#form-${type}`).unbind("submit");
            },
            error: async function(err) {
                $(`#save-data-${type}`).removeAttr("disabled");
                await errorAlert("add", "Silahkan lengkapi data Form", type);
                $(`#form-${type}`).unbind("submit");
            }
        });
    });
};

const updateDataMaster = type => {
    id = $(`#id_${type}`).val();
    $(`#form-${type}`).submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: `/master-data/${type}/${id}`,
            type: "post",
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: async function(response) {
                await successAlert("edit", response[0].message, type);
                displayData(type, id);
                $(`#form-${type}`).unbind("submit");
            },
            error: async function(err) {
                console.log(err);
                $(`#update-data-${type}`).removeAttr("disabled");
                await errorAlert("add", "Silahkan lengkapi data Form", type);
                $(`#form-${type}`).unbind("submit");
            }
        });
    });
};

const deleteData = (type, id) => {
    Swal.fire({
        title: "Yakin akan menghapus data?",
        text: "Data yang di hapus tidak dapat dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, hapus!"
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/master-data/${type}/${id}`,
                method: "delete",
                dataType: "json",
                success: function(response) {
                    successAlert("delete", response[0].message, type);
                    displayData(type, response[0].id);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    });
};

// GET DATA MASTER
const getCategory = () => {
    $.ajax({
        url: `/master-data/category/get/dataCategory`,
        method: "get",
        success: async response => {
            const result = await response;
            var data = JSON.parse(result);
            console.log(data);
            // return
            var html = "";
            html += '<option value="">Pilih Category</option>';
            for (var count = 0; count < data.length; count++) {
                html +=
                    '<option value="' +
                    data[count].id +
                    '" >' +
                    data[count].category_name +
                    "</option>";
            }
            $("#category").html(html);
        },
        error: function(err) {
            console.log(err);
        }
    });
};

function get_sub_cat() {
    var id = $("#category").val()
    if(id == ""){
        id = 0;
    }
    $.ajax({
        url: `/master-data/subcategory/get/dataSubCategory/${id}`,
        method: "get",
        success: async response => {
            const result = await response;
            var data = JSON.parse(result);
            console.log(data);
            var html = "";
            html += '<option value="">Pilih Sub Category</option>';
            for (var count = 0; count < data.length; count++) {
                html +=
                    '<option value="' +
                    data[count].id +
                    '" >' +
                    data[count].subcategory_name +
                    "</option>";
            }
            $("#subcategory").html(html);
        },
        error: function(err) {
            console.log(err);
        }
    });
}

$(document).ready(function() {
    displayData(url(), "");
});
