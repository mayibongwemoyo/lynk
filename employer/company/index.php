<?php
require_once("../../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Company";
switch ($view) {
	case 'list' :
		$content    = 'list.php';		
		break;

	case 'add' :
		$content    = 'add.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	default :
		$content    = 'list.php';		
}
require_once ("../theme/templates.php");
?>
  
