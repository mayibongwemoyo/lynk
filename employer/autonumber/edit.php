<?php
    if (!isset($_SESSION['employer_id'])){
      redirect(web_root."employer/index.php");
     }


  $auto_key = $_GET['id'];
  $autonumber = New Autonumber();
  $singleauto = $autonumber->single_autonumber($auto_key);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

            <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Update Autonumber</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "auto_start">Start:</label>

                      <div class="col-md-8">
                      <input  type="hidden" name="auto_id" id="auto_id" value="<?php  echo $singleauto->auto_id; ?>">
                         <input class="form-control input-sm" id="auto_start" name="auto_start" placeholder=
                            "Start" type="text" value="<?php  echo $singleauto->auto_start; ?>">
                      </div>
                    </div>
                  </div>

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "auto_inc">INC:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="auto_inc" name="auto_inc" placeholder=
                            "INC" type="text" value="<?php  echo $singleauto->auto_inc; ?>">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "auto_end">End:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="auto_end" name="auto_end" placeholder=
                            "End" type="text" value="<?php  echo $singleauto->auto_end; ?>">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "auto_key">End:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="auto_key" name="auto_key" placeholder=
                            "Key" type="text" value="<?php  echo $singleauto->auto_key; ?>">
                      </div>
                    </div>
                  </div>



            
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

              
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->
  