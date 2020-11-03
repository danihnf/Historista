<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Register</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/header.css" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <header class="text-center mb-5 card-edit-profile">
            <div class="bg-white p-5 rounded-lg shadow">
                <a class="nav-link" href="<?php echo base_url(); ?>Homepage"><img src="<?php echo base_url(); ?>assets/img/historista.png" style="width: 200px;" class="img-fluid" /></a>
                <form class="mt-5 text-left" action="<?php echo base_url(); ?>Register/daftar" method="POST">

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Nama Lengkap" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Username" name="username">
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control select-status" name="status">
                            <option value="guru">Guru</option>
                            <option value="siswa">Siswa</option>
                            <option id="status_umum" value="umum">Umum</option>
                        </select>
                    </div>

                    <div class="form-group" id="sekolah_form">
                        <label for="">Sekolah</label>
                        <input type="text" class="form-control" id="form_sekolah"  placeholder="Asal Sekolah" name="sekolah">
                    </div>
                    <div class="form-group">
                        <label for="">Telepon</label>
                        <input type="text" class="form-control" placeholder="Nomor Telepon" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Alamat Email" name="email">
                    </div>

                    <div class="form-group" data-link-field="dtp_input2">
                        <label for="">Tanggal Lahir</label>
                        <input class="form-control datepicker" type="text" name="lahir" style="width:460px" placeholder="Tanggal Lahir"></i>
                    </div><input type="hidden" id="dtp_input2" value=""/>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jeniskelamin">
                            <option value="Laki - Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control"placeholder="Password" name="password">
                    </div>

                    <button type="sumbit" href="#" class="btn btn-outline-main btn-block p-2 shadow rounded-pill" id="submit_form"> Daftar </button>
                    <div class="mt-3 text-center">
                        <p>Sudah memiliki akun? <a href="<?php echo base_url(); ?>Login" class="" style="text-decoration: underline; color: skyblue">Login</a></p>
                    </div>

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
    <script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

    <script>
        $(document).ready(function(){
            $("select.select-status").change(function(){
                var status = $(this).children("option:selected").val();
                if (status === "umum") {
                    var sekolah = $("#sekolah_form").hide()
                } else {
                    var sekolah = $("#sekolah_form").show()
                }
                
        });
});
    </script>
    <script type="text/javascript">
 $('.datepicker').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
</script> 
</body>
</html>