<x-header/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4>Order Details</h4>
				<div class="card-header-action">
					<!--  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
				</div>
			</div>
			<div class="card-body">
				<table id="order_details" class="table table-hover">
					<thead>
						<tr>
							<td>Patient Name</td>
							<td>Customer Name</td>
							<td>Service Name</td>
							<td>From Date</td>
							<td>To Date</td>
							<td>Location</td>
							<td>Actions</td>
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


<!-- Modal -->
<div class="modal " id="fileUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Report Upload</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" action="UploadFile">
					@csrf
					<input type="hidden" name="order_id" id="order_id" value="">
					<input type="hidden" name="service_id" id="service_id" value="">
					<input type="hidden" name="type" id="type" value="">

					<input type="file" name="report" class="form-group">
					<button type="button" class="btn btn-secondary float-right" style="margin-left: 15px;" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary float-right">
				</form>
			</div>
		</div>
	</div>
</div>

<x-footer/>
<script>
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$(document).ready(function() {
		$('#order_details').DataTable();
	} );


	function updateStatus(id,service_id,type)
	{
		$.ajax({
			url: 'updateStatus',
			type: 'post',
			data: {_token: CSRF_TOKEN,id: id,service_id:service_id,type:type},
			success: function(response){
				if(response.status === 200)
				{
					document.location.reload(true);
					console.log(response.data);
				}
				else if(response.status === 301)
				{
					alert(response.data);
				}
				else
				{
					console.log(response.data);
				}
			}
		});
	}



	$('#fileUpload').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var id = button.data('id');
		var service_id = button.data('service_id');
		var type = button.data('type');

		$('#order_id').val(id);
		$('#service_id').val(service_id);
		$('#type').val(type);
	});
</script>
