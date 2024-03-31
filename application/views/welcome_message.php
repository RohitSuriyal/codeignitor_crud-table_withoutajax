<?php $this->load->view("common/header") ?>
<div class="container">
	<button id="add_button" class="btn btn-primary" style="width:100%;">+Add</button>
	<div class="table-responsive">
		<br />
		<table id="practice" class="table table-bordered table-striped">
			<thead>
				<tr>



					<th width="20%">title</th>
					<th width="10%">image</th>
					<th width="10%">languages</th>
					<th width="10%">status</th>
					<th width="10%">view</th>
					<th width="10%">update</th>
					<th width="10%">delete</th>











					<!-- <th width="35%">Pasword</th>   -->

				</tr>
			</thead>
		</table>
	</div>

	<!-- modal for the add -->
	<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="addform">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Title</label>
								<input name="title" id="title" class="form-control">

							</div>

						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>image</label>
								<input name="image" id="image" class="form-control">

							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>languages</label>
								<input name="languages" id="languages" class="form-control">

							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Status</label>
								<input name="status" id="status" class="form-control">

							</div>

						</div>
					</form>
					<button id="submitadd" class="btn btn-success mt-3  " style="width:100%;">Submit</button>





				</div>




			</div>


		</div>
	</div>
</div>





</div>



<!-- Modal of the view -->
<div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">


				<div class="form-container">
					<ul class="list-group list-group-horizontal-xl  d-flex flex-row justify-content-center mb-3  ">
						<li class="list-group-item first font-weight-bold " style="width:30%;margin-right:4%; ">Title :</li>
						<li id="titleview" class="list-group-item second">A second item</li>

					</ul>
					<ul class="list-group list-group-horizontal-xl  d-flex flex-row justify-content-center mb-3  ">
						<li class="list-group-item first font-weight-bold m"  style="width:30%;margin-right:4%; ">image :</li>
						<li id="imageview" class="list-group-item second">A second item</li>

					</ul>
					<ul class="list-group list-group-horizontal-xl  d-flex flex-row justify-content-center mb-3  ">
						<li class="list-group-item first font-weight-bold" style="width:30%;margin-right:4%;  ">languauges :</li>
						<li id="languagesview" class="list-group-item second">A second item</li>

					</ul>
					<ul class="list-group list-group-horizontal-xl  d-flex flex-row justify-content-center mb-3  ">
						<li class="list-group-item first font-weight-bold" style="width:30%;margin-right:4%; ">languauges :</li>
						<li id="statusview" class="list-group-item second">A second item</li>

					</ul>








				</div>

			</div>
		</div>
	</div>





</div>


<!-- Modal of the update -->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="formupdate">
					<div class="form-row">
						<div class="form-group col-md-12">
							<label>Title</label>
							<input name="titleupdate" id="titleupdate" class="form-control">

						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label>image</label>
							<input name="imageupdate" id="imageupdate" class="form-control">

						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>languages</label>
								<input name="languagesupdate" id="languagesupdate" class="form-control">

							</div>
							<div class="form-group col-md-12">
								<label>Status</label>
								<input name="statusupdate" id="statusupdate" class="form-control">

							</div>



						</div>


					</div>
				</form>
				<button id="updatesubmit" class="btn btn-primary mt-3 " style="width:100%">Submit</button>


			</div>
		</div>
	</div>





</div>
<input type="hidden" id="id" value="">





<?php $this->load->view("common/footer")  ?>
<script>
	console.log("rohit singh suriyal");
	$("#practice").DataTable({

		"processing": true,
		"serverSide": true,
		"order": [],

		"ajax": {
			url: "<?php echo base_url("Welcome/table")   ?>",
			type: "POST",

		},
		"columnDefs": [{

			"orderable": false,
			"targets": [],


		}, ],


	})


	// for the add button first
	$("#add_button").on("click", function() {
		$("#addform")[0].reset();
		$("#addmodal").modal("show");
	})
	//for sending the add modal data to the database
	$("#submitadd").on("click", function() {

		var form_data = $("#addform").serialize();

		$("#addmodal").modal("show");
		$.ajax({
			url: "<?php echo base_url("Crud_table/send_data") ?>",
			method: "post",
			data: form_data,
			success: function(data) {
				console.log(data);
				$("#addmodal").modal("hide");

				$('#practice').DataTable().ajax.reload();


			}







		})



	})
	//for the view button
	$(document).on("click", ".view", function() {
		const id = $(this).attr("id");
		$("#viewmodal").modal("show");
		$.ajax({
			url: "<?php echo base_url("Crud_table/view") ?>",
			method: "post",
			dataType: "json",
			data: {
				id: id,

			},
			success: function(data) {
				console.log(data[0].title);
				$("#titleview").text(data[0].title);
            $("#imageview").text(data[0].image);
            $("#languagesview").text(data[0].language);
            $("#statusview").text(data[0].status);

			}








		})




	})

	//ajax fetch particalr data for the upadte detail
	$(document).on("click", ".update", function(e) {

		e.preventDefault();

		const id = $(this).attr("id");
		$("#id").val(id);
		$("#updatemodal").modal("show");

		$.ajax({
			url: "<?php echo base_url("Crud_table/update_fetch_data") ?>",
			method: "post",
			dataType: "json",
			data: {

				id: id,
			},
			success: function(data) {

				$("#titleupdate").val(data[0].title);
				$("#imageupdate").val(data[0].image);
				$("#languagesupdate").val(data[0].language);
				$("#statusupdate").val(data[0].status);


			}


		})




	})
	//ajax update particaular data for the update detail


	$("#updatesubmit").on("click", function() {

		var formupdate = $("#formupdate").serialize();
		formupdate += "&id=" + $("#id").val();
		$.ajax({
			url: "<?php echo base_url('Crud_table/update_send') ?>",
			method: "POST",
			data: formupdate,
			success: function(response) {

				$("#updatemodal").modal("hide");
				$('#practice').DataTable().ajax.reload()

			},
			error: function(xhr, status, error) {
				// Handle error
			}
		});
	});


	// for the deletion of the data

$(document).on("click",".delete",function(){
	console.log("rohit singh");
	console.log($(this).attr("id"));
	const id=$(this).attr("id");

	$.ajax({
		url:"<?php echo base_url("Crud_table/delete_data") ?>",
		method:"post",
		data:{
			id:id,

		},
		dataType:"json",
		success:function(data){
			alert("data successfully deleted");
			$('#practice').DataTable().ajax.reload();



		}







	})
	




})


</script>