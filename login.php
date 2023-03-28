<?php
require_once("./include/initialize.php");

 ?>
 <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ERIS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" type="text/css" media="screen">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="</dist/css/AdminLTE.min.css" type="text/css" media="screen">
  <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <script src="/plugins/iCheck/icheck.min.js"></script>


</head>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>

      <!-- <form action="process.php?action=login" enctype="multipart/form-data" method="post"> -->
      <div class="modal-body hold-transition login-page">
        <div id="loginerrormessage"></div>
        <div class="login-box">
          <div class="login-box-body" style="border: solid 1px #ddd;padding: 35px;min-height: 350px;">

            <form action="" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="user_email" id="user_email">
                <span class="fa fa-user form-control-feedback" style="margin-top: -22px;"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass">
                <span class="fa fa-lock form-control-feedback" style="margin-top: -22px;"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
              </div>

              <a href="#">I forgot my password</a><br>
              <a href="<?php echo web_root; ?>index.php?q=register" class="text-center">Register a new membership</a>

          </div>
          <!-- /.login-box-body -->
        </div>


        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" name="btnlogin" id="btnlogin">Login</button>
        </div>
        </form>

        <!-- </form> -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<!-- /.modal -->

</html>