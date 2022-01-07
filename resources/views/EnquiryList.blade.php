{{--<x-header/>--}}
@include('components.adminPanel')
<div class="section">
    <div class="section-header">
        <h1 class="ml-3">Enquiry List</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="enquiry" class="table table-striped table-responsive-sm table-hover">
                        <thead>
                        <tr>
                            <td>Patient Name</td>
                            <td>Mobile No</td>
                            <td>Service</td>
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
        $('#enquiry').DataTable();
    });

</script>
