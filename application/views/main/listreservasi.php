
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
<section id="intro" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>List Reservasi</h3>
    </div>
  <div class="row">
  <div class="col-sm-6 col-md-4">
    <a href="<?= base_url('index.php')?>"><i class="fa fa-arrow-left text-left"><?php echo " Back" ?></i></a>
    <br>
    <br>
  </div>
  </div>
  <div class="row">
    <?php
        if(!empty($hasil)){
            foreach ($hasil as $data):
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <div class="caption">
                        <h3>Reservasi</h3>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo $data->namaLayanan; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><?php echo $data->tglPesanan; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>:</td>
                                <td><?php echo $data->wktMulai?> - <?php echo $data->wktSelesai; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Biaya</td>
                                <td>:</td>
                                <td><?php echo $data->hargaLayanan; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-sm">Cancel</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
                <?php
            endforeach;
        }
    ?>
  </div>
</div>
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