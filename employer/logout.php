<?php 
require_once '../include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
// unset( $_SESSION['employer_id'] );
// unset( $_SESSION['fname'] );
// unset( $_SESSION['USERNAME'] );
// unset( $_SESSION['PASS'] );
// unset( $_SESSION['role'] );
 

unset($_SESSION['employer_id']);  
unset($_SESSION['EMPLOYER_FNAME']); 
unset($_SESSION['EMPLOYER_USERNAME']);  
unset($_SESSION['role']); 
// 4. Destroy the session
// session_destroy();
redirect(web_root."employer/login.php?logout=1");
?>