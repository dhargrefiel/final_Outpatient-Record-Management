<?php
  ob_start();
  require_once('header.php');
  require_once('footer.html');
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Change Password\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";
 
  
  $addAdmin = $outpatient->addAdmin();
  ob_end_flush();
?>
<br>

<div class="container-fluid">



  <div style="margin-left: 280px;" class="col-sm-6">
    <!-- alert message -->
    <?php 
    if(isset($messages)){
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
            echo $messages;
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
          </div>';
    } ?>
      <h2 class="h3 mb-2 text-gray-800">Add Admin User</h2>
    <!-- <//?php $attributes = array('id' => 'changepass_form', 'class' => 'form-horizontal user'); ?> -->
    <!-- <//?php echo form_open('indexcontrol/changepassupdate', $attributes); ?> -->

    <div class="form-group row">
    </div>
    <form method="post">
      <div class="form-group">
        <?php echo 'Email' ?>
        <input required id="oldpassword" type="email"
          class="form-control  <?php echo (!empty($oldpass)) ? 'is-invalid' : ''; ?>" name="email"
          placeholder="Enter Email">
        <div class="text-danger text-center">
          <!--<//?php echo form_error('oldpass'); ?>-->
        </div>
      </div>
      <div class="form-group">
        <?php echo 'Username' ?>
        <input required id="newpassword" type="text" class="form-control  <?php echo (!empty($pass)) ? 'is-invalid' : ''; ?>"
        name="username" placeholder="Enter Username">
        <div class="text-danger text-center">
          <!--<//?php echo form_error('pass'); ?>-->
        </div>
      </div>
      <div class="form-group">
        <?php echo 'Password' ?>
        <span style="margin-left: 2%;" id="eyem" class="fa fa-eye"></span>
        <input required id="cpassword" type="password" class="form-control <?php echo (!empty($cpass)) ? 'is-invalid' : ''; ?>"
          name="password" placeholder="Enter Password">
        <div class="text-danger text-center">
          <!--<//?php echo form_error('cpass'); ?>-->
        </div>
      </div>
      <br>
      <a href="dashboard.php" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
      <button type="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Clear</button>
      <button  type="submit" class="btn btn-success btn-icon-split" name="addAdmin">
        <span class="icon text-white-100">
          <i class="fas fa-arrow-right"></i>
          Add User
        </span>
      </button>
    </form>
  </div>
</div>

<!-- Vanilla JS -->
<script>
  var oldpwd = document.getElementById('oldpassword');
  var eyeo = document.getElementById('eyeo');
  var newpwd = document.getElementById('newpassword');
  var eyen = document.getElementById('eyen');
  var cpwd = document.getElementById('cpassword');
  var eyem = document.getElementById('eyem');



    eyem.addEventListener('click', CPass);

  function CPass() {

    eyem.classList.toggle('active');

    (cpwd.type == 'password') ? cpwd.type = 'text': cpwd.type = 'password';

  }
</script>

<link rel="stylesheet" type="text/css" href="assets/input.css">
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>