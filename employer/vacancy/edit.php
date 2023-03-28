<?php
    if (!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
     }


  $jobid = $_GET['id'];
  $job = New Jobs();
  $res = $job->single_job($jobid);

?> 
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

  <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Update Job Vacancy</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "company_name">Company Name:</label>

                      <div class="col-md-8">
                        <input type="hidden" name="company_id" value="<?php echo $res->company_id;?>">
                        <select class="form-control input-sm" id="company_id" name="company_id">
                          <option value="None">Select</option>
                          <?php 
                            $sql ="Select * From company WHERE company_id=".$res->company_id;
                            $mydb->setQuery($sql);
                            $result  = $mydb->loadResultList();
                            foreach ($result as $row) {
                              # code...
                              echo '<option SELECTED value='.$row->company_id.'>'.$row->company_name.'</option>';
                            }
                            $sql ="Select * From company WHERE company_id!=".$res->company_id;
                            $mydb->setQuery($sql);
                            $result  = $mydb->loadResultList();
                            foreach ($result as $row) {
                              # code...
                              echo '<option value='.$row->company_id.'>'.$row->company_name.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "category">Category:</label>

                      <div class="col-md-8"> 
                        <select class="form-control input-sm" id="category" name="category">
                          <option value="None">Select</option>
                          <?php 
                            $sql ="SELECT * FROM `category` WHERE category='".$res->category."'";
                            $mydb->setQuery($sql);
                            $cur  = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              # code...
                              echo '<option SELECTED value='.$result->category_id.'>'.$result->category.'</option>';
                            }
                            $sql ="SELECT * FROM `category` WHERE category!='".$res->category."'";
                            $mydb->setQuery($sql);
                            $cur  = $mydb->loadResultList();
                            foreach ($cur as $result) {
                              # code...
                              echo '<option value='.$result->category_id.'>'.$result->category.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "occupation_title">Occupation Title:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="occupation_title" name="occupation_title" placeholder="Occupation Title"   autocomplete="none" value="<?php echo $res->occupation_title; ?>"/> 
                      </div>
                    </div>
                  </div>  

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "req_no_employees">Required no. of Employees:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="req_no_employees" name="req_no_employees" placeholder="Required no. of Employees"   autocomplete="none" value="<?php echo $res->req_no_employees ?>"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "salaries">Salary:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="salaries" name="salaries" placeholder="Salary"   autocomplete="none" value="<?php echo $res->salaries ?>"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "duration_employment">Duration of Employment:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="duration_employment" name="duration_employment" placeholder="Duration of Employment"   autocomplete="none" value="<?php echo $res->duration_employment ?>"/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "qualification_work_experience">Qualification/Work Experience:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="qualification_work_experience" name="qualification_work_experience" placeholder="Qualification/Work Experience"   autocomplete="none" ><?php echo $res->qualification_work_experience ?></textarea> 
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "job_description">Job Description:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="job_description" name="job_description" placeholder="Job Description"   autocomplete="none"><?php echo $res->job_description ?></textarea> 
                      </div>
                    </div>
                  </div>  

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "prefered_sex">Prefered Sex:</label> 
                      <div class="col-md-8">
                          <select class="form-control input-sm" id="prefered_sex" name="prefered_sex">
                          <option value="None">Select</option>
                           <option <?php echo ($res->prefered_sex=='Male') ? "SELECTED" :"" ?>>Male</option>
                           <option <?php echo ($res->prefered_sex=='Female') ? "SELECTED" :"" ?>>Female</option>
                           <option <?php echo ($res->prefered_sex=='Male/Female') ? "SELECTED" :"" ?>>Male/Female</option>
                        </select>
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sector_vacancy">Sector of Vacancy:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="sector_vacancy" name="sector_vacancy" placeholder="Sector of Vacancy"   autocomplete="none"><?php echo $res->sector_vacancy ?></textarea> 
                      </div>
                    </div>
                  </div>  
 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 



</form>
       