<?php
require_once ("../../include/initialize.php");
 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break; 
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;
   
   
    case 'addfiles' :
	doAddFiles();
	break;

	case 'approve' :
	doApproved();
	break;

	// case 'checkid' :
	// Check_StudentID();
	// break;
	

	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){


		if ( $_POST['fname'] == "" OR $_POST['lname'] == ""
			  OR $_POST['address'] == "" 
			OR $_POST['TELNO'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	

			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;

			if ($age < 20){
			message("Invalid age. 20 years old and above is allowed.", "error");
			redirect("index.php?view=add");

			}else{
			 


				$sql = "SELECT * FROM employees WHERE employee_id='" .$_POST['employee_id']. "'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$maxrow = $mydb->num_rows($cur);


				// $res = mysqli_query($sql) or die($cur = $mydb->sqli_error());
				// $maxrow = mysql_num_rows($res);
				if ($maxrow > 0) { 
					# code... 
					message("Employee ID already in use!", "error");
					redirect("index.php?view=add");
				}else{

					@$datehired = date_format(date_create($_POST['DATEHIRED']),'Y-m-d');

					$emp = New Employee(); 
					$emp->employee_id 		= $_POST['employee_id'];
					$emp->fname				= $_POST['fname']; 
					$emp->lname				= $_POST['lname'];
					$emp->address			= $_POST['address'];  
					$emp->birth_date	 		= $birthdate;
					$emp->birth_place		= $_POST['birth_place'];  
					$emp->age			    = $age;
					$emp->sex 				= $_POST['optionsRadios']; 
					$emp->CELLNO				= $_POST['CELLNO'];
					$emp->CIVILSTATUS		= $_POST['CIVILSTATUS']; 
					$emp->POSITION			= trim($_POST['POSITION']);
					// $emp->DEPARTMENTID		= $_POST['DEPARTMENTID'];
					// $emp->DIVISIONID		= $_POST['DIVISIONID'];
					$emp->EMAILADDRESS	= $_POST['EMAILADDRESS'];
					$emp->USERNAME		= $_POST['employee_id'];
					$emp->password		= sha1($_POST['employee_id']);
					$emp->DATEHIRED			=  @$datehired;
					$emp->company_id			= $_POST['company_id'];
					$emp->create(); 


				 
							
						$autonum = New Autonumber(); 
						$autonum->auto_update('employee_id');

					message("New employee created successfully!", "success");
					redirect("index.php");

				}
				
			}
		 }
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

		if ( $_POST['fname'] == "" OR $_POST['lname'] == ""
			 OR $_POST['address'] == "" 
			OR $_POST['TELNO'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	

			$birthdate =  $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

			$age = date_diff(date_create($birthdate),date_create('today'))->y;
		 	if ($age < 20 ){
		       message("Invalid age. 20 years old and above is allowed.", "error");
		       redirect("index.php?view=edit&id=".$_POST['employee_id']);

		    }else{

		    	@$datehired = date_format(date_create($_POST['DATEHIRED']),'Y-m-d');

					$emp = New Employee(); 
					$emp->employee_id 		= $_POST['employee_id'];
					$emp->fname				= $_POST['fname']; 
					$emp->lname				= $_POST['lname'];
					$emp->address			= $_POST['address'];  
					$emp->birth_date	 		= $birthdate;
					$emp->birth_place		= $_POST['birth_place'];  
					$emp->age			    = $age;
					$emp->sex 				= $_POST['optionsRadios']; 
					$emp->CELLNO				= $_POST['CELLNO'];
					$emp->CIVILSTATUS		= $_POST['CIVILSTATUS']; 
					$emp->POSITION			= trim($_POST['POSITION']);
					// $emp->DEPARTMENTID		= $_POST['DEPARTMENTID'];
					// $emp->DIVISIONID		= $_POST['DIVISIONID'];
					$emp->EMAILADDRESS		= $_POST['EMAILADDRESS'];
					$emp->USERNAME		= $_POST['employee_id'];
					$emp->password		= sha1($_POST['employee_id']);
					$emp->DATEHIRED			=  @$datehired;
					$emp->company_id			= $_POST['company_id'];

					$emp->update($_POST['employee_id']);
 

				message("Employee has been updated!", "success");
				// redirect("index.php?view=view&id=".$_POST['employee_id']);
		       redirect("index.php?view=edit&id=".$_POST['employee_id']);
	    	}


		}
  	
	 
	}

} 
	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","error");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$subj = New Student();
		// 	$subj->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$emp = New Employee();
	 		 	$emp->delete($id);
			 
		
		// }
			message("Employee(s) already Deleted!","success");
			redirect('index.php');
		// }

		
	}

 
 
  function UploadImage(){
			$target_dir = "../../employee/photos/";
			$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
		|| $imageFileType != "gif" ) {
				 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
					return  date("dmYhis") . basename($_FILES["picture"]["name"]);
				}else{
					echo "Error Uploading File";
					exit;
				}
			}else{
					echo "File Not Supported";
					exit;
				}
} 

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photo/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photo/" . $myfile);
		 	
					 

						// $stud = New Student();
						// $stud->StudPhoto	= $location;
						// $stud->studupdate($_POST['StudentID']);
						// redirect("index.php?view=view&id=". $_POST['StudentID']);
						 
							
					}
			}
			 
		}
function doApproved(){
global $mydb;
	if (isset($_POST['submit'])) {
		# code...
		$id = $_POST['JOBREGID'];
		$applicantid = $_POST['applicant_id'];

		$remarks = $_POST['remarks'];
		$sql="UPDATE `jobregistration` SET `remarks`='{$remarks}',pending_application=0,hview=0,date_time_approved=NOW() WHERE `registration_id`='{$id}'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();

		if ($cur) {
			# code...
			$sql = "SELECT * FROM `feedback` WHERE `registration_id`='{$id}'";
			$mydb->setQuery($sql);
			$res = $mydb->loadSingleResult();
			if (isset($res)) {
				# code...
				$sql="UPDATE `feedback` SET `feedback`='{$remarks}' WHERE `registration_id`='{$id}'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
			}else{
				$sql="INSERT INTO `feedback` (`applicant_id`, `registration_id`,`feedback`) VALUES ('{$applicantid}','{$id}','{$remarks}')";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery(); 

			}

			message("Applicant is calling for an interview.", "success");
			redirect("index.php?view=view&id=".$id); 
		}else{
			message("cannot be sve.", "error");
			redirect("index.php?view=view&id=".$id); 
		}


	}
}

 
?>