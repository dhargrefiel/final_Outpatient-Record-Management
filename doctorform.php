<?php
  ob_start();
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Doctor Record Form\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";
  require_once "mainBackend.php";
  require_once('header.php');
  require_once('footer.html');

  $outpatient = new Hardware();
  $hospitalWardsRecords = $outpatient->hospitalWardsRecord();
  $fieldsRecords = $outpatient->fieldsRecord();
  $addDoctorRecords = $outpatient->addDoctorRecord();
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

  <h1 class="h3 mb-2 text-gray-800 text-center">Add Doctor Details</h1>

  <hr>
  <div class="row ">
    <!-- ROW 1 -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h6 class="text-center"><b>ARENDELLE MEMORIAL HOSPITAL <br/> DISNEYLAND ANNEX</b></h6>
      <h5 class="text-center"><b>DOCTOR RECORD</b></h5>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <!--<//?php $attributes = array('id' => 'opd_form', 'class' => 'form-horizontal user'); ?>
  <//?php echo form_open('opdform', $attributes); ?>-->

  <div class="row mx-auto">
    <!-- ROW 2 -->

    <div class="col-sm-10 mx-auto">
      <!-- first column -->

      <form method="post" action="doctorform.php">    
        <div class="row">
          <div  class="col-sm-4">
            <?php echo 'LastName'; ?>
            <input type="text" required class="form-control  <?php echo (!empty($d_lname)) ? 'is-invalid' : ''; ?>"  name="d_lname" placeholder="Lastname" value="">
            <div class="text-danger text-center"><!-- <//?php echo form_error('lname'); ?> --></div>
          </div>
          <div class="col-sm-4">
            <?php echo 'Firstname'; ?>
            <input type="text" required style="margin-left: 4px;" class="form-control <?php echo (!empty($d_fname)) ? 'is-invalid' : ''; ?>" name="d_fname" placeholder="Firstname" value="">
            <div class="text-danger text-center"><!-- <//?php echo form_error('fname'); ?> --></div>
          </div>
          <div class="col-sm-3">
            <?php echo 'Middlename'; ?>
            <input type="text" style="margin-left: 2px;"
              class="form-control  <?php echo (!empty($d_mname)) ? 'is-invalid' : ''; ?>" name="d_mname" placeholder="Middlename" value="">
            <div class="text-danger text-center"><!-- <//?php echo form_error('middlen'); ?> --></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-11">
            <?php echo 'Address'; ?>
            <input type="textarea" required class="form-control <?php echo (!empty($address)) ? 'is-invalid' : ''; ?>" name="d_address" placeholder="Permanent Address" value="">
            <div class="text-danger text-center"><!-- <//?php echo form_error('address'); ?> --></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <?php echo 'Age'; ?>
            <input type="text" class="form-control <?php echo (!empty($d_age)) ? 'is-invalid' : ''; ?>" name="d_age" placeholder="Age" value="">
            <div class="text-danger text-center"><!-- <//?php echo form_error('age'); ?> --></div>
          </div>
          
          <div class="col-sm-3">
            <?php echo 'Gender'; ?>
            <select class="form-control " name="d_gender">
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <div class="text-danger text-center"><!-- <//?php echo form_error('gen'); ?> --></div>
          </div>

          <div class="col-sm-5">
            <?php echo 'Mobile/Tel No.'; ?>
            <input type="number" class="form-control <?php echo (!empty($d_num)) ? 'is-invalid' : ''; ?>"
              placeholder="Mobile/Tel No." name="d_num" value="">
            <div class="text-danger text-center"><!-- <//?php echo form_error('number'); ?> --></div>
          </div>
        </div>

      
        <div class="row">  
          
          <div class="col-sm-3">
            <?php echo 'Fields'; ?>
              <select required class="form-control" name="d_fields">
                <option value="">Select Physician</option>
                <?php if($fieldsRecords){ $counter = 0; ?>
                    <?php foreach($fieldsRecords as $record): $counter += 1;?>
                      <option value="<?= $record['fp_name'];?>"><?= $record['fp_name'];?></option>
                    <?php endforeach; ?>
                <?php } ?>
              </select>
            <div class="text-danger text-center"><!-- <//?php echo form_error('occup'); ?> --></div>
          </div>    

          <div class="col-sm-3">
            <?php echo 'Ward'; ?>
            <select required class="form-control" name="d_wards">
              <option value="">Select Ward</option>
              <?php if($hospitalWardsRecords){ $counter = 0; ?>
                <?php foreach($hospitalWardsRecords as $record): $counter += 1;?>
                  <option value="<?= $record['w_name'];?>"><?= $record['w_name'];?></option>
                <?php endforeach; ?>
              <?php } ?>
            </select>
            <div class="text-danger text-center"><!-- <//?php echo form_error('occup'); ?> --></div>
          </div>
        </div>

         <br><br>
          <div >
            <a href="doctorsList.php" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Clear</button>
            <button type="submit" class="btn btn-success btn-icon-split" name="addDoctorRecord">
              <span class="icon text-white-100">
                <i class="fas fa-arrow-right"></i>
                Add Record
              </span>
            </button>
          </div>

      </form>

    
    </div>
  </div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>