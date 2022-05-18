

$(document).ready(function () {
    $('#login_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $('#login_form').serialize(),

            beforeSend: function () {
                $(document).find('.error-text').text('');
            },
            success: function (result) {
                debugger;
                localStorage.setItem("token", result.token);
                window.location = '/product-list';
                
            },
            error: function (response) {
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