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
<!-- header section -->
<section role="banner" id="home">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.php"><span class="icon icon-genius"></span> LoyalSpa</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          <li><a href="#home">Home</a></li>
          <li><a href="#intro">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="<?= base_url('controller_main/reservation')?>">Reservation</a></li>
          <li><a href="<?= base_url('controller_main/listreservasi')?>">ReserveList</a></li>
          <?php
              if($this->session->userdata('Id')==''){
                  ?>
                  <li><a href="<?= base_url('controller_main/login')?>">Login</a></li>
                  
                  <?php
              } else{
                  ?>
                  <li><a onclick="logout()" href="javascript:void(0);">Logout</a></li>
                  
                  <?php
              }
          ?>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header> 
</section>
<!-- header section --> 

    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(images/slider/bg1.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content">
                                    <h2>Look Beautiful</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et  dolore.</p>
                                    <a class="btn btn-primary btn-lg" href="#package">Offers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(images/slider/bg2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content">
                                    <h2>Feel Beautiful</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et  dolore.</p>
                                    <a class="btn btn-primary btn-lg" href="#services">Offers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

<?php
  if(!empty($about)){
    echo $about;
  } 
  if(!empty($service)){
    echo $service;
  } 
  if(!empty($package)){
    echo $package;
  } 
  if(!empty($contact)){
    echo $contact;
  } 
?>


<!-- Footer section --> 
<!-- JS FILES --> 
<script language="javascript">
    function logout(){
        if (confirm("Apakah yakin keluar?")){
            window.open("<?php echo base_url(); ?>controller_main/logout","_self");	
        }	
    }
</script>
<div id="script"></div>
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