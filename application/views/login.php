<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href=<?php echo base_url() ."assets/bootstrap/css/bootstrap.min.css"?>>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url() ."assets/dist/css/AdminLTE.min.css"?>>
    <!-- iCheck -->
    <link rel="stylesheet" href=<?php echo base_url() ."assets/plugins/iCheck/square/blue.css"?>>
      
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="shortcut icon" href="<?php echo base_url() . 'assets/dist/img/logo.png' ?>">
</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo base_url() .'assets/dist/img/images.jpg'?>');  background-attachment: fixed;
  background-size: 100% 100%;">
<div class="login-box">
  <div class="login-logo">
   <!--  <a href="javascript:;"><b>A V Enterprises</b> </a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h4 style="text-align: center;"><b>AV Enterprises Login</b></h4>
    <br>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo site_url('admin') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" value="" name="username" placeholder="Username" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" value="" class="form-control" placeholder="Password" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
      <?php echo $this->session->flashdata('login_msg');?>
    </form>
    <a href="#">I forgot my password</a><br> 
  </div>
</div>
<!-- /.login-box -->
 
<!-- iCheck -->
  <script src=<?php echo base_url() ."assets/plugins/jQuery/jQuery-2.1.4.min.js"?>></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=<?php echo base_url() ."assets/bootstrap/js/bootstrap.min.js"?>></script>
    <!-- iCheck -->
    <script src=<?php echo base_url() ."assets/plugins/iCheck/icheck.min.js"?>></script>
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
