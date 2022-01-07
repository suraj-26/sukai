{{--<x-header/>--}}
@include('components.adminPanel')
<div class="section">
    <div class="section-header">
        <h1 class="ml-3">Services List</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="services" class="table table-responsive-sm table-striped table-hover">
                        <thead>
                        <tr>
                            <td>Service Id</td>
                            <td>Name</td>
                            <td>Rate</td>
                            <td>Type</td>
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
        $('#services').DataTable();
    });

</script>
