
<?php
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
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
		if(isset($_POST['save'])){


		if ( $_POST['auto_start'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$autonumber = New Autonumber();
			$autonumber->auto_start	= $_POST['auto_start'];
			$autonumber->auto_inc	= $_POST['auto_inc'];
			$autonumber->auto_end	= $_POST['auto_end'];
			$autonumber->auto_key	= $_POST['auto_key'];
			$autonumber->create();

			message("New Autonumber created successfully!", "success");
			redirect("index.php");
			
		} 
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$autonumber = New Autonumber();
			$autonumber->auto_start	= $_POST['auto_start'];
			$autonumber->auto_inc	= $_POST['auto_inc'];
			$autonumber->auto_end	= $_POST['auto_end'];
			$autonumber->auto_key	= $_POST['auto_key'];
			$autonumber->update($_POST['auto_id']);

			message(" Autonumber has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$autonumber = New Autonumber();
			$autonumber->delete($id);

			message("autonumber already Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$autonumber = New autonumber();
		// 	$autonumber->delete($id[$i]);

		// 	message("autonumber already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>