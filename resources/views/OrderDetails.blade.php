@include('components.adminPanel')
{{--<x-header/>--}}
<style>
    .nav-tabs .nav-link.active {
        color: #ec098d!important;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<div class="section">
    <div class="section-header">
        <h1 class="ml-3">Order Details</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home"
                               onclick="showData(3)" role="tab" aria-controls="home"
                               aria-selected="false">Nursing Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" onclick="showData(2)"
                               role="tab"
                               aria-controls="profile" aria-selected="false">Elderly Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" onclick="showData(1)"
                               role="tab"
                               aria-controls="contact" aria-selected="true">Lab Tests</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                <table id="nursing_details" class="table table-responsive-sm table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <td>Order Id</td>
                                        <td>Patient Name</td>
                                        <td>Customer Name</td>
                                        <td>Service Name</td>
                                        <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Location</td>
{{--                                        <td>Reports(Lab Test)</td>--}}
                                        <td>Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody id="nursing">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body">
                                <table id="elder_details" class="table table-responsive-sm table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <td>Order Id</td>
                                        <td>Patient Name</td>
                                        <td>Customer Name</td>
                                        <td>Service Name</td>
                                        <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Location</td>
{{--                                        <td>Reports(Lab Test)</td>--}}
                                        <td>Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody id="elderly">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card-body">
                                <table id="lab_details" class="table table-responsive-sm table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <td>Order Id</td>
                                        <td>Patient Name</td>
                                        <td>Customer Name</td>
                                        <td>Service Name</td>
                                        <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Location</td>
                                        <td>Reports(Lab Test)</td>
                                        <td>Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody id="lab">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>


<!-- Modal -->
<div class="modal " id="fileUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="UploadFile">
                    @csrf
                    <input type="hidden" name="order_id" id="order_id" value="">
                    <input type="hidden" name="service_id" id="service_id" value="">
                    <input type="hidden" name="type" id="type" value="">

                    <input type="file" name="report" class="form-group">
                    <button type="button" class="btn btn-secondary float-right" style="margin-left: 15px;"
                            data-dismiss="modal">Close
                    </button>
                    <input type="submit" class="btn btn-primary float-right">
                </form>
            </div>
        </div>
    </div>
</div>

<x-footer/>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function () {
        $('#nursing_details').DataTable();
        $('#elder_details').DataTable();
        $('#lab_details').DataTable();
        showData(3);
    });

    function showData(type) {
        $.ajax({
            url: 'order_details',
            type: 'post',
            data: {_token: CSRF_TOKEN, type: type},
            success: function (response) {
                $('#nursing').html('');
                $('#elderly').html('');
                $('#lab').html('');
                if (response.status === 200) {
                    if (type === 3) {
                        $('#nursing').append(response.data);
                        $('.reportFile').hide();
                    }
                    if (type === 2) {
                        $('#elderly').append(response.data);
                        $('.reportFile').hide();
                    }
                    if (type === 1) {
                        $('#lab').append(response.data);
                    }
                } else {

                }
            }
        });
    }


    function updateStatus(id, service_id, type) {
        $.ajax({
            url: 'updateStatus',
            type: 'post',
            data: {_token: CSRF_TOKEN, id: id, service_id: service_id, type: type},
            success: function (response) {
                if (response.status === 200) {
                    document.location.reload(true);
                    console.log(response.data);
                } else if (response.status === 301) {
                    alert(response.data);
                } else {
                    console.log(response.data);
                }
            }
        });
    }


    $('#fileUpload').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        var service_id = button.data('service_id');
        var type = button.data('type');

        $('#order_id').val(id);
        $('#service_id').val(service_id);
        $('#type').val(type);
    });
</script>
