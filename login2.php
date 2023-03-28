<?php
require_once("./include/initialize.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LYNK | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo web_root; ?>bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo web_root; ?>bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo web_root; ?>plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo web_root; ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo web_root; ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
  <div class="login-box">

    <div class="login-box-body" style="min-height: 400px;">
      <!-- /.login-logo -->
      <div class="login-logo">
        <img src="./dist/img/logo_transparent.png" alt="Lynk logo" width="150px" height="150px">
      </div>
      <h1 class="login-box-msg">Student Login</h1>
      <hr />
      <p><?php check_message(); ?></p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="user_email" id="user_email">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="login-row">
          <div class="row">
            <!-- <div class="col-xs-8"> -->
            <div class="checkbox icheck" style="padding-left: 15px;">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <!-- <button type="submit" name="btnlogin" id="btnlogin" class=" btn btn-primary btn-block btn-flat">Sign In</button> -->
          <button type="submit" class="btn btn-primary" name="btnLogin" id="btnLogin">Login</button>
          <p>
          <a href="#">I forgot my password</a><br>
          <a href="<?php echo web_root; ?>index.php?q=register" class="text-center">Register a new membership</a>
          </p>
        </div>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  </form>

  <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
  <!-- /.social-auth-links -->



  <?php

  if(isset($_POST['btnLogin'])){
    $email = trim($_POST['user_email']);
    $upass  = trim($_POST['user_pass']);
    // $h_upass = sha1($upass);

     if ($email == '' OR $upass == '') {

        message("Invalid Username and Password!", "error");
        redirect("login2.php");

      } else {  
    //it creates a new objects of member
      $user = new User();
      //make use of the static function, and we passed to parameters
      $res = $user->userAuthentication($email, $upass);
      if ($res==true) { 
         message("Your logon as ".$_SESSION['ROLE'].".","success");
        // if ($_SESSION['ROLE']=='Administrator' || $_SESSION['ROLE']=='Cashier'){

          $_SESSION['ADMINID'];
          $_SESSION['FULLNAME'] ;
          $_SESSION['USERNAME'];
          $_SESSION['PASS'] ;
          $_SESSION['ROLE'];
          $_SESSION['PICLOCATION'];

           redirect(web_root."index.php");
        // } 
      }else{
        message("Student account does not exist! Please contact Administrator.", "error");
         redirect(web_root."login2.php"); 
      }
   }
   } 
   
  ?>


  <!-- jQuery 2.1.4 -->
  <script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo web_root; ?>bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo web_root; ?>plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>