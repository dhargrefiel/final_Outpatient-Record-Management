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
  $doctorFindingsRecords = $outpatient->doctorFindingsRecord();
  

  
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
    <!-- Begin Row -->

    <!-- First Column -->
    <div class="col-lg-12">

      <!-- Details -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="doctorRecordsView.php?d_id=<?=$getDoctorRecords['d_id'];?>" class="text-secondary" data-toggle="tooltip">
              <i class="fa fa-arrow-left"></i>
          </a>
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
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Patient Name</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800 "><?= $doctorFindingsRecords['a_fname']." ".$doctorFindingsRecords['a_mname']." ".$doctorFindingsRecords['a_lname'] ?></div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gender</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_gender']): ?>
                <?php echo $doctorFindingsRecords['a_gender']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Age</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_age']): ?>
                <?php echo $doctorFindingsRecords['a_age']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Chief Complaint</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_complaint']): ?>
                <?php echo $doctorFindingsRecords['a_complaint']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
              </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">History of Present Illness</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_historypresentillness']): ?>
                <?php echo $doctorFindingsRecords['a_historypresentillness']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Blood Pressure</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_bp']): ?>
                <?php echo $doctorFindingsRecords['a_bp']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Respiratory Rate</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_rr']): ?>
                <?php echo $doctorFindingsRecords['a_rr']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Capillary Refill</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_cr']): ?>
                <?php echo $doctorFindingsRecords['a_cr']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Temperature</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_temp']): ?>
                <?php echo $doctorFindingsRecords['a_temp']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Weight</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_wt']): ?>
                <?php echo $doctorFindingsRecords['a_wt']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Pulse Rate</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_pr']): ?>
                <?php echo $doctorFindingsRecords['a_pr']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Physical Examination</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_physicalexam']): ?>
                <?php echo $doctorFindingsRecords['a_physicalexam']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Diagnosis</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_diagnosis']): ?>
                <?php echo $doctorFindingsRecords['a_diagnosis']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:18px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Medication/Treatment</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_medication']): ?>
                <?php echo $doctorFindingsRecords['a_medication']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
          </div>

          <div style="margin-bottom:17px;">
            <div class="row no-gutters">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Date Consulted</div>
            </div>
            <div class="h5 mb-1 font-weight-bold text-gray-800">
              <?php if($doctorFindingsRecords['a_date']): ?>
                <?php echo $doctorFindingsRecords['a_date']; ?>
              <?php else: ?>
                <p>N/A</p>
              <?php endif; ?>
            </div>
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