<?php
  ob_start();
  require_once('header.php');
  require_once('footer.html');
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Add Record\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/

    $doctorRecords = $outpatient->doctorRecord();
    $patientRecords = $outpatient->patientRecord();
    $addRecords = $outpatient->addRecord();
  ob_end_flush();
?>
<br>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div id="Findings" class="card shadow mb-4">

        <div class="card-header py-3">

            <!-- Page Heading -->
            <h5 class="mb-2 text-gray-800"> Out Patient Findings
            </h5>

        </div>
        <div class="card-body">

            <div class="container">

            </div>

            <div class="table">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">


                    <tbody>


                        <!-- <//?php $attributes = array('id' => 'add_multiple_findings', 'class' => 'form-horizontal user'); ?>
                        <//?php echo form_open('multiplerecordcontrol/add_multiple_findings/#Findings', $attributes); ?> -->
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-6">

                                <form method="post" action="addRecords.php">
                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Patient Case Number</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                            <!-- <input class="form-control <//?php echo (!empty($a_casenumber)) ? 'is-invalid' : ''; ?>"
                                                type="text" name="a_casenumber" placeholder="Enter Case Number"
                                                value="">  -->
                                            <input required class="form-control" type="text" name="a_casenumber" placeholder="Enter Case Number" list="caseNumber">
                                            <datalist id="caseNumber">
                                                <?php if($patientRecords){ $counter = 0; ?>
                                                    <?php foreach($patientRecords as $record): $counter += 1;?>
                                                        <option><?= $record['pr_id'];?></option>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </datalist>
                                            <?php $variable = $_POST['a_casenumber']; ?>
                                        </div>
                                        <div class="text-danger text-center"><!-- <//?php echo form_error('a_casenumber'); ?> -->
                                        </div>
                                    </div>

                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Chief Complaint</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800"><textarea required
                                                class="form-control" type="text" name="a_chief_complaint"
                                                placeholder="Enter Chief Complaint"></textarea>
                                        </div>
                                    </div>

                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                History of Present Illness</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                            <input required
                                                class="form-control <?php echo (!empty($a_historyillness)) ? 'is-invalid' : ''; ?>"
                                                type="text" name="a_historyillness"
                                                value=""
                                                placeholder="Enter History of Present Illness"></div>
                                        <div class="text-danger text-center">
                                            <!-- <//?php echo form_error('a_historyillness'); ?> --></div>
                                    </div>

                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Vital Signs</div>
                                        </div>
                                        <div class="row">
                                            <!--Begin First Column -->
                                            <div class="col-sm-4">
                                                <?php echo 'Blood Pressure'; ?>
                                                <input class="form-control" type="text" name="a_bp"
                                                    placeholder="BP">
                                            </div>
                                            <div class="col-sm-4">
                                                <?php echo 'Respiratory Rate'; ?>
                                                <input class="form-control" type="text" name="a_rr"
                                                    value="" placeholder="RR">
                                            </div>
                                            <div class="col-sm-4">
                                                <?php echo 'Capillary Refill'; ?>
                                                <input class="form-control" type="text" name="a_cr"
                                                    value="" placeholder="CR">
                                            </div>
                                        </div>
                                        <!--End First Column -->
                                        <div class="row">
                                            <!--Begin Second Column -->
                                            <div class="col-sm-4">
                                                <?php echo 'Temperature'; ?>
                                                <input class="form-control" type="text" name="a_temp"
                                                    value="" placeholder="TEMP">
                                            </div>
                                            <div class="col-sm-4">
                                                <?php echo 'Weight'; ?>
                                                <input class="form-control" type="text" name="a_wt"
                                                    value="" placeholder="WT">
                                            </div>
                                            <div class="col-sm-4">
                                                <?php echo 'Pulse Rate'; ?>
                                                <input class="form-control" type="text" name="a_pr"
                                                    value="" placeholder="PR">
                                            </div>

                                        </div>
                                        <!--End Second Column -->
                                    </div>

                                </div><!-- End of Column 1 -->

                                <div class="col-sm-6">
                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Date</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800"><input
                                                class="form-control <?php echo (!empty($a_date)) ? 'is-invalid' : ''; ?>"
                                                type="date" name="a_date" placeholder="Enter Case Number"
                                                value=""> </div>
                                        <div class="text-danger text-center"><!-- <//?php echo form_error('a_date'); ?> --></div>
                                    </div>

                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Physical Examination</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800"><textarea
                                                class="form-control" type="text" name="a_physicalexam"
                                                placeholder="Enter Physical Examination"></textarea>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Diagnosis</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800"><textarea
                                                class="form-control <?php echo (!empty($a_diagnosis)) ? 'is-invalid' : ''; ?>"
                                                type="text" name="a_diagnosis"
                                                placeholder="Enter Diagnosis"></textarea>
                                        </div>
                                        <div class="text-danger text-center"><!-- <//?php echo form_error('a_diagnosis'); ?> -->
                                        </div>
                                    </div>

                                    <div style="margin-top:20px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Medication/Treatment</div>
                                        </div>
                                        <div class="h5 mb-1 font-weight-bold text-gray-800"><textarea
                                                class="form-control <?php echo (!empty($a_diagnosis)) ? 'is-invalid' : ''; ?>"
                                                type="text" name="a_medical_treatment"
                                                placeholder="Enter Medication/Treatment"></textarea>
                                        </div>
                                        <div class="text-danger text-center">
                                            <!--<//?php echo form_error('a_medical_treatment'); ?>--></div>
                                    </div>

                                </div><!-- End of Column 2 -->
                            </div><!-- End of Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div style="margin-bottom:17px;">
                                        <div class="row no-gutters">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Attending Physician
                                            </div>
                                        </div>
                                        <select required name="a_physician" class="form-control">
                                            <option value="">Select Physician</option>
                                            <?php if($doctorRecords){ $counter = 0; ?>
                                                <?php foreach($doctorRecords as $record): $counter += 1;?>
                                                    <option><?= $record['d_fname'];?> <?= $record['d_mname'];?> <?= $record['d_lname'];?></option>
                                                <?php endforeach; ?>
                                            <?php } ?>
                                        </select>
                                        <div class="text-danger text-center"><!-- <//?php echo form_error('a_physician'); ?> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                            <br>
                            <a href="patientRecords.php" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Clear</button>
              
                            <button style='text-decoration:none' type='submit' class='btn btn-success btn-icon-split' name='AddRecord'  >
                            <span class="icon text-white-100">
                                <i class="fas fa-arrow-right"></i>
                                Add Findings
                            </span>
                            </button>
                          </form>
                        </div>
                    




                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


