@include('components.adminPanel')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{URL::to('patient_list')}}">
            <div class="card-icon bg-primary">
                <i class="fas fa-user-injured"></i>
            </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Patients</h4>
                </div>
                <div class="card-body">
                    <?=$patient?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{URL::to('services')}}">
            <div class="card-icon bg-danger">
                <i class="fas fa-briefcase-medical"></i>
            </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Services</h4>
                </div>
                <div class="card-body">
                    <?=$services?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{URL::to('orders_list')}}">
            <div class="card-icon bg-warning">
                <i class="fas fa-user-nurse"></i>
            </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Nursing Orders</h4>
                </div>
                <div class="card-body">
                   <?=$nursing?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{URL::to('orders_list')}}">
            <div class="card-icon bg-success">
                <i class="fas fa-hospital-user"></i>
            </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Elderly Orders</h4>
                </div>
                <div class="card-body">
                    <?=$elder?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{URL::to('orders_list')}}">
                <div class="card-icon bg-info">
                    <i class="fas fa-prescription"></i>
                </div>
            </a>

            <div class="card-wrap">
                <div class="card-header">
                    <h4>Lab Tests</h4>
                </div>
                <div class="card-body">
                    <?=$lab?>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{URL::to('enquiry')}}">
                <div class="card-icon bg-dark">
                    <i class="fas fa-question-circle"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Enquiries</h4>
                </div>
                <div class="card-body">
                    <?=$enquiry?>
                </div>
            </div>
        </div>
    </div>

</div>
<x-footer/>
