@include('components.adminPanel')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
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
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
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
</div>
<x-footer/>
