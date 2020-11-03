<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Historista</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/header.css" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="siderbarmix">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>
                        <?php 
                        if($this->session->userdata("email") == null){
                            ?>
                            Menulis
                        </h3>
                        <h5>
                            <?php 
                        }else{ 
                            echo $this->session->userdata("email"); 
                        }
                        ?>
                    </h5>
                </div>
                <?php if($this->session->userdata("email") == null) { ?>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>Homepage">Home</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url(); ?>Login">Masuk</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url(); ?>Register">Daftar</a>
                        </li>
                        <li class="">
                            <?php if($this->session->userdata("email") == null){ ?>
                                <a href="<?php echo base_url(); ?>Login">Menulis</a>
                            <?php }else{ ?>
                                <a href="<?php echo base_url(); ?>Homepage/menulis/<?php echo $this->session->userdata("email"); ?>">Menulis</a>
                            <?php } ?>
                        </li>
                    </ul>
                <?php }else{ ?>
                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>Homepage">Home</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url(); ?>Profile/detail/<?php echo $this->session->userdata("email"); ?>">Profile</a>
                        </li>
                        <li class="">
                            <?php if($this->session->userdata("email") == null){ ?>
                                <a href="<?php echo base_url(); ?>Login">Menulis</a>
                            <?php }else{ ?>
                                <a href="<?php echo base_url(); ?>Homepage/menulis/<?php echo $this->session->userdata("email"); ?>">Menulis</a>
                            <?php } ?>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url(); ?>Login/logout">Logout</a>
                        </li>
                    </ul>
                <?php } ?>
            </nav>
        </div>

        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container">
                <button
                type="button"
                id="sidebarCollapse"
                display="none"
                class="navbar-btn"
                >
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav navbar-nav mx-auto hide-on-sm">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>Homepage"
                  ><img
                  src="<?php echo base_url(); ?>assets/img/historista.png"
                  class="img-fluid img-logo"
                  /></a>
              </li>
            </ul>

          <ul class="nav navbar-nav ml-auto hide-search-on-sm">
            <li class="nav-item">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-search" placeholder="search" aria-label="search ..." aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><a href=""><i class="fas fa-search"></i></a></button>
                    </div>
                </div>
            </li>
        </ul>

        <div class="collapse navbar-collapse show-on-small" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>Homepage"
                  ><img
                  src="<?php echo base_url(); ?>assets/img/historista.png"
                  class="img-fluid img-logo"
                  /></a>
                </li>
            </ul>

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
            <?php if($this->session->userdata("email") == null) { ?>
                <a href="<?php echo base_url(); ?>Login">
                    <button class="btn btn-outline-main"><i class="fas fa-pencil-alt"></i> Menulis</button>
                </a>
            <?php }else{ ?>
                <a href="<?php echo base_url(); ?>Homepage/menulis/<?php echo $this->session->userdata("email"); ?>">
                    <button class="btn btn-outline-main"><i class="fas fa-pencil-alt"></i> Menulis</button>
                </a>
            <?php } ?>
        </li>
    </ul>
</div>
</div>
</nav>
<!-- Navs -->
<nav class="navbar navbar-expand-md navbar-light bg-light container main-navs" style="margin-top: -40px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
        <span>Kategori</span>
    </button>
    <div class="navbar-collapse collapse justify-content-stretch" id="navbar6">
        <ul class="navbar-nav navs">
            <li class="nav-items">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/budaya">Budaya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/agama">Agama</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/politik">Politik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/ekonomi">Ekonomi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/militer">Militer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/iptek">Iptek</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/tokoh">Tokoh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/historigrafis">Historigrafis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Content/folklore">Folklore</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            <form method="POST" action="<?php echo base_url(); ?>Content/cari">
            <div class="input-group mb-3">
                <input name="keyword" type="text" class="form-control form-search" placeholder="search ..." aria-label="search ..." aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
            </form>
        </li>
    </ul>
</div>
</nav>


<!-- Content Here -->
<div class="container">
    <div class="row">
        <div class="col-sm hidden">
        </div>
        <!-- main content here -->
        <div class="col-sm">
            <?php
            foreach($ekonomi as $obj1){
                ?>
                <div class="card bg-white p-4 rounded-lg shadow">
                    <!-- Profile Ava Card -->
                    <div class="" style="padding: 10px 20px">
                        <img src="<?php echo base_url(); ?>/foto/<?php echo $obj1->foto; ?>" class="float-left rounded-circle" height="55px" width="55px">
                        <div class="profile" style="margin-left: 70px; margin-top: 5px">
                            <a href="<?php echo base_url(); ?>Profile/detail/<?php echo $obj1->username; ?>"><h6 style="font-size: 13px"><?php echo $obj1->nama; ?></h6></a> <!-- link to profile user --> 
                            <span style="font-size: 13px; color:gray" class="float-left"> <?php echo $obj1->kategori; ?> </span>
                            <span style="font-size: 13px; color:gray" class="float-right"><?php $tgl = $obj1->tgl_buat;
                            $tanggal = date('d M Y', strtotime($tgl));
                            echo $tanggal;
                            ?></span>
                        </div>
                    </div>
                    <!-- end Profile ava card -->

                    <!-- Img top card -->
                    <img src="<?php echo base_url(); ?>/foto_artikel/<?php echo $obj1->foto_artikel; ?>" style="width: 800px; height: 350px; padding: 0px 20px 0px 20px" class="img-fluid card-img-top" alt="...">


                    <!-- Content Card -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <?php if($obj1->bintang == 0){ ?>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($obj1->bintang < 50){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($obj1->bintang >= 51 && $obj1->bintang <= 60){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($obj1->bintang >= 61 && $obj1->bintang <= 70){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($obj1->bintang >= 71 && $obj1->bintang <= 75){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($obj1->bintang >= 76 && $obj1->bintang <= 100){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                <?php }else{ ?>
                                <?php } ?>
                            </div>

                            <div class="col-sm">
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>Homepage/konten/<?php echo $obj1->id; ?>"><h5 class="card-title" style="font-size:16px;"><?php echo $obj1->judul; ?></h5></a> <!-- link to url post -->
                        <p class="card-text" style="font-size: 14px"><?php $isi = $obj1->isi; 
                        echo word_limiter($isi, 60);
                        ?></p>
                        <div class="row">
                            <div class="col-sm">
                                <a href="<?php echo base_url(); ?>Content/detail/<?php echo $obj1->id; ?>" class="btn btn-outline-main" style="font-size: 13px">Lihat Selengkapnya</a> <!-- link to url post -->
                            </div>
                            <div class="col-sm">
                            </div>

                            <div class="col-sm text-right">
                                <a href="#">0 Komentar</a>
                            </div>
                        </div>
                    </div>
                    <!-- end content body -->
                </div>
            <?php } ?>
        </div>
        <!-- end main content -->
        <div class="col-sm hidden">
        </div>
    </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").hide();
        $("#sidebar").toggleClass("active");
        $("#sidebarCollapse").on("click", function() {
            $("#sidebar").toggleClass("active");
            $(this).toggleClass("active");
            $("#sidebar").show();
        });
    });
</script>
</body>