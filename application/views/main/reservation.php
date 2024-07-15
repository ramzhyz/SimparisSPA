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
<style>
    .image-radio {
        align-items: left;
        margin-bottom: 20px;
    }
    .image-radio img {
        max-width: 100px;
        margin-right: 30px;
        margin-bottom: 10px;
    }
    .image-radio label {
        cursor: pointer;
    }

</style>
    <script>
        function setDateLimits() {
            // Mendapatkan elemen input date
            var dateInput = document.getElementById('tglLayanan');

            // Mendapatkan tanggal hari ini
            var today = new Date();
            var todayStr = today.toISOString().split('T')[0];

            // Menghitung tanggal maksimal (5 hari setelah hari ini)
            var maxDate = new Date();
            maxDate.setDate(today.getDate() + 5);
            var maxDateStr = maxDate.toISOString().split('T')[0];

            // Mengatur atribut min dan max
            dateInput.setAttribute('min', todayStr);
            dateInput.setAttribute('max', maxDateStr);
        }

        function loadAvailableTimes() {
            var date = document.getElementById('tglLayanan').value;
            if (date) {
                fetch(`<?= base_url('controller_main/get_available_times') ?>?date=${date}`)
                    .then(response => response.json())
                    .then(times => {
                        var timeSelect = document.getElementById('wktMulai');
                        timeSelect.innerHTML = '';
                        var timesAvailable = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'];
                        timesAvailable.forEach(time => {
                            if (!times.includes(time)) {
                                var option = document.createElement('option');
                                option.value = time;
                                option.text = time;
                                timeSelect.appendChild(option);
                            }
                        });
                    });
            }
        }
    </script>
</head>

<body onload="setDateLimits()">
<section id="reservation" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>Make a Reservation</h3>
      <p></p>
      <?php
            $pesan=$this->session->flashdata('pesan');
            if($pesan==""){
                echo "";
            } else{
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <?php echo $pesan; ?>
                    </div>
                <?php
            }
      ?>
      <br>
    </div>
  <div class="row">
  <div class="col-sm-6 col-md-8">
  </div>
   <div class="col-md-8 col-md-offset-2">
    <div class="thumbnail">
      <div class="caption">
      <form name="formreservasi" id="formreservasi" method="post" action="<?php echo base_url('controller_main/simpanreservasi') ?>">
		<div class="row mb-3">
            <label class="col-sm-2 col-form-label">Reservasi Layanan</label>
            <div class="col-sm-10">
                <!--form>
                    <?php
                        /*if(empty($layanan)){
                            
                        } else{
                            foreach ($layanan as $data):
                                ?>
                                    <input type="checkbox" id="idLayanan" name="idLayanan" value="<?php echo $data->idLayanan; ?>"><?php echo $data->namaLayanan; ?></input><br>
                                <?php
                            endforeach;
                        }*/
                    ?>
                </form-->
                <select class="form-select form-control" name="idLayanan" id="idLayanan" required>
                    <option value="">PILIH PACKAGE LAYANAN</option>
                    <?php
                        if(empty($layanan)){
                                
                        } else{
                            foreach ($layanan as $data):
                                ?>
                                    <option value="<?php echo $data->idLayanan; ?>"><?php echo $data->namaLayanan; ?></option>
                                <?php
                            endforeach;
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal Reservasi</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tglLayanan" name="tglLayanan"  onchange="loadAvailableTimes()" required>
            </div>
        </div>
        <!---->
        <br>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Waktu Reservasi</label>
            <div class="col-sm-10">
                <select class="form-select form-control" name="wktMulai" id="wktMulai" required></select>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Terapis</label>
            <div class="col-sm-10">
                <div class="row">
                <div class="image-radio">
                    <?php
                        if(empty($terapis)){
                            
                        } else{
                            foreach ($terapis as $data):
                                ?>
                                <div class="col-sm-6 col-md-4">
                                <label>
                                    <input type="radio" id="idTerapis" name="idTerapis" value="<?php echo $data->idTerapis; ?>"><br>
                                        <img src="<?php echo $data->fotoTerapis; ?>" alt="img"><br>
                                        <label><?php echo $data->namaTerapis; ?></label>
                                    </input>
                                </label><br>
                                </div>
                                <?php
                            endforeach;
                        }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row mb-3 text-center">
            <a href="<?= base_url('index.php')?>" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" >Save</button>
            <button type="reset" class="btn btn-danger">cancel</button>
        </div>
      </form>
      </div>
    </div>
  </div>
   <div class="col-sm-6 col-md-8">
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