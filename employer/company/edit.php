<?php
    if (!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
     }


  $companyid = $_GET['id'];
  $company = New Company();
  $res = $company->single_company($companyid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
            <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Company</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "company_name">Company Name:</label>

                      <div class="col-md-8">

                        <input type="hidden" name="company_id" value="<?php echo $res->company_id ;?>">
                         <input class="form-control input-sm" id="company_name" name="company_name" placeholder=
                            "Company Name" type="text" value="<?php echo $res->company_name ;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "company_address">Company Address:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="company_address" name="company_address" placeholder=
                            "Company Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->company_address ;?></textarea>
                         <!-- <input class="form-control input-sm" id="company_address" name="company_address" placeholder="Company Address" value="<?php echo $res->company_address ;?>" />  -->
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "company_contact_no">Company Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="company_contact_no" name="company_contact_no" placeholder=
                            "Company Contact No." type="text" value="<?php echo $res->company_contact_no ;?>">
                      </div>
                    </div>
                  </div>

               <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "company_mission">Company Mission:</label>

                      <div class="col-md-8">
                        
                         <textarea class="form-control input-sm" id="company_mission" name="company_mission" placeholder=
                            "Company Mission" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->company_mission ;?></textarea>
                      </div>
                    </div>
                  </div>  -->



            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                   
                      </div>
                    </div>
                  </div>

              
   
        </form>
       