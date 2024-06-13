
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LoyalSpa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/styleLandingPage.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    
    <style>
        td{
            padding-bottom: 14px;
            padding-right: 7px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm shadow bg-white sticky-top d-flex justify-content-between w-100 position-fixed">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand d-block d-sm-none" href="#">LoyalSpa</a>
            <div class="collapse navbar-collapse justify-content-start d-none d-sm-block" id="navbar">
                <div class="navbar-nav">
                    <a class="navbar-brand" href="#">LoyalSpa</a>
                </div>
            </div>


            <!-- NAVBAR-SM-HAMBURGER-BUTTON -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- NAVBAR-CONTENT -->
            <div class="collapse navbar-collapse justify-content-center" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-link hover" href="<?= base_url('controller_staff/home')?>">Home</a>
                    <a class="nav-link hover" href="<?= base_url('controller_staff/layanan')?>">Layanan</a>
                    <a class="nav-link hover" href="<?= base_url('controller_staff/terapis')?>">Terapis</a>
                    <a class="nav-link hover" href="<?= base_url('controller_staff/reservasi')?>">Reservasi</a>
                </div>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <div class="navbar-nav">
                    <a class="nav-link hover" onclick="logout()" href="javascript:void(0);">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END-OF-NAVBAR -->

    <div class="container-fluid py-5">
        <div class="py-5">
            <div>
                <?php
                    if (!empty($konten)) {
                        echo $konten;
                    } elseif (!empty($table)) {
                        echo $table;
                    } else{
                        echo "";
                    }
                ?>
            </div>
        </div>
    </div>
    

    <script language="javascript">
        function logout(){
            if (confirm("Apakah yakin keluar?")){
                window.open("<?php echo base_url(); ?>controller_main/logout","_self");	
            }	
        }
    </script>
    <div id="script"></div>
    <script src="<?php echo base_url(); ?>/jquery/app.js"></script>
    <script language="javascript">
        var site = "<?php echo base_url()?>index.php/";
        var loading_image_large = "<?php echo base_url()?>gambar/loading_large.gif";
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</body>

</html>
