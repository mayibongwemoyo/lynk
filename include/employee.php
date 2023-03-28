<?php
require_once(LIB_PATH.DS.'database.php');
class Employee {
	protected static  $tblname = "employees";
	protected static  $tblname1 = "students";
	protected static  $colname = "student_id";
	protected static  $colname1 = "company_id";


	//from the employees table
	public $employee_id;
	public $company_id;
	public $role;
	public $assessment_1;
	public $assessment_2;
	public $assessment_3;
	public $assessment_final;
	public $start_date;

	//from the students table
	public $student_id;
	public $fname;
	public $lname;
	public $institution;
	public $status;
	public $address;
	public $sex;
	public $civil_status;
	public $birth_date;
	public $birth_place;
	public $age;
	public $username;
	public $password;
	public $email_address;
	public $contact_no;
	public $degree;
	public $photo;
	public $national_id;

	

	// function dbfields () {
	// 	global $mydb;
	// 	return $mydb->getfieldsononetable(self::$tblname);

	// }

	function dbfields() {
		global $mydb;
		$mydb->setQuery("SELECT * FROM ".self::$tblname." UNION SELECT * FROM ".self::$tblname1);
		return $mydb->loadResultList();
	}
	
	// function listofemployee(){
	// 	global $mydb;
	// 	$mydb->setQuery("SELECT * FROM ".self::$tblname);
	// 	return $cur;
	// }

	// function listofemployee($company_id){
	// 	global $mydb;
	// 	$mydb->setQuery("SELECT s.* FROM students s INNER JOIN employees e ON s.student_id = e.student_id WHERE e.company_id = {$company_id}");
	// 	$cur = $mydb->loadResultList();
	// 	return $cur;
	// }

	function listofemployee($company_id){
		global $mydb;
	$mydb->setQuery("SELECT e.* FROM ".self::$tblname." e INNER JOIN ".self::$tblname1." s ON e.".self::$colname." = s.".self::$colname." WHERE e.".self::$colname1." = {$company_id}");
	// $mydb->setQuery("SELECT s.* FROM ".self::$tblname1." s INNER JOIN ".self::$tblname." e ON s.".self::$colname." = e.".self::$colname." WHERE e.".self::$colname1." = {$company_id}");
		$cur = $mydb->loadResultList();
		return $cur;
	}

	
	// function find_employee($id="",$name=""){
	// 	global $mydb;
	// 	$mydb->setQuery("SELECT * FROM ".self::$tblname." 
	// 		WHERE EMPLOYEEID = {$id} OR Lastname = '{$name}'");
	// 	$cur = $mydb->executeQuery();
	// 	$row_count = $mydb->num_rows($cur);
	// 	return $row_count;
	// }
	function find_employee($employee_id="", $lname="", $company_id) {
		global $mydb;
		$mydb->setQuery("SELECT e.*, s.* FROM " . self::$tblname . " e
						 JOIN ".self::$tblname1." s ON e.student_id = s.student_id
						 WHERE e.employee_id = '{$employee_id}' OR s.lname = '{$lname}' AND e.company_id= '{$company_id}'");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}
	

	// function find_all_employee($lname="",$Firstname=""){
	// 	global $mydb;
	// 	$mydb->setQuery("SELECT * FROM ".self::$tblname." 
	// 		WHERE lname = '{$lname}' AND fname= '{$Firstname}'");
	// 	$cur = $mydb->executeQuery();
	// 	$row_count = $mydb->num_rows($cur);
	// 	return $row_count;
	// }

	
	 
	function single_employee($id=""){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tblname." 
				Where INCID= '{$id}' LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function select_employee($id=""){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tblname." 
				Where  INCID= '{$id}' LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function EmployeeAuthentication($U_USERNAME,$h_pass){
		global $mydb;
		$mydb->setQuery("SELECT * FROM `students` WHERE `student_id`='".$U_USERNAME."' AND `password`='".$h_pass."'");
		$cur = $mydb->executeQuery();
		if($cur==false){
			// die(sqli_error());
			die($cur = $mydb->sqli_error());

		}
		$row_count = $mydb->num_rows($cur);//get the number of count
		 if ($row_count == 1){
		 $emp_found = $mydb->loadSingleResult();
		 	$_SESSION['INCID']   			= $emp_found->INCID; 
		 	$_SESSION['employee_id']   		= $emp_found->employee_id; 
		 	$_SESSION['student_id']   		= $emp_found->student_id; 
		 	$_SESSION['company_id']   		= $emp_found->company_id; 
		 	$_SESSION['role'] 		        = $emp_found->role;
		 	$_SESSION['password'] 		    = $emp_found->password; 
			$_SESSION['fname']				= $emp_found->fname; 
			$_SESSION['lname']				= $emp_found->lname; 
			$_SESSION['address']			= $emp_found->address;  
			$_SESSION['institution']		= $emp_found->institution;  
		   return true;
		 }else{
		 	return false;
		 }
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
	
	
	/*--Create,Update and Delete methods--*/
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->employee_id) ? $this->update() : $this->create();
	}
	
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
	    $this->employee_id = $mydb->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update($employee_id='') {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tblname." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE employee_id='". $employee_id."'";
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

   public function empupdate($id=0) {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tblname." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE INCID=". $id;
	  $mydb->setQuery($sql);
	 	if(!$mydb->executeQuery()) return false; 	
		
	}

	public function delete($employee_id='') {
		global $mydb;
		  $sql = "DELETE FROM ".self::$tblname;
		  $sql .= " WHERE employee_id='". $employee_id."'";
		  $sql .= " LIMIT 1 ";
		  $mydb->setQuery($sql);
		  
			if(!$mydb->executeQuery()) return false; 	
	
	}	


}
?>