

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function manage_cart(pid, type) {
    if (type == 'update') {
        var qty = $("#" + pid + "qty").val();
    } else {
        var qty = $("#qty").val();
    }

    $.ajax({
        url: `/client/transaction/manage_cart`,
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function (response) {
            // alert(response)
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;
            }
            if (response == 'not_avaliable') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    title: 'Items not Available',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                $('.count-shop').html(response);
                if (type == 'remove') {
                    Toast.fire({
                        icon: 'success',
                        title: 'Product Successfully Deleted'
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Product Successfully Added'
                    })
                }

            }
        },
        error: function(err){
            console.log(err);
        }
    });
}

$(document).ready(function () {

    function cek_uri() {
        path = window.location.pathname
        if (path != '/vandhi' && path != '/') {
            $('.nav-link').css('color', '#9090ff')
            $('.icon-logo').css('color', '#9090ff')
            $('.navbar-search-input').css('color', '#9090ff')
            $('.navbar-search-input').css('bakcground', 'black')
        }
    }

    cek_uri()
});
