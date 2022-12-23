<?php
  ob_start();
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Hospital Wards\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";
  require_once "mainBackend.php";
  require_once('header.php');
  require_once('footer.html');

  $outpatient = new Hardware();
  $getFieldsRecords = $outpatient->getFieldsRecord();
  $updateFieldsRecords = $outpatient->updateFieldsRecord();
  
  ob_end_flush();
?>
<br>

<div class="container-fluid">

  <div class="row">
    <div class="col-xl-6 col-lg-6 mx-auto">

      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">

          <!-- Page Heading -->
          <h5 class="mb-2 text-gray-800">Update Ward </h5>

        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="fp_name" value="<?= $getFieldsRecords['fp_name']?>"$>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-6 col-form-label">Description: </label>
              <div class="col-sm-12">
                <textarea class="form-control" rows="3" name="fp_description"><?= $getFieldsRecords['fp_description']?></textarea>
              </div>
            </div>
            <a href="fieldsOfPhysicians.php" style="margin-left:13px;" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
              <button type="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Clear</button>
              <button name="updateRecord" id="submitbtn" type="submit" class="btn btn-success btn-icon-split">
                <span class="icon text-white-100">
                  <i class="fas fa-arrow-right"></i>
                  Update Record
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