{{--<x-header/>--}}
@include('components.adminPanel')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Services List</h4>
				<div class="card-header-action">
					<!--  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
				</div>
			</div>

			<div class="card-body">
				<table id="services" class="table table-hover">
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
<x-footer/>
<script>
	$(document).ready(function() {
		$('#services').DataTable();
	} );

</script>
