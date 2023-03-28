<?php 
 if(!isset($_SESSION['employer_id'])){
    redirect(web_root."employer/index.php");
   }

  $autonum = New Autonumber();
  $res = $autonum->set_autonumber('employee_id');

 ?> 

 <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Add New Employee</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
               
            <div class="row">
                <div class="features">
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST">

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "employee_id">Employee ID:</label>

                        <div class="col-md-8"> 
                           <!-- <input class="form-control input-sm" id="employee_id" name="employee_id" placeholder=
                              "Employee No" type="text" value="<?php echo $res->AUTO; ?>"> -->
                              <input class="form-control input-sm" id="employee_id" name="employee_id" placeholder=
                              "Employee ID" type="text" value="">
                     </div>
                      </div>
                    </div>           
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "fname">Firstname:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="fname" name="fname" placeholder=
                              "Firstname" type="text" value=""   autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "lname">Lastname:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="lname" name="lname" placeholder=
                              "Lastname"     autocomplete="off">
                          </div>
                      </div>
                    </div>

                   

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "address">Address:</label>

                      <div class="col-md-8">
                        
                         <textarea class="form-control input-sm" id="address" name="address" placeholder=
                            "Address" type="text" value="" required   autocomplete="off"></textarea>
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "Gender">Sex:</label>

                      <div class="col-md-8">
                         <div class="col-lg-5">
                            <div class="radio">
                              <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                            </div>
                          </div>

                          <div class="col-lg-4">
                            <div class="radio">
                              <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male</label>
                            </div>
                          </div> 
                         
                      </div>
                    </div>
                  </div>

                          <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for=
                              "birth_date">Date of Birth:</label>

                              <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon"> 
                                     <i class="fa fa-calendar"></i> 
                                    </span>  
                                     <input class="form-control input-sm date_picker" id="birth_date" name="birth_date" placeholder="Date of Birth" type="text"    value="" required  autocomplete="off">
                                </div>
                              </div>
                            </div>
                          </div>

                             <div class="form-group">
                                <div class="col-md-8">
                                  <label class="col-md-4 control-label" for=
                                  "birth_place">Place of Birth:</label>

                                  <div class="col-md-8">
                                    
                                     <textarea class="form-control input-sm" id="birth_place" name="birth_place" placeholder=
                                        "Place of Birth" type="text" value="" required   autocomplete="off"></textarea>
                                  </div>
                                </div>
                              </div> 


                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "TELNO">Contact No.:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                                      "Contact No." type="text" any value="" required   autocomplete="off">
                                </div>
                              </div>
                            </div> 

                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "CIVILSTATUS">Civil Status:</label>

                                <div class="col-md-8">
                                  <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Select</option>
                                      <option value="Single">Single</option>
                                      <option value="Married">Married</option>
                                      <option value="Widow" >Widow</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> 
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "POSITION">Postion:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="POSITION" name="POSITION" placeholder=
                                      "Postion" type="text" any value="" required   autocomplete="off">
                                </div>
                              </div>
                            </div>  

                        <!--     <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "WORKSTATS">Work Status:</label>

                                <div class="col-md-8">
                                  <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Select</option>
                                      <option value="Regular">Temporary</option> 
                                      <option value="Regular">Regular</option>
                                      <option value="Probationary">Probationary</option> 
                                  </select> 
                                </div>
                              </div>
                            </div> -->
                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "EMP_HIREDDATE">Hired Date:</label> 
                                <div class="col-md-8">
                                    <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
                                   <input type="input" class="form-control input-sm date_picker" id="HIREDDATE" name="EMP_HIREDDATE" placeholder="mm/dd/yyyy"   autocomplete="false"/> 
                                     <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                 </div>
                                </div>
                              </div>
                            </div>  


                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "EMP_EMAILADDRESS">Email Address:</label> 
                                <div class="col-md-8">
                                   <input type="Email" class="form-control input-sm" id="EMP_EMAILADDRESS" name="EMP_EMAILADDRESS" placeholder="Email Address"   autocomplete="false"/> 
                                </div>
                              </div>
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
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 
 

                  </form>
       
       
                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->
 

 