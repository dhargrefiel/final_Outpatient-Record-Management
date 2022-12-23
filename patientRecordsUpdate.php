<?php
  ob_start();
  require_once('header.php');
  require_once('footer.html');
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Update Patient Record\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/

  $patientRecords = $outpatient->getPatientRecord();
  $updatePatientRecords = $outpatient->updatePatientRecord();

  
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
                <?= "P-0".$patientRecords['pr_id']?>
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
          <div class="card-header py-3" >
            <h6 class="m-0 font-weight-bold textColorBlue">Details
          </div>
          
          <!-- Card Body -->
          <div class="card-body">

            <div id="printablearea">
              <!-- Printable Area -->


             <!-- <//?php if($this->session->flashdata('edit_finding_success')): ?>
              <//?php echo "<div style='#1cc88a' class='alert alert-success alert-dismissible text-center'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h6><i class='con fa fa-check'></i></h6>".$this->session->flashdata('edit_finding_success') ."</div>" ?>
              //php endif; ?>

              <//?php if($this->session->flashdata('add_to_doctor_success')): ?>
              <//?php echo "<div style='#1cc88a' class='alert alert-success alert-dismissible text-center'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h6><i class='con fa fa-check'></i></h6>".$this->session->flashdata('add_to_doctor_success') ."</div>" ?>
              <//?php endif; ?> -->

              
              <div class="row ">
                <!-- ROW 1 -->
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  <h6 class="text-center"><b>ARENDELLE MEMORIAL HOSPITAL <br/> DISNEYLAND ANNEX</b></h6>
                  <h5 class="text-center"><b>PATIENT RECORD</b></h5>
                </div>
                <div class="col-sm-4"></div>
              </div>
              <!--<//?php $attributes = array('id' => 'opd_form', 'class' => 'form-horizontal user'); ?>
              <//?php echo form_open('opdform', $attributes); ?>-->

              <div class="row">
                <!-- ROW 2 -->

                <div class="col-sm-12 ">
                  <!-- first column -->
                  <div class="row">

                  </div><!--  ROW -->
                <form method="post">    
                  <div class="row">
                    <div style="margin-left: 4px;" class="col-sm-4">
                      <?php echo 'LastName'; ?>
                      <input type="text"  class="form-control  <?php echo (!empty($lname)) ? 'is-invalid' : ''; ?>"  name="lname" placeholder="Lastname" value="<?= $patientRecords['pr_lname']?>">
                      <div class="text-danger text-center"><!-- <//?php echo form_error('lname'); ?> --></div>
                    </div>
                    <div class="col-sm-4">
                      <?php echo 'Firstname'; ?>
                      <input type="text" style="margin-left: 4px;" class="form-control <?php echo (!empty($fname)) ? 'is-invalid' : ''; ?>" name="fname" placeholder="Firstname" value="<?= $patientRecords['pr_fname']?>">
                      <div class="text-danger text-center"><!-- <//?php echo form_error('fname'); ?> --></div>
                    </div>
                    <div class="col-sm-3">
                      <?php echo 'Middle Name'; ?>
                      <input type="text" style="margin-left: 2px;"
                        class="form-control  <?php echo (!empty($middlen)) ? 'is-invalid' : ''; ?>" name="middlen" placeholder="Middle Name" value="<?= $patientRecords['pr_mname']?>">
                      <div class="text-danger text-center"><!-- <//?php echo form_error('middlen'); ?> --></div>
                    </div>

                  </div>
                  <div class="row">
                    <div style="margin-left: 4px;" class="col-sm-11">
                      <?php echo 'Address'; ?>
                      <input type="text"
                        class="form-control <?php echo (!empty($address)) ? 'is-invalid' : ''; ?>" name="address" placeholder="Permanent Address" value="<?= $patientRecords['pr_addrs']?>">
                      <div class="text-danger text-center"><!-- <//?php echo form_error('address'); ?> --></div>
                    </div>
                  </div>
                  <div class="row">
                    <div style="margin-left: 4px;" class="col-sm-2">
                      <?php echo 'Age'; ?>
                      <input type="text" class="form-control <?php echo (!empty($address)) ? 'is-invalid' : ''; ?>" name="age" placeholder="Age" value="<?= $patientRecords['pr_age']?>">
                      <div class="text-danger text-center"><!-- <//?php echo form_error('age'); ?> --></div>
                    </div>
                    <div style="margin-left: 4px;" class="col-xs-3">
                      <?php echo 'Birthday'; ?>
                      <input type="date" class="form-control <?php echo (!empty($datebirth)) ? 'is-invalid' : ''; ?>" name="datebirth" value="<?= $patientRecords['pr_bdate']?>">
                      <div class="text-danger text-center"><!-- //php echo form_error('datebirth'); ?> --></div>
                    </div>
                    <div style="margin-left: 4px;" class="col-sm-3">
                      <?php echo ('Birthplace'); ?>
                      <input type="text" class="form-control <?php echo (!empty($birthplace)) ? 'is-invalid' : ''; ?>" placeholder="Birth Place" name="birthplace" value="<?= $patientRecords['pr_bplace']?>">
                      <div class="text-danger text-center"><!-- <//?php echo form_error('birthplace'); ?> --></div>
                    </div>
                    <div style="margin-left: 4px;" class="col-sm-3">
                      <?php echo 'Civil Status'; ?>
                      <select class="form-control" name="civilstat">
                        <option selected ><?= $patientRecords['pr_civilstat']?></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                        
                      </select>
                      <div class="text-danger text-center"><!-- <//?php echo form_error('civilstat'); ?> --></div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div style="margin-left: 30px;" class="col-xs-3">
                    <?php echo 'Gender'; ?>
                    <select class="form-control " name="gender">
                      <option selected value="<?= $patientRecords['pr_gen']?>"><?= $patientRecords['pr_gen']?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <div class="text-danger text-center"><!-- <//?php echo form_error('gen'); ?> --></div>
                  </div>

                  <div style="margin-left: 30px;" class="col-xs-3">
                    <?php echo 'Mobile/Tel No.'; ?>
                    <input type="number" class="form-control <?php echo (!empty($number)) ? 'is-invalid' : ''; ?>"
                      placeholder="Mobile/Tel No." name="number" value="<?= $patientRecords['pr_number']?>">
                    <div class="text-danger text-center"><!-- <//?php echo form_error('number'); ?> --></div>

                  </div>

                  <div style="margin-left: 20px;" class="col-xs-3">
                    <?php echo 'Religion'; ?>
                    <input type="text" class="form-control <?php echo (!empty($religion)) ? 'is-invalid' : ''; ?>"
                      placeholder="Religion" name="religion" value="<?= $patientRecords['pr_religion']?>">
                    <div class="text-danger text-center"><!-- <//?php echo form_error('religion'); ?> --></div>
                  </div>

                  <div style="margin-left: 20px;" class="col-xs-3">
                    <?php echo 'Occupation'; ?>
                    <input type="text" class="form-control <?php echo (!empty($occup)) ? 'is-invalid' : ''; ?>"
                      placeholder="Occupation" name="occup" value="<?= $patientRecords['pr_occup']?>">
                    <div class="text-danger text-center"><!-- <//?php echo form_error('occup'); ?> --></div>
                  </div>
                </div>

              </div>
              <br><br> 
              <a href="patientRecords.php" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
              <button type="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Clear</button>
              <button name="updateRecord" id="submitbtn" type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-100">
                  <i class="fas fa-arrow-right"></i>
                  Update Record
                </span>
              </button>
            </form>
            <?php if ($message) { ?>
                <div class="bg-[#ff6363] rounded-md pl-3 h-8 py-2 w-full flex justify-center mt-4">
                    <p onclick="this.parentElement.style.display='none';" class="text-white cursor-pointer text-sm"><?= $message ?></p>                                            
                </div>
            <?php } ?>
            </div>
              

              

          </div><!-- Card Body End tag -->
        </div>
      </div>
  </div>


</div>