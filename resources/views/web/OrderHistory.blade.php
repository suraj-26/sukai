@include('web.web_header');
<style>
   table{
       font-size: 14px;
   }
</style>
<div class="row">
	<div class="col-md-12 px-0">
		<div class="card">
			<div class="card-header">
				<h4>Order Summary</h4>
				<div class="card-header-action">
					<!--  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
				</div>
			</div>
			<div class="card-body">
				<table id="order_details" class="table table-striped table-hover table-md">
					<thead>
						<tr>
							<td>Customer Name</td>
							<td>Service Name</td>
							<td>Date</td>
							<td>Location</td>
							<td>Status</td>
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
