<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module LAYOUT VIEW MASTER
 */
require 'konfigurasi/DB.php';
require 'proses/session.php';
if(!isset($_GET['id'])) header('Location: /pengunjung');
$id = $_GET['id'];
$data = $DATABASE->select("SELECT * FROM agenda WHERE id=$id");
if(count($data)){
    $data = $data[0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BKSDA YOGYAKARTA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Avilon
      Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body>

<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto"> <b style="font-family:rockwell;font-size:48px"> BKSDA YOGYAKARTA</b> </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu d-flex">
                <li class="menu-active"><a href="/pengunjung#intro" style="font-size:16px">Home</a></li>
                <li><a href="/pengunjung#about" style="font-size:16px">About Us</a></li>
                <li><a href="/pengunjung#agenda" style="font-size:16px">Agenda</a></li>
                <li><a href="/pengunjung#news" style="font-size:16px">News</a></li>
                <li><a href="#contact" style="font-size:16px">Contact Us</a></li>
                <?php
                if($AUTH->get()){
                    echo "<li><button onclick='window.open(\"/admin\")' class=\"btn btn-warning\" href='/admin' style=\"color:white;font-size:16px\"></span>&nbsp ADMIN  &nbsp</button></li>";
                }else{
                    echo "<li><button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modal-form-login\" style=\"color:white;font-size:16px\"></span>&nbsp LOGIN  &nbsp</button></li>";
                };
                ?>

            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" style="height: 100px!important;" class="d-flex align-items-end">
    <div class="container">
<!--        <p>Agenda</p>-->
    </div>
</section><!-- #intro -->

<main id="main">
    <section id="advanced-features">
        <div class="features-row section-bg bg-white" id="agenda" style="min-height: 500px">
            <div class="container">
                <div class="row">
                    <h2><?=$data->judul;?></h2>
                </div>
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="px-3">
                            <?php
                            $time = strtotime($data->waktu);
                            $day = date('d',$time);
                            $numericDay = $day;
                            $weekday = date('l',strtotime("Sunday +{$numericDay} days"));
                            $month = date('F',$time);
                            $year = date('Y',$time);
                            echo "<time datetime=\"$data->waktu\" class=\"date-as-calendar position-em size1x\">
                                            <span class=\"weekday\">$weekday</span>
                                            <span class=\"day\">$day</span>
                                            <span class=\"month\">$month</span>
                                            <span class=\"year\">$year</span>
                                            </time>";
                            ?>
                        </div>
                        <p class="px-3">
                            <?=$data->deskripsi;?>
                        </p>
                        <img src="<?=$data->gambar;?>" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <?php require 'section/agenda.php';?>
    </section><!-- #advanced-features -->
    <?php require 'section/footer.php';?>

    <!-- Modal -->
    <div class="modal fade" id="modal-form-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:30%;left:1%">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" method="POST" action="proses/login.php">
                    <div class="modal-body" >
                        <div class="form-group">
                            <label>USERNAME</label>
                            <input class="form-control" name="username" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label>PASSWORD</label>
                            <input class="form-control" name="password" type="password" required="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="login" id="button_submit">Login</button>
                        </div>
                </form>


            </div>
        </div>
    </div>
    </div>
</main>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>

</body>
</html>
