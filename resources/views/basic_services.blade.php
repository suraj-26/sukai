<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Checkup</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
        
        .frontend_div,
        .html_div,
        .js_div,
        .css_div {
            border-radius: 20px;
        }
        
        .frontend_div {
            box-shadow: 0px 0px 6px 0px gray;
            background: #11b6b9ba;
        }
        
        .frontend_div:hover {
            box-shadow: 0px 0px 9px 1px gray;
        }
        
        #add_to_card {
            background: #f957b5;
        }
        #add_to_card:hover {
            background: #f957b5 !important;
        }
        
        .service_price b,
        .frend_end_heading {
            font-family: 'Rubik', sans-serif !important;
        }
    </style>
</head>

<body>
    <!-- <div id="header"></div> -->
    @include('web.web_header')
    <div class="container">
        <div class="hay_there mb-5">
            <!-- <div class="detail_header"><h1>Hey there! <span><i class="far fa-thumbs-up"></i></span></h1></div>
            <div class="detail_discription">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde natus obcaecati, recusandae totam deserunt saepe repudiandae molestiae sint temporibus error! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque, sed illum dolore ipsa eius velit possimus quos laborum corrupti distinctio!</div> -->
        </div>
        <div class="row lang_roadmap">
            <div class="col-md-12 ">
                <div class="row mb-4">
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11 border frontend_div">
                                <div class="frontend">
                                    <a href="select_basic_services" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Heakth Checkup</h1>
                                            <img src="images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <a href="select_nurse_form"><button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"> <b>Add to Cart </b></button></a>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11 border frontend_div">
                                <div class="frontend">
                                    <a href="#" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Preliminary Test</h1>
                                            <img src="./images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <!-- <h1 class="frend_end_heading h2">Backend</h1> -->
                                    <p>Step by step guide to become a Back end devloper in 2022.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"><b>Add to Cart </b></button>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11  border frontend_div">
                                <div class="frontend">
                                    <a href="#" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Diabetic Checkup </h1>
                                            <img src="./images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <!-- <h1 class="frend_end_heading h2">Frontend</h1> -->
                                    <p>Step by step guide to become a DevOps devloper in 2022.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"><b>Add to Cart </b></button>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11  border frontend_div">
                                <div class="frontend">
                                    <a href="#" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Kidney Evaluation</h1>
                                            <img src="./images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <!-- <h1 class="frend_end_heading">Frontend</h1> -->
                                    <p>Step by step guide to become a React devloper in 2022.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"> <b>Add to Cart </b> </button>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11  border frontend_div">
                                <div class="frontend">
                                    <a href="#" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Liver Evaluation</h1>
                                            <img src="./images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <!-- <h1 class="frend_end_heading">Frontend</h1> -->
                                    <p>Step by step guide to become a Angular devloper in 2022.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"><b>Add to Cart </b></button>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11  border frontend_div">
                                <div class="frontend">
                                    <a href="#" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Cardiac Evaluation</h1>
                                            <img src="./images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <!-- <h1 class="frend_end_heading">Frontend</h1> -->
                                    <p>Step by step guide to become a Android devloper in 2022.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"><b>Add to Cart </b></button>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11  border frontend_div">
                                <div class="frontend">
                                    <a href="#" style="text-decoration: none; " class="text-dark">
                                        <div class="align-items-center d-flex justify-content-between">
                                            <h1 class="frend_end_heading h5 pt-2 ">Other Investigations</h1>
                                            <img src="./images/ealdrly_img(2).png" alt="Frontend" width="30%" class="pl-3 py-2">
                                        </div>
                                    </a>
                                    <!-- <h1 class="frend_end_heading">Frontend</h1> -->
                                    <p>Step by step guide to become a Python devloper in 2022.</p>
                                    <div class="add align-items-center d-flex justify-content-between mb-2">
                                        <button type="button" class="btn btn-primary border-0 btn-sm" id="add_to_card"><b>Add to Cart </b></button>
                                        <button type="button" class="btn border-danger text-danger btn-sm" style="display: none;" id="remove_from_add"> Remove </button>
                                        <h6 class="mb-0 ml-2 service_price"><b>Rs. 366/-</b></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                        </div>
                    </div>
                    <!-- <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10  border frontend_div">
                                <div class="frontend">
                                    <div class="align-items-center d-flex justify-content-between">
                                        <h1 class="frend_end_heading h5 pt-2 ">Go</h1>
                                        <img src="../image/go.png" alt="go" width="46%" class="mb-2 mt-1 pl-3 py-3">
                                    </div>
                                    <p>Step by step guide to become a Go devloper in 2022.</p>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-4 ">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10  border frontend_div">
                                <div class="frontend">
                                    <div class="align-items-center d-flex justify-content-between">
                                        <h1 class="frend_end_heading h5 pt-2 ">Java</h1>
                                        <img src="../image/java.png" alt="go" width="33%" class="pl-3 py-2">
                                    </div>
                                    <p>Step by step guide to become a Java devloper in 2022.</p>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="toast">
            <div class="toast-header">
                Toast Header
            </div>
            <div class="toast-body">
                Some text inside the toast body
            </div>
        </div>
    </div>
    
    @include('web.web_footer')
</body>
<!-- <script src="./javascript/javascript.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // $(function() {
    //     $("#header").load("header.html");
    //     // $("#footer").load("footer.html");
    // });
    // $("#add_to_card").click(function(){
    //     $(this).hide();
    //     $("#remove_from_add").show();
    // });
    $("#remove_from_add").click(function() {
        $(this).hide();
        $("#add_to_card").show();
    });
</script>

</html>