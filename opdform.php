<?php
  ob_start();
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Out Patient Form\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";
  require_once "mainBackend.php";
  require_once('header.php');
  require_once('footer.html');

  $outpatient = new Hardware();
  $patientRecords = $outpatient->patientRecord();
  $addPatientRecords = $outpatient->addPatientRecord();
  ob_end_flush();
?>

<!-- <// ?php if($this->session->flashdata('patientrecord_success')): ?>
          
    <//?php echo "<div style='#1cc88a' class='alert alert-success alert-dismissible text-center'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h6><i class='con fa fa-check'></i></h6>".$this->session->flashdata('patientrecord_success') ."</div>" ?>
          
           <//?php endif; ?>

       <//?php if($this->session->flashdata('patientrecord_failed')): ?>
          
          <//?php echo "<div style='bg-color:#e74a3b;' class='alert alert-success alert-dismissible text-center'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                ".$this->session->flashdata('patientrecord_failed') ."<h6><i class='con fa fa-check'></i></h6></div>" ?>
          
           <//?php endif; ?> -->

<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800 text-center">Add Patient Record</h1>

  <hr>
  <div class="row ">
    <!-- ROW 1 -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h6 class="text-center"><b>ARENDELLE MEMORIAL HOSPITAL <br /> DISNEYLAND ANNEX</b></h6>
      <h5 class="text-center"><b>PATIENT RECORD</b></h5>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <!--<//?php $attributes = array('id' => 'opd_form', 'class' => 'form-horizontal user'); ?>
  <//?php echo form_open('opdform', $attributes); ?>-->

  <div class="row">
    <!-- ROW 2 -->

    <div class="col-sm-11 mx-auto ">
      <!-- first column -->
      <div class="row">



      </div><!--  ROW -->
      <form method="post">
        <div class="row">
          <div style="margin-left: 4px;" class="col-sm-4">
            <?php echo 'LastName'; ?>
            <input type="text" required class="form-control  <?php echo (!empty($lname)) ? 'is-invalid' : ''; ?>"
              name="lname" placeholder="Lastname" value="">
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('lname'); ?> -->
            </div>
          </div>
          <div class="col-sm-4">
            <?php echo 'Firstname'; ?>
            <input type="text" required class="form-control <?php echo (!empty($fname)) ? 'is-invalid' : ''; ?>"
              name="fname" placeholder="Firstname" value="">
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('fname'); ?> -->
            </div>
          </div>
          <div class="col-sm-3">
            <?php echo 'MiddleName'; ?>
            <input type="text" required class="form-control  <?php echo (!empty($middlen)) ? 'is-invalid' : ''; ?>"
              name="middlen" placeholder="Middlename" value="">
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('middlen'); ?> -->
            </div>
          </div>

        </div>
        <div class="row">
          <div style="margin-left: 4px;" class="col-sm-11">
            <?php echo 'Address'; ?>
            <input type="textarea" required class="form-control <?php echo (!empty($address)) ? 'is-invalid' : ''; ?>"
              name="address" placeholder="Permanent Address" value="">
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('address'); ?> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div style="margin-left: 4px;" class="col-sm-2">
            <?php echo 'Age'; ?>
            <input type="text" required class="form-control <?php echo (!empty($age)) ? 'is-invalid' : ''; ?>"
              name="age" placeholder="Age" value="">
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('age'); ?> -->
            </div>
          </div>
          <div style="margin-left: 4px;" class="col-sm-3">
            <?php echo 'Birthday'; ?>
            <input type="date" required class="form-control <?php echo (!empty($datebirth)) ? 'is-invalid' : ''; ?>"
              name="datebirth" value="">
            <div class="text-danger text-center">
              <!-- //php echo form_error('datebirth'); ?> -->
            </div>
          </div>
          <div style="margin-left: 4px;" class="col-sm-3">
            <?php echo ('Birthplace'); ?>
            <input type="text" required class="form-control <?php echo (!empty($birthplace)) ? 'is-invalid' : ''; ?>"
              placeholder="Birth Place" name="birthplace" value="">
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('birthplace'); ?> -->
            </div>
          </div>
          <div style="margin-left: 4px;" class="col-sm-2">
            <?php echo 'Civil Status'; ?>
            <select class="form-control" name="civilstat">
              <option value="">Select</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Separated">Separated</option>
              <option value="Divorced">Divorced</option>
              <option value="Widowed">Widowed</option>
            </select>
            <div class="text-danger text-center">
              <!-- <//?php echo form_error('civilstat'); ?> -->
            </div>
          </div>
        </div>

    
      <div class="row">
        <div style="margin-left: 15px;" class="col-xs-3">
          <?php echo 'Gender'; ?>
          <select class="form-control " name="gender">
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <div class="text-danger text-center">
            <!-- <//?php echo form_error('gen'); ?> -->
          </div>
        </div>

        <div style="margin-left: 20px;" class="col-xs-3">
          <?php echo 'Mobile/Tel No.'; ?>
          <input type="number" required class="form-control <?php echo (!empty($number)) ? 'is-invalid' : ''; ?>"
            placeholder="Mobile/Tel No." name="number" value="">
          <div class="text-danger text-center">
            <!-- <//?php echo form_error('number'); ?> -->
          </div>

        </div>

        <div style="margin-left: 20px;" class="col-xs-3">
          <?php echo 'Religion'; ?>
          <input type="text" required class="form-control <?php echo (!empty($religion)) ? 'is-invalid' : ''; ?>"
            placeholder="Religion" name="religion" value="">
          <div class="text-danger text-center">
            <!-- <//?php echo form_error('religion'); ?> -->
          </div>
        </div>

        <div style="margin-left: 20px;" class="col-xs-3">
          <?php echo 'Occupation'; ?>
          <input type="text" required class="form-control <?php echo (!empty($religion)) ? 'is-invalid' : ''; ?>"
            placeholder="Occupation" name="occup" value="">
          <div class="text-danger text-center">
            <!-- <//?php echo form_error('occup'); ?> -->
          </div>
        </div>
      </div>
      <div style="margin-top: 20px; margin-left: 5px;">
        <a href="patientRecords.php" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        <button type="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Clear</button>
        <button id="submitbtn" type="submit" class="btn btn-success btn-icon-split" name="addPatientRecord">
          <span class="icon text-white-100">
            <i class="fas fa-arrow-right"></i>
            Add Record
          </span>
        </button>
      </div>
  </form>
    </div>
  </div>
  <br><br>
  

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>