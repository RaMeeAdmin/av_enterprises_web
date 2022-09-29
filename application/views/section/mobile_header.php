<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AV Enterprises | Dashboard</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href=<?php echo base_url() . "assets/bootstrap/css/bootstrap.min.css" ?>>
  <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/select2/select2.min.css" ?>>
 <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/daterangepicker/daterangepicker-bs3.css" ?>>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href=<?php echo base_url() . "assets/dist/css/AdminLTE.min.css" ?>>

     <link rel="stylesheet" href=<?php echo base_url() . "assets/dist/css/skins/_all-skins.min.css" ?>>

     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/iCheck/flat/blue.css" ?> >

     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/morris/morris.css" ?>>

     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" ?>>

     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/datepicker/datepicker3.css" ?>>
     <!-- Daterange picker -->
     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/daterangepicker/daterangepicker-bs3.css" ?> >
     <!-- bootstrap wysihtml5 - text editor -->
     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" ?>>
     <link rel="stylesheet" href=<?php echo base_url() . "assets/plugins/datatables/dataTables.bootstrap.css" ?>>
     <link rel="shortcut icon" href="<?php echo base_url() . 'assets/dist/img/av_logo.jpg' ?>">
</head>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <body class="hold-transition skin-blue sidebar-mini">


