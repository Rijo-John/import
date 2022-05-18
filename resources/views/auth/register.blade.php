<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Register</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="../../toastr/toastr.min.css">
        <link href="../css/main.css" rel="stylesheet" />
        
    </head>
    <body>
    <div class="row">
        <!-- @include('layouts.header') -->
        <div class="links app-header">
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

    <div class="row" style="margin-bottom: 30px;">
    <div class="col-md-4"></div> 
    <div class="col-md-4">
        <div class="title m-b-md">
            <center><b>REGISTRATION</b></center>
        </div>
        <hr>
    </div>
    <div class="col-md-4"></div> 
    </div>
    
    <div class="row">
        <div class="col-md-4"></div> 
        <div class="col-md-4">
            <form id="register_form" action="api/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                </div>
                <div class="icon-form-wrapper pos-relative error-message">
                    <h6 class="error-text first_name_error"></h6>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                </div>
                <div class="icon-form-wrapper pos-relative error-message">
                    <h6 class="error-text last_name_error"></h6>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="icon-form-wrapper pos-relative error-message">
                    <h6 class="error-text email_error"></h6>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="icon-form-wrapper pos-relative error-message">
                    <h6 class="error-text password_error"></h6>
                </div>
               
                <button type="submit" class="btn btn-primary">REGISTER</button>
            </form>
        </div> 
    </div>
    <script src="../../toastr/toastr.min.js"></script>
    <script src="../js/register.js"></script>
    </body>
</html>