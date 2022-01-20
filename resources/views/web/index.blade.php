<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukaii</title>
    <link rel = "icon" href ="{{ URL::asset('images/sukaii_transparent_logo.png')}}" type = "image/x-icon">
</head>
<style>
    .list {
        background: #efefef;
    }

    .list input {
        accent-color: #ea088b;
    }

    .list label {
        color: #ea088b;
    }

    .form-control:focus {
        box-shadow: none;
        outline: none;
    }

    span.select2.select2-container.select2-container--default.select2-container--below {
        width: 100% !important;
    }

    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }
    .carousel_1_image{
        color: black !important;
        z-index: 10;
        position: absolute;
        top: 36%;
        left: 4%;
        font-size: 1rem;
    }
    .carousel_1_image h1{
        font-size: 25px;
    }
</style>
<body>
@include('web.web_header')

@if (session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-clipboard-check"></i> {{ session('success') }}
    </div>
@endif
<div class="header_mobile_carousel d-block d-md-none row mb-4">
    <div class="col-md-12">
        <div id="mobile_carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#mobile_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#mobile_carousel" data-slide-to="1"></li>
                <li data-target="#mobile_carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
{{--                <div class="carousel-item active">--}}
{{--                    <img class="d-block w-100" src="{{ URL::asset('images/Healthcare-at-home.jpg')}}" alt="First slide">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="d-block w-100" src="{{ URL::asset('images/Covid-Test.jpg')}}" alt="Second slide">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img class="d-block w-100" src="{{ URL::asset('images/lab-test-at-home.jpg')}}" alt="Third slide">--}}
{{--                </div>--}}

                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ URL::asset('images/Healthcare-at-home.jpg')}}"  alt="First slide">
                    <div class=" px-0">
                        <h3 class="carousel_1_image mb-0 position-absolute"><span>Get
                                    <h1 class="mb-0" style="color: #ec098d !important;">trained nurse</h1>
                                </span>care at Home</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ URL::asset('images/Covid-Test.jpg')}}"  alt="Second slide">
                    <div class=" px-0">
                        <h3 class="carousel_1_image mb-0 position-absolute"><span>Get
                                    <h1 class="mb-0" style="color: #ec098d !important;"> COVID Checkup</h1>
                                </span>at Home</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ URL::asset('images/lab-test-at-home.jpg')}}" alt="Third slide">
                    <div class=" px-0">
                        <h3 class="carousel_1_image mb-0 position-absolute"><span>
                                    <h1 class="mb-0" style="color: #ec098d !important;">Lab Test</h1>
                                </span>at Home</h3>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#mobile_carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#mobile_carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</div>

<div class="row mb-5">
    <div class="col-md-12 p-0">
        <img src="{{ URL::asset('images/front-image.jpg')}}" alt="" class="d-md-block d-none w-100">
        <div class=" px-0  d-none d-md-block">
            <h3 class="nurses_image mb-0 position-absolute text-light"><span><h1 class="mb-0">Healthcare</h1></span>at
                your Home
            </h3>
        </div>
    </div>

</div>
<div class="container d-md-flex d-sm-block" style="margin-bottom: 7rem;">
    <div class="col-md-4 col-sm-12 text-center">
        <img src="{{ URL::asset('images/doctors_image-1.PNG')}}" alt="" style="border-radius: 25px;height: 80%; width: 100%;"
             class="we_are_doctor_image">
    </div>
    <div class="col-md-4 col-sm-12 px-4 we_are_div_laptop">
        <h2 class="weare we_are_for_labtop">WE ARE</h2>
        <p class="text-justify weare_text_details text-dark">Basic healthcare should not require a trip to the hospital.
            Get services like blood draws and diagnostics, nursing care, and Covid tests through our trained nurses at
            the comfort of your home.</p>
        <p class="text-justify weare_text_details text-dark">Our proprietary Sukaii Report also makes your health check results easy to
            read and understand. <b>Read more...</b></p>
    </div>
    <div class="col-md-4 pr-0 col-sm-12 thb300_fpr_laptop">
        <div class="mb-4 mb-lg-1 row thb300" style="margin: auto; width: 100%;">
            <img src="./images/thb-img.PNG" class="w-100 px-0" alt="">
        </div>
        <form method="POST" action="getEnquiry">
            @csrf
            <div class="row">
                <div class="freecall_div border-dark form-control ">
                    <span><i class="fas fa-user freecall_name_icon"></i></span>
                    <input type="text" required name="Name" class="border-0" placeholder="Enter Your Name"
                           id="freecall_name">
                </div>

                <div class="freecall_div border-dark form-control " style="padding: 10px;">
                    <span><i class="fas fa-user freecall_name_icon"></i></span>
                    <input type="text" required name="mobile" class="border-0" style="outline: none;padding-left: 15px;"
                           placeholder="Enter your Mobile No" id="freecall_mobile">
                </div>
                <div class="freecall_div border-dark p-2 form-control " style="padding: 10px;">
                    <span><i class="fas fa-user freecall_name_icon"></i></span>
                    <input type="text" required name="email" class="border-0" style="outline: none;padding-left: 15px;"
                           placeholder="Enter your Email" id="email">
                </div>

                <div class="freecall_div border-dark form-control py-0">
                    <span><i class="fas fa-map-marker-alt freecall_name_icon"></i></span>
                    <select name="services" id="freecall_services" required placeholder="Services"
                            class="border-0 form-control py-0">
                        <option disabled class="form-control">Select Services</option>
                        <option value="Nursing Services" class="form-control">Nursing Services</option>
                        <option value="Elderly Services" class="form-control">Elderly Services</option>
                        <option value="Lab Test" class="form-control">Lab Test</option>
                    </select>
                </div>
                <div class="freecall_div border-dark form-control py-10">
                    <span><i class="fas fa-heartbeat freecall_name_icon"></i></span>
                    <input type="text" required name="location" class="border-0" style="outline: none;padding-left: 15px;"
                           placeholder="Enter your Location" id="freecall_location">
                </div>
                <div class="border call_btn m-auto">
                    <button class="btn book_services_btn text-light"><h3 class="mb-0">BOOK NOW</h3></button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<div class="book_3_eassy_step col-sm-12">
    <!-- <img src=" alt=""> -->
    <h4 class="text-center we_made_it" id="we_made_it">WE MADE IT SIMPLE</h4>
    <div class="bg-dark book_now py-2 text-light text-center">
        <h2 class="mb-0"><b style="color: #00b4b8; font-family: 'Rubik', sans-serif;">BOOK NOW</b></h2>
        <p class="mb-0"><b>In Just 3 easy steps</b></p>
    </div>
    <div class="imp_3_way">
        <ul class="pt-5">
            <li class="text-center text-dark f_way my-4"><span class="f_way_icon"><i class="fas fa-map-marker-alt"></i></span>
                Select Location
            </li>
            <li class="text-center text-dark s_way mb-4"><span class="s_way_icon px-3"
                                                               style="padding: 0.85rem 0.3rem"><i
                        class="fas fa-hand-holding-medical"></i></span> Select Services
            </li>
            <li class="text-center text-dark t_way" style="padding-left: 45px"><span class="t_way_icon"
                                                                                     style="padding: 0.7rem 1.2rem;"><i
                        class="far fa-calendar-alt"></i></span> Enter Time and Date
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row" style="    margin-bottom: 4rem;">
        <div id="box1"
             class="align-items-sm-center col-md-4 col-sm-12 d-md-flex flex-md-column d-sm-flex nurse-at-home_div"
             style="border-right: 2px solid #898686;">
            <div class=" nearse_image"><img src="{{ URL::asset('images/ealdrly_img(2).png')}}" alt="" class="w-75">
            </div>
            <div class="" style="width: 100%; margin: auto;">
                <h2 class="Nurse_at_home_text text-center">HEALTH CHECK</h2>
                <div class="book_btn text-center">
                    <!-- <button id="btn1" type="button" onclick="showForm(1)" class="btn book_services_btn text-light">BOOK</button> -->
                    <a href="services"><button id="btn1" type="button" class="btn book_services_btn text-light">BOOK</button></a>
                    
                </div>
            </div>
        </div>
        <div id="box2"
             class="align-items-sm-center col-md-4 col-sm-12 d-md-flex flex-md-column d-sm-flex nurse-at-home_div"
             style="border-right: 2px solid #898686;">
            <div class=" nearse_image"><img src="{{ URL::asset('images/nurse-at-home(2).png')}}" alt="" class="w-75">
            </div>
            <div class="" style="width: 100%; margin: auto;">
                <h2 class="Nurse_at_home_text text-center">NURSE CARE</h2>
                <div class="book_btn text-center">
                    <button id="btn2" type="button" onclick="showForm(2)" class="btn book_services_btn text-light">BOOK</button>
                </div>
            </div>
        </div>
        <div id="box3" class="align-items-sm-center col-md-4 col-sm-12 d-md-flex flex-md-column d-sm-flex lab_test_div">
            <div class="text-center lab_img lab_test"><img src="{{ URL::asset('images/lab-test(2).png')}}" alt=""
                                                           class="w-75"></div>
            <div class="" style="width: 100%; margin: auto;">
                <h2 class="LAB_TEST_AT_HOME_text text-center">LAB TEST</h2>
                <div class="book_btn text-center">
                    <button id="btn3" type="button" onclick="showForm(3)" class="btn book_services_btn text-light">BOOK</button>
                </div>
            </div>
        </div>

        <div id="box4" class="col-md-6 d-none col-sm-12">
            @include('web.book_now')
        </div>

    </div>
</div>

<div class="mb-4 row why_us_desktop px-md-5" style="background: #efefef; margin-left: 0px; margin-right: 0px;">
    <div class="pt-4 pb-3 w-100 col-sm-12"><h1 class="text-center why_us w-100">WHY SUKAII</h1></div>
    <div class="row" style=" margin-left: 0px; margin-right: 0px;">
        <div class="col-md-4">
            <div class="f_s_c text-center pb-4"><img src="{{ URL::asset('images/Free-Sample-Collection.png')}}" class=""
                                                     width="40%" alt="" style="border-radius: 32px;"></div>
            <div class="f_s_c_heading pb-2" style="font-family: 'Rubik', sans-serif">
                <h3 class="text-center mb-0">
                    <div class="">Sample Collected at Home</div>
                </h3>
            </div>
            <div class="f_s_c_detail">
                <p>Our trained nurse will come to your home or office to collect the blood or sample for testing.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="f_d_c pb-4"><img src="{{ URL::asset('images/Free-Doctor-Consultation.png')}}" class=""
                                         width="40%" alt="" style="border-radius: 32px;"></div>
            <div class="f_d_c_heading pb-2" style="font-family: 'Rubik', sans-serif">
                <h3 class="text-center mb-0">
                    <div class="">State-of-the-art Diagnostics</div>
                </h3>
            </div>
            <div class="f_d_c_detail">
                <p>Samples are analyzed in state-of-the-art labs through our accredited partners</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="f_sp_c pb-4"><img src="{{ URL::asset('images/Free-Smart-Reports.png')}}" class="" width="40%"
                                          alt="" style="border-radius: 32px;"></div>
            <div class="f_sp_c_heading pb-2" style="font-family: 'Rubik', sans-serif">
                <h3 class="text-center mb-0">
                    <div>Sukaii Report</div>
                </h3>
            </div>
            <div class="f_sp_c_detail">
                <p>Our proprietary report format finally allows you to understand the results of your tests and track
                    your health over time.</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
</div>
</div>
<div class="row d-block d-md-none" id="recommeded_to_mobile">
    <div class="pt-4 pb-3 w-100 col-sm-12"><h1 class="text-center why_us w-100">BENEFITS</h1></div>
    <div class="row">
        <div class="align-items-center col-sm-12 d-flex free_sample_collection_div mb-3">
            <div class="free text-center"><img src="{{ URL::asset('images/patient_center.PNG')}}" alt="" class="w-75">
            </div>
            <div class="text-justify w-75 px-2">
                <h5 class=" mb-1 saht">SERVICES AT HOME</h5>
                <p>Get basic healthcare services in the comfort and safety of your home.</p>
            </div>
        </div>
        <div class="align-items-center col-sm-12 d-flex free_sample_collection_div mb-3">
            <div class="free text-center"><img src="{{ URL::asset('images/ontime_service.PNG')}}" alt="" class="w-75">
            </div>
            <div class="text-justify w-75 px-2">
                <h5 class=" mb-1 saht">CONVENIENT</h5>
                <p>Book online and schedule the visit</p>
            </div>
        </div>
        <div class="align-items-center col-sm-12 d-flex free_sample_collection_div mb-3">
            <div class="free text-center"><img src="{{ URL::asset('images/patient_center.PNG')}}" alt="" class="w-75">
            </div>
            <div class="text-justify w-75 px-2">
                <h5 class=" mb-1 saht">PATIENT FIRST</h5>
                <p>We put you first and believe you should have fast and easy access to your healthcare</p>
            </div>
        </div>
        <div class="align-items-center col-sm-12 d-flex free_sample_collection_div mb-3">
            <div class="free text-center"><img src="{{ URL::asset('images/fast_and_accurate.PNG')}}" alt=""
                                               class="w-75"></div>
            <div class="text-justify w-75 px-2">
                <h5 class=" mb-1 saht">FAST & ACCURATE</h5>
                <p>Our network of licensed labs ensure your results are accurate and delivered on-time</p>
            </div>
        </div>
        <div class="align-items-center col-sm-12 d-flex free_sample_collection_div mb-3">
            <div class="free text-center"><img src="{{ URL::asset('images/nurse_and_tecnitian.PNG')}}" alt=""
                                               class="w-75"></div>
            <div class="text-justify w-75 px-2">
                <h5 class=" mb-1 saht">CERTIFIED NURSES</h5>
                <p>Our nurses are certified and trained to ensure you get the highest quality care</p>
            </div>
        </div>

        <div class="align-items-center col-sm-12 d-flex free_sample_collection_div mb-3">
            <div class="free text-center"><img src="{{ URL::asset('images/safe_and_secured.PNG')}}" alt="" class="w-75">
            </div>
            <div class="text-justify w-75 px-2">
                <h5 class=" mb-1 saht">COST EFFECTIVE</h5>
                <p>We eliminate the high overheads of hospitals and pass the savings to you</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="d-md-block d-none recommeded_to_desktop row" id="recommeded_to_desktop" style="margin-bottom: 5rem;">
        <div class="pt-4 pb-3 w-100"><h1 class="mb-4 text-center we_are_commited_to">BENEFITS</h1></div>
        <div class="row ">
            <div class="col-md-4 col-sm-12">
                <div class="s_a_h" style=" margin-top: 3rem;">
                    <div class="s_a_h_img"><img src="{{ URL::asset('images/service_at_home.PNG')}}" alt=""></div>
                    <h3 style="padding-top: 5rem; font-size: 1.4rem;">SERVICE AT HOME</h3>
                    <p class="s_a_h_detail">Get basic healthcare services in the comfort and safety of your home</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="s_a_h" style=" margin-top: 3rem;">
                    <div class="s_a_h_img"><img src="{{ URL::asset('images/ontime_service.PNG')}}" alt=""></div>
                    <h3 style="padding-top: 5rem; font-size: 1.4rem;"> CONVENIENT</h3>
                    <p class="s_a_h_detail text-center">Book online and schedule the visit</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="s_a_h" style=" margin-top: 3rem;margin-bottom: 10px;">
                    <div class="s_a_h_img"><img src="{{ URL::asset('images/patient_center.PNG')}}" alt=""></div>
                    <h3 style="padding-top: 5rem; font-size: 1.4rem;">PATIENT FIRST</h3>
                    <p class="s_a_h_detail">We put you first and believe you should have fast and easy access to your
                        healthcare</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="s_a_h" style=" margin-top: 5rem;">
                    <div class="s_a_h_img"><img src="{{ URL::asset('images/fast_and_accurate.PNG')}}" alt=""></div>
                    <h3 style="padding-top: 5rem; font-size: 1.4rem;">FAST & ACCURATE</h3>
                    <p class="s_a_h_detail">Our network of licensed labs ensure your results are accurate and delivered
                        on-time</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="s_a_h" style=" margin-top: 5rem;">
                    <div class="s_a_h_img"><img src="{{ URL::asset('images/nurse_and_tecnitian.PNG')}}" alt=""></div>
                    <h3 style=" padding-top: 5rem; font-size: 1.4rem;">CERTIFIED NURSES</h3>
                    <p class="s_a_h_detail" style="padding-bottom:1rem;">Our nurses are certified and trained to ensure
                        you get the highest quality care</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="s_a_h" style=" margin-top: 5rem;">
                    <div class="s_a_h_img"><img src="{{ URL::asset('images/safe_and_secured.PNG')}}" alt=""></div>
                    <h3 style="padding-top: 5rem; font-size: 1.4rem;">COST EFFECTIVE</h3>
                    <p class="s_a_h_detail">We eliminate the high overheads of hospitals and pass the savings to you</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{--<div class="top"><a href="#Header"><span><i class="fas fa-arrow-up"></i></span></a></div>--}}
<div class="row footer" style="background-color: #7e7e7e;  padding-left: 10%; padding-right: 10%;">
    <div class="col-md-3 ">
        <h5>ABOUT US</h5>
        <p class="about_us_footer">Sukaii was created with a simple vision, that healthcare should not require a trip to
            the hospital. Through technology and the best patient-centric care, we aim to deliver on this vision.</p>
    </div>
    <div class="col-md-3 ">
        <h5>OUR SERVICES</h5>
        <ul>
            <li class="our_services_list"><span>Nurses Service at Home</span></li>
            <li class="our_services_list"><span>Elderly Caregiver</span></li>
            <li class="our_services_list"><span>Lab test</span></li>
        </ul>
    </div>
    <div class="col-md-3">
        <h5>QUIK LINKS</h5>
        <ul>
            <li class="quik_link_list"><span>Home</span></li>
            <li class="quik_link_list"><span>FAQ</span></li>
            <li class="quik_link_list"><span>Partners with Us</span></li>
            <li class="quik_link_list"><span>Get Free Call Now </span></li>
            <li class="quik_link_list"><span>Book Appointment</span></li>
        </ul>
    </div>
    <div class="col-md-3">
        <h5>CONTACT US</h5>
        <p class="connect_us_add"><b>Address :</b> 513 Arenja Corner Sector 17 Mumbai-702</p>
        <p class="connect_us_email"><b>Email :</b> vashi@gbtech.in</p>
        <p class="connect_us_call"><b>Call : </b>+91 1234567890</p>
    </div>
    <p class="text-center copy_write">Copyright <span><i class="far fa-copyright"></i></span> 2021 sukaii. All Rights
        Reserved.</p>
</div>
</body>


<script>
    const mySelectedServices = [];
    $(function () {
        fetchServices();
    });

    function add_services(services) {
        services = services.split('|');

        function findIndexLogic(value, index) {
            return services[0] === value.id;
        }

        if (mySelectedServices.findIndex(findIndexLogic) == -1) {
            mySelectedServices.push({'id': services[0], 'name': services[1]});
        }
        updateItemList();
        $("#service_code").val(mySelectedServices.map(e => {
            return e.id
        }).join(","))
    }

    function fetchServices() {
        $.ajax({
            url: 'getServices',
            type: 'get',
            success: function (response) {
                response = JSON.parse(response);
                if (response.status == 200) {
                    let options = response.body.map(function (serviceOject) {
                        return `<option value="${serviceOject.id}|${serviceOject.service_name}">${serviceOject.service_name}</option>`
                    });
                    $("#sukaii_services").empty();
                    $('#sukaii_services').select2();
                    $("#sukaii_services").append(options.join(""));
                } else {
                    console.log(response.data);
                }
            }
        });
    }

    function updateItemList() {
        let items = mySelectedServices.map(function (serviceName, index) {
            return `<div class="list list-1 form-control mb-2" id="list-${index}">
            <span><i class="fas fa-times" id="remove_${index}" onclick="remove_service(${index})"></i></span>
            <label for="service_1" class="mb-0 pl-4"><b>${serviceName.name}</b>
            </label><br>
            </div>`;
        });
        let add_here = document.getElementById('service_form');
        $("#service_form").empty();
        $("#service_form").append(items.join(""));
    }

    function remove_service(id) {
        document.getElementById(`list-${id}`).remove();
        mySelectedServices.splice(id, 1);
        updateItemList();
        $("#service_code").val(mySelectedServices.map(e => {
            return e.id
        }).join(","))
    }


    function showForm(type) {
        let name  = '{{session('name')}}';
        $('#OrderNow').trigger('reset');
        $('#patient_name').val(name);
        @if(session()->has('id'))
        if (type === 1) {
            $('#btn1').hide();
            $('#type').val('1');
            $('#service_code').val('1479');
            $('#service_box').hide();
            $('#box1').attr('style', 'display:block!important');
            $('#box2').attr('style', 'display:none!important');
            $('#box3').attr('style', 'display:none!important');
            $('#box4').attr('style', 'display:block!important');
        } else if (type == 2) {
            $('#btn2').hide();
            $('#type').val('2');
            $('#service_code').val('1480');
            $('#service_box').hide();
            $('#box1').attr('style', 'display:none!important');
            $('#box2').attr('style', 'display:block!important');
            $('#box3').attr('style', 'display:none!important');
            $('#box4').attr('style', 'display:block!important');
        } else if (type == 3) {
            $('#btn3').hide();
            $('#type').val('3');
            $('#service_box').show();
            $('#schedule_end').hide();
            $('#box1').attr('style', 'display:none!important');
            $('#box2').attr('style', 'display:none!important');
            $('#box3').attr('style', 'display:block!important');
            $('#box4').attr('style', 'display:block!important');
        } else {
            $('#btn1').show();
            $('#btn2').show();
            $('#btn3').show();
            $('#type').val("");
            $('#service_box').hide();
            $('#schedule_end').hide();
            $('#box1').attr('style', 'display:block!important');
            $('#box2').attr('style', 'display:block!important');
            $('#box3').attr('style', 'display:block!important');
            $('#box4').attr('style', 'display:none!important');
        }
        @else
        $('#BookNoWErrorModal').toggle();
        @endif
    }
</script>

</html>
