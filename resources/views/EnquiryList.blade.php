<x-header/>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Enquiry List</h4>
            </div>

            <div class="card-body">
                <table id="enquiry" class="table table-hover">
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
<x-footer/>
<script>
    $(document).ready(function() {
        $('#enquiry').DataTable();
    } );

</script>
