<?php 
global $mydb;
	$red_id = isset($_GET['id']) ? $_GET['id'] : '';

	$jobregistration = New JobRegistration();
	$jobreg = $jobregistration->single_jobregistration($red_id);
	 // `company_id`, `company_id`, `applicant_id`, `applicant`, `registration_date`, `remarks`, `file_id`, `pending_application`


	$applicant = new Applicants();
	$appl = $applicant->single_applicant($jobreg->applicant_id);
 // `fname`, `lname`, `address`, `sex`, `CIVILSTATUS`, `birth_date`, `birth_place`, `age`, `USERNAME`, `PASS`, `EMAILADDRESS`,CONTACTNO

	$jobvacancy = New Jobs();
	$job = $jobvacancy->single_job($jobreg->company_id);
 // `company_id`, `category`, `occupation_title`, `req_no_employees`, `salaries`, `duration_employment`, `qualification_work_experience`, `job_description`, `prefered_sex`, `sector_vacancy`, `job_status`, `date_posted`

	$company = new Company();
	$comp = $company->single_company($jobreg->company_id);
	 // `company_name`, `company_address`, `company_contact_no`

	$sql = "SELECT * FROM `attachmentfile` WHERE `file_id`=" .$jobreg->file_id;
	$mydb->setQuery($sql);
	$attachmentfile = $mydb->loadSingleResult();


?> 
<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 20px;
	font-weight: bold;
}
.content-body {
	min-height: 350px;
	/*border-bottom: 1px solid #ddd;*/
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}
</style>
<form action="controller.php?action=approve" method="POST">
<div class="col-sm-12 content-header" style="">View Details</div>
<div class="col-sm-12 content-body" >  
	<h3><?php echo $job->occupation_title; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php echo $jobreg->registration_id;?>">

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $job->req_no_employees; ?></li>
            <li><i class="fp-ht-food"></i>Salary : <?php echo number_format($job->salaries,2);  ?></li>
            <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $job->duration_employment; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $job->prefered_sex; ?></li>
            <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $job->sector_vacancy; ?></li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Job Description : </p>   
		<p style="margin-left: 15px;"><?php echo $job->job_description;?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Qualification/Work Experience : </p>
		<p style="margin-left: 15px;"><?php echo $job->qualification_work_experience; ?></p>
	</div>
	<div class="col-sm-12"> 
		<p>Employeer : </p>
		<p style="margin-left: 15px;"><?php echo $comp->company_name ; ?></p> 
		<p style="margin-left: 15px;">@ <?php echo $comp->company_address ; ?></p>
	</div>
</div>
 
<div class="col-sm-12 content-footer">
<p><i class="fa fa-paperclip"></i>  Attachment Files</p>
	<div class="col-sm-12 slider">
		 <h3>Download Resume <a href="<?php echo web_root.'applicant/'.$attachmentfile->file_location; ?>">Here</a></h3>
	</div>  
	<div class="col-sm-12">
		<p>Feedback</p>
		<p><?php echo isset($jobreg->remarks) ? $jobreg->remarks : ""; ?></p>
	</div>
	<div class="col-sm-12  submitbutton "> 
		<a href="index.php?view=appliedjobs" class="btn btn-primary fa fa-arrow-left">Back</a>
	</div> 
</div>
</form>