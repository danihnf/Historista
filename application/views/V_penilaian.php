<?php

foreach ($penilaian as $obj){
  $id = $obj->id;
  $penilai = $obj->nama;
  $status_akun = $obj->status;
  $username = $obj->username;
}
?>

<?php

foreach ($penilaian_id as $obj){
  $id = $obj->id;
  $penulis = $obj->penulis;
  $jeniskelamin = $obj->jeniskelamin;
  $sekolah = $obj->sekolah;
  $email = $obj->email;
  $telepon = $obj->telepon;
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
<?php
foreach ($status_penilaian as $obj){
  $status_penilaian = $obj->status_penilaian;
  $id_artikel = $obj->id_artikel;
  $penilai_laporan1 = $obj->penilai;
}
?>

<?php
foreach ($status_penilaian2 as $obj){
  $status_penilaian2 = $obj->status_penilaian;
}
?>

<?php
foreach ($status_penilaian3 as $obj){
  $status_penilaian3 = $obj->status_penilaian;
  $id_artikel3 = $obj->id_artikel;
  $penilai_laporan3 = $obj->penilai;
}
?>

		<!-- Content Here -->
		<div class="container">
            <?php echo $id_artikel; ?>
            <?php echo $penilai_laporan1; ?>
		   <?php if($status_akun == 'guru'){ ?>
			<div class="row text-center mt-5">
				<div class="col-sm-4">
					<button class="btn btn-lg btn-outline-main" id="triggerpenilaian1" data-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="penilaian1" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 1</button>
				</div>
				<?php if($status_penilaian2 == null){ ?>
                    <div class="col-sm-4">
                        <button class="btn btn-lg btn-outline-main" id="triggerpenilaian2" data-toggle="collapse" href="#penilaian2" role="button" aria-expanded="false" aria-controls="penilaian2"><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 2</button>
                    </div>
				<?php }else{ ?>
					<div class="col-sm-4">
                        <button class="btn btn-lg btn-outline-main" id="triggerpenilaian2" data-toggle="collapse" href="#penilaian2" role="button" aria-expanded="false" aria-controls="penilaian2" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 2</button>
                    </div>
				<?php } ?>
				<div class="col-sm-4">
					<button class="btn btn-lg btn-outline-main" id="triggerpenilaian3" data-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="penilaian3" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 3</button>
				</div>
			</div>


		<?php }elseif($status_akun == 'umum'){ ?>
			<div class="row text-center mt-5">
				<?php if($status_penilaian == null){ ?>
					<?php if($penilai == $penilai_laporan3){ ?>
                        <div class="col-sm-4">
                            <button class="btn btn-lg btn-outline-main" id="triggerpenilaian1" data-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="penilaian1" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 1</button>
                        </div>
                    <?php }else{ ?>
                        <div class="col-sm-4">
                        <button class="btn btn-lg btn-outline-main" id="triggerpenilaian1" data-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="penilaian1"><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 1</button>
                    </div>
                    <?php } ?>
				<?php }else{ ?>
                    <div class="col-sm-4">
                        <button class="btn btn-lg btn-outline-main" id="triggerpenilaian1" data-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="penilaian1" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 1</button>
                    </div>
				<?php } ?>    
				<div class="col-sm-4">
					<button class="btn btn-lg btn-outline-main" id="triggerpenilaian2" data-toggle="collapse" href="#penilaian2" role="button" aria-expanded="false" aria-controls="penilaian2" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 2</button>
				</div>
				<?php if($status_penilaian3 == null){ ?>
                    <?php if($penilai == $penilai_laporan1){ ?>
    					<div class="col-sm-4">
                            <button class="btn btn-lg btn-outline-main" id="triggerpenilaian3" data-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="penilaian3" disabled=""><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 3</button>
                        </div>
                    <?php }else{ ?>
                        <div class="col-sm-4">
                        <button class="btn btn-lg btn-outline-main" id="triggerpenilaian3" data-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="penilaian3"><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 3</button>
                    </div>
                    <?php } ?>
				<?php }else{ ?>
                    <div class="col-sm-4">
                        <button class="btn btn-lg btn-outline-main" id="triggerpenilaian3" data-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="penilaian3" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 3</button>
                    </div>
				<?php } ?>
			</div>
		<?php }else{ ?>
			<div class="row text-center mt-5">
				<div class="col-sm-4">
					<button class="btn btn-lg btn-outline-main" id="triggerpenilaian1" data-toggle="collapse" href="#penilaian1" role="button" aria-expanded="false" aria-controls="penilaian1" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 1</button>
				</div>
				<div class="col-sm-4">
					<button class="btn btn-lg btn-outline-main" id="triggerpenilaian2" data-toggle="collapse" href="#penilaian2" role="button" aria-expanded="false" aria-controls="penilaian2" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 2</button>
				</div>
				<div class="col-sm-4">
					<button class="btn btn-lg btn-outline-main" id="triggerpenilaian3" data-toggle="collapse" href="#penilaian3" role="button" aria-expanded="false" aria-controls="penilaian3" disabled><i class="fas fa-chalkboard-teacher"></i>&nbsp; Penilaian 3</button>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="container mt-5"> 
    	<div class="bg-white collapse p-4 rounded-lg shadow" id="penilaian1">
            <h3>Soal Penasaran</h3>
            <hr />
            <form id="soal" action="<?php echo base_url();?>Content/input_nilai" method="post">
                        <input type="hidden" name="id_artikel" value="<?php echo $this->uri->segment(4); ?>" class="form-control">
                        <input type="hidden" name="penulis" value="<?php echo $penulis; ?>" class="form-control">
                        <input type="hidden" name="penilai" value="<?php echo $penilai; ?>" class="form-control">
                        <input type="hidden" name="jeniskelamin" value="<?php echo $jeniskelamin; ?>" class="form-control">
                        <input type="hidden" name="sekolah" value="<?php echo $sekolah; ?>" class="form-control">
                        <input type="hidden" name="telepon" value="<?php echo $telepon; ?>" class="form-control">
                        <input type="hidden" name="email" value="<?php echo $email; ?>" class="form-control">
                        <input type="hidden" name="status" value="1" class="form-control">
               <button type="submit" class="btn btn-outline-main" hidden>Submit</button>
            </form>
            
            <div id="button1"></div>
    	</div>

    	<div class="bg-white collapse p-4 rounded-lg shadow" id="penilaian2">
            <h3>Soal Penasaran</h3>
            <hr />
            <form id="soal2" action="<?php echo base_url();?>Content/input_nilai2" method="post">
                        <input type="hidden" name="id_artikel" value="<?php echo $this->uri->segment(4); ?>" class="form-control">
                        <input type="hidden" name="penulis" value="<?php echo $penulis; ?>" class="form-control">
                        <input type="hidden" name="penilai" value="<?php echo $penilai; ?>" class="form-control">
                        <input type="hidden" name="jeniskelamin" value="<?php echo $jeniskelamin; ?>" class="form-control">
                        <input type="hidden" name="sekolah" value="<?php echo $sekolah; ?>" class="form-control">
                        <input type="hidden" name="telepon" value="<?php echo $telepon; ?>" class="form-control">
                        <input type="hidden" name="email" value="<?php echo $email; ?>" class="form-control">
                        <input type="hidden" name="status" value="1" class="form-control">
               <button type="submit" class="btn btn-outline-main" hidden>Submit</button>
            </form>
            
            <div id="button2"></div>
    	</div>

        <div class="bg-white collapse p-4 rounded-lg shadow" id="penilaian3">
            <h3>Soal Penasaran</h3>
            <hr />
            <form id="soal3" action="<?php echo base_url();?>Content/input_nilai3" method="post">
                        <input type="hidden" name="id_artikel" value="<?php echo $this->uri->segment(4); ?>" class="form-control">
                        <input type="hidden" name="penulis" value="<?php echo $penulis; ?>" class="form-control">
                        <input type="hidden" name="penilai" value="<?php echo $penilai; ?>" class="form-control">
                        <input type="hidden" name="jeniskelamin" value="<?php echo $jeniskelamin; ?>" class="form-control">
                        <input type="hidden" name="sekolah" value="<?php echo $sekolah; ?>" class="form-control">
                        <input type="hidden" name="telepon" value="<?php echo $telepon; ?>" class="form-control">
                        <input type="hidden" name="email" value="<?php echo $email; ?>" class="form-control">
                        <input type="hidden" name="status" value="1" class="form-control">
               <button type="submit" class="btn btn-outline-main" hidden>Submit</button>
            </form>
            
            <div id="button3"></div>
        </div>
    </div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

$(document).ready(function() {
 $("#triggerpenilaian1").click(function() {
  $("#penilaian1").show();
  $("#penilaian3").hide();
  $("#penilaian2").hide();
 });

 $("#triggerpenilaian2").click(function() {
  $("#penilaian2").show();
  $("#penilaian1").hide();
  $("#penilaian3").hide();
 });

 $("#triggerpenilaian3").click(function() {
  $("#penilaian3").show();
  $("#penilaian1").hide();
  $("#penilaian2").hide();
 });
});


let soals = <?php echo json_encode($soal); ?>;
let soals2 = <?php echo json_encode($soal2); ?>;
let soals3 = <?php echo json_encode($soal3); ?>;

let length1 = soals.length;
let length2 = soals2.length;
let length3 = soals3.length;

(function run_soal1(n) {
 
 // console.log(soals[n].soal)
 // console.log(n)

 let schema_rad = `<div class="radiob mb-4 mt-2">
                    <label class="radio-inline text-center">
                        <input value="1" class="radioinput" type="radio" name="soal${n}">
                        <br /> 1
                    </label>
                    <label class="radio-inline">
                        <input value="2" class="radioinput" type="radio" name="soal${n}">
                        <br /> 2
                    </label>
                    <label class="radio-inline">
                        <input value="3" class="radioinput" type="radio" name="soal${n}">
                        <br /> 3
                    </label>
                    <label class="radio-inline">
                        <input value="4" class="radioinput" type="radio" name="soal${n}">
                        <br /> 4
                    </label>
            </div>`;

let schema_soal = `<h6>${soals[n++].soal}</h6>`;

if (n < length1) setTimeout(function() {
    run_soal1(n); // Redo if n < 5 (and pass n)
}, 1000);
    $('#soal').append(schema_soal, schema_rad);
}(0));

(function run_soal2(n) {
 
 // console.log(soals[n].soal)
 // console.log(n)

 let schema_rad = `<div class="radiob mb-4 mt-2">
                    <label class="radio-inline text-center">
                        <input value="1" class="radioinput" type="radio" name="soal${n}">
                        <br /> 1
                    </label>
                    <label class="radio-inline">
                        <input value="2" class="radioinput" type="radio" name="soal${n}">
                        <br /> 2
                    </label>
                    <label class="radio-inline">
                        <input value="3" class="radioinput" type="radio" name="soal${n}">
                        <br /> 3
                    </label>
                    <label class="radio-inline">
                        <input value="4" class="radioinput" type="radio" name="soal${n}">
                        <br /> 4
                    </label>
            </div>`;
            
let schema_soal = `<h6>${soals2[n++].soal}</h6>`;

if (n < length2) setTimeout(function() {
    run_soal2(n); // Redo if n < 5 (and pass n)
}, 1000);
    $('#soal2').append(schema_soal, schema_rad);
}(0));

(function run_soal3(n) {
 
 console.log(soals3[n].soal)
 // console.log(n)

 let schema_rad = `<div class="radiob mb-4 mt-2">
                    <label class="radio-inline text-center">
                        <input value="1" class="radioinput" type="radio" name="soal${n}">
                        <br /> 1
                    </label>
                    <label class="radio-inline">
                        <input value="2" class="radioinput" type="radio" name="soal${n}">
                        <br /> 2
                    </label>
                    <label class="radio-inline">
                        <input value="3" class="radioinput" type="radio" name="soal${n}">
                        <br /> 3
                    </label>
                    <label class="radio-inline">
                        <input value="4" class="radioinput" type="radio" name="soal${n}">
                        <br /> 4
                    </label>
            </div>`;
            
let schema_soal = `<h6>${soals3[n++].soal}</h6>`;

if (n < length3) setTimeout(function() {
    run_soal3(n); // Redo if n < 5 (and pass n)
}, 1000);
    $('#soal3').append(schema_soal, schema_rad);
}(0));


















let timeAppearButton = (1000 * length1) + 1000;
let timeAppearButton2 = (1000 * length2) + 1000;
let timeAppearButton3 = (1000 * length3) + 1000;
let btn = `<button type="submit" class="btn btn-outline-main">Submit</button>`

setTimeout(function() {
 $('#soal').append(btn);
}, timeAppearButton);

setTimeout(function() {
 $('#soal2').append(btn);
}, timeAppearButton2);

setTimeout(function() {
 $('#soal3').append(btn);
}, timeAppearButton3);

</script>
</body>