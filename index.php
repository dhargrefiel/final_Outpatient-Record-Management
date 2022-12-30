<?php
	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/
	
  //set title
  echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Login Page\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";

  require_once('mainBackend.php');
  $outPatient = new Hardware();
  $user = $outPatient->loginUser();
  $messages = $outPatient->message();
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />

  <title>Out Patient Record Management</title>
  <!-- Ito yung title na dating nasa controller kasama ni $data['title'] n ngayon ginawa natin variable para mailabas sa VIEW yung value ni $title -->

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/jquery-3.3.1.min.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">


  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="assets/js/scripts/jquery.canvasjs.min.js"></script>


  <!-- script for icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<title>My Page Title</title>
<link rel="icon" type="image/x-icon" href="logo.png">

<body>


<!-- alert message -->
<?php 
if(isset($messages)){
 echo '<div class="row">
    <div class="col-md-8 offset-md-2">
      <div style="margin: 10px;  " class="alert alert-danger alert-dismissible fade show" role="alert">';
       echo $messages;
       echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
    </div>
  </div>';
} ?>

  <div class="box">
    <div class="section1">
      <div class="title">
        <h6>Arendelle Memorial Hospital</h6>
        <h2 class="alignleft">Patient Records Management</h2>
      </div>
      <div class="desc">
        <h6>An automated system that enables Arendelle Memorial Hospital keeps track of all patients’ <br>
          details and allows easy access, retrieval and storage of the patient’s information.
        </h6>
      </div>
    </div>
    <div class="section2">
      <div class="text-center">
        <img src="img/logo.png" style="width: 100px;" alt="logo"> 
        <p>Please login to your account</p>
      </div>
      <br>
      <form method="POST" action="index.php">
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <input type="text" name="username" class="form-control input" placeholder="Username" />
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <input type="password" name="password" class="form-control input" autocomplete="current-password" required=""  placeholder="Password" id="id_password">
          </div>
          
        </div>
        <div class="text-center pt-1 mb-5 pb-1">
          
            <button class="login_btn btn-block fa-lg gradient-custom-2 mb-3" name="login_user" type="submit">Log
              in</button>
          
          <a class=" text-center  text-muted" href="#!">Forgot password?</a>
        </div>
        <div class="d-flex align-items-center justify-content-center pb-4">
          <p class="mb-0 me-2">Don't have an account? &nbsp </p>
          <a type="button" class="createAcc"> Register </a>
        </div>

      </form>

    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>


  <!-- jQuery library -->
  <script src="assets/printarea/jquery-print-plugin-master/lib/jquery.printThis.js"></script>



<script>
  $('.alert').alert();

  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</body>

</html>