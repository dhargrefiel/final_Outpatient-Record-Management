<?php
  ob_start();
  require_once('header.php');
  require_once('footer.html');
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"View Doctor Record\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/

  $getDoctorRecords = $outpatient->getDoctorRecord();
  $getDoctorFindings = $outpatient->getDoctorFindings();
  $findingsRecords = $outpatient->findingsRecord();

  
  ob_end_flush();
?>

<!-- Begin Page Content -->
<div class="container-fluid">



  <div class="align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Doctor Records</h1>
  </div>

  <div class="row">
    <!-- Begin of Row -->

    <div class="col-xl-8 col-md-8 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="textColorBlue text-xs font-weight-bold  text-uppercase mb-1">DOCTOR'S NAME</div>
            </div>
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                &nbsp&nbsp&nbsp&nbsp&nbsp
                <?= "Dr. ".$getDoctorRecords['d_fname']. " ". $getDoctorRecords['d_mname']. " " .$getDoctorRecords['d_lname']?>
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
              <div class="text-xs font-weight-bold textColorBlue text-uppercase mb-1">DOCTOR'S ID</div>
            </div>
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <?= $getDoctorRecords['d_id'] ?>
                <!-- <//?php echo "P-0".$get_data->pr_id ?> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div><!-- End of Row -->

  <div class="row">

    <!-- Findings Box -->
    <div id="findings" class="col-xl-12 col-lg-12">

      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          
          <h6 class="m-0 font-weight-bold textColorBlue">
            <a href="doctorsList.php" class="text-secondary" data-toggle="tooltip">
              <i class="fa fa-arrow-left"></i>
            </a>
          </h6>
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
            <form method="POST">
              <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Complaint</th>
                    <th>History of Present Illness</th>
                    <th>Date Consulted</th>                    
                    <th class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($getDoctorFindings){ $counter = 0; ?>
                  <?php foreach($getDoctorFindings as $record): $counter += 1;?>
                  <tr>
                    <td><?= $record['a_fname']." ".$record['a_mname']." ".$record['a_lname'];?></td>
                    <td><?= $record['a_gender'];?></td>
                    <td><?= $record['a_age'];?></td>
                    <td><?= $record['a_complaint'];?></td>
                    <td><?= $record['a_historypresentillness'];?></td>
                    <td><?= $record['a_date'];?></td>
                    <td class='text-center'>
                      <a href="d_findingsView.php?d_id=<?=$getDoctorRecords['d_id'];?>&a_id=<?=$record['a_id'];?>"
                         title="View Record" data-toggle="tooltip">
                        <i class="fa fa-eye"></i>
                      </a>
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

  

  <div class="row">
    <!-- Begin Row -->

    <!-- First Column -->
    <div class="col-lg-12">

      <!-- Details -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold textColorBlue">Details 
          <a style="float: right; text-decoration:none;"
            href="doctorRecordsUpdate.php?d_id=<?=$record['d_id'];?>" class="text-secondary"
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
            <div class="h5 mb-1 font-weight-bold text-gray-800 "><?= $getDoctorRecords['d_address'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Age</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $getDoctorRecords['d_age'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gender</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $getDoctorRecords['d_gen'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Contact Number</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $getDoctorRecords['d_number'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Field of Physician</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $getDoctorRecords['d_field'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Hospital Ward</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $getDoctorRecords['d_ward'] ?></div>
          </div>

                    <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Date Added</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800"><?= $getDoctorRecords['d_date'] ?></div>
          </div>


        </div>
        <!--Card body end tag -->
      </div>

    </div>
  </div>
  <!-- end of row -->
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

