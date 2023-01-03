<?php
  ob_start();

  require_once('header.php');
  require_once('footer.html');

  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"View Patient Records\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

  $patientRecords = $outpatient->getPatientRecord();
  $patientFindings = $outpatient->getPatientFindings();
  $deleteFindingsRecords = $outpatient->deleteFindingsRecord();
  $getPhysicianID = $outpatient->getPhysicianID();

  ob_end_flush();
?>

<!-- Begin Page Content -->
<div class="container-fluid">



  <div class="align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Patient Records</h1>
  </div>

  <div class="row">
    <!-- Begin of Row -->

    <div class="col-xl-8 col-md-8 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="textColorBlue text-xs font-weight-bold  text-uppercase mb-1">PATIENT NAME</div>
            </div>
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                &nbsp&nbsp&nbsp&nbsp&nbsp
                <?= $patientRecords['pr_fname']. " ". $patientRecords['pr_mname']. " " .$patientRecords['pr_lname']?>
                <!-- <//?php echo $get_data->pr_lname ?>&nbsp&nbsp
                        <//?php echo $get_data->pr_fname ?>&nbsp&nbsp
                        <//?php echo $get_data->pr_mname ?> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4 ml-auto">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="text-xs font-weight-bold textColorBlue text-uppercase mb-1">Hospital Case No.</div>
            </div>
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <?= $patientRecords['pr_id'] ?>
                <!-- <//?php echo "P-0".$get_data->pr_id ?> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div><!-- End of Row -->


  <div class="row">
    <!-- Begin Row -->

    <!-- First Column -->
    <div class="col-lg-4">

      <!-- Details -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold textColorBlue">
            <a href="patientRecords.php" class="text-secondary" data-toggle="tooltip">
              <i class="fa fa-arrow-left"></i>
            </a>
            <a style="float: right; text-decoration:none;"
              href="patientRecordsUpdate.php?pr_id=<?=$patientRecords['pr_id'];?> " class="text-secondary"
              title="Update Record" data-toggle="tooltip">
              <i class="fa fa-edit"></i>
            </a>
          </h6>
        </div>
        <div class="card-body">
          <!--Card Body begin tag  -->

          <!-- <//?php if($this->session->flashdata('patientrecordoption_updated')): ?>  
          <//?php echo "<div style='#1cc88a' class='alert alert-success alert-dismissible text-center'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h6><i class='con fa fa-check'></i></h6>".$this->session->flashdata('patientrecordoption_updated') ."</div>" ?>
          <//?php endif; ?> -->

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Address</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800 "><?= $patientRecords['pr_addrs'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Age</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_age'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Birthday</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_bdate'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">BirthPlace</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_bplace'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Civil Status</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_civilstat'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gender</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_gen'] ?></div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tel/Mobile No.</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_number'] ?></div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Religion</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_religion'] ?></div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Occupation</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_occup'] ?></div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Date Added</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $patientRecords['pr_date'] ?></div>
          </div>


        </div>
        <!--Card body end tag -->
      </div>

    </div>

    <!-- Findings Box -->
    <div id="findings" class="col-xl-8 col-lg-8">

      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold textColorBlue">OPD Findings
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="col-sm-12">
            <!-- <//?php if($this->session->flashdata('add_finding_success')): ?>  
          <//?php echo "<div style='#1cc88a' class='alert alert-success alert-dismissible text-center'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h6><i class='con fa fa-check'></i></h6>".$this->session->flashdata('add_finding_success') ."</div>" ?>
           <//?php endif; ?> -->
          </div>

          <div class="table">
            <form method="POST" >
              <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="40%">History of Present Illness</th>
                    <th width="20%">Date Consulted</th>
                    <th width="20%" class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($patientFindings){ $counter = 0; ?>
                  <?php foreach($patientFindings as $record): $counter += 1;?>
                  <tr>
                    <td><?= $record['f_historypresentillness'];?></td>
                    <td><?= $record['f_date'];?></td>
                    <td class='text-center'>
                      <a href="findingsView.php?pr_id=<?=$patientRecords['pr_id'];?>&f_id=<?=$record['f_id'];?>&name=<?=$record['f_nameofphysician'];?>"
                        class="mr-4" title="View Record" data-toggle="tooltip">
                        <i class="fa fa-eye"></i></a>
                      <a href="findingsUpdate.php?pr_id=<?=$patientRecords['pr_id'];?>&f_id=<?=$record['f_id'];?> " class="mr-4"
                        title="Update Record" data-toggle="tooltip">
                        <i class="fa fa-edit"></i></a>
                      <div id="del" style="display: inline;">
                        <a href="#" onclick="$('.delete_id').val('<?=$record['f_id'];?>')"
                          data-id="<?=$record['f_id'];?>" data-toggle="modal" data-target="#delPatientRecordModal"
                          title='Delete Record' data-toggle='tooltip'>
                          <i class="fas fa-trash-alt"></i></a>
                        </a>
                      </div>
                      <!-- Delete Patient Record Modal-->
                      <div class="modal fade" id="delPatientRecordModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Findings Record</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure you want to delete this record? </p>
                              <input hidden name="delete_id" class="delete_id">

                            </div>

                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <button name="deleteFindingsRecord" onclick="deleteRecord()" type="submit"
                                class="btn btn-success btn-icon-split">
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
            </form>
            <br><br>
          </div>




        </div>

      </div>
    </div>

  </div><!-- End of Row -->
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