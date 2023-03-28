
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


		if ( $_POST['category'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$category = New Category();
			$category->category	= $_POST['category'];
			$category->create();

			message("New [". $_POST['category'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
		if(isset($_POST['save'])){

			$category = New Category();
			$category->category	= $_POST['category'];
			$category->update($_POST['category_id']);

			message("[". $_POST['category'] ."] has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$category = New Category();
			$category->delete($id);

			message("Category has been Deleted!","info");
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