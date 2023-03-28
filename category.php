
    <section id="content">
        <div class="container content">     
        <!-- Service Blcoks -->
            
<!--     <div class="row"> 
        <div class="col-md-12">
            <div class="about-logo">
                <h3><span class="color">Hirring Now</span></h3>
                <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
                    <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
            </div>  
        </div>
    </div>
      -->
     
 <?php
 if (isset($_GET['search'])) {
     # code...
    $category = $_GET['search'];
 }else{
     $category = '';

 }
   $sql = "SELECT * FROM `company` c,`job` j WHERE c.`company_id`=j.`company_id` AND category LIKE '%" . $category ."%' ORDER BY date_posted DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) { 
  ?>  

          <div class="panel panel-primary">
              <div class="panel-header">
                   <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 20px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->company_id;?>"><?php echo $result->occupation_title ;?></a> 
                  </div> 
              </div>
              <div class="panel-body contentbody">
                    <div class="col-sm-10">
              <!--           <div class="col-sm-6">
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
                        </div> -->
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
                            <p>Employer :  <?php echo  $result->company_name ?></p>
                            <p>Location :  <?php echo  $result->company_address ?></p>  
                        </div>
                    </div>
                    <div class="col-sm-2"> <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $result->company_id;?>&view=personalinfo" class="btn btn-main btn-next-tab">Apply Now !</a></div>
                </div> 
              <div class="panel-footer">
                  Date Posted :  <?php echo date_format(date_create($result->date_posted),'M d, Y'); ?>
              </div>
          </div> 
<?php  } ?>   
     </div>
    </section>  
