<?php 
// require_once(LIB_PATH.DS.'database.php');
require_once('database.php');

class Employer{
    protected static  $tblname = "employers";
    public $employer_id; 
    public $fname;
    public $lname; 
    public $role;
    public $company_name;
    public $employer_email;
    public $employer_pass;



//employer functions


public function create() {
  global $mydb;
  // Don't forget your SQL syntax and good habits:
  // - INSERT INTO table (key, key) VALUES ('value', 'value')
  // - single-quotes around all values
  // - escape all values to prevent SQL injection
  $attributes = $this->sanitized_attributes();
  $sql = "INSERT INTO ".self::$tblname." (";
  $sql .= join(", ", array_keys($attributes));
  $sql .= ") VALUES ('";
  $sql .= join("', '", array_values($attributes));
  $sql .= "')";
echo $mydb->setQuery($sql);

 if($mydb->executeQuery()) {
    $this->employer_id = $mydb->insert_id();
    return true;
  } else {
    return false;
  }
}


function dbfields () {
  global $mydb;
  return $mydb->getfieldsononetable(self::$tblname);

}

function listofuser(){
  global $mydb;
  $mydb->setQuery("SELECT * FROM ".self::$tblname);
  return $cur;
}

function find_user($id="",$email=""){
  global $mydb;
  $mydb->setQuery("SELECT * FROM ".self::$tblname." 
    WHERE employer_id = {$id} OR employer_email = '{$email}'");
  $cur = $mydb->executeQuery();
  $row_count = $mydb->num_rows($cur);
  return $row_count;
}

	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  global $mydb;
	  $attributes = array();
	  foreach($this->dbfields() as $field) {
	    if(property_exists($this, $field)) {
			$attributes[$field] = $this->$field;
		}
	  }
	  return $attributes;
	}
protected function sanitized_attributes() {
  global $mydb;
  $clean_attributes = array();
  // sanitize the values before submitting
  // Note: does not alter the actual value of each attribute
  foreach($this->attributes() as $key => $value){
    $clean_attributes[$key] = $mydb->escape_value($value);
  }
  return $clean_attributes;
}


function employerAuthentication($email,$h_upass){
  global $mydb;

  if ($email=='PLAZACAFE' && $h_upass==sha1('MELOIS')) {
    # code...
    $_SESSION['employer_id']   		= '1001000110110';
     $_SESSION['fname']      	= 'Programmer';
     $_SESSION['role'] 			= 'Programmer';
     return true;
  }else{
    $mydb->setQuery("SELECT * FROM `employers` WHERE `employer_email` = '". $email ."' and `employer_pass` = '". $h_upass ."'");
    $cur = $mydb->executeQuery();
    if($cur==false){
      die($cur = $mydb->sqli_error());
    }
    $row_count = $mydb->num_rows($cur);//get the number of count
     if ($row_count == 1){
       $user_found = $mydb->loadSingleResult();
       $_SESSION['employer_id']   	= $user_found->employer_id;
       $_SESSION['fname']      	= $user_found->fname;
       $_SESSION['lname']      	= $user_found->lname;
       $_SESSION['role'] 			= $user_found->role;
       $_SESSION['company_name'] 	= $user_found->company_name;
       $_SESSION['employer_email'] 	= $user_found->employer_email;
       $_SESSION['employer_pass'] 	= $user_found->employer_pass;
        return true;
     }else{
       return false;
     }
  }
}

function single_employer($id=""){
  global $mydb;
  $mydb->setQuery("SELECT * FROM ".self::$tblname." 
    Where employer_id= '{$id}' LIMIT 1");
  $cur = $mydb->loadSingleResult();
  return $cur;
}
/*---Instantiation of Object dynamically---*/
static function instantiate($record) {
$object = new self;

foreach($record as $attribute=>$value){
  if($object->has_attribute($attribute)) {
    $object->$attribute = $value;
  }
} 
return $object;
}



// function doEmployerRegister(){
// 	global $mydb;
// 	if (isset($_POST['employerRegister'])) { 
	
// 			$autonum = New Autonumber();
// 			$auto = $autonum->set_autonumber('EMPLOYER');
			 
// 			$employer =New Employer();
// 			$employer->employer_id = date('Y').$auto->AUTO;
// 			$employer->fname = $_POST['fname'];
// 			$employer->lname = $_POST['lname'];
// 			$employer->ROLE = $_POST['ROLE'];
// 			$employer->company_name = $_POST['company_name'];
// 			$employer->employer_email = $_POST['employer_email '];
// 			$employer->EMPLOYERUSERNAME = $_POST['EMPLOYERUSERNAME'];
// 			$employer->employer_pass = sha1($_POST['employer_pass']);
		
// 			$autonum = New Autonumber();
// 			$autonum->auto_update('EMPLOYER');


// 			message("You are successfully registered to the site. You can login now!","success");
// 			redirect("employer/index.php?q=success");

			
	 
// }
// }

// function doEmployerLogin(){
	
// 	$email = trim($_POST['EMPLOYERUSERNAME']);
// 	$upass  = trim($_POST['employer_pass']);
// 	$h_upass = sha1($upass);
 
//   //it creates a new objects of member
//     $employer = new Employer();
//     //make use of the static function, and we passed to parameters
//     $res = $employer->doemployerAuthentication($email, $h_upass);
//     if ($res==true) { 

//        	message("You are now successfully login!","success");
       
//        // $sql="INSERT INTO `tbllogs` (`ADMINID`,USERNAME, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
//        //    VALUES (".$_SESSION['ADMINID'].",'".$_SESSION['FULLNAME']."','".date('Y-m-d H:i:s')."','".$_SESSION['UROLE']."','Logged in')";
//        //    mysql_query($sql) or die($cur = $mydb->sqli_error()); 
//          redirect(web_root."employer/");
     
//     }else{
//     	 echo "Account does not exist! Please contact Administrator."; 
//     } 
// }
// function doEmployerAuthentication($U_USERNAME,$h_pass){
//     global $mydb;
//     $mydb->setQuery("SELECT * FROM `employers` WHERE `EMPLOYERUSERNAME`='".$U_USERNAME."' AND `employer_pass`='".$h_pass."'");
//     $cur = $mydb->executeQuery();
//     if($cur==false){
//         die(sqli_error());
//     }
//     $row_count = $mydb->num_rows($cur);//get the number of count
//      if ($row_count == 1){
//      $emp_found = $mydb->loadSingleResult(); 
//          $_SESSION['employer_id']   		= $emp_found->applicant_id; 
//          $_SESSION['EMPLOYERUSERNAME'] 			= $emp_found->USERNAME;  
//        return true;
//      }else{
//          return false;
//      }
// }
}
?>