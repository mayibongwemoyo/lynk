<?php  
require_once ("include/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'submitapplication' :
	doSubmitApplication();
	break;

	case 'employerregister' :
	doEmployerRegister();
	break;
  
	case 'register' :
	doRegister();
	break;  

	case 'login' :
	doLogin();
	break; 
	}

function doSubmitApplication() { 
	global $mydb;   
		$jobid  = $_GET['company_id'];
		

		$autonum = New Autonumber();
		$applicantid = $autonum->set_autonumber('applicant');
		$autonum = New Autonumber();
		$fileid = $autonum->set_autonumber('file_id');

		@$picture = UploadImage();
		@$location = "photos/". $picture ;


		if ($picture=="") {
			# code...
			redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
		}else{ 
			
			if (isset($_SESSION['applicant_id'])) {

				$sql = "INSERT INTO `attachmentfile` (file_id,`user_attachement_id`, `file_name`, `file_location`, `company_id`) 
				VALUES ('". date('Y').$fileid->AUTO."','{$_SESSION['applicant_id']}','Resume','{$location}','{$jobid}')";
				$mydb->setQuery($sql); 
				$res = $mydb->executeQuery(); 

				doUpdate($jobid,$fileid->AUTO);
				
			}else{
				 
				$sql = "INSERT INTO `attachmentfile` (file_id,`user_attachement_id`, `file_name`, `file_location`, `company_id`) 
				VALUES ('". date('Y').$fileid->AUTO."','". date('Y').$applicantid->AUTO."','Resume','{$location}','{$jobid}')";
				// echo $sql;exit;
				$mydb->setQuery($sql); 
				$res = $mydb->executeQuery(); 

				doInsert($jobid,$fileid->AUTO); 

				$autonum = New Autonumber();
				$autonum->auto_update('applicant');
			}
		}

		$autonum = New Autonumber();
	    $autonum->auto_update('file_id'); 
	 
}
function doInsert($jobid=0,$fileid=0) {
	if (isset($_POST['submit'])) {  
	global $mydb; 

			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 20){
			message("Invalid age. 20 years old and above is allowed.", "error");
			redirect("index.php?q=apply&view=personalinfo&job=".$jobid);

			}else{

			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('applicant');
			 
			$applicant =New Applicants();
			$applicant->applicant_id = date('Y').$auto->AUTO;
			$applicant->fname = $_POST['fname'];
			$applicant->lname = $_POST['lname'];
			$applicant->address = $_POST['address'];
			$applicant->sex = $_POST['optionsRadios'];
			$applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
			$applicant->birth_date = $birthdate;
			$applicant->birth_place = $_POST['birth_place'];
			$applicant->age = $age;
			$applicant->USERNAME = $_POST['USERNAME'];
			$applicant->PASS = sha1($_POST['PASS']);
			$applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
			$applicant->CONTACTNO = $_POST['TELNO'];
			$applicant->DEGREE = $_POST['DEGREE'];
			$applicant->create();


			$sql = "SELECT * FROM `company` c,`job` j WHERE c.`company_id`=j.`company_id` AND company_id = '{$jobid}'" ;
			$mydb->setQuery($sql);
			$result = $mydb->loadSingleResult();


			$jobreg = New JobRegistration(); 
			$jobreg->company_id = $result->company_id;
			$jobreg->company_id     = $result->company_id;
			$jobreg->applicant_id = date('Y').$auto->AUTO;
			$jobreg->applicant   = $_POST['fname'] . ' ' . $_POST['lname'];
			$jobreg->registration_date = date('Y-m-d');
			$jobreg->file_id = date('Y').$fileid;
			$jobreg->remarks = 'Pending';
			$jobreg->date_time_approved = date('Y-m-d H:i');
			$jobreg->create();
  

			message("Your application already submitted. Please wait for the company confirmation if your are qualified to this job.","success");
			redirect("index.php?q=success&job=".$result->company_id);

			
	 }
}
}
function doUpdate($jobid=0,$fileid=0) {
	if (isset($_POST['submit'])) {
	global $mydb;   

			$applicant =New Applicants();
			$appl  = $applicant->single_applicant($_SESSION['applicant_id']);

			 

			$sql = "SELECT * FROM `company` c,`job` j WHERE c.`company_id`=j.`company_id` AND company_id = '{$jobid}'" ;
			$mydb->setQuery($sql);
			$result = $mydb->loadSingleResult();


			$jobreg = New JobRegistration(); 
			$jobreg->company_id = $result->company_id;
			$jobreg->company_id     = $result->company_id;
			$jobreg->applicant_id = $appl->applicant_id;
			$jobreg->applicant   = $appl->fname . ' ' . $appl->lname;
			$jobreg->registration_date = date('Y-m-d');
			$jobreg->file_id = date('Y').$fileid;
			$jobreg->remarks = 'Pending';
			$jobreg->date_time_approved = date('Y-m-d H:i');
			$jobreg->create();

  
			message("Your application already submitted. Please wait for the company confirmation if your are qualified to this job.","success");
			redirect("index.php?q=success&job=".$result->company_id);
 
	}
}
function doRegister(){
	global $mydb;
	if (isset($_POST['btnRegister'])) { 
			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 20){
			message("Invalid age. 20 years old and above is allowed.", "error");
			redirect("index.php?q=register");

			}else{

			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('applicant');
			 
			$applicant =New Applicants();
			$applicant->applicant_id = date('Y').$auto->AUTO;
			$applicant->fname = $_POST['fname'];
			$applicant->lname = $_POST['lname'];
			$applicant->address = $_POST['address'];
			$applicant->sex = $_POST['optionsRadios'];
			$applicant->CIVILSTATUS = $_POST['CIVILSTATUS'];
			$applicant->birth_date = $birthdate;
			$applicant->birth_place = $_POST['birth_place'];
			$applicant->age = $age;
			$applicant->USERNAME = $_POST['USERNAME'];
			$applicant->PASS = sha1($_POST['PASS']);
			$applicant->EMAILADDRESS = $_POST['EMAILADDRESS'];
			$applicant->CONTACTNO = $_POST['TELNO'];
			$applicant->DEGREE = $_POST['DEGREE'];
			$applicant->create();


 
			$autonum = New Autonumber();
			$autonum->auto_update('applicant');


			message("You are successfully registered to the site. You can login now!","success");
			redirect("index.php?q=success");

			
	 }
}
}

function doLogin(){
	
	$email = trim($_POST['USERNAME']);
	$upass  = trim($_POST['PASS']);
	$h_upass = sha1($upass);
 
  //it creates a new objects of member
    $applicant = new Applicants();
    //make use of the static function, and we passed to parameters
    $res = $applicant->applicantAuthentication($email, $h_upass);
    if ($res==true) { 

       	message("You are now successfully login!","success");
       
       // $sql="INSERT INTO `tbllogs` (`ADMINID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
       //    VALUES (".$_SESSION['ADMINID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged in')";
       //    mysql_query($sql) or die($cur = $mydb->sqli_error()); 
         redirect(web_root."applicant/");
     
    }else{
    	 echo "Account does not exist! Please contact Administrator."; 
    } 
}
 
function UploadImage($jobid=0){
	$target_dir = "applicant/photos/";
	$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
|| $imageFileType != "gif" ) {
		 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			return  date("dmYhis") . basename($_FILES["picture"]["name"]);
		}else{
			message("Error Uploading File","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}
	}else{
			message("File Not Supported","error");
			// redirect(web_root."index.php?q=apply&job=".$jobid."&view=personalinfo");
			// exit;
		}
} 


//employer functions
function doEmployerRegister(){
	global $mydb;
	if (isset($_POST['btnEmployerRegister'])) { 
	
			$autonum = New Autonumber();
			$auto = $autonum->set_autonumber('EMPLOYER');
			 
			$employer =New Employer();
			$employer->employer_id = uniqid();
			$employer->fname = $_POST['fname'];
			$employer->lname = $_POST['lname'];
			$employer->role = $_POST['role'];
			$employer->company_name = $_POST['company_name'];
			$employer->employer_email = $_POST['employer_email'];
			$employer->employer_pass = ($_POST['employer_pass']);
			$employer->create();

		
			$autonum = New Autonumber();
			$autonum->auto_update('EMPLOYER');


			message("You are successfully registered to the site. You can login now!","success");
			// redirect("employer/index.php?q=success");

			
	 
}
}

?>