<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['applicant_id'])){
    redirect(web_root."applicant/index.php");
  }
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
  <link rel="stylesheet" href="<?php echo web_root;?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo web_root;?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo web_root;?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
<!--   <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div> -->
  <!-- /.login-logo -->
  <div class="login-box-body" style="min-height: 400px;">
  <div class="login-logo">
        <img src="../dist/img/logo_transparent.png" alt="Lynk logo" width="150px" height="150px">
      </div>
    <h1 class="login-box-msg">Student Login</h1>
    <hr/>
    <p><?php check_message(); ?></p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="applicant_email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="applicant_pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <div class="row">
        <!-- <div class="col-xs-8"> -->
        <!--   <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>   -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="applicantlogin" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>
      </div>
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

 <!--    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 

if(isset($_POST['applicantlogin'])){
  $email = trim($_POST['applicant_email']);
  $upass  = trim($_POST['applicant_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $applicant = new Applicants();
    //make use of the static function, and we passed to parameters
    $res = $applicant->applicantAuthentication($email, $upass);
    if ($res==true) { 
       message("You logon as ".$_SESSION['ROLE'].".","success");
      // if ($_SESSION['ROLE']=='Administrator' || $_SESSION['ROLE']=='Cashier'){

        $_SESSION['APPLICANT_ADMINID'] = $_SESSION['USERID'];
        $_SESSION['APPLICANT_FULLNAME'] = $_SESSION['FULLNAME'] ;
        $_SESSION['APPLICANT_USERNAME'] =$_SESSION['USERNAME'];
        $_SESSION['APPLICANT_ROLE'] = $_SESSION['ROLE'];
        $_SESSION['APPLICANT_PICLOCATION'] = $_SESSION['PICLOCATION'];

        unset( $_SESSION['USERID'] );
        unset( $_SESSION['FULLNAME'] );
        unset( $_SESSION['USERNAME'] );
        unset( $_SESSION['PASS'] );
        unset( $_SESSION['ROLE'] );
        unset($_SESSION['PICLOCATION']);

         redirect(web_root."applicant/index.php");
      // } 
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."applicant/login.php"); 
    }
 }
 } 
 ?> 


<!-- jQuery 2.1.4 -->
<script src="<?php echo web_root;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo web_root;?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo web_root;?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

 


 

