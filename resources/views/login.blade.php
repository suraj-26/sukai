<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukaii-Login</title>
    <link rel = "icon" href ="{{ URL::asset('images/sukaii_transparent_logo.png')}}" type = "image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap/bootstrap.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        *{
            font-family: 'Lato', sans-serif;
        }
        .full_container {
            background-image: url('images/login_image_2.jpg');
            width: 100%;
            height: calc(100vh - 12vh);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            /* background-attachment */
        }

        .login_form {
            width: 30%;
            float: right;
            background: #ffffff;
            border-radius: 8px;
            padding: 1%;
            position: absolute;
            top: 28%;
            right: 10%;
            min-width: 430px;
        }

        .btn-sign_in {
            background: #06b5b991 !important;
        }


        /* header  */


        @media (max-width: 800px) {
            .login_form {
                right: 3%;
                min-width: 400px;
            }
        }

        @media (max-width: 450px) {
            .login_form {
                top: 20%;
                padding: 3%;

                min-width: 400px;
            }
        }

        @media (max-width: 380px) {
            .login_form {
                top: 20%;
                padding: 3%;
                min-width: 300px;
            }
        }
    </style>
</head>
<body>
@include('web.web_header')
<div class="container-fluid full_container">
    <form action="goLogin" method="POST">
        @csrf
        <div class="login_form " >
            @if (session('error'))
                <div class="alert alert-danger">
                   <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                </div>
            @endif

            <div class="logo text-center mb-1">
                <img src="{{URL::asset('images/sukaii_logo.PNG')}}" alt="" width="22%" class="">
            </div>
            <h4 class="text-center mb-2"  style="font-family: 'Rubik', sans-serif !important; font-weight: 600;">LOGIN</h4>
            <div class="username">
                <label for="" class="username_lable mb-1"><h6 class="mb-1 pl-1">Email</h6></label>
                <input type="email" name="email" required class="user_name form-control mb-2">
            </div>
            <div class="password">
                <label for="" class="password_lable mb-1"><h6 class="mb-1 pl-1">Password</h6></label>
                <input type="password" name="password" required class="password_input form-control mb-4">
            </div>
            <button class="btn btn-sign_in form-control mb-2"><h6 class="mb-0">Sign In</h6></button>
            {{--                <h6 class="float-right">Forget Password</h6>--}}
            <div class="register">
                <p>Don't have an account? <a href="{{URL::to('signIn')}}"
                                             style="color: #ec098d;text-decoration: none"><b>REGISTER NOW !</b></a></p>
            </div>
        </div>
    </form>
</div>

</div>
@include('web.web_footer')
</body>
</html>
<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 3000 ); // 5 secs

    });
</script>
