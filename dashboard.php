<?php
  ob_start();
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Dashboard\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/
	require_once "mainBackend.php";
	require_once('header.php');
  require_once('footer.html');

  $outpatient = new Hardware();
 
  $numberOfPatient = $outpatient->getNumberOfPatient();
  $numberOfDoctors = $outpatient->getNumberOfDoctor();
  $numberOfFields = $outpatient->getNumberOfField();
  $numberOfWards = $outpatient->getNumberOfWard();
  $recentPatientRecords = $outpatient->recentPatientRecord();
  $patientRecordsID = $outpatient->getPatientRecord();
  $dashboarDoctors = $outpatient->ourDoctor();
  $getDoctorRecords = $outpatient->getDoctorRecord();
  $getDoctorFindings = $outpatient->getDoctorFindings();
  $findingsRecords = $outpatient->findingsRecord();
  $message = $outpatient->message();
  ob_end_flush();
?>




<br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="cardBox">
    <div class="card1">
      <div>
        <div>
          <a class='numbers' href='patientRecords.php'><?= $numberOfPatient ?></a>
        </div>
        <div class="cardName">Number of Patient </div>
      </div>
      <div class="iconBx">
        <ion-icon name="document-text-outline"></ion-icon>
      </div>
    </div>
    <div class="card1">
      <div>
        <div>
          <a class='numbers' href='doctorsList.php'><?= $numberOfDoctors ?></a></div>
        <div class="cardName">Number of Doctors</div>
      </div>
      <div class="iconBx">
        <ion-icon name="id-card-outline"></ion-icon>
      </div>
    </div>
    <div class="card1">
      <div>
        <div>
          <a class='numbers' href='fieldsOfPhysicians.php'><?= $numberOfFields ?></a></div>
        <div class="cardName">Available Fields of Physicians</div>
      </div>
      <div class="iconBx">
        <ion-icon name="fitness-outline"></ion-icon>
      </div>
    </div>
    <div class="card1">
      <div>
        <div>
          <a class='numbers' href='hospitalWards.php'><?= $numberOfWards ?></a>
        </div>
        <div class="cardName">Available Hospital Wards</div>
      </div>
      <div class="iconBx">
        <ion-icon name="people-outline"></ion-icon>
      </div>
    </div>
  </div>
  <!-- End of CardBox -->

  <!-- order details list-->
  <div class="details">
    <div class="recentOrders">
      <div class="cardHeader">
        <h2>Recent Patient Records</h2>
        <a href="patientRecords.php" class="btn btn-success">View All</a>
      </div>
      <table class="table table-bordered table-hover" >
        <thead>
          <tr>
            <th>Case No.</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th class='text-center'>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php if($recentPatientRecords){ $counter = 0; ?>
            <?php foreach($recentPatientRecords as $record): $counter += 1;?>
                <tr valign="middle">
                    <td><?= $record['pr_id'];?></td>
                    <td><?= $record['pr_lname'];?></td>
                    <td><?= $record['pr_fname'];?></td>
                    <td><?= $record['pr_mname'];?></td>
                    <td class='text-center' width="10%">
                      <a title="View Record" href='patientRecordsView.php?pr_id=<?=$record['pr_id'];?> '><i class="far fa-eye"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } ?>
        </tbody>
      </table>
    </div>

    <!-- order details list-->
    <div class="recentOrders">
      <div class="cardHeader">
        <h2>Our Doctors</h2>
        <a href="doctorsList.php" class="btn btn-success">View All</a>
      </div>
        <!-- <p><//?= $_SESSION['message']; ?></p> -->
      <table class="table table-bordered table-hover " >
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th class='text-center'>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php if($dashboarDoctors){ $counter = 0; ?>
            <?php foreach($dashboarDoctors as $record2): $counter += 1;?>
                <tr>
                    <td><?= $record2['d_id'];?></td>
                    <td>Dr. <?= $record2['d_fname']. " ". $record2['d_lname'];?> </td>
                    <td class='text-center'>
                      <a title="View Record" href='doctorRecordsView.php?d_id=<?=$record2['d_id'];?> '><i class="far fa-eye"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } ?>
        </tbody>
      </table>
    </div>
  <!-- End of Content Wrapper -->
  </div>
<!-- End of Page Wrapper -->
</div>
<!-- End of Content Wrapper -->
<br><br>
