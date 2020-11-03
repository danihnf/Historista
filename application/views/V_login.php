<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Login</title>

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
                    
                    <!-- <h2 class="h2 font-weight-normal">Login</h2> -->
                    <form class="mt-5 text-left" action="<?php echo base_url(); ?>Login/login" method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Username " name="username">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="">
                            <label class="form-check-label" for="">Ingat password</label>
                        </div>
                        <button type="submit" class="btn btn-outline-main btn-block p-2 shadow rounded-pill">Login</button>
                        
                        <div class="mt-3 text-center">
                            <p><a href="" style="">Lupa Password</a></p>
                            <p>Belum memiliki akun? <a href="<?php echo base_url(); ?>Register" class="" style="text-decoration: underline; color: skyblue">Daftar disini</a></p>
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

    </script>
</body>