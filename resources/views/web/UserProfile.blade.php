@include('web.web_header')
<style>
    .user_img img{
        border-radius: 50px;
        overflow: hidden;
    }
    @media only screen and (max-width:768px){
        .user_img img{
            width: 16% !important;
        }
    }
    @media only screen and (max-width: 450px) {
        .user_img img{
            width: 35% !important;
        }
    }
    .table{
        font-size: 13px;
    }
    #orderHistory_wrapper{
        font-size: 13px;
    }
    #orderHistory_filter{
        float: right;
    }
    #orderHistory_paginate{
        float: right;
    }
    #orderHistory_length {
        margin-top: 30px
    }
</style>

<div class="container-fluid mt-3">
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

    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-5 border">
            <div class="row border-bottom">
                <div class="col-md-12 user_img text-center">
                    <img src="{{URL::asset('images/user_img.png')}}" style="width: 23%" alt="">
                </div>
            </div>
            <div class="row discription mt-3">
                <div class="col-md-12">
                    <h4 class="text-dark">Personal Details</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="UpdateProfileDetails" method="POST">
                        @csrf
                        <input type="hidden" value="<?=$User['id']?>" name="id">
                        <div class="name mb-3">
                            <p class="mb-0"><b>NAME</b></p>
                            <input type="text" name="name" value="<?=$User['name']?>" class="form-control">
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0"><b>EMAIL</b></p>
                            <input type="email"name="email" readonly value="<?=$User['email']?>"  class="form-control">
                        </div>
                        <div class="contact mb-3">
                            <p class="mb-0"><b>CONTACT</b></p>
                            <input type="number" name="contact" value="<?=$User['contact']?>"  class="form-control">
                        </div>
                        <div class="address mb-3">
                            <p class="mb-0"><b>ADDRESS</b></p>
                            <textarea name="address" id="address"  class="form-control" cols="10" rows="2"><?=$User['address']?></textarea>
                        </div>
                        <input type="submit" value="Save" class="btn btn-info w-25 mb-4">
                    </form>
                </div>
            </div>


        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-12">
                    <div class="order_summary mb-3 p-2 ">
                        <h3 class="mb-0" style="font-family:'Rubik', sans-serif !important;">Order Summary</h3>
                    </div>
                    <div class="list-group" id="list-tab" role="tablist">
                        <table id="orderHistory" class="table table-responsive-sm table-hover table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Location</th>
                                <th>Reports</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?=$data?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('#orderHistory').DataTable();
    });</script>
