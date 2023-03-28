<?php 
require_once("../include/initialize.php");
 if(!isset($_SESSION['employer_id'])){
    redirect(web_root."employer/login.php");
  }

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
  case '1' :
        // $title="Home"; 
    // $content='home.php'; 
    if ($_SESSION['role']=='Cashier') {
        # code...
      redirect('orders/');

    } 
    if ($_SESSION['role']=='Administrator') {
        # code... 

      redirect('meals/');

    } 
    break;  
  default :
 
      $title="Home"; 
    $content ='home.php';    
}
require_once("theme/templates.php");
?>