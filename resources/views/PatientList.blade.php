{{--<x-header/>--}}
@include('components.adminPanel')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Patients List</h4>
				<div class="card-header-action">
					<!--  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
				</div>
			</div>

			<div class="card-body">
				<table id="patients" class="table table-hover">
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
<x-footer/>
<script>
	$(document).ready(function() {
		$('#patients').DataTable();
	} );

</script>
