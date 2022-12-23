<?php
  ob_start();
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Doctor Record\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/
  require_once "mainBackend.php";
  require_once('header.php');
  require_once('footer.html');

  $outpatient = new Hardware();
  $doctorRecords = $outpatient->doctorRecord();
  $deleteDoctorRecords = $outpatient->deleteDoctorRecord();
  ob_end_flush();
?>
<br>

<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">

		<div class="card-header py-3">

			<!-- Page Heading -->
			<h5 class="mb-2 text-gray-800">Doctor Details Table <a style="margin-left: 700px;">
				<a style="background-color: #ECAC3D; border-color: #ECAC3D; float: right;" href="doctorform.php" class="btn btn-success pull-right"><i
					class="fa fa-plus"></i> Add New Doctor</a>
				</a>
			</h5>

		</div>
		<div class="card-body">
			<div class="table">
			<form method="POST" name="form" action="doctorsList.php">
				<table id="dataTable" class="table table-bordered table-hover" >
						<thead>
						<tr>
							<th>ID</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Field</th>
							<th>Ward</th>
							<th>Date Added</th>
							<th class='text-center'>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php if($doctorRecords){ $counter = 0; ?>
							<?php foreach($doctorRecords as $record): $counter += 1;?>
								<tr>
									<td><?= $record['d_id'];?></td>
									<td><?= $record['d_lname'];?></td>
									<td><?= $record['d_fname'];?></td>
									<td><?= $record['d_mname'];?></td>
									<td><?= $record['d_field'];?></td>
									<td><?= $record['d_ward'];?></td>
									<td><?= $record['d_date'];?></td>
									<td width="13%" class='text-center'>
										<a href="doctorRecordsView.php?d_id=<?=$record['d_id'];?>" class="mr-4" title="View Record" data-toggle="tooltip">
											<i class="fa fa-eye"></i></a>
										<a href="doctorRecordsUpdate.php?d_id=<?=$record['d_id'];?>" class="mr-4" title="Update Record" data-toggle="tooltip">
											<i class="fa fa-edit"></i></a>	
										<div id="del" style="display: inline;" >
											<a href="#" onclick="$('.delete_id').val('<?=$record['d_id'];?>')" data-id="<?=$record['d_id'];?>" data-toggle="modal"  data-target="#delPatientRecordModal"  title='Delete Record' data-toggle='tooltip' >
												<i class="fas fa-trash-alt"></i></a>
											</a>
										</div>
										<!-- Delete Patient Record Modal-->
										<div class="modal fade" id="delPatientRecordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
											aria-hidden="true">
											<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Delete Doctor Record</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
												</div>
												<div class="modal-body">
													<p id="delStatement" >Are you sure you want to delete this record?</p>
													<input hidden name="delete_id" class="delete_id">
										
												</div>

												<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
												<button name="deleteDoctorRecord" onclick="deleteRecord()" type="submit" class="btn btn-success btn-icon-split">
													<span class="icon text-white-100">Delete</span>
												</button>
												</div>
											</div>
											</div>
										</div>
											
									</td>
								</tr>
							<?php endforeach; ?>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>

</div>




<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>


<script>

function deleteRecord() {
var id = $(".delete_id").val();

	$.ajax({
	url:"/delete.php",
	method:"POST",
	data:{
	id: id,
	},
	success:function(response) {
	
},
});
} 
</script>