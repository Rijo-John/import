<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Product</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        
        <!-- Styles -->
        <link rel="stylesheet" href="../../toastr/toastr.min.css">
        <link href="../css/main.css" rel="stylesheet" />
        
    </head>
    <body>
    <div class="row">
    <div class="links app-header">
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <div class="row" style="margin-bottom: 30px;">
    <div class="col-md-2"></div> 
    <div class="col-md-6">
        <div class="title m-b-md">
            <b>Product Import</b>
        </div>
        <hr>
    </div>
    <div class="col-md-2" ></div> 
    </div>
    
        
    <div class="row">
        <div class="col-md-2"></div> 
        <div class="col-md-4">
        <form action="api/product-import" id="import_form" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <div>
                    
                </div>
                <div class="form-group">
                    <label for="select_file">Select File</label>
                    <input type="file" name="select_file" id="select_file" class="form-control">
                </div>
                <div class="error-message">
                    <h6 class="error-text select_file_error"></h6>
                </div>
                <button type="submit" class="btn btn-success">Import File</button>
                
            </form>
        </div> 
        <div class="col-md-2" ></div> 
    </div>
  
       
    <script src="../../toastr/toastr.min.js"></script>
    <script src="../js/product.js"></script>
    </body>
</html>
   