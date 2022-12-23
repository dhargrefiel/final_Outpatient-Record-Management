<?php
  ob_start();
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Fields of Physicians\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";
  require_once "mainBackend.php";
  require_once('header.php');
  require_once('footer.html');

  $outpatient = new Hardware();
  $fieldsRecords = $outpatient->fieldsRecord();
  $del_Add_FieldsRecords = $outpatient->del_Add_FieldsRecord();
  $delID = $outpatient->delID();
  ob_end_flush();
?>
<br>

<div class="container-fluid">

  <div class="row">
    <div class="col-xl-8 col-lg-8">

      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <!-- Page Heading -->
          <h5 class="mb-2 text-gray-800">Fields of Physicians</h5>

        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form method="POST" name="form" action="fieldsOfPhysicians.php">
            <div class="table">
              <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fields Name</th>
                    <th class='text-center'>Description</th>
                    <th class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($fieldsRecords){ $counter = 0; ?>
                    <?php foreach($fieldsRecords as $record): $counter += 1;?>
                      <tr>
                        <td><?= $record['fp_id'];?></td>
                        <td><?= $record['fp_name'];?></td>
                        <td><?= $record['fp_description'];?></td>
                        <td width="13%" class='text-center'>
                          <a href="fieldsUpdate.php?fp_id=<?=$record['fp_id'];?>" class="mr-4" title="Update Record"
                            data-toggle="tooltip">
                            <i class="fa fa-edit"></i></a>
                          <div id="del" style="display: inline;">
                            <a href="#" onclick="$('.delete_id').val('<?=$record['fp_id'];?>')" data-id="<?=$record['fp_id'];?>"
                              data-toggle="modal" data-target="#delFieldModal" title='Delete Record'
                              data-toggle='tooltip'>
                              <i class="fas fa-trash-alt"></i></a>
                            </a>
                          </div>
                          <!-- Delete Patient Record Modal-->
                          <div class="modal fade" id="delFieldModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Field Record</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure you want to delete this record?</p>
                                  <input hidden name="delete_id" class="delete_id">
                                </div>

                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                  <button name="deleteFieldsRecord" onclick="deleteRecord()" type="submit" class="btn btn-success btn-icon-split">
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

    <div class="col-xl-4 col-lg-4">

      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">

          <!-- Page Heading -->
          <h5 class="mb-2 text-gray-800">Add New Field </h5>

        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-12">
                <input required type="text" name="fp_name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-6 col-form-label">Description: </label>
              <div class="col-sm-12">
                <textarea class="form-control" name="fp_description" rows="3"></textarea>
              </div>
            </div>
            <button style="margin-left:200px;" type="submit" class="btn btn-success btn-icon-split"
              name="addFields">
              <span class="icon text-white-100">
                <i class="fas fa-arrow-right"></i>
                Add Field
              </span>
            </button>
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