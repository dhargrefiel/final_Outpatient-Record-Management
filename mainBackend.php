<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);
Class Hardware {

    private $server = "mysql:host=localhost;dbname=patient_records_management";
	private $user = "root";
	private $pass = "";
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	protected $con;


    public function openConnection(){

		try{

			$this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
			return $this->con;

		}catch(PDOException $e) {

			echo "There is a problem in the connection: ". $e->getMessage();

		}
	}

	public function closeConnection(){

		$this->con = null;
	}

    
    public function message(){
        return $_SESSION['message'];
	}

    //----------------LOGIN--------------------

    public function loginUser(){
		$user = "";
		unset($_SESSION['message']);
		if (isset($_POST['login_user'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			if (empty($username) or empty($password)){
				echo("PLEASE FILL UP ALL THE FIELDS");

			} else {
				$connection = $this->openConnection();
				$sql = $connection->prepare("SELECT * FROM user WHERE u_username = '$username' AND u_password = '$password' ");
				$sql->execute();
				$user = $sql->fetch();
				$userCount = $sql->rowCount();

				if($userCount == 1){
					$_SESSION['authentication'] = 1;
					$_SESSION['id'] = $user['u_id'];
					$_SESSION['username'] = $username;
                    header('location:dashboard.php');
				} else {
					header('location:index.php');                    
					$_SESSION['message'] = "Invalid credentials. Please try again.";
					$user = null;
				}
			}
		}
		//logout
		if (isset($_GET['logout'])) {
			unset($_SESSION['id']);
			unset($_SESSION['username']);
            unset($_SESSION['authenticate']);
			session_destroy();
			header("location: index.php");
		}
	}

    //----------------HEADER--------------------

    public function header_user(){
        if ($_SESSION['authentication']) {
            $activeUser = $_SESSION['id'];
            $connection = $this->openConnection();
            $sql = $connection->prepare("SELECT * FROM user WHERE u_id = '$activeUser'");
            $sql->execute();
            $userinfo = $sql->fetch();
            return $userinfo;
        } else {
            unset($_SESSION['message']);
			header ('location:index.php');
		}
	}

    public function changePassword(){
        unset($_SESSION['message']);
        

        if(isset($_POST['changePassword'])){
            $oldPass = $_POST['oldpass'];
            $d_oldPass = md5($oldPass);
            $newPass = $_POST['newpass'];
            $d_newPass = md5($newPass);
            $confPass = $_POST['cpass'];
            $id = $_SESSION['id'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("SELECT u_password FROM user WHERE u_id = '$id'");
            $sql->execute();
            $u_password = $sql->fetch();

            if($d_oldPass == $u_password["u_password"]){
                // Validate password strength
                $uppercase    = preg_match('@[A-Z]@', $newPass);
                $lowercase    = preg_match('@[a-z]@', $newPass);
                $number       = preg_match('@[0-9]@', $newPass);

                if (!$uppercase || !$lowercase || !$number || strlen($newPass) < 8) {\
                    header('location:changePass.php');
                    $_SESSION['message'] = "Password is not strong.";
                } 
                else {
                    //check if new password is equal to confirm password
                    if($newPass != $confPass){
                        header('location:changePass.php');
                        $_SESSION['message'] = "Your confirmed password did not match.";
                    } 
                    else {        
                            $connection2 = $this->openConnection();
                            $sql2 = $connection->prepare("UPDATE user SET u_password = '$d_newPass' WHERE u_id = '$id' ");
                            $sql2->execute();
                            $_SESSION['message'] = "Password Updated Successfully.";
                            header('location:changePass.php');
                        }
                        
                    }
            }
            else {
                header('location:changePass.php');
                $_SESSION['message'] = "Old password did not match any record.";
            }

        }
    }

    public function addAdmin(){
        unset($_SESSION['message']);

        if(isset($_POST['addAdmin'])){
            $email = $_POST['email'];
            $uname = $_POST['username'];
            $password = $_POST['password'];
            $d_password = md5($password);

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO user (u_username, u_password, u_email)
            VALUES ('$uname', '$d_password', '$email') ");
            $sql->execute();
            
            $_SESSION['message'] = "User Added Successfully";
            header('location: addAdmin.php');
        }
    }
    //----------------DASHBOARD--------------------

    //statistics

    public function getNumberOfPatient(){
        if ($_SESSION['authentication']) {
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM patient_record");
        $sql->execute();
        $patientRecordCount = $sql->rowCount();
        return $patientRecordCount;
        } else {
			header ('location:index.php');
		}
	}

    public function getNumberOfDoctor(){
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM physicians");
        $sql->execute();
        $doctorCount = $sql->rowCount();
        return $doctorCount;
	}

    public function getNumberOfField(){
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM fieldsphysician");
        $sql->execute();
        $fieldCount = $sql->rowCount();
        return $fieldCount;
	}

    public function getNumberOfWard(){
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM wards");
        $sql->execute();
        $fieldCount = $sql->rowCount();
        return $fieldCount;
	}

    // Recent Patient Records Table
    public function recentPatientRecord(){
      // Attempt select query execution
      $connection = $this->openConnection();
      $sql = $connection->prepare("SELECT * FROM patient_record ORDER BY pr_id DESC LIMIT 7 ");
      $sql->execute();
	  $recentRecord = $sql->fetchAll();

      return $recentRecord;
    }

    public function ourDoctor(){
      $connection = $this->openConnection();
      $sql = $connection->prepare("SELECT * FROM physicians LIMIT 7 ");
      $sql->execute();
	  $ourDoctor = $sql->fetchAll();

      return $ourDoctor;
    }

//----------------PATIENT RECORDS--------------------

    // Main Patient Records Table [patientRecords.php]
    public function patientRecord(){
        unset($_SESSION['message']);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM patient_record ORDER BY pr_id DESC");
        $sql->execute();
        $patientRecord = $sql->fetchAll();
  
        return $patientRecord;
    }

    // Update Patient Record [patientRecordsUpdate.php]
    public function getPatientRecord(){
        if(isset($_GET["pr_id"])){
         $id =  trim($_GET["pr_id"]);   
        }
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM patient_record WHERE pr_id = '$id' ");
        $sql->execute();
        $recordID = $sql->fetch();
        return $recordID;

    }
    public function updatePatientRecord(){
        $id =  trim($_GET["pr_id"]);
        unset($_SESSION['message']);
        
        if (isset($_POST['updateRecord'])){
            $pr_fname = $_POST['fname'];
            $pr_mname = $_POST['middlen'];
            $pr_lname = $_POST['lname'];
            $pr_address = $_POST['address'];
            $pr_age = $_POST['age'];
            $pr_bdate = $_POST['datebirth'];
            $pr_bplace = $_POST['birthplace'];
            $pr_civilstat = $_POST['civilstat'];
            $pr_gender = $_POST['gender'];
            $pr_number = $_POST['number'];
            $pr_religion= $_POST['religion'];
            $pr_occup = $_POST['occup'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("UPDATE patient_record SET 
                pr_fname = '$pr_fname', 
                pr_mname = '$pr_mname',
                pr_lname = '$pr_lname',
                pr_addrs = '$pr_address',
                pr_age = '$pr_age',
                pr_bdate = '$pr_bdate',
                pr_bplace = '$pr_bplace',
                pr_civilstat = '$pr_civilstat',
                pr_gen = '$pr_gender',
                pr_number = '$pr_number',
                pr_religion = '$pr_religion',
                pr_occup = '$pr_occup'

                WHERE pr_id = '$id'

                ");

            $sql->execute();
            $_SESSION['message'] = "Updated Successfully";
            header('location:patientRecords.php');
        }
    }
    // View Patient Record [patientRecordsView.php]
    public function getPatientFindings(){
        $id =  trim($_GET["pr_id"]);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM findings WHERE pr_findings_id = '$id'");
        $sql->execute();
        $findings = $sql->fetchAll();
    
        return $findings;
        
    }
    // View Patient Findings [findingsView.php]
    public function findingsRecord(){
        $id =  trim($_GET["f_id"]);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM findings WHERE f_id = '$id' ");
        $sql->execute();
        $findings = $sql->fetch();
    
        return $findings;
        
    }
    public function getPhysicianID(){
        $name = trim($_GET["name"]);
        $arrayString= explode(" ", $name); // split string with space (white space) as a delimiter.
        $fname = $arrayString[0];
        $lname = end($arrayString);

        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT d_id FROM physicians WHERE d_fname LIKE '$fname%' and d_lname LIKE '$lname%' ");
        $sql->execute();
        $physicianID = $sql->fetch();

        return $physicianID;
    }


    //add findings to Doctor's Record
    public function addToDoctor() {
        $pr_id =  trim($_GET["pr_id"]);
        $f_id =  trim($_GET["f_id"]);

        if(isset($_POST['addRecordToDoctor'])){
            $a_user_id =  $pr_id;
            $a_fname =  $_POST['f_pr_fname'];
            $a_mname =  $_POST['f_pr_mname'];
            $a_lname =  $_POST['f_pr_lname'];
            $a_gender = $_POST['f_pr_gender'];
            $a_age = $_POST['f_pr_age'];
            $a_complaint = $_POST['f_chiefcomplaint'];
            $a_historypresentillness =  $_POST['f_historypresentillness'];
            $a_bp = $_POST['f_bp'];
            $a_rr = $_POST['f_rr'];
            $a_cr = $_POST['f_cr'];
            $a_temp = $_POST['f_temp'];
            $a_wt = $_POST['f_wt'];
            $a_pr = $_POST['f_pr'];
            $a_physicalexam = $_POST['f_physicalexam'];
            $a_diagnosis = $_POST['f_diagnosis'];
            $a_medication = $_POST['f_medication'];
            $a_date = $_POST['f_date'];
            $a_physician_id = $_POST['f_IDofphysician'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO add_patientfindings 
            (a_user_id, a_fname, a_mname, a_lname, a_gender, a_age, a_complaint, a_historypresentillness, a_bp, a_rr, a_cr,
            a_temp, a_wt, a_pr, a_physicalexam, a_diagnosis, a_medication, a_date, a_physician_id)
            VALUES ('$a_user_id', '$a_fname', '$a_mname', '$a_lname ', '$a_gender', '$a_age', '$a_complaint', '$a_historypresentillness', '$a_bp', '$a_rr', '$a_cr',
            '$a_temp', '$a_wt', '$a_pr', '$a_physicalexam', '$a_diagnosis', '$a_medication', '$a_date', '$a_physician_id')
            ");

            $sql->execute();
            $_SESSION['message'] = "Record Added Successfully";
            header('location: doctorRecordsView.php?d_id='.$a_physician_id);
        }

    }

    // Update Findings Record [findingsUpdate.php]
    public function updateFindingsRecord() {
        $id =  trim($_GET["f_id"]);
        unset($_SESSION['message']);

        if(isset($_POST['updateFindings'])){
            $a_casenumber = $_POST['a_casenumber'];
            $a_chief_complaint = $_POST['a_chief_complaint'];
            $a_historyillness = $_POST['a_historyillness'];
            $a_bp = $_POST['a_bp'];
            $a_rr = $_POST['a_rr'];
            $a_cr = $_POST['a_cr'];
            $a_temp = $_POST['a_temp'];
            $a_wt= $_POST['a_wt'];
            $a_pr= $_POST['a_pr'];
            $a_date = $_POST['a_date'];
            $a_physicalexam = $_POST['a_physicalexam'];
            $a_diagnosis = $_POST['a_diagnosis'];
            $a_medical_treatment = $_POST['a_medical_treatment'];
            $a_physician = $_POST['a_physician'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("UPDATE findings SET 
            pr_findings_id = '$a_casenumber', 
            f_chiefcomplaint = '$a_chief_complaint',
            f_historypresentillness = '$a_historyillness', 
            f_bp = '$a_bp', 
            f_rr = '$a_drr', 
            f_cr = ' $a_cr', 
            f_temp = '$a_temp', 
            f_wt = '$a_wt', 
            f_pr = '$a_pr', 
            f_date = '$a_date', 
            f_physicalexam = '$a_physicalexam', 
            f_diagnosis = '$a_diagnosis', 
            f_medication = '$a_medical_treatment', 
            f_nameofphysician = '$a_physician'
            
            WHERE f_id = '$id' ");
            $sql->execute();
            $_SESSION['message'] = "Record Updated Successfully";
            header('location:patientRecordsView.php?pr_id='.$a_casenumber);

        }
    }
    // Delete Findings Record [patientRecordsView.php]
    public function deleteFindingsRecord(){
         $id =  trim($_GET["pr_id"]);
        if(isset($_POST['deleteFindingsRecord'])){
            $delID = $_POST['delete_id'];
            $connection = $this->openConnection();
            $sql = $connection->prepare("DELETE FROM findings WHERE f_id = '$delID' ");
            $sql->execute();
            $_SESSION['message'] = "Deleted Successfully";
            header('location:patientRecordsView.php?pr_id='.$id);
        }
    }


    // Add Patient Record [opdform.php]
    public function addPatientRecord(){
    
        if(isset($_POST['addPatientRecord'])){
            $pr_fname = $_POST['fname'];
            $pr_mname = $_POST['middlen'];
            $pr_lname = $_POST['lname'];
            $pr_address = $_POST['address'];
            $pr_age = $_POST['age'];
            $pr_bdate = $_POST['datebirth'];
            $pr_bplace= $_POST['birthplace'];
            $pr_civilstat= $_POST['civilstat'];
            $pr_gender= $_POST['gender'];
            $pr_number = $_POST['number'];
            $pr_religion= $_POST['religion'];
            $pr_occup = $_POST['occup'];
            $date = date('Y-m-d');

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO patient_record (pr_date, pr_fname, pr_mname, pr_lname, pr_addrs, pr_age, pr_bdate, pr_bplace, pr_civilstat, pr_gen, pr_number, pr_religion, pr_occup)
            VALUES ('$date', '$pr_fname','$pr_mname', '$pr_lname', '$pr_address', '$pr_age', '$pr_bdate', '$pr_bplace', '$pr_civilstat', '$pr_gender', '$pr_number', '$pr_religion', '$pr_occup')");
            
            $sql->execute();
            $_SESSION['message'] = "Updated Successfully";
            header('location:addRecords.php');
        }
    }
    // Delete Patient Record [patientRecords.php]
    public function deletePatientRecord(){
        
        if(isset($_POST['deletePatientRecord'])){
            $delID = $_POST['delete_id'];
            $connection = $this->openConnection();
            $sql = $connection->prepare("DELETE FROM patient_record WHERE pr_id = '$delID' ");
            $sql->execute();
            $_SESSION['message'] = "Deleted Successfully";
            header('location:patientRecords.php');
        }
    }
//----------------ADD FINDINGS RECORDS--------------

// Add Findings Record [addRecord.php]
    public function addRecord(){
    
        if(isset($_POST['AddRecord'])){
            $a_casenumber = $_POST['a_casenumber'];
            $a_chief_complaint = $_POST['a_chief_complaint'];
            $a_historyillness = $_POST['a_historyillness'];
            $a_bp = $_POST['a_bp'];
            $a_rr = $_POST['a_rr'];
            $a_cr = $_POST['a_cr'];
            $a_temp= $_POST['a_temp'];
            $a_wt= $_POST['a_wt'];
            $a_pr= $_POST['a_pr'];
            $a_date = $_POST['a_date'];
            $a_physicalexam= $_POST['a_physicalexam'];
            $a_diagnosis = $_POST['a_diagnosis'];
            $a_medical_treatment = $_POST['a_medical_treatment'];
            $a_physician = $_POST['a_physician'];

            if(empty($a_chief_complaint)){
                $a_chief_complaint = 'N/A';
            }
            if(empty($a_historyillness)){
                $a_historyillness = 'N/A';
            }
            if(empty($a_physicalexam)){
                $a_physicalexam = 'N/A';
            } 
            if(empty($a_diagnosis)){
                $a_diagnosis = 'N/A';
            } 
            if(empty($a_medical_treatment)){
                $a_medical_treatment = 'N/A';
            }
            if(empty($a_physician)){
                $a_physician = 'N/A';
            }
            if(empty($a_bp)){
                $a_bp = 'N/A';
            }                
            if(empty($a_rr)){
                $a_rr = 'N/A';
            }
            if(empty($a_cr)){
                $a_cr = 'N/A';
            }
            if(empty($a_temp)){
                $a_temp = 'N/A';  
            }                
            if(empty($a_wt)){
                $a_wt = 'N/A';
            }                
            if(empty($a_pr)){
                $a_pr = 'N/A';
            }
                
             

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO findings (pr_findings_id, f_chiefcomplaint, f_historypresentillness, f_bp, f_rr, f_cr, f_temp, f_wt, f_pr, f_date, f_physicalexam, f_diagnosis, f_medication, f_nameofphysician)
            VALUES ('$a_casenumber', '$a_chief_complaint','$a_historyillness', '$a_bp', '$a_rr', '$a_cr', '$a_temp', '$a_wt', '$a_pr', '$a_date', '$a_physicalexam', '$a_diagnosis', '$a_medical_treatment', '$a_physician')");
            
            $sql->execute();
            $_SESSION['message'] = "Record Added Successfully";
            header('location:patientRecordsView.php?pr_id='.$a_casenumber);
        }

    }


//----------------DOCTOR RECORDS--------------------

    // Main Patient Records Table [doctorsList.php]
    public function doctorRecord(){
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM physicians ORDER BY d_id");
        $sql->execute();
        $doctorRecord = $sql->fetchAll();
  
        return $doctorRecord;
    }

    // Get Patient Records [doctorRecords.php]
    public function getDoctorRecord() {
        $id = trim($_GET['d_id']);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM physicians WHERE d_id = '$id' ");
        $sql->execute();
        $doctorRecords = $sql->fetch();
        return $doctorRecords;
    }

    // Add Doctor Record [doctorform.php]
    public function addDoctorRecord(){
    
        if(isset($_POST['addDoctorRecord'])){
            $d_fname = $_POST['d_fname'];
            $d_mname = $_POST['d_mname'];
            $d_lname = $_POST['d_lname'];
            $d_address = $_POST['d_address'];
            $d_age = $_POST['d_age'];
            $d_gender= $_POST['d_gender'];
            $d_number = $_POST['d_num'];
            $d_fields= $_POST['d_fields'];
            $d_wards = $_POST['d_wards'];
            $date = date('Y-m-d');

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO physicians 
            (d_fname, d_mname, d_lname, d_address, d_gen, d_age, d_number, d_field, d_ward, d_date)
            VALUES ('$d_fname', '$d_mname','$d_lname', '$d_address', '$d_gender', '$d_age', '$d_number', '$d_fields', '$d_wards', '$date')");
            
            $sql->execute();
            $_SESSION['message'] = "Record Added Successfully";
            header('location:doctorsList.php');
        }
    }
    // Update Doctor Record [doctorRecordsUpdate.php]
    public function updateDoctorRecord(){
        $id =  trim($_GET["d_id"]);
        unset($_SESSION['message']);

        if(isset($_POST['updateDoctorRecord'])){
            $d_fname = $_POST['d_fname'];
            $d_mname = $_POST['d_mname'];
            $d_lname = $_POST['d_lname'];
            $d_address = $_POST['d_address'];
            $d_age = $_POST['d_age'];
            $d_gender= $_POST['d_gender'];
            $d_number = $_POST['d_num'];
            $d_fields= $_POST['d_fields'];
            $d_wards = $_POST['d_wards'];
            $date = date('Y-m-d');

            $connection = $this->openConnection();
            $sql = $connection->prepare("UPDATE physicians SET
            d_fname = '$d_fname', 
            d_mname = '$d_mname', 
            d_lname = '$d_lname', 
            d_address = '$d_address', 
            d_gen = '$d_gender', 
            d_age = '$d_age', 
            d_number = '$d_number', 
            d_field = '$d_fields', 
            d_ward = '$d_wards', 
            d_date = '$date' 

            WHERE d_id = '$id'
            ");
            
            
            $sql->execute();
            $_SESSION['message'] = "Record Updated Successfully";
            header('location:doctorsList.php');
        }
    }

    // Doctor Findings Table [doctorRecordsView.php]
    public function getDoctorFindings(){
        $id =  trim($_GET["d_id"]);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM add_patientfindings WHERE a_physician_id = '$id' ");
        $sql->execute();
        $findings = $sql->fetchAll();
    
        return $findings;
        
    }
    // View Patient Findings [d_findingsView.php]
    public function doctorFindingsRecord(){
        $id =  trim($_GET["a_id"]);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM add_patientfindings WHERE a_id = '$id' ");
        $sql->execute();
        $findings = $sql->fetch();
    
        return $findings;
        
    }

    // Delete Doctor Record [doctorsList.php]
    public function deleteDoctorRecord(){
        
        if(isset($_POST['deleteDoctorRecord'])){
            $delID = $_POST['delete_id'];
            $connection = $this->openConnection();
            $sql = $connection->prepare("DELETE FROM physicians WHERE d_id = '$delID' ");
            $sql->execute();
            $_SESSION['message'] = "Deleted Successfully";
            header('location:doctorsList.php');
        }
    }


//----------------HOSPITAL WARDS--------------------

    // Main Hospital Wards Table [hopsitalWards.php]
    public function hospitalWardsRecord(){
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM wards ORDER BY w_id");
        $sql->execute();
        $doctorRecord = $sql->fetchAll();
  
        return $doctorRecord;
    }

    // Update Hospital Wards Record [hospitalWardsUpdate.php]
    public function getWardsRecord(){
        $id =  trim($_GET["w_id"]);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM wards WHERE w_id = '$id' ");
        $sql->execute();
        $record = $sql->fetch();
        return $record;
    }

    public function updateWardsRecord(){
        $id =  trim($_GET["w_id"]);
        unset($_SESSION['message']);
        
        if (isset($_POST['updateRecord'])){
            $w_name = $_POST['w_name'];
            $w_description = $_POST['w_description'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("UPDATE wards SET 
                w_name = '$w_name', 
                w_description = '$w_description'

                WHERE w_id = '$id'

                ");
            $sql->execute();
            $_SESSION['message'] = "Updated Successfully";
            header('location:hospitalWards.php');
        }        
    }

    // Delete Hospital Wards Record [hospitalWards.php]
    public function del_Add_WardsRecord(){
    
        if(isset($_POST['deleteWardsRecord'])){
            $delID = $_POST['delete_id'];
            $connection = $this->openConnection();
            $sql = $connection->prepare("DELETE FROM wards WHERE w_id = '$delID' ");
            $sql->execute();
            $_SESSION['message'] = "Deleted Successfully";
            header('location:hospitalWards.php');
        }

        if(isset($_POST['addWards'])){
            $w_name = $_POST['w_name'];
            $w_description = $_POST['w_description'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO wards (w_name, w_description)
            VALUES ('$w_name','$w_description') ");

            $sql->execute();
            $_SESSION['message'] = "Ward Added Successfully";
            header('location:hospitalWards.php');
        }
    }

//----------------FIELDS OF PHYSICIANS--------------------

    // Main Fields of Physicians Table [fieldsOfPhysicians.php]
    public function fieldsRecord(){
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM fieldsphysician ORDER BY fp_id");
        $sql->execute();
        $doctorRecord = $sql->fetchAll();
  
        return $doctorRecord;
    }

    // Update Fields of Physicians Record [fieldsUpdate.php]
    public function getFieldsRecord(){
        $id =  trim($_GET["fp_id"]);
        $connection = $this->openConnection();
        $sql = $connection->prepare("SELECT * FROM fieldsphysician WHERE fp_id = '$id' ");
        $sql->execute();
        $record = $sql->fetch();
        return $record;
    }

    public function updateFieldsRecord(){
        $id =  trim($_GET["fp_id"]);
        unset($_SESSION['message']);
        
        if (isset($_POST['updateRecord'])){
            $w_name = $_POST['fp_name'];
            $w_description = $_POST['fp_description'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("UPDATE fieldsphysician SET 
                fp_name = '$w_name', 
                fp_description = '$w_description'

                WHERE fp_id = '$id'

                ");
            $sql->execute();
            $_SESSION['message'] = "Updated Successfully";
            header('location:fieldsOfPhysicians.php');
        }        
    }

    // Delete Fields of Physicianss Record [fieldsOfPhysicians.php]
    public function del_Add_FieldsRecord(){
        $delID = $_POST['delete_id'];

        if(isset($_POST['deleteFieldsRecord'])){
            $delID = $_POST['delete_id'];
            $connection = $this->openConnection();
            $sql = $connection->prepare("DELETE FROM fieldsphysician WHERE fp_id = '$delID' ");
            $sql->execute();
            $_SESSION['message'] = "Deleted Successfully";
            header('location:fieldsOfPhysicians.php');
        }

        if(isset($_POST['addFields'])){
            $fp_name = $_POST['fp_name'];
            $fp_description = $_POST['fp_description'];

            $connection = $this->openConnection();
            $sql = $connection->prepare("INSERT INTO fieldsphysician (fp_name, fp_description)
            VALUES ('$fp_name','$fp_description') ");

            $sql->execute();
            $_SESSION['message'] = "Ward Added Successfully";
            header('location:fieldsOfPhysicians.php');
        }
    }
    public function delID(){
        $delID = $_POST['delete_id'];
        return $delID;
    }

    
}