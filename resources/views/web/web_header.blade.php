<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sukaii</title>
        
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/website.css') }}">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/website.css') }}">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
</head>
<body>
    <header id="">
        <div class="align-items-center border-bottom row">
            <div class="col col-md-3 col-sm-6">
                <img src="{{ URL::asset('images/sukaii_transparent_logo.png')}}" alt="Sukaii" class="p-2 logo_mobile"> 
            </div>
            <div class="col-6 col-md-9 col-sm-6 hide_menu">
                <div class="d-md-block d-none justify-content-end login_row row w-100">
                    

                    <ul class="d-flex float-right list-unstyled mb-2">
                      @if(session()->has('name'))
                      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle text-dark nav-link-lg nav-link-user">
                        <div class="d-sm-none d-lg-inline-block"><?=session('name')?></div></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{URL::to('profile')}}" class="dropdown-item has-icon text-dark">
                                <i class="fas fa-sign-out-alt"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{URL::to('Order_History')}}" class="dropdown-item has-icon text-dark">
                                <i class="fas fa-sign-out-alt"></i> History
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{URL::to('logout')}}" class="dropdown-item has-icon text-dark">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    @else 
                    <li class="login_row_list px-3"><a href="{{URL::to('login')}}">Login/Signup</a></li>
                    @endif
                    <li class="login_row_list px-3"><span class="p-2"><i class="fas fa-map-marker-alt"></i></span>Bangkok</li>
                </ul>


            </div>
            <div class="d-md-block d-none float-right row w-100">
                <ul class="d-flex float-right mb-0">
                    <li class="menu_list px-3"><a href="#" class="text-dark">HOME</a></li>
                    <li class="menu_list  px-3">SERVICES</li>
                    <li class="menu_list px-3">FAQ</li>
                    <li class="menu_list px-3">PARTNERS</li>
                    <li class="menu_list px-3">ABOUT US</li>
                </ul>
            </div>
            <div class="align-items-center d-flex justify-content-end mobile_menu">
                <ul class="d-block d-md-none m-0"  onclick="open_menu()">
                    <li class="tab_icon_menu_list list-unstyled" style="font-size: 20px;"><span><i class="fas fa-bars "></i></span></li>
                </ul>
            </div>
        </div>
        <div class="tab_mobile_nav  w-50" id="mobile_menu_btn" style="display: none;">
            <ul class="list-unstyled form-control">
                <li class="border-0 form-control">HOME</li>
                <li class="border-0 form-control">SERVICES</li>
                <li class="border-0 form-control">FAQ</li>
                <li class="border-0 form-control">PARTNERS</li>
                <li class="border-0 form-control">ABOUT US</li>
            </ul>
        </div>
    </div>
</header>
</body>
</html>