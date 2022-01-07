{{--<x-header/>--}}
@include('components.adminPanel')
<div class="section">
    <div class="section-header">
        <h1 class="ml-3">Patient List</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="patients" class="table table-responsive-sm table-striped table-hover">
                        <thead>
                        <tr>
                            <td>Patient Name</td>
                            <td>Email</td>
                            <td>Mobile No</td>
                            <td>Address</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $data;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<x-footer/>
<script>
    $(document).ready(function () {
        $('#patients').DataTable();
    });

</script>
