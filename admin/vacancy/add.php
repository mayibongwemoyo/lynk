
<?php
     if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

                <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Add New Job Vacancy</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "company_name">Company Name:</label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" id="company_id" name="company_id">
                          <option value="None">Select</option>
                          <?php 
                            $sql ="Select * From company";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadResultList();
                            foreach ($res as $row) {
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
                      "category">Category :</label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" id="category" name="category">
                          <option value="None">Select</option>
                          <?php 
                            $sql ="Select * From category";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadResultList();
                            foreach ($res as $row) {
                              # code...
                              echo '<option value='.$row->category_id.'>'.$row->category.'</option>';
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
                         <input class="form-control input-sm" id="occupation_title" name="occupation_title" placeholder="Occupation Title"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>  

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "req_no_employees">Required no. of Employees:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="req_no_employees" name="req_no_employees" placeholder="Required no. of Employees"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "salaries">Salary:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="salaries" name="salaries" placeholder="Salary"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "duration_employment">Duration of Employment:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="duration_employment" name="duration_employment" placeholder="Duration of Employment"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "qualification_work_experience">Qualification/Work Experience:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="qualification_work_experience" name="qualification_work_experience" placeholder="Qualification/Work Experience"   autocomplete="none"></textarea> 
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "job_description">Job Description:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="job_description" name="job_description" placeholder="Job Description"   autocomplete="none"></textarea> 
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
                           <option>Male</option>
                           <option>Female</option>
                           <option>Male/Female</option>
                        </select>
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "sector_vacancy">Sector of Vacancy:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="sector_vacancy" name="sector_vacancy" placeholder="Sector of Vacancy"   autocomplete="none"></textarea> 
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
      
 