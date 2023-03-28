
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
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) {
        # code...
 
 // `occupation_title`, `req_no_employees`, `salaries`, `duration_employment`, `qualification_work_experience`, `prefered_sex`, `sector_vacancy`, `date_posted`
  ?> 
           <div class="container">
             <div class="mg-available-rooms">
                    <h5 class="mg-sec-left-title">Date Posted :  <?php echo date_format(date_create($result->date_posted),'M d, Y'); ?></h5>
                        <div class="mg-avl-rooms">
                            <div class="mg-avl-room">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="#"><span class="fa fa-building-o" style="font-size: 50px"></span><!-- <img src="img/room-1.png" alt="" class="img-responsive"> --></a>
                                    </div>
                                    <div class="col-sm-10">
                                        <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><?php echo $result->occupation_title ;?> 
                                        </div> 
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
                                                    <!-- <li><i class="fp-ht-dumbbell"></i>Qualification/Work Experience : <?php echo $result->qualification_work_experience; ?></li> -->
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
                                          <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $result->company_id;?>&view=personalinfo" class="btn btn-main btn-next-tab">Apply Now !</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>                        

     
<?php  } ?>    </div>
    </section> 