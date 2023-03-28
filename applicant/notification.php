<style type="text/css">
    .mailbox-controls .btn {
      padding: 3px 8px;
      margin: 0px 2px;
    }
</style>
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
    
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Notification</h3>

             <!--  <div class="box-tools pull-right" style="margin-bottom: 5px;">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Notification">
                  <span class="fa fa-search form-control-feedback" style="margin-top: -25px"></span>
                </div>
              </div> -->
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
         
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php 
                        $sql = "SELECT * FROM `job` j, `company` c WHERE j.`company_id`=c.`company_id` ORDER BY date_posted DESC LIMIT 10";
                        $mydb->setQuery($sql);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          # code...
                          echo '<tr>'; 
                          echo '<td class="mailbox-name"><a href="'.web_root.'index.php?q=viewjob&search='.$result->company_id.'">'.$result->occupation_title.'</a></td>';
                          echo '<td class="mailbox-subject">'.$result->job_description.'</td>'; 
                          echo '<td class="mailbox-date">'.$result->qualification_work_experience.'</td>';
                          echo '<td class="mailbox-date">'.$result->date_posted.'</td>';
                          echo '</tr>';
                        }
                    ?> 
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
     
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>