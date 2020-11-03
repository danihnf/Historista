<?php

foreach ($detail as $obj){

  $id = $obj->id;
  $nama = $obj->nama;
  $username_akun = $obj->username;
  $kategori = $obj->kategori;
  $tgl = $obj->tgl_buat;
  $foto = $obj->foto;
  $foto_artikel = $obj->foto_artikel;
  $judul = $obj->judul;
  $bintang1 = $obj->bintang;
  $bintang2 = $obj->bintang2;
  $bintang3 = $obj->bintang3;
  $isi = $obj->isi;

  $username = $this->session->userdata("email");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title><?php echo $judul; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/historista.png" />

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/header.css" />

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/fontawesome.min.css" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
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
                    <div class="card bg-white p-4 rounded-lg shadow">
                        <!-- Profile Ava Card -->
                        <div class="" style="padding: 10px 20px">
                            <img src="<?php echo base_url(); ?>/foto/<?php echo $foto; ?>" class="float-left rounded-circle" height="55px" width="55px">
                            <div class="profile" style="margin-left: 70px; margin-top: 5px">
                                <a href="<?php echo base_url(); ?>Profile/detail/<?php echo $username_akun; ?>"><h6 style="font-size: 13px"><?php echo $nama; ?></h6></a> <!-- link to profile user --> 
                                <span style="font-size: 13px; color:gray" class="float-left"> <?php echo $kategori; ?> </span>
                                <span style="font-size: 13px; color:gray" class="float-right"><?php $tanggal = date('d M Y', strtotime($tgl));
                                echo $tanggal;
                                ?></span>
                            </div>
                        </div>
                        <hr />
                        <!-- end Profile ava card -->

                        <!-- Img top card -->
                        <img src="<?php echo base_url(); ?>/foto_artikel/<?php echo $obj->foto_artikel; ?>" style="" class="img-fluid card-img-top" alt="...">
                        <hr />

                        <!-- Content Card -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                            <?php 
                                $nilai1 = $bintang1*2.5;
                                $nilai2 = $bintang2*3.5;
                                $nilai3 = $bintang3*4;
                                $nilai_akhir = ($nilai1+$nilai2+$nilai3)/10;
                            ?>
                                <?php if($nilai_akhir == 0){ ?>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($nilai_akhir < 50){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($nilai_akhir >= 51 && $nilai_akhir <= 60){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($nilai_akhir >= 61 && $nilai_akhir <= 70){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($nilai_akhir >= 71 && $nilai_akhir <= 75){ ?>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: orange" class="fas fa-star"></i>
                                    <i style="color: #7777" class="fas fa-star"></i>
                                <?php }elseif($nilai_akhir >= 76 && $nilai_akhir <= 100){ ?>
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
                            <a href=""><h5 class="card-title text-center mt-1" style="font-size:16px;"><?php echo $judul; ?></h5></a>

                            <p class="card-text" style="font-size: 14px">
                                <?php echo $isi; ?>
                            </p>
                            <div class="row">
                                    <div class="col-sm">
                                   
                                <?php if($this->session->userdata("email") == null) { ?>
                                    <a href="<?php echo base_url(); ?>Login" class="btn btn-outline-main" style="font-size: 13px">Beri Penilaian</a>
                                <?php }elseif($this->session->userdata("email") == $username_akun){ ?>
                                    
                                <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>Content/nilai/<?php echo $username; ?>/<?php echo $id; ?>" class="btn btn-outline-main" style="font-size: 13px">Beri Penilaian</a>
                                <?php } ?>
                                </div>
                                <div class="col-sm">
                                </div>

                                    <div class="col-sm">
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="text-right mb-3">
                                        Share :&nbsp;
                                        <a href="http://www.facebook.com/share.php?u=http://historista.id/Content/detail/<?php echo $id; ?>" target="_blank">
                                            <button type="button" class="btn btn-outline-info btn-ico"><i class="fab fa-facebook"></i></button>
                                        </a>
                                        <a href="http://twitter.com/intent/tweet?url=http://historista.id/Content/detail/<?php echo $id; ?>&amp;text=<?php echo $judul; ?>&amp;hashtags=sejarahindonesia" target="_blank">
                                            <button type="button" class="btn btn-outline-info btn-ico"><i class="fab fa-twitter"></i></button>
                                        </a>
                                        <a href="whatsapp://send?text=http://historista.id/Content/detail/<?php echo $id; ?>" data-action="share/whatsapp/share">
                                            <button type="button" class="btn btn-outline-info btn-ico"><i class="fab fa-whatsapp"></i></button>
                                        </a>
                                    </div>
                                    <hr class="mt-4 mb-4" />
                                    <div id="komentar" class="mb-4">
                                        <!-- Komentar 1 -->
                                        <h6>Komentar</h6>
                                        <?php
                                          foreach ($tampil_komentar as $obj1) {
                                        ?> 
                                        <div class="p-3 mb-3" id="form_komentar" style="background-color: #f4f4f4;">
                                            <div class="row">
                                                <div class="col-sm-12"><img src="<?php echo base_url(); ?>/foto/<?php echo $obj1->foto; ?>" class="rounded-circle" height="40px" width="40px"> &nbsp; <?php echo $obj1->username; ?> &nbsp; <span style="font-size: 12px"><?php echo $obj1->tanggal_komentar; ?></span>
                                                </div>
                                            </div>
                                            <p class="mt-3" style="font-size: 14px"><?php echo $obj1->komentar; ?></p>
                                        </div>
                                         <?php } ?>
                                        <!-- End Komentar 1 -->
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <?php if($this->session->userdata("email") == null) { ?>

                            <?php }else{ ?>
                            <div id="tulis_komentar" class="mb-3">
                                <h6>Tinggalkan Balasan</h6>
                                <div class="row">
                                    <div class="col-sm-12">
                                    <form action="<?php echo base_url(); ?>Content/input_komentar" method="post">
                                        <div class="form-group">
                                            <input type="hidden" style="font-size: 12px" class="form-control mb-2" name="id_artikel" value="<?php echo $id; ?>">
                                            <input type="hidden" style="font-size: 12px" class="form-control mb-2" name="username" value="<?php echo $this->session->userdata("email") ?>">
                                            <input type="hidden" style="font-size: 12px" class="form-control mb-2" name="total_komentar" value="1">
                                            <input type="hidden" style="font-size: 12px" class="form-control mb-2" name="tanggal_komentar" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                            <textarea name="komentar" class="form-control" style="font-size: 12px" placeholder="komentar" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-outline-main">Submit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                           
<!-- End Container -->
</div>
<!-- end content body -->
</div>
</div>
<!-- end main content -->
<div class="col-sm ">
    
</div>
</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
        $("#sidebar").hide();
        $("#sidebar").toggleClass("active");
        $("#sidebarCollapse").on("click", function() {
            $("#sidebar").toggleClass("active");
            $(this).toggleClass("active");
            $("#sidebar").show();
        });

        var frm = $('#form-ref');
            frm.submit(function (ev) {
                var star = `<i style="color: orange" class="fas fa-star"></i>`
                var star_outline = `<i style="color: #7777" class="fas fa-star"></i>`
                var nilai = $("#nilais").val()
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (data) {
                        if (nilai == 0) {
                            $('#form-ref').append(star_outline,star_outline,star_outline,star_outline,star_outline)
                        } else if(nilai < 50) {
                            $('#form-ref').append(star,star_outline,star_outline,star_outline,star_outline)
                        } else if(nilai >= 51 && nilai <= 60) {
                            $('#form-ref').append(star,star,star_outline,star_outline,star_outline)
                        } else if(nilai >= 61 && nilai <= 70) {
                            $('#form-ref').append(star,star,star,star_outline,star_outline)
                        } else if(nilai >= 71 && nilai <= 75) {
                            $('#form-ref').append(star,star,star,star,star_outline)
                        } else if(nilai >= 76 && nilai <= 100) {
                            $('#form-ref').append(star,star,star,star,star)
                        }    
                        $('#triggers').attr('disabled', true)
                    }
                });
            ev.preventDefault();
    });

        function timer() {
            
            var nilai = $("#nilais").val();
            var id_bintang = $("#id_bintang").val();

            console.log(nilai)

            setTimeout('timer()', 2000);
        }
    }); 
</script>
</body>