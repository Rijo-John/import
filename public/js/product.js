// Toaster for success message

function successMessageToast(msg) {
  toastr.success(msg)
  setTimeout(function () {
    top.location.href = '/product-list';
  }, 2500);

}
function errorMessageToast(msg) {
  toastr.error(msg)
}


function get_products() {
  token = localStorage.getItem("token");
  $.ajax({
    url: '/api/products',
    type: 'GET',
    dataType: 'json',
    headers: { Authorization: 'Bearer ' + token },
    success: function (results) {
        var count = results.data.length;
        var html = '';
        if(count > 0)
        {
          var j = 1;
          $.each(results.data, function (i, val) {
            html += '<tr>';
            html += '<td>'+ j++ +'</td>';
            html += '<td>'+ val.product +'</td>';
            html += '<td>'+ val.price +'</td>';
            html += '<td>'+ val.sku +'</td>';
            html += '<td>'+ val.description +'</td>';
            html += '</tr>';
          });
          $('#append-here').html(html);
        }
        $('#example').DataTable();
    }
  });
}

$(document).ready(function () {
 // $('#example').DataTable();
  token = localStorage.getItem("token");
  get_products();
  $('#import_form').on('submit', function (e) {


    e.preventDefault();
    $('.error-text').fadeIn();
    var checkError = [];
    var data = new FormData();
    debugger;

    if (document.getElementById('select_file').files[0]) {
      var allowedExtensions = ['csv', 'xls', 'xlsx'];
      var file_type = document.getElementById('select_file').files[0].name;
      var file_size = document.getElementById('select_file').files[0].size;
      var imgArray = file_type.split(".");
      var file_type = imgArray[0];
      var img_extension = imgArray[1];
      if ($.inArray(img_extension, allowedExtensions) == -1) {
        $('#select_file').addClass('is-invalid');
        checkError.push('error');
        $('.select_file_error').text("The selected file must be csv,xls,xlsx format");
        $('#select_file').addClass('is-invalid');
      } else if (file_size > 1000000) {  // in bytes
        checkError.push('error');
        $('#select_file').addClass('is-invalid');
        $('.select_file_error').text("The selected file may not be greater than 5MB.");
      }
      data.append('select_file', document.getElementById('select_file').files[0]);
    } else {
      $('.select_file_error').text("The select file field is required.");
    }


    if (checkError.length == 0) {
      $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        headers: { Authorization: 'Bearer ' + token },
        beforeSend: function () {
          $(document).find('.error-text').text('');
        },
        success: function (result) {
          successMessageToast("Employee added successfully");
        },
        error: function (response) {
          debugger;
          var resStatus = response.status;
          var resJson = response.responseJSON;
          if (resStatus == 422) {
            $.each(resJson.data.errors, function (key, value) {
              $('.' + key + '_error').text(value[0]);
              $('#' + key).addClass('is-invalid');
            });
          }
          else if (resStatus == 401) {
            errorMessageToast("Unauthenticated, Please Login");
          } else {
            errorMessageToast("Invalid data format in the imported file.");
          }
        },
      });
    }



  });

});