<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NURSE AT HOME</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('xss/bootstrap/bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    .list{
        background: #efefef;
    }
    .list input{
        accent-color: #ea088b;
    }
    .list label{
        color: #ea088b;
    }
    .form-control:focus{
        box-shadow: none;
        outline: none;
    }
</style>
<body>
    @include('web.web_header');
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="./images/nurse-at-home(2).png" alt="">
                </div>
            </div>
        </div>
        <form action="placeOrder" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="mb-0"><b>Name</b></p>
                    <input type="text" name="name" id="patient_name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <p class="mb-0"><b>LOCATION</b></p>
                    <select name="location" id="service_location" class="form-control">
                        <option value="LOCATION" class="form-control">LOCATION</option>
                        <option value="MUMBAI" class="form-control">MUMBAI</option>
                        <option value="GUJRAT" class="form-control">GUJRAT</option>
                        <option value="PUNE" class="form-control">PUNE</option>
                        <option value="SIKKIM" class="form-control">SIKKIM</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="mb-3">
                        <p class="mb-0"><b>SERVICES</b></p>
                        <select name="package" id="package" class="form-control">
                            <option value="1480" class="form-control">Nursing Service</option>
                            <option value="1479" class="form-control">Elderly Service</option>
                            <option value="1" class="form-control">Lab Test</option>
                        </select>
                    </div>
                    <div class="list list-1 form-control mb-2">
                        <span><i class="fas fa-times"></i></span>
                        <label for="service_1" class="mb-0 pl-4"><b>SERVICES</b>
                        </label><br>
                    </div>
                    <div class="list list-2 form-control mb-2">
                        <span><i class="fas fa-times"></i></span>
                        <!-- <input type="checkbox" id="service_1" name="service_1" value=""> -->
                        <label for="service_1" class="mb-0 pl-4"><b>SERVICES_1</b></label><br>
                    </div>
                    <div class="list list-3 form-control mb-2">
                        <span><i class="fas fa-times"></i></span>
                        <label for="service_1" class="mb-0 pl-4"><b>SERVICES_2</b></label><br>
                    </div>
                    <div class="list list-4 form-control mb-2">
                        <span><i class="fas fa-times"></i></span>
                        <label for="service_1" class="mb-0 pl-4"><b>SERVICES_3</b></label><br>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <p class="mb-0"><b>SCHEDULE START DATE</b></p>
                    <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
                    @error('start_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-10">
                    <p class="mb-0"><b>SCHEDULE END DATE</b></p>
                    <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror">
                    @error('end_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-1"></div>
            </div>
            <div class="mt-4 text-center">
                <input type="submit" class="border-light btn font-weight-bold" value="Book Now" style="background-color:#a7a5a5;">
            </div>
        </form>

    </div>
</body>
</html>