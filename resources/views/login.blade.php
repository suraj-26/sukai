<!-- <form action="goLogin" method="POST">
    @csrf
    <input type="text" name="username" id="username">
    <input type="password" name="password" id="password">
    <input type="submit" id="submit" name="submit" value="Login">
</form>


-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukaii-Login</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap/bootstrap.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
        .register a{
            color: #ea088b;;
        }
        .submit_btn button{
            background-color: #ea088b;
        }
        .register_btn button{
            background-color: #949090;
        }
    </style>
</head>
<body>
    @include('web.web_header');
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="login_register">
                    <h5 class="mb-4 text-center">LOGIN / REGISTER</h5>
                    <form action="goLogin" method="POST">
                     @csrf
                     <div class="user_name mb-3">
                        <p class="mb-0"><b>USER NAME</b></p>
                        <input type="text" name="username" required id="username" class="form-control">
                    </div>
                    <div class="password">
                        <p class="mb-0"><b>PASSWORD</b></p>
                        <input type="password" name="password" required id="password" class="form-control">
                        <p class="float-right mb-0"><b><a href="#">forget password</a></b></p>
                    </div>
                    <div class="reminder">
                        <input type="checkbox" id="reminde_me" name="reminder" value=""> 
                        <label for="reminde_me" class="mb-0"><b>Remember Password</b></label><br>

                    </div>
                    <div class="submit_btn my-4 text-center">
                       <input type="submit" value="Login" class="btn btn-dark ">
                   </div>
               </form>
               <div class="register">
                <p>Don’t have an account? <a href="{{URL::to('signIn');}}" ><b>Register NOW !</b></a></p>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>


</div>
</body>
</html>