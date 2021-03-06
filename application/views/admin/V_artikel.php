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

          <li class="active">
            <a href="<?php echo base_url(); ?>Dashboard/artikel">
              <i class="fa fa-book"></i> <span>Article</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">input</small>
              </span>
            </a>
          </li>

          <li>
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
            Article
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Article</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data User Admin</h3>

                  <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    </div>
                  </div>
                </div>

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Pembuat</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                      </tr>
                        <?php
                          $no=0;
                          foreach ($artikel as $obj1) {
                            $no++; 
                        ?> 
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $obj1->penulis; ?></td>  
                        <td><?php echo $obj1->judul; ?></td>  
                        <td><?php echo $obj1->kategori; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>Dashboard/edit_artikel/<?php echo $obj1->id; ?>"><button type="button" class="btn btn-warning glyphicon glyphicon-edit"></button> </a>

                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data?')){document.location='<?php echo base_url(); ?>Dashboard/hapus_artikel/<?php echo $obj1->id; ?>';}"><button type="button" class="btn btn-danger glyphicon glyphicon-trash"></button> </a>
                        </td>

                      </tr>
                    <?php } ?>
                    </thead>

                  </table>
                  <div class="box-footer clearfix pagination pagination-sm no-margin">

                    <div class="box-footer clearfix">
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
