<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="../../toastr/toastr.min.css">
        <link href="../css/main.css" rel="stylesheet" />
        
    </head>
    <body>
    <div class="row">
    <div class="links app-header">
            <a href="{{ route('login') }}">Logout</a>
        </div>
    </div>
    <div class="row" style="margin-bottom: 30px;">
    <div class="col-md-2"></div> 
    <div class="col-md-6">
        <div class="title m-b-md">
            <b>Product List</b>
        </div>
        <hr>
    </div>
    <div class="col-md-2" ><a href="/import-product" ><button type="submit" class="btn btn-success" style="margin-top: 30px;">Import Product</button></a></div> 
    </div>
    
        
    <div class="row" >
    <div class="col-md-2"></div> 
    <div class="col-md-8">
      
 
  <table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>SL</th>
        <th>Product</th>
        <th>Price</th>
        <th>Stock Keeping Unit</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody id="append-here">
      
     
    </tbody>
  </table>
</div>
   
    <div class="col-md-2"></div>  
       
    <script src="../../toastr/toastr.min.js"></script>
    <script src="../js/product.js"></script>
    </body>
</html>
   