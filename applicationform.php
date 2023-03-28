<section id="content">
  <div class="container content">     
 <?php
if (isset($_GET['search'])) {
# code...
$jobid = $_GET['search'];
}else{
$jobid = '';

}
$sql = "SELECT * FROM `company` c,`job` j WHERE c.`company_id`=j.`company_id` AND company_id LIKE '%" . $jobid ."%' ORDER BY date_posted DESC" ;
$mydb->setQuery($sql);
$result = $mydb->loadSingleResult();

?> 



 <p> <?php check_message();?></p>     
<?php 
if (isset($_SESSION['applicant_id'])) {
?>
    <div class="col-sm-12">
                   <div class="row">
                    <h2 class=" " >Job Details</h2>
                     <div class="panel">
                         <div class="panel-header">
                              <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->company_id;?>"><?php echo $result->occupation_title ;?></a> 
                              </div> 
                         </div>
                         <div class="panel-body">
                                  <div class="row contentbody">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $result->req_no_employees; ?></li>
                                                <li><i class="fp-ht-food"></i>Salary : <?php echo number_format($result->salaries,2);  ?></li>
                                                <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $result->duration_employment; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul> 
                                                <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $result->prefered_sex; ?></li>
                                                <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $result->sector_vacancy; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Qualification/Work Experience :</p>
                                             <ul style="list-style: none;"> 
                                                <li><?php echo $result->qualification_work_experience ;?></li> 
                                            </ul> 
                                        </div>
                                        <div class="col-sm-12"> 
                                            <p>Job Description:</p>
                                            <ul style="list-style: none;"> 
                                                 <li><?php echo $result->job_description ;?></li> 
                                            </ul> 
                                         </div>
                                        <div class="col-sm-12">
                                            <p>Employer :  <?php echo  $result->company_name; ?></p> 
                                            <p>Location :  <?php echo  $result->company_address; ?></p>
                                        </div>
                                    </div>
                         </div>
                         <div class="panel-footer">
                              Date Posted :  <?php echo date_format(date_create($result->date_posted),'M d, Y'); ?>
                         </div>
                     </div>
                     
                       
                </div>
            </div> 
             <form class="form-horizontal span6 " action="process.php?action=submitapplication&company_id=<?php echo $result->company_id; ?>"  enctype="multipart/form-data"  method="POST">
            <div class="col-sm-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Attach your Resume here.
                                <input name="company_id" type="hidden" value="<?php echo $_GET['job'];?>">
                            </div>
                        </div>
                        <div class="panel-body"> 
                            <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Attachtment File:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <input id="picture" name="picture" type="file">
                                <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                            </div> 
                        </div>
                    </div> 
                </div> 
            </div>
           <div class="form-group">
            <div class="col-md-12"> 
                 <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit" >Submit <span class="fa fa-arrow-right"></span></button>
              <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp;<strong>Back</strong></a> 
            </div>
           </div> 
        </form>
<?php }else{ ?>
  <form class="form-horizontal span6  wow fadeInDown" action="process.php?action=submitapplication&company_id=<?php echo $result->company_id; ?>"  enctype="multipart/form-data"  method="POST">
			<div class="col-sm-8"> 
                <div class="row">
                    <h2 class=" ">Personal Info</h2>   
                        <?php require_once('applicantform.php') ?>   
                 </div>
			</div>
			<div class="col-sm-4">
				   <div class="row">
                    <h2 class=" " >Job Details</h2>
                     <div class="panel">
                         <div class="panel-header">
                              <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->company_id;?>"><?php echo $result->occupation_title ;?></a> 
                              </div> 
                         </div>
                         <div class="panel-body">
                                  <div class="row contentbody">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $result->req_no_employees; ?></li>
                                                <li><i class="fp-ht-food"></i>Salary : <?php echo number_format($result->salaries,2);  ?></li>
                                                <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $result->duration_employment; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul> 
                                                <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $result->prefered_sex; ?></li>
                                                <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $result->sector_vacancy; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Qualification/Work Experience :</p>
                                             <ul style="list-style: none;"> 
                                                <li><?php echo $result->qualification_work_experience ;?></li> 
                                            </ul> 
                                        </div>
                                        <div class="col-sm-12"> 
                                            <p>Job Description:</p>
                                            <ul style="list-style: none;"> 
                                                 <li><?php echo $result->job_description ;?></li> 
                                            </ul> 
                                         </div>
                                        <div class="col-sm-12">
                                            <p>Employer :  <?php echo  $result->company_name; ?></p> 
                                            <p>Location :  <?php echo  $result->company_address; ?></p>
                                        </div>
                                    </div>
                         </div>
                         <div class="panel-footer">
                              Date Posted :  <?php echo date_format(date_create($result->date_posted),'M d, Y'); ?>
                         </div>
                     </div>
                     
                       
                </div>
			</div>
              <div class="col-sm-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Attach your Resume here.
                            </div>
                        </div>
                        <div class="panel-body"> 
                            <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Attachtment File:</label> 
                            <div class="col-md-10" style="padding: 0;margin: 0;">
                                <input id="picture" name="picture" type="file">
                                <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> 
                            </div> 
                        </div>
                    </div> 
                </div> 
            </div>
          <div class="form-group">
            <div class="col-md-12"> 
                 <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit" >Submit <span class="fa fa-arrow-right"></span></button>
              <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp;<strong>Back</strong></a> 
            </div>
           </div>   
        </form> 
<?php } ?>
		</div> 
</section> 
  