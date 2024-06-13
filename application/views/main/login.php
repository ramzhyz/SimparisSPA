<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LoyalSpa</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/flexslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/jquery.fancybox.css">
<link href="<?php echo base_url() ?>css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/owl.transitions.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/font-icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/animate.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
<section id="login" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>Login & Registration</h3>
    </div>
  <div class="row">
  <div class="col-sm-6 col-md-8">
  </div>
   <div class="col-md-5 col-md-offset-1">
    <a href="<?= base_url('index.php')?>"><i class="fa fa-arrow-left text-left"><?php echo " Back" ?></i></a>
      <br>
      <br>
    <div class="thumbnail">
      <div class="caption">
      <form name="formlogin" id="formlogin" method="post" action="<?php echo base_url('controller_main/proseslogin') ?>">
        <div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label"><h3>Login</h3></label>
            <br>
        </div>
        <?php
            $pesan=$this->session->flashdata('pesan');
            if($pesan==""){
                echo "";
            } else{
                ?>
                    <div class="alert alert-success alert-dismissible text-center">
                        <?php echo $pesan; ?>
                    </div>
                <?php
            }
        ?>
        <div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row mb-3 text-center">
            <button type="submit" name="submit" id="submit" class="btn btn-success" >Login</button>
            <button type="reset" class="btn btn-danger">cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="col-md-5 col-md-offset-0">
    <br>
    <br>
    <div class="thumbnail">
      <div class="caption">
      <form name="formregistrasi" id="formregistrasi" method="post" action="<?php echo base_url('controller_main/prosesregistrasi') ?>">
        <div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label"><h3>Registration</h3></label>
            <br>
        </div>
        <?php
            $pesan=$this->session->flashdata('pesanregistrasi');
            if($pesan==""){
                echo "";
            } else{
                ?>
                    <div class="alert alert-success alert-dismissible text-center">
                        <?php echo $pesan; ?>
                    </div>
                <?php
            }
        ?>
		<div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
        </div>
        <div class="row mb-3">
            <br>
            <label class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telp" name="telp" required>
            </div>
        </div>
        <br>
        <br>
        <div class="row mb-3 text-center">
            <button type="submit" class="btn btn-success" >Registrasi</button>
            <button type="reset" class="btn btn-danger">cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
</section>

<!-- JS FILES --> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/mousescroll.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.flexslider-min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.fancybox.pack.js"></script>  
<script type="text/javascript" src="<?php echo base_url() ?>js/modernizr.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/main.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.contact.js"></script> 
</body>
</html>