<?php
	session_start();
	// Redirect the user to login page if he is not logged in.
	/*if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}*/
	require_once "config.php";
	require_once('header.html');
  require_once('footer.html');
?>
<br>
<?php
//set title
echo "<script>setTimeout(function(){var tts = document.getElementsByTagName(\"title\");if(tts.length > 0)tts[0].innerHTML=\"Add Fields\"; else {var tt0 = document.createElement(\"TITLE\"); tt0.innerHTML = \"My title\"; document.head.appendChild(tt0);}}, 200);</script>";
?>
<div class="container-fluid">

  <div class="row">
    <div class="col-xl-8 col-lg-8">

      <div class="card shadow mb-4">
        <div class="card-header py-3">

          <!-- Page Heading -->
          <h5 class="mb-2 text-gray-800">Fields of physicians</h5>

        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="table">
            <?php
            // Include config file
            require_once "config.php";

            // Attempt select query execution
            $sql1 = "SELECT * FROM fieldsphysician";
            if ($result1 = mysqli_query($link, $sql1)) {
              if (mysqli_num_rows($result1) > 0) {
                echo '<table id="dataTable" class="table table-bordered table-hover table-sm">';
                echo "<thead> <br/>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Fields</th>";
                echo "<th class='text-center'>Description</th>";
                echo "<th class='text-center'>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($result1)) {
                  echo "<tr>";
                  echo "<td width='10%'>" . $row['fp_id'] . "</td>";
                  echo "<td width='30%'>" . $row['fp_name'] . "</td>";
                  echo "<td>" . $row['fp_description'] . "</td>";
                  echo "<td width='10%'class='text-center'><a title='Update Record' data-toggle='tooltip' href='patientRecordsUpdate.php'>
                  <ion-icon name='create'></ion-icon></a>";
                  echo "<a title='Delete Record' data-toggle='tooltip' href='#'>
                  <ion-icon name='trash'></ion-icon></a>";
                  echo "</td>";
                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                // Free result set
                mysqli_free_result($result1);
              } else {
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
              }
            } else {
              echo "Oops! Something went wrong. Please try again later.";
            }

            ?> <br><br>
          </div>




        </div>

      </div>
    </div>

    <div class="col-xl-4 col-lg-4">

      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">

          <!-- Page Heading -->
          <h5 class="mb-2 text-gray-800">Add New Field </h5>

        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-3 col-form-label">Name: </label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="inputPassword">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-6 col-form-label">Description: </label>
              <div class="col-sm-12">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </div>
            <button style="margin-left:200px;" id="submitbtn" type="submit" class="btn btn-success btn-icon-split" name="submit">
            <span class="icon text-white-100">
              <i class="fas fa-arrow-right"></i>
              Add Field
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