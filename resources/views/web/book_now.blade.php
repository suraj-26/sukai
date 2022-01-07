<div class="container" >
    <form action="placeOrder" id="OrderNow" method="post">
        @csrf
        <input type="hidden" name="type" id="type">
        <div class="row mb-3">
            <div class="col-md-12">
                <p class="mb-0"><b>Name</b></p>
                <input type="text" name="name" id="patient_name" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <p class="mb-0"><b>LOCATION</b></p>
                <input type="text" name="location" placeholder="Enter Your Location " id="service_location" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="service_code" id="service_code" />
              <div class="mb-3" id="service_box">
                <div class="mb-2">
                    <p class="mb-0"><b>SERVICES</b></p>
                    <select name="service" class="form-control"  id="sukaii_services" onchange="add_services(this.value)">
                    </select>
                </div>
                <div action="" id="service_form">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p class="mb-0"><b>SCHEDULE START DATE</b></p>
            <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror">
            @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6" id="schedule_end">
            <p class="mb-0"><b>SCHEDULE END DATE</b></p>
            <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror">
            @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mt-4 text-center">
            <input type="submit" class="border-light btn font-weight-bold" value="Book Now" style="background-color: #ea088b;color: white;">

        <button type="button" class="btn btn-info" onclick="showForm(4)">Cancel</button>
    </div>
</form>

</div>


