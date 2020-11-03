<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Historista Dashboard</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="" class="logo">
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><b>Admin</b>Historista</span>
      </a>
     
      <nav class="navbar navbar-static-top">     
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata("username"); ?></span>
              </a>
              <ul class="dropdown-menu">
     
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $this->session->userdata("username"); ?> - Historista
                    <small>ADMIN</small>
                  </p>
                </li>
             
                <li class="user-body">
                </li>
              
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>Dashboard/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url(); ?>admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata("username"); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <li class="header"></li>
        <ul class="sidebar-menu" data-widget="tree">

          <li>
            <a href="<?php echo base_url(); ?>Dashboard/admin">
              <i class="fa fa-dashboard"></i><span>Dashboard</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url(); ?>Dashboard/akun">
              <i class="fa fa-user"></i> <span>User</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">input</small>
              </span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url(); ?>Dashboard/artikel">
              <i class="fa fa-book"></i> <span>Article</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">input</small>
              </span>
            </a>
          </li>

          <li class="active">
            <a href="<?php echo base_url(); ?>Dashboard/download">
              <i class="fa fa-download"></i> <span>Download Nilai</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green"></small>
              </span>
            </a>
          </li>

          <li class="header"></li>

        </section>        
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Download
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Download</li>
          </ol>
        </section>
        <section class="content">
            <div class="row" style="margin-top: 40px;">
            <div class="col-lg-4 col-xs-6"">
              <div class="small-box bg-blue">
                <div class="inner">
                  <center><h4>Nilai Instrumen 1</h4></center>
                </div>
                <a href="<?php echo base_url(); ?>Dashboard/action" class="small-box-footer">Download<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-xs-6"">
              <div class="small-box bg-blue">
                <div class="inner">
                  <center><h4>Nilai Instrumen 2</h4></center>
                </div>
                <a href="<?php echo base_url(); ?>Dashboard/action2" class="small-box-footer">Download<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-xs-6"">
              <div class="small-box bg-blue">
                <div class="inner">
                  <center><h4>Nilai Instrumen 3</h4></center>
                </div>
                <a href="<?php echo base_url(); ?>Dashboard/action3" class="small-box-footer">Download<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            </div>
        </div>
      </div>

    </section>
  </div>


</section>
</div>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>


<div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo base_url(); ?>admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>admin/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>admin/dist/js/pages/dashboard.js"></script>

</body>
</html>
