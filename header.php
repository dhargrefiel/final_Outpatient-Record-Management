<?php
	require_once "mainBackend.php";
  $outpatient = new Hardware();
  $messages = $outpatient->message();
  $users = $outpatient->header_user();
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

  <link rel="stylesheet" type="text/css" href="assets/loader.css">
  <link rel="stylesheet" type="text/css" href="assets/css/add.css">
  <link rel="stylesheet" type="text/css" href="assets/css/try.css">


  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="assets/js/scripts/jquery.canvasjs.min.js"></script>


  <!-- script for icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="container">
    <div class="navigation1">
      <ul>
        <li>
          <a href="#">
            <span class="icon"><img style="width:60px; margin-top:20px;" src="img/logo.png"></ion-icon></span>
            <span class="title1">Patient Records Management</span>
          </a>
        </li>
        <li>
          <a href="dashboard.php">
            <span class="icon">
              <ion-icon name="home"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="patientRecords.php">
            <span class="icon">
              <ion-icon name="folder-open"></ion-icon>
            </span>
            <span class="title">Patient Records</span>
          </a>
        </li>
        <li>
          <a href="addRecords.php">
            <span class="icon">
              <ion-icon name="albums"></ion-icon>
            </span>
            <span class="title">Add Records</span>
          </a>
        </li>
        <li>
          <a href="doctorsList.php">
            <span class="icon">
              <ion-icon name="person"></ion-icon>
            </span>
            <span class="title">Doctors' List</span>
        </li>
        <li>
          <a href="hospitalWards.php">
            <span class="icon">
              <ion-icon name="people"></ion-icon>
            </span>
            <span class="title">Hospital Wards</span>
          </a>
        </li>
        <li>
          <a href="FieldsOfPhysicians.php">
            <span class="icon">
              <ion-icon name="fitness"></ion-icon>
            </span>
            <span class="title">Fields of Physician</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- main -->
    <div class="main1">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> 
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?= $users['u_username'];?>
                </span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="changePass.php">
                  <i class="fas fa-fw fa-key mr-2 text-gray-400"></i>
                  Change Password
                </a>

                <div class="dropdown-divider"></div>
                <!-- <a class="dropdown-item" href="#" name="logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                  <a class="dropdown-item" href="index.php?logout='1'" onclick="return confirm('Are you sure you want to logout?')">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                  </a>
              </div>
            </li>

          </ul>

        </nav>