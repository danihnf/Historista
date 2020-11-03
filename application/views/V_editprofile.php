<?php

$id = "";
$nama = "";
$username = "";
$sekolah = "";
$status = "";
$lahir = "";
$jeniskelamin = "";
$email = "";
$telepon = "";
$foto = "";
$alamat = "";
$password = "";
    foreach ($profile as $obj){
         
          $id = $obj->id;
          $nama = $obj->nama;
          $username = $obj->username;
          $sekolah = $obj->sekolah;
          $status = $obj->status;
          $lahir = $obj->lahir;
          $jeniskelamin = $obj->jeniskelamin;
          $email = $obj->email;
          $telepon = $obj->telepon;
          $foto = $obj->foto;
          $alamat = $obj->alamat;
          $password = $obj->password;

}
?>
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

<div class="container">
    <header class="text-center mb-5 card-edit-profile">
       <form class="" action="<?php echo base_url(); ?>Profile/update/<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">

        <div class="bg-white p-5 rounded-lg shadow">

            <div class="text-center" style="padding: 10px 20px">
                <img id="img_upload_preview" src="<?php echo base_url(); ?>/foto/<?php echo $foto; ?>" class="rounded-circle" height="80px" width="80px">
                <div class="profile mt-3">
                    

                    <label for="inputFile"><h6 style="font-size: 13px; color: skyblue">Ganti Foto Profil</h6></label>
                            <input type='file' class="" name="foto" id="inputFile" style="display:none; color: transparent; border-radius: 5px"/>
                </div>
            </div>
            
            <div class="mt-2 text-left main-form">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input name="nama" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $nama; ?>">
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $username; ?>" disabled>
                </div>
                <?php if($status == 'umum') { ?>
                    
                <?php }else{ ?>
                <div class="form-group">
                    <label for="">Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" id="" aria-describedby="" value="<?php echo $sekolah; ?>">
                </div>
                <?php } ?>
                <div class="form-group">
                    <label for="">Status</label>
                    <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?php echo $status; ?>">
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="text" class="form-control" disabled value="<?php echo date('d M Y', strtotime($lahir)); ?>">
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="" aria-describedby="" disabled value="<?php echo $jeniskelamin; ?>">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="" aria-describedby="" value="<?php echo $email; ?>">
                </div>

                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" name="telepon" class="form-control" id="" aria-describedby="" value="<?php echo $telepon; ?>">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input placeholder="Masukan Alamat" name="alamat" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $alamat; ?>">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Masukan Password" required>
                </div>

            </div>

            <button name="submit" type="submit" class="btn btn-outline-main btn-block p-2 shadow rounded-pill" id="submit_form"> Edit </button>

        </form>
    </div>
</header>
<!-- END -->
</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script>
    // $(document).ready(function(){
    //     $("select.select-status").change(function(){
    //         var status = $(this).children("option:selected").val();
    //         if (status === "Umum") {
    //             var sekolah = $("#sekolah_form").hide()
    //         } else {
    //             var sekolah = $("#sekolah_form").show()
    //         }
            
    //     });
    // });

    function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#img_upload_preview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#inputFile").change(function() {
                    readURL(this);
                });
</script>
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