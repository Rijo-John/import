// Toaster for success message

function successMessageToast(msg) {
    toastr.success(msg)
    setTimeout(function () {
        top.location.href = '/login';
    }, 2500);

}


$(document).ready(function () {
    $('#register_form').on('submit', function (e) {
        e.preventDefault();
        var productName = $('#productName').val();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $('#register_form').serialize(),

            beforeSend: function () {
                $(document).find('.error-text').text('');
            },
            success: function (result) {
                successMessageToast("Registration Successfull");
            },
            error: function (response) {
                debugger;
                var resStatus = response.status;
                var resJson = response.responseJSON;
                if (resStatus == 422) {
                    $.each(resJson.data.errors, function (key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                } else {

                }
            },
        });

    });

});