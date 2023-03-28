
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
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

 
	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['save'])){
 // `company_id`, `occupation_title`, `req_no_employees`, `salaries`, `duration_employment`, `qualification_work_experience`, `job_description`, `prefered_sex`, `sector_vacancy`
 
		if ( $_POST['company_id'] == "None") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$sql = "SELECT * FROM category where category_id = {$_POST['category']}";
			$mydb->setQuery($sql);
			$cat = $mydb->loadSingleResult();
			$_POST['category']=$cat->category;
			$job = New Jobs();
			$job->company_id							= $_POST['company_id']; 
			$job->category							= $_POST['category']; 
			$job->occupation_title					= $_POST['occupation_title'];
			$job->req_no_employees					= $_POST['req_no_employees'];
			$job->salaries							= $_POST['salaries'];
			$job->duration_employment				= $_POST['duration_employment'];
			$job->qualification_work_experience		= $_POST['qualification_work_experience'];
			$job->job_description					= $_POST['job_description'];
			$job->prefered_sex						= $_POST['prefered_sex'];
			$job->sector_vacancy					= $_POST['sector_vacancy']; 
			$job->date_posted						= date('Y-m-d H:i');
			$job->create();

			message("New Job Vacancy created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		global $mydb;
		if(isset($_POST['save'])){
			if ( $_POST['company_id'] == "None") {
				$messageStats = false;
				message("All field is required!","error");
				redirect('index.php?view=add');
			}else{	
				$sql = "SELECT * FROM category where category_id = {$_POST['category']}";
				$mydb->setQuery($sql);
				$cat = $mydb->loadSingleResult();
				$_POST['category']=$cat->category;
				$job = New Jobs();
				$job->company_id							= $_POST['company_id']; 
				$job->category							= $_POST['category']; 
				$job->occupation_title					= $_POST['occupation_title'];
				$job->req_no_employees					= $_POST['req_no_employees'];
				$job->salaries							= $_POST['salaries'];
				$job->duration_employment				= $_POST['duration_employment'];
				$job->qualification_work_experience		= $_POST['qualification_work_experience'];
				$job->job_description					= $_POST['job_description'];
				$job->prefered_sex						= $_POST['prefered_sex'];
				$job->sector_vacancy					= $_POST['sector_vacancy']; 
				$job->update($_POST['company_id']);

				message("Job Vacancy has been updated!", "success");
				redirect("index.php");
			}
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$job = New Jobs();
			$job->delete($id);

			message("Company has been Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>