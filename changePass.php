<?php
  ob_start();
  require_once('header.php');
  require_once('footer.html');
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Change Password\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/

 
  ob_end_flush();
?>
<br>

<div class="container-fluid">
    


<div style="margin-left: 280px;" class="col-sm-6">

 
<!-- <//?php if($this->session->flashdata('pass_updated')): ?>
      
      <//?php echo "<div class='alert alert-success alert-dismissible text-center'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h6><i class='con fa fa-check'></i></h6>".$this->session->flashdata('pass_updated') ."</div>" ?>
      
       <//?php endif; ?>  -->
      
    
          <h2 class="h3 mb-2 text-gray-800">Change Password</h2>            

           <?php
             
             $attributes = array('id' => 'changepass_form', 'class' => 'form-horizontal user'); 
         
            ?>
           <!-- <//?php echo form_open('indexcontrol/changepassupdate', $attributes); ?> -->

            <div class="form-group row">
            </div>
            <div class="form-group">
              <?php echo 'Old Password' ?>
              <span style="margin-left: 2%;" id="eyeo" class="fa fa-eye"></span>
              <input id="oldpassword" type="password" class="form-control  <?php echo (!empty($oldpass)) ? 'is-invalid' : ''; ?>" name="oldpass" placeholder="Enter Old Password">
              <div class="text-danger text-center"> <!--<//?php echo form_error('oldpass'); ?>--></div>
            </div>
            <div class="form-group">
              <?php echo 'New Password' ?>
              <span style="margin-left: 2%;" id="eyen" class="fa fa-eye"></span>
                <input id="newpassword" type="password" class="form-control  <?php echo (!empty($pass)) ? 'is-invalid' : ''; ?>" name="pass" placeholder="Enter New Password" >
                <div class="text-danger text-center"><!--<//?php echo form_error('pass'); ?>--></div>
            </div>
             <div class="form-group">
              <?php echo 'Confirm Password' ?>
              <span style="margin-left: 2%;" id="eyen" class="fa fa-eye"></span>
                <input id="cpassword" type="password" class="form-control <?php echo (!empty($cpass)) ? 'is-invalid' : ''; ?>" name="" placeholder="Enter Confirm Password" >
                <div class="text-danger text-center"><!--<//?php echo form_error('cpass'); ?>--></div>
            </div>
            <button style="margin-left: 152px;" type="submit" class="btn btn-success btn-icon-split" name="submit">
             <span class="icon text-white-100">
              <i class="fas fa-arrow-right"></i>  
                Change password
              </span>
            </button>
          
          </div> 
</div>

<!-- Vanilla JS -->
<script>
var oldpwd = document.getElementById('oldpassword');
var eyeo = document.getElementById('eyeo');
var newpwd = document.getElementById('newpassword');
var eyen = document.getElementById('eyen');



eyeo.addEventListener('click',OldPass);

function OldPass(){

  eyeo.classList.toggle('active');

  (oldpwd.type == 'password') ? oldpwd.type = 'text' : oldpwd.type = 'password';

}


eyen.addEventListener('click',NewPass);

function NewPass(){

  eyen.classList.toggle('active');

  (newpwd.type == 'password') ? newpwd.type = 'text' : newpwd.type = 'password';

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
