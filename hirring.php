
    <section id="content">
        <div class="container content">     
        <!-- Service Blcoks -->
            
 <table id="dash-table" class="table table-hover">
     <thead>
         <th>Job Title</th>
         <th>Company</th>
         <th>Location</th>
         <th>Date Posted</th>
     </thead>
     <tbody>
        <?php
 if (isset($_GET['search'])) {
     # code...
    $company_name = $_GET['search'];
 }else{
     $company_name = '';

 }
    $sql = "SELECT * FROM `company` c,`job` j WHERE c.`company_id`=j.`company_id` AND company_name LIKE '%" . $company_name ."%' ORDER BY date_posted DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) {
        echo '<tr>';
        echo '<td><a href="'.web_root.'index.php?q=viewjob&search='.$result->company_id.'">'.$result->occupation_title.'</a></td>';
        echo '<td>'.$result->company_name.'</td>';
        echo '<td>'.$result->company_address.'</td>';
        echo '<td>'.date_format(date_create($result->date_posted),'m/d/Y').'</td>';
        echo '</tr>';

    }
        ?> 
     </tbody>
 </table>
 <?php
 // if (isset($_GET['search'])) {
 //     # code...
 //    $companyid = $_GET['search'];
 // }else{
 //     $companyid = '';

 // }
 //    $sql = "SELECT * FROM `company` c,`job` j WHERE c.`company_id`=j.`company_id` AND c.company_id LIKE '%" . $companyid ."%' ORDER BY date_posted DESC" ;
 //    $mydb->setQuery($sql);
 //    $cur = $mydb->loadResultList();


 //    foreach ($cur as $result) {
 //        # code...
 
 // // `occupation_title`, `req_no_employees`, `salaries`, `duration_employment`, `qualification_work_experience`, `prefered_sex`, `sector_vacancy`, `date_posted`
  ?>    
            <!--  <div class="container">
             <div class="mg-available-rooms">
                    <h5 class="mg-sec-left-title">Date Posted :  <?php echo date_format(date_create($result->date_posted),'M d, Y'); ?></h5>
                        <div class="mg-avl-rooms">
                            <div class="mg-avl-room">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="#"><span class="fa fa-building-o" style="font-size: 50px"></span> </a>
                                    </div>
                                    <div class="col-sm-10">
                                        <h2 class="mg-avl-room-title"><?php echo $result->company_name . '/ '. $result->occupation_title ;?> </h2>
                                        <p><?php echo $result->job_description ;?></p>
                                        <div class="row mg-room-fecilities">
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $result->req_no_employees; ?></li>
                                                    <li><i class="fp-ht-food"></i>Salaries : <?php echo number_format($result->salaries,2);  ?></li>
                                                    <li><i class="fa fa-sun-"></i>Duration of Employment : <?php echo $result->duration_employment; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <ul>
                                                    <li><i class="fp-ht-dumbbell"></i>Qualification/Work Experience : <?php echo $result->qualification_work_experience; ?></li>
                                                    <li><i class="fp-ht-tv"></i>Prefered Sex : <?php echo $result->prefered_sex; ?></li>
                                                    <li><i class="fp-ht-computer"></i>Sector of Vacancy : <?php echo $result->sector_vacancy; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $result->company_id;?>&view=personalinfo" class="btn btn-main btn-next-tab">Apply Now !</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
        </div>                         -->

     
   </div>
    </section> 